import joblib
import pandas as pd

from fastapi import FastAPI
from pydantic import BaseModel

app = FastAPI()

model = joblib.load("model_admitere_random_forest.pkl")


class AdmitereData(BaseModel):
    medie_elev: float
    pozitie_elev: int
    sector: str
    profil: str
    specializare: str
    limba: str
    bilingv: str
    medie_liceu: float
    ultima_pozitie_2024: int
    ultima_pozitie_2023: int
    ultima_pozitie_2022: int
    pozitie_medie_intrare: int
    diferenta_pozitie: int


@app.post("/predict")
def predict(data: AdmitereData):
    input_data = pd.DataFrame([{
        "medie_elev": data.medie_elev,
        "pozitie_elev": data.pozitie_elev,
        "sector": data.sector,
        "profil": data.profil,
        "specializare": data.specializare,
        "limba": data.limba,
        "bilingv": data.bilingv,
        "medie_liceu": data.medie_liceu,
        "ultima_pozitie_2024": data.ultima_pozitie_2024,
        "ultima_pozitie_2023": data.ultima_pozitie_2023,
        "ultima_pozitie_2022": data.ultima_pozitie_2022,
        "pozitie_medie_intrare": data.pozitie_medie_intrare,
        "diferenta_pozitie": data.diferenta_pozitie
    }])

    predictie = model.predict(input_data)[0]
    probabilitati = model.predict_proba(input_data)[0]

    procent = round(probabilitati[1] * 100)

    if procent >= 75:
        nivel = "șanse mari"
    elif procent >= 50:
        nivel = "șanse medii"
    elif procent >= 30:
        nivel = "șanse mici"
    else:
        nivel = "șanse reduse"

    return {
        "admis_model": int(predictie),
        "probabilitate": procent,
        "nivel": nivel
    }
