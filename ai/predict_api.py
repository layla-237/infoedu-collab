import joblib
import pandas as pd

from fastapi import FastAPI
from pydantic import BaseModel

app = FastAPI()

model = joblib.load("model_admitere_random_forest.pkl")


class AdmitereData(BaseModel):
    medie_elev: float
    sector: str
    profil: str
    specializare: str
    limba: str
    bilingv: str
    medie_liceu: float


@app.post("/predict")
def predict(data: AdmitereData):
    input_data = pd.DataFrame([{
        "medie_elev": data.medie_elev,
        "sector": data.sector,
        "profil": data.profil,
        "specializare": data.specializare,
        "limba": data.limba,
        "bilingv": data.bilingv,
        "medie_liceu": data.medie_liceu
    }])

    probability = model.predict_proba(input_data)[0][1]
    procent = round(probability * 100, 2)

    if procent >= 75:
        nivel = "șanse mari"
    elif procent >= 50:
        nivel = "șanse medii"
    elif procent >= 30:
        nivel = "șanse mici"
    else:
        nivel = "șanse reduse"

    return {
        "probabilitate": procent,
        "nivel": nivel
    }