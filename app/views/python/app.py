from flask import Flask, render_template, request
import numpy as np
import pickle

app = Flask(__name__)
model = pickle.load(open('../data/penyakit_jantung.sav', 'rb'))

@app.route('/cekjantung', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        hasil = []
        # INPUT FORM HTML
        age = request.form['age']
        sex = request.form['sex']
        cp = request.form['cp']
        trestbps = request.form['trestbps']
        chol = request.form['chol']
        fbs = request.form['fbs']
        restecg = request.form['restecg']
        thalach = request.form['thalach']
        exang = request.form['exang']
        oldpeak = request.form['oldpeak']
        slope = request.form['slope']
        ca = request.form['ca']
        thal = request.form['thal']

        # NILAI ARRAY
        heart_prediction_str = [age, sex, cp, trestbps, chol, fbs, restecg, thalach, exang, oldpeak, slope, ca, thal]
        heart_prediction_int = list(map(float, heart_prediction_str))
        heart_prediction = model.predict([heart_prediction_int])
        
        # PREDICTION
        if (heart_prediction[0]==1):
            result = 'Pasien Terkena Penyakit Jantung'
        else:
            result = 'Pasien Tidak Terkena Penyakit Jantung'

        # TAMPILKAN RESULT
        return render_template('cek_jantung.php', result=str(result))
    else:
        return render_template('cek_jantung.php', result='')

if __name__ == '__main__':
    app.run(port=5000, debug=True, use_reloader=True)