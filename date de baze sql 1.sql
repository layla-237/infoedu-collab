DROP DATABASE IF EXISTS licee_db;
CREATE DATABASE licee_db;
USE licee_db;

CREATE TABLE licee (
    id_liceu VARCHAR(20) PRIMARY KEY,
    nume VARCHAR(200),
    tip VARCHAR(100),
    sector INT,
    adresa VARCHAR(255)
);

CREATE TABLE specializari (
    id_specializare INT AUTO_INCREMENT PRIMARY KEY,
    id_liceu VARCHAR(20),
    profil VARCHAR(150),
    specializare VARCHAR(150),
    limba VARCHAR(100),
    bilingv VARCHAR(100),
    cod_specializare INT,
    medie_actuala DECIMAL(4,2)
);

CREATE TABLE medii_admitere (
    cod_specializare INT,
    an INT,
    medie DECIMAL(4,2)
);

INSERT INTO licee VALUES
('Lic001','A.D.Xenopol','Colegiul Economic',2,'S2 STR Traian NR 165'),
('Lic002','Ady Endre','Liceul Teoretic',2,'S2 STR Ferdinand I NR 89'),
('Lic003','Alexandru Ioan Cuza','Liceul Teoretic',3,'S3 STR Barajul Dunării NR 5'),
('Lic004','Alexandru Vlahuță','Liceul Teoretic',1,'S1 STR Școala Floreasca NR 5'),
('Lic005','Anghel Saligny','Colegiul Tehnic',3,'S3 STR Grigorescu Nicolae NR 12'),
('Lic006','Aurel Vlaicu','Colegiul Național',1,'S1 STR Roth Stephan Ludwig NR 1'),
('Lic007','Benjamin Franklin','Liceul Teoretic',3,'S3 STR Pictor Gheorghe Tattarescu NR 1'),
('Lic008','C.A. Rosetti','Liceul Teoretic',2,'S2 STR Garibaldi Giuseppe NR 11'),
('Lic009','Cantemir Vodă','Colegiul Național',2,'S2 STR Viitorului NR 60'),
('Lic010','Carol I','Colegiul Tehnic',6,'S6 STR Porumbacu NR 52'),
('Lic011', 'Constantin Brâncuși', 'Liceul Tehnologic', 2, 'S2 STR Pompeiu Dimitrie, mat. NR 1'),
('Lic012', 'Costin C. Kirițescu', 'Colegiul Economic', 6, 'S6 STR Peștera Dâmbovicioara NR 12'),
('Lic013', 'Costin D. Nenițescu', 'Colegiul Tehnic', 3, 'S3 STR Pallady Theodor NR 26'),
('Lic014', 'C-tin Brâncoveanu', 'Liceul Teoretic', 1, 'S1 STR Pajurei NR 9'),
('Lic015', 'Dacia', 'Liceul Tehnologic', 4, 'S4 STR Grigore Marin, cap. NR 42-44'),
('Lic016', 'Dante Alighieri', 'Liceul Teoretic', 3, 'S3 STR Fuiorului NR 9'),
('Lic017', 'Decebal', 'Liceul Teoretic', 3, 'S3 STR Energeticienilor NR 9-11'),
('Lic018', 'Dimitrie Bolintineanu', 'Liceul Teoretic', 5, 'S5 STR Rahovei NR 315'),
('Lic019', 'Dimitrie Gusti', 'Liceul Tehnologic', 5, 'S5 STR Vulcan Samuil, episcop NR 8'),
('Lic020', 'Dimitrie Leonida', 'Colegiul Tehnic', 2, 'S2 STR Basarabia NR 47'),
('Lic021', 'Dimitrie Paciurea', 'Liceul', 1, 'S1 STR Băiculești NR 29'),
('Lic022', 'Dinicu Golescu', 'Colegiul Tehnic', 1, 'S1 STR Giulești NR 10'),
('Lic023', 'Dragomir Hurmuzescu', 'Liceul Tehnologic', 3, 'S3 STR Basarabia NR 256'),
('Lic024', 'Dumitru Moțoc', 'Colegiul Tehnic de Industrie Alimentară', 5, 'S5 STR Spătarul Preda NR 16'),
('Lic025', 'Edmond Nicolau', 'Colegiul Tehnic', 2, 'S2 STR Pompeiu Dimitrie, mat. NR 3'),
('Lic026', 'Elena Cuza', 'Colegiul Național', 6, 'S6 STR Peștera Scărișoara NR 1'),
('Lic027', 'Elie Radu', 'Liceul Tehnologic', 3, 'S3 STR Energeticienilor NR 5'),
('Lic028', 'Emil Racoviță', 'Colegiul Național', 2, 'S2 STR Mihai Bravu NR 169');

