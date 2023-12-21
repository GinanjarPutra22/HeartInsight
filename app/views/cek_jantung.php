<!-- 
age: Umur pasien.
sex: Jenis kelamin pasien (0 = perempuan, 1 = laki-laki).
cp: Jenis nyeri dada yang dirasakan oleh pasien (0-3).
trestbps: Tekanan darah istirahat pasien (dalam mmHg saat masuk ke rumah sakit).
chol: Kolesterol serum pasien (dalam mg/dl).
fbs: Gula darah puasa lebih dari 120 mg/dl (1 = true; 0 = false).
restecg: Hasil elektrokardiografi istirahat pasien (0-2).
thalach: Denyut jantung maksimum yang dicapai pasien.
exang: Angina yang diinduksi olahraga (1 = yes; 0 = no).
oldpeak: Depresi segmen ST yang dihasilkan oleh olahraga relatif terhadap istirahat.
slope: Kemiringan segmen ST latihan puncak (0-2).
ca: Jumlah pembuluh besar (0-3) yang diwarnai oleh fluoroskopi.
thal: Jenis thalassemia pasien (3 = normal; 6 = cacat tetapi dapat dibalikkan; 7 = cacat tetap). -->




<div class="container mt-5">
        <div class="row text-center mx-4 mx-md-5 text-center">
            <p class="fw-bold fs-1 text-black">Mari Cek Kesehatan <span class="text-primary"> Jantungmu</span></p>
            <p class="fs-5">
                Jantung merupakan organ vital mahluk hidup, terutama manusia<br>
                sehingga kesehatan jantung sangat utama untuk diperhatikan dan dijaga 
            </p>
        </div>
        <form action="/cekjantung" method="POST">
            <div class="row g-3 mb-3">
                <div class="col">
                    <input type="number" id="age" name="age" class="form-control" placeholder="Umur" aria-label="Umur">
                </div>
                <div class="col">
                    <input type="number" id="sex" name="sex" class="form-control" placeholder="Jenis Kelamin" aria-label="Last name">
                </div>
                <div class="col">
                    <input type="text" id="cp" name="cp" class="form-control" placeholder="Nyeri Dada" aria-label="Last name">
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col">
                    <input type="text" id="trestbps" name="trestbps" class="form-control" placeholder="Tekanan darah" aria-label="First name">
                </div>
                <div class="col">
                    <input type="text" id="chol" name="chol" class="form-control" placeholder="Kolesterol" aria-label="Last name">
                </div>
                <div class="col">
                    <input type="text" id="fbs" name="fbs" class="form-control" placeholder="Gula darah" aria-label="Last name">
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col">
                    <input type="text" id="restecg" name="restecg" class="form-control" placeholder="Hasil elektrokardiografi" aria-label="First name">
                </div>
                <div class="col">
                    <input type="text" id="thalach" name="thalach" class="form-control" placeholder="Denyut jantung max." aria-label="Last name">
                </div>
                <div class="col">
                    <input type="text" id="exang" name="exang" class="form-control" placeholder="Angina" aria-label="Last name">
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col">
                    <input type="text" id="oldpeak" name="oldpeak" class="form-control" placeholder="Depresi" aria-label="First name">
                </div>
                <div class="col">
                    <input type="text" id="slope" name="slope" class="form-control" placeholder="Kemiringan segmen" aria-label="Last name">
                </div>
                <div class="col">
                    <input type="text" id="ca" name="ca" class="form-control" placeholder="Jumlah pembuluh besar" aria-label="Last name">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" id="thal" name="thal" class="form-control" placeholder="Jenis thalassemia" aria-label="First name">
                </div>
            </div>
            
            <div class="col-6">
                <button type="submit" class="btn btn-primary">Prediksi</button>
            </div>
        </form>
        <div class="mt-3">
            <p>{{ result }}</p>
        </div>
    </div>