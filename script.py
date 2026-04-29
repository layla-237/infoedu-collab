#!/usr/bin/env python3
import csv
import argparse
import re

# Constants
SCHEMA = {
    "licee": {
        "columns": {
            "id_liceu": "VARCHAR(20) PRIMARY KEY",
            "nume": "VARCHAR(200)",
            "tip": "VARCHAR(100)",
            "sector": "INT CHECK(sector >= 1 AND sector <= 6)",
            "adresa": "VARCHAR(255)",
        },
    },

    "specializari": {
        "columns": {
            "id_specializare": "INT AUTO_INCREMENT PRIMARY KEY",
            "id_liceu": "VARCHAR(20)",
            "profil": "VARCHAR(150)",
            "specializare": "VARCHAR(150)",
            "limba": "VARCHAR(100)",
            "bilingv": "VARCHAR(100)",
            "cod_specializare": "INT UNIQUE",
            "medie_actuala": "DECIMAL(4,2)",
        },
        "foreign": {
            "id_liceu": "licee(id_liceu)"
        },
    },

    "medii_admitere": {
        "columns": {
            "cod_specializare": "INT",
            "an": "INT",
            "medie": "DECIMAL(4,2)",
        },
        "foreign": {
            "cod_specializare": "specializari(cod_specializare)"
        },
    },
}

COL_NAMES_DICT = {
    "licee": {
        "id_liceu": "IDLiceu",
        "nume": "Nume Liceu",
        "tip": "Tip Liceu",
        "sector": None,
        "adresa": "Adresa\nliceului",
    },
    "specializari": {
        "id_liceu": "IDLiceu",
        "profil": "Profil",
        "specializare": "Specializare",
        "limba": "Limba de predare",
        "bilingv": "Bilingv",
        "cod_specializare": "2025 \nCod Specializare din Broșura de Admitere",
        "medie_actuala": "2025 Ultima medie la ADMITERE",
    },
    "medii_admitere": {
        "cod_specializare": "2025 \nCod Specializare din Broșura de Admitere",
        "an": None,
        "medie": None,
    },
}

def create_tables(sql_file):
    sql_file.write("-- Delete old tables\n")
    sql_file.write("SET FOREIGN_KEY_CHECKS = 0;\n")
    for table in SCHEMA.keys():
        sql_file.write(f"DROP TABLE IF EXISTS `{table}`;\n")
    sql_file.write("SET FOREIGN_KEY_CHECKS = 1;\n")

    sql_file.write("\n-- Create tables\n")
    statements = []
    for table, details in SCHEMA.items():
        columns = []

        for col_name, col_type in details["columns"].items():
            columns.append(f"{col_name} {col_type}")

        if "foreign" in details:
            for key, foreign_key in details["foreign"].items():
                columns.append(f"FOREIGN KEY ({key}) REFERENCES {foreign_key}")

        columns_sql = ",\n  ".join(columns)
        create_stmt = f"CREATE TABLE {table} (\n  {columns_sql}\n);\n"
        statements.append(create_stmt)

    statements = "\n".join(statements)
    sql_file.write(statements)

def insert_admissions(sql_file, row):
    cols = ', '.join(COL_NAMES_DICT["medii_admitere"].keys())
    statements = [ ]

    for year in range(2025, 2019, -1):
        vals = [ ]

        for col_name, field_name in COL_NAMES_DICT["medii_admitere"].items():
            # Special Cases
            if field_name is None:
                if col_name == "medie":
                    # Weird formatting bs
                    if year == 2023 or year == 2024:
                        field_name = f"{year}\nUltima medie la ADMITERE"
                    else:
                        field_name = f"{year} Ultima medie la ADMITERE"

                elif col_name == "an":
                    vals.append(f"'{year}'")
                    continue

            val = row.get(field_name)
            if val is None or val.strip() == "" or val == '-':
                val = "NULL"

            # Special cases
            if col_name == "medie":
                val = val.replace(",", ".")

            if val != "NULL":
                vals.append(f"'{val}'")
            else:
                vals.append(f"{val}")

        vals_str = ", ".join(vals)
        statements.append(f"INSERT INTO medii_admitere ({cols}) VALUES ({vals_str});")

    statements = "\n".join(statements)
    sql_file.write(statements)


def insert_specialization(sql_file, row):
    cols = ', '.join(COL_NAMES_DICT["specializari"].keys())
    vals = [ ]

    for col_name, field_name in COL_NAMES_DICT["specializari"].items():
        val = row.get(field_name)
        if val is None or val.strip() == "" or val == '-':
            val = "NULL"

        # Special cases
        if col_name == "cod_specializare" and val == "NULL":
            return
        if col_name == "medie_actuala":
            val = val.replace(",", ".")

        if val != "NULL":
            vals.append(f"'{val}'")
        else:
            vals.append(f"{val}")

    vals_str = ", ".join(vals)
    insert_stmt = f"INSERT INTO specializari ({cols}) VALUES ({vals_str});\n"

    sql_file.write(insert_stmt)
    insert_admissions(sql_file, row)

def insert_highschool(sql_file, row):
    cols = ', '.join(COL_NAMES_DICT["licee"].keys())
    vals = [ ]

    for col_name, field_name in COL_NAMES_DICT["licee"].items():
        if field_name is None:
            if col_name == "sector":
                address = row.get("Adresa\nliceului")
                sector = re.search(r"\bS([1-6])\b", address)
                val = int(sector.group(1)) if sector else "NULL"
                vals.append(f"{val}")
                continue

        val = row.get(field_name)
        if val is None or val.strip() == "":
            val = "NULL"

        # Special Cases
        if val != "NULL":
            vals.append(f"'{val}'")
        else:
            vals.append(f"{val}")

    vals_str = ", ".join(vals)
    insert_stmt = f"INSERT INTO licee ({cols}) VALUES ({vals_str});\n"

    sql_file.write(insert_stmt)
    insert_specialization(sql_file, row)

def insert_data(sql_file, csv_file):
    sql_file.write("\n-- Insert Data\n")

    reader = csv.DictReader(csv_file)
    seen_highschools = set()

    for row in reader:
        highschool_id = row.get("IDLiceu")
        assert(not highschool_id is None)

        if highschool_id in seen_highschools:
            insert_specialization(sql_file, row);
        else:
            seen_highschools.add(highschool_id)
            insert_highschool(sql_file, row)

if __name__ == "__main__":
    parser = argparse.ArgumentParser(description="Convertește un fișier csv cu un format predefinit într-un script SQL")
    parser.add_argument("-i", "--input", nargs=1, help="Input CSV file", default=None)
    parser.add_argument("-o", "--output", nargs=1, help="Output SQL file", default=None)
    args = parser.parse_args();

    input_file = "admitere liceu 2026 condensat.csv" if not args.input or len(args.input) == 0 else args.input[0]
    csv_file = open(input_file, encoding="utf-8")
    output_file = "output.sql" if not args.output or len(args.output) == 0 else args.output[0]
    sql_file = open(output_file, "w", encoding="utf-8")

    create_tables(sql_file)
    insert_data(sql_file, csv_file)

    sql_file.close()
    csv_file.close()