INSERT INTO specializari 
(id_liceu, profil, specializare, limba, bilingv, cod_specializare, medie_actuala) 
VALUES
('Lic001','Servicii','Economic','română',NULL,259,8.47),
('Lic001','Servicii','Turism și alimentație','română',NULL,260,8.42),
('Lic002','Real','Științe ale Naturii','maghiară',NULL,216,6.38),
('Lic003','Real','Științe ale Naturii','română',NULL,269,9.25),
('Lic003','Real','Matematică-Informatică','română',NULL,268,9.22),
('Lic003','Umanist','Științe Sociale','română',NULL,270,9.12),
('Lic004','Umanist','Filologie','română',NULL,142,8.80),
('Lic004','Umanist','Filologie','română','germană(fără examen)',144,8.77),
('Lic004','Umanist','Filologie','română','germană(cu examen)',143,8.77),
('Lic005','Servicii','Economic','română',NULL,297,7.20),
('Lic005','Resurse','Protecția mediului','română',NULL,298,7.07),
('Lic005','Tehnic','Construcții','română',NULL,296,6.50),
('Lic005','Tehnic','Electric','română',NULL,299,NULL),
('Lic005','Tehnic','Mecanică','română',NULL,300,NULL),
('Lic006','Real','Matematică-Informatică','română',NULL,117,8.70),
('Lic006','Real','Științe ale Naturii','română',NULL,118,8.62),
('Lic006','Umanist','Filologie','română',NULL,119,8.57),
('Lic007','Umanist','Filologie','română',NULL,277,8.57),
('Lic007','Real','Matematică-Informatică','română',NULL,278,8.50),
('Lic007','Real','Științe ale Naturii','română',NULL,279,8.35),
('Lic008','Real','Matematică-Informatică','română',NULL,224,9.02),
('Lic008','Umanist','Filologie','română',NULL,226,8.97),
('Lic008','Real','Științe ale Naturii','română',NULL,225,8.97),
('Lic009','Real','Matematică-Informatică','română','engleză(cu examen)',187,9.55),
('Lic009','Real','Științe ale Naturii','română',NULL,188,9.37),
('Lic009','Real','Matematică-Informatică','română',NULL,186,9.35),
('Lic010','Umanist','Științe Sociale','română',NULL,422,NULL),
('Lic010','Real','Științe ale Naturii','română',NULL,421,NULL),
('Lic010','Resurse','Protecția mediului','română',NULL,423,NULL),
('Lic010','Tehnic','Electric','română',NULL,424,NULL),
('Lic010','Tehnic','Electronică','română',NULL,427,5.95), -- Cod nou pentru Electronică Carol I
('Lic010','Tehnic','Mecanică','română',NULL,425,NULL),
('Lic011', 'Servicii', 'Economic', 'română', NULL, 248, 6.75),
('Lic011', 'Servicii', 'Comerț', 'română', NULL, 247, 6.75),
('Lic011', 'Servicii', 'Turism și alimentație', 'română', NULL, 249, 6.37),
('Lic011', 'Resurse naturale si Protecția mediului', 'Protecția mediului', 'română', NULL, 251, 6.2),
('Lic011', 'Tehnic', 'Fabricarea produselor din lemn', 'română', NULL, 250, 4.57),
('Lic012', 'Servicii', 'Economic', 'română', NULL, 426, 7.82),
('Lic012', 'Servicii', 'Turism și alimentație', 'română', NULL, 427, 7.7),
('Lic013', 'Real', 'Științe ale Naturii', 'română', NULL, 289, 7.25),
('Lic013', 'Umanist', 'Filologie', 'română', NULL, 290, 7.2),
('Lic013', 'Umanist', 'Științe Sociale', 'română', NULL, 291, 7.2),
('Lic013', 'Tehnic', 'Chimie industrială', 'română', NULL, 292, 6.22),
('Lic013', 'Resurse naturale si Protecția mediului', 'Protecția mediului', 'română', NULL, 294, 5.47),
('Lic013', 'Resurse naturale si protectia mediului', 'Industrie alimentară', 'română', NULL, 293, 5.45),
('Lic013', 'Tehnic', 'Electric', 'română', NULL, 295, 5.15),
('Lic014', 'Real', 'Matematică-Informatică', 'română', NULL, 133, 8.47),
('Lic014', 'Real', 'Științe ale Naturii', 'română', NULL, 134, 8.22),
('Lic014', 'Umanist', 'Filologie', 'română', NULL, 135, 8.0),
('Lic014', 'Umanist', 'Științe Sociale', 'română', NULL, 136, 7.9),
('Lic015', 'Resurse naturale si Protecția mediului', 'Protecția mediului', 'română', NULL, 340, 4.5),
('Lic015', 'Tehnic', 'Mecanică', 'română', NULL, 341, 2.77),
('Lic016', 'Real', 'Științe ale Naturii', 'română', NULL, 273, 8.75),
('Lic016', 'Real', 'Matematică-Informatică', 'română', NULL, 271, 8.72),
('Lic016', 'Umanist', 'Filologie', 'română', NULL, 275, 8.67),
('Lic016', 'Umanist', 'Filologie', 'română', 'italiană(cu examen)', 276, 7.32),
('Lic016', 'Real', 'Matematică-Informatică', 'română', 'italiană(cu examen)', 272, 6.65),
('Lic016', 'Real', 'Științe ale Naturii', 'italiană', NULL, 274, 3.9),
('Lic017', 'Real', 'Matematică-Informatică', 'română', NULL, 282, 7.75),
('Lic017', 'Umanist', 'Filologie', 'română', NULL, 283, 7.45),
('Lic017', 'Umanist', 'Filologie', 'română', 'engleză(cu examen)', 284, 7.45),
('Lic017', 'Umanist', 'Științe Sociale', 'română', NULL, 285, 7.42),
('Lic018', 'Umanist', 'Științe Sociale', 'română', NULL, 354, 7.92),
('Lic018', 'Real', 'Matematică-Informatică', 'română', NULL, 351, 7.85),
('Lic018', 'Umanist', 'Filologie', 'română', NULL, 353, 7.8),
('Lic018', 'Real', 'Științe ale Naturii', 'română', NULL, 352, 7.8),
('Lic019', 'Real', 'Științe ale Naturii', 'română', NULL, 365, 6.85),
('Lic019', 'Umanist', 'Științe Sociale', 'română', NULL, 366, 6.82),
('Lic019', 'Tehnic', 'Mecanică', 'română', NULL, 367, 4.2),
('Lic020', 'Real', 'Matematică-Informatică', 'română', NULL, 239, 7.07),
('Lic020', 'Real', 'Științe ale Naturii', 'română', NULL, 240, 7.0),
('Lic020', 'Resurse naturale si Protecția mediului', 'Protecția mediului', 'română', NULL, 243, 6.32),
('Lic020', 'Tehnic', 'Electronică automatizări', 'română', NULL, 241, 5.4),
('Lic020', 'Tehnic', 'Mecanică', 'română', NULL, 242, 3.85),
('Lic021', 'Umanist', 'Filologie', 'română', NULL, 183, NULL),
('Lic022', 'Umanist', 'Filologie', 'română', NULL, 158, 7.2),
('Lic022', 'Servicii', 'Turism și alimentație', 'română', NULL, 159, 6.5),
('Lic022', 'Tehnic', 'Mecanică', 'română', NULL, 160, 4.0),
('Lic023', 'Servicii', 'Economic', 'română', NULL, 307, 5.82),
('Lic023', 'Servicii', 'Comerț', 'română', NULL, 306, 5.27),
('Lic023', 'Servicii', 'Estetica și igiena corpului omenesc', 'română', NULL, 308, 4.85),
('Lic023', 'Tehnic', 'Electromecanică', 'română', NULL, 309, 3.8),
('Lic024', 'Resurse naturale si protectia mediului', 'Industrie alimentară', 'română', NULL, 364, 2.05),
('Lic025', 'Tehnic', 'Mecanică', 'română', NULL, 235, 2.57),
('Lic025', 'Umanist', 'Științe Sociale', 'română', NULL, 233, 2.57),
('Lic025', 'Tehnic', 'Electric', 'română', NULL, 234, 2.57),
('Lic025', 'Servicii', 'Economic', 'română', NULL, 237, 2.57),
('Lic025', 'Servicii', 'Turism și alimentație', 'română', NULL, 238, 2.57),
('Lic025', 'Tehnic', 'Electronică automatizări', 'română', NULL, 236, 2.8),
('Lic026', 'Real', 'Matematică-Informatică', 'română', NULL, 376, 9.22),
('Lic026', 'Umanist', 'Filologie', 'română', 'engleză(cu examen)', 377, 9.02),
('Lic026', 'Umanist', 'Filologie', 'română', NULL, 378, 8.95),
('Lic027', 'Servicii', 'Economic', 'română', NULL, 304, 4.82),
('Lic027', 'Tehnic', 'Mecanică', 'română', NULL, 305, 3.12),
('Lic028', 'Real', 'Matematică-Informatică', 'română', NULL, 210, 8.62),
('Lic028', 'Umanist', 'Filologie', 'română', NULL, 211, 8.42);

