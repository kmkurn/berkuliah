SETUP.md

1. Clone, `git clone https://[namagithublu]@github.com/misdianti/berkuliah.git` (atau pake client
   kesukaan lu seperti [SourceTree](http://sourcetreeapp.com))
2. Download yii, taruh di satu folder di atasnya
3. Bikin database `berkuliah` dan `berkuliah_test` terus jalanin sql di `protected/data`
4. Selesai!

# Jalanin Unit Testing

1. Pertama, cek `protected/config/local.php` sama `protected/config/test.php`. Pastiin
   username dan passwordnya sesuai dengan konfigurasi komputer lu
2. Buka cmd, `cd` ke folder `protected\tests`
3. Masih di cmd, ketik `..\vendor\bin\phpunit unit`