INSERT INTO medii_admitere (cod_specializare, an, medie) VALUES
-- Lic001 A.D.Xenopol
(259,2020,8.46),(259,2021,7.37),(259,2022,8.50),(259,2023,8.47),(259,2024,8.05),(259,2025,8.47),
(260,2020,8.44),(260,2021,7.27),(260,2022,8.40),(260,2023,8.45),(260,2024,7.97),(260,2025,8.42),
-- Lic002 Ady Endre
(216,2020,5.76),(216,2021,6.49),(216,2022,6.16),(216,2023,5.40),(216,2024,4.90),(216,2025,6.38),
-- Lic003 Alexandru Ioan Cuza
(269,2020,9.37),(269,2021,8.95),(269,2022,9.28),(269,2023,9.30),(269,2024,9.25),(269,2025,9.25),
(268,2020,9.36),(268,2021,8.95),(268,2022,9.29),(268,2023,9.25),(268,2024,9.10),(268,2025,9.22),
(270,2020,9.22),(270,2021,8.83),(270,2022,9.20),(270,2023,9.17),(270,2024,9.00),(270,2025,9.12),
-- Lic004 Alexandru Vlahuță
(142,2020,8.93),(142,2021,8.20),(142,2022,8.91),(142,2023,8.85),(142,2024,8.57),(142,2025,8.80),
(144,2022,8.86),(144,2023,8.82),(144,2024,8.52),(144,2025,8.77),
(143,2020,8.87),(143,2021,7.48),(143,2022,8.68),(143,2023,8.67),(143,2024,8.10),(143,2025,8.77),
-- Lic005 Anghel Saligny
(297,2021,5.28),(297,2022,7.35),(297,2023,7.30),(297,2024,6.50),(297,2025,7.20),
(298,2020,5.82),(298,2021,5.61),(298,2022,6.75),(298,2023,7.05),(298,2024,6.37),(298,2025,7.07),
(296,2020,5.44),(296,2021,5.07),(296,2022,6.00),(296,2023,5.32),(296,2024,5.35),(296,2025,6.50),
(299,2020,3.49),(299,2024,4.92), -- Electric
(300,2020,4.98),(300,2021,4.64), -- Mecanică
-- Lic006 Aurel Vlaicu
(117,2020,8.47),(117,2021,7.33),(117,2022,8.69),(117,2023,8.72),(117,2024,8.42),(117,2025,8.70),
(118,2020,8.70),(118,2021,7.44),(118,2022,8.62),(118,2023,8.65),(118,2024,8.30),(118,2025,8.62),
(119,2020,8.51),(119,2021,7.62),(119,2022,8.60),(119,2023,8.57),(119,2024,8.17),(119,2025,8.57),
-- Lic007 Benjamin Franklin
(277,2020,8.42),(277,2021,6.81),(277,2022,8.35),(277,2023,8.42),(277,2024,8.10),(277,2025,8.57),
(278,2020,8.41),(278,2021,7.15),(278,2022,8.44),(278,2023,8.37),(278,2024,8.02),(278,2025,8.50),
(279,2020,8.44),(279,2021,7.50),(279,2022,8.49),(279,2023,8.35),(279,2024,7.90),(279,2025,8.35),
-- Lic008 C.A. Rosetti
(224,2020,9.13),(224,2021,8.44),(224,2022,9.07),(224,2023,9.05),(224,2024,8.80),(224,2025,9.02),
(226,2020,9.03),(226,2021,8.51),(226,2022,9.04),(226,2023,9.00),(226,2024,8.75),(226,2025,8.97),
(225,2020,9.06),(225,2021,8.40),(225,2022,9.04),(225,2023,9.02),(225,2024,8.75),(225,2025,8.97),
-- Lic009 Cantemir Vodă
(187,2020,9.55),(187,2021,9.27),(187,2022,9.48),(187,2023,9.47),(187,2024,9.42),(187,2025,9.55),
(188,2020,9.43),(188,2021,9.06),(188,2022,9.35),(188,2023,9.35),(188,2024,9.22),(188,2025,9.37),
(186,2020,9.42),(186,2021,9.06),(186,2022,9.38),(186,2023,9.37),(186,2024,9.22),(186,2025,9.35),
-- Lic010 Carol I
(422,2024,7.05),
(421,2020,7.50),(421,2021,5.34),(421,2022,7.24),(421,2023,7.48),(421,2024,6.72),
(423,2021,4.69),(423,2022,6.52),(423,2023,6.32),(423,2024,6.17),
(424,2020,5.12),(424,2021,5.12),(424,2024,5.12), -- Carol I Electric
(427,2020,5.95),(427,2022,5.39),(427,2023,4.90),(427,2024,4.65), -- Electronică Carol I
(425,2020,5.16),(425,2021,4.38),(425,2022,4.04),(425,2023,4.20),(425,2024,2.57),

-- Lic011 Constantin Brâncuși
(248,2020,7.53),(248,2021,5.30),(248,2022,7.05),(248,2023,7.07),(248,2024,6.37),
(247,2024,6.75),
(249,2020,7.53),(249,2021,5.30),(249,2022,7.05),(249,2023,7.07),(249,2024,6.37),
(251,2020,6.07),(251,2021,4.13),(251,2022,6.45),(251,2023,6.72),(251,2024,6.20),
(250,2020,5.99),(250,2021,4.33),(250,2022,5.45),(250,2023,5.25),(250,2024,4.57),

-- Lic012 Costin C. Kirițescu
(426,2020,8.34),(426,2021,6.96),(426,2022,8.19),(426,2023,8.25),(426,2024,7.82),(426,2025,8.30),
(427,2020,8.23),(427,2021,6.67),(427,2022,8.05),(427,2023,8.17),(427,2024,7.70),(427,2025,8.20),

-- Lic013 Costin D. Nenițescu
(289,2020,7.70),(289,2021,5.34),(289,2022,7.55),(289,2023,7.70),(289,2024,7.25),
(291,2023,6.75),(291,2024,7.65),
(292,2020,6.16),(292,2021,5.31),(292,2022,6.75),(292,2023,6.35),(292,2024,6.22),
(294,2020,6.54),(294,2021,3.93),(294,2022,6.14),(294,2023,6.17),(294,2024,5.47),
(293,2020,7.00),(293,2021,4.82),(293,2022,5.96),(293,2023,6.12),(293,2024,5.45),
(295,2021,3.50),

-- Lic014 C-tin Brâncoveanu
(133,2020,8.46),(133,2021,7.21),(133,2022,8.58),(133,2023,8.65),(133,2024,8.47),(133,2025,8.72),
(134,2020,8.20),(134,2021,6.91),(134,2022,8.29),(134,2023,8.37),(134,2024,8.22),(134,2025,8.60),
(135,2020,8.22),(135,2021,7.10),(135,2022,8.32),(135,2023,8.32),(135,2024,8.00),(135,2025,8.47),
(136,2020,8.20),(136,2021,6.90),(136,2022,8.24),(136,2023,8.25),(136,2024,7.90),(136,2025,8.45),

-- Lic015 Dacia
(340,2021,4.83),(340,2024,4.50),
(341,2020,4.68),(341,2022,2.87),(341,2023,4.02),(341,2024,2.77),

-- Lic016 Dante Alighieri
(273,2020,9.05),(273,2021,8.49),(273,2022,9.04),(273,2023,9.02),(273,2024,8.75),(273,2025,8.97),
(271,2020,9.06),(271,2021,8.36),(271,2022,9.02),(271,2023,9.00),(271,2024,8.72),(271,2025,8.97),
(275,2020,8.97),(275,2021,8.34),(275,2022,8.99),(275,2023,8.92),(275,2024,8.67),(275,2025,8.87),
(276,2020,7.16),(276,2021,6.43),(276,2022,7.90),(276,2023,8.10),(276,2024,7.32),
(272,2020,4.81),(272,2021,6.02),(272,2022,7.64),(272,2023,7.80),(272,2024,6.65),
(274,2020,8.11),(274,2021,7.56),

-- Lic017 Decebal
(282,2020,8.10),(282,2021,6.19),(282,2022,8.14),(282,2023,8.27),(282,2024,7.75),
(283,2020,8.04),(283,2021,7.30),(283,2022,8.31),(283,2023,8.07),(283,2024,7.45),
(285,2020,8.00),(285,2021,6.46),(285,2022,8.06),(285,2023,8.02),(285,2024,7.42),

-- Lic018 Dimitrie Bolintineanu
(354,2020,8.55),(354,2021,7.44),(354,2022,8.47),(354,2023,8.37),(354,2024,7.92),
(351,2020,8.33),(351,2021,5.35),(351,2022,8.20),(351,2023,8.32),(351,2024,7.85),
(353,2020,8.35),(353,2021,7.20),(353,2022,8.36),(353,2023,8.27),(353,2024,7.80),
(352,2020,8.22),(352,2021,6.98),(352,2022,8.24),(352,2023,8.25),(352,2024,7.80),

-- Lic019 Dimitrie Gusti
(365,2021,3.82),(365,2022,7.45),(365,2023,7.52),(365,2024,6.85),
(366,2020,7.93),(366,2021,4.96),(366,2022,7.50),(366,2023,7.52),(366,2024,6.82),
(367,2020,4.89),(367,2021,3.78),(367,2022,5.32),(367,2023,4.97),(367,2024,4.20),

-- Lic020 Dimitrie Leonida
(240,2020,7.71),(240,2021,5.61),(240,2022,7.53),(240,2023,7.62),(240,2024,7.00),
(243,2021,4.51),(243,2022,6.59),(243,2023,6.80),(243,2024,6.32),
(241,2020,6.22),(241,2021,4.28),(241,2022,6.24),(241,2023,5.45),(241,2024,5.40),
(242,2020,4.96),(242,2021,3.64),(242,2022,4.22),(242,2023,4.52),(242,2024,3.85),

-- Lic021 Dimitrie Paciurea
(183,2020,7.98),(183,2021,6.72),(183,2022,8.08),(183,2023,8.00),

-- Lic022 Dinicu Golescu
(158,2022,7.67),(158,2023,7.72),(158,2024,7.20),
(159,2020,6.61),(159,2021,5.87),(159,2022,7.25),(159,2023,7.30),(159,2024,6.50),
(160,2020,5.29),(160,2021,5.18),(160,2022,6.15),(160,2023,5.42),(160,2024,4.00),

-- Lic023 Dragomir Hurmuzescu
(307,2020,7.68),(307,2021,4.66),(307,2022,6.78),(307,2023,6.62),(307,2024,5.82),
(306,2022,6.00),(306,2023,5.82),(306,2024,5.27),
(308,2020,6.65),(308,2021,5.52),(308,2022,6.14),(308,2023,5.12),(308,2024,4.85),
(309,2020,4.92),(309,2021,3.21),(309,2022,4.46),(309,2023,4.40),(309,2024,3.80),

-- Lic024 Dumitru Moțoc
(364,2020,5.18),(364,2021,3.04),(364,2022,5.54),(364,2023,4.75),(364,2024,2.05),

-- Lic025 Edmond Nicolau
(235,2020,5.48),(235,2021,3.77),(235,2022,5.12),(235,2023,4.62),(235,2024,2.57),
(236,2021,4.12),(236,2022,4.13),(236,2023,4.35),(236,2024,2.80),

-- Lic026 Elena Cuza
(376,2020,9.33),(376,2021,9.06),(376,2022,9.34),(376,2023,9.37),(376,2024,9.22),(376,2025,9.32),
(377,2020,9.15),(377,2021,8.89),(377,2022,9.21),(377,2023,9.20),(377,2024,9.02),(377,2025,9.10),
(378,2020,9.11),(378,2021,8.73),(378,2022,9.16),(378,2023,9.17),(378,2024,8.95),(378,2025,9.07),

-- Lic027 Elie Radu
(304,2020,6.16),(304,2021,4.93),(304,2022,6.01),(304,2023,5.50),(304,2024,4.82),
(305,2020,5.03),(305,2021,3.23),(305,2022,5.13),(305,2023,4.45),(305,2024,3.12),

-- Lic028 Emil Racoviță
(210,2020,9.01),(210,2021,8.25),(210,2022,8.99),(210,2023,8.92),(210,2024,8.62),(210,2025,8.95),
(211,2020,8.91),(211,2021,8.08),(211,2022,8.89),(211,2023,8.85),(211,2024,8.42),(211,2025,8.70);

SELECT 
    l.nume,
    s.specializare,
    MAX(CASE WHEN m.an = 2020 THEN m.medie END) AS '2020',
    MAX(CASE WHEN m.an = 2021 THEN m.medie END) AS '2021',
    MAX(CASE WHEN m.an = 2022 THEN m.medie END) AS '2022',
    MAX(CASE WHEN m.an = 2023 THEN m.medie END) AS '2023',
    MAX(CASE WHEN m.an = 2024 THEN m.medie END) AS '2024',
    MAX(CASE WHEN m.an = 2025 THEN m.medie END) AS '2025'
FROM licee l
JOIN specializari s ON l.id_liceu = s.id_liceu
LEFT JOIN medii_admitere m ON s.cod_specializare = m.cod_specializare
GROUP BY s.cod_specializare, l.nume, s.specializare
ORDER BY l.nume, s.specializare;