# Environment Setup: Linux (Debian Based)

1. Install Apache terlebih dahulu:

		apt-get install apache2

1. Kemudian install mysql:

		apt-get install mysql-server
		mysql_secure_installation

1. Kemudian install PHP5:

		apt-get install php5 php-pear php5-suhosin php5-mysql

1. Restart Apache2

		service apache2 restart

1. Tambahan: lakukan instalasi git

		apt-get install git

# Environment Setup: Windows

Lakukan instalasi program berikut:

1. Coral Server Terbaru: [uniformserver.com](http://sourceforge.net/projects/miniserver/files/Uniform%20Server/8.9.2-Coral/Coral_8_9_2.exe/download). **Catatan:** Anda bisa menggunakkan environment apapun seperti XAMPP, tetapi untuk Windows kami merekomendasikan Uniform.

1. SourceTree: [sourcetreeapp.com](http://sourcetreeapp.com)

# Initial Configuration Setup

1. Clone, `git clone https://[namagithublu]@github.com/misdianti/berkuliah.git` (atau pake client
   kesukaan Anda seperti [SourceTree](http://sourcetreeapp.com))
2. Download yii, taruh di satu folder di atasnya
3. Bikin database `berkuliah` dan `berkuliah_test` terus jalanin sql di `protected/data`
4. Selesai!

# Initial Setup



# Menjalankan Unit Testing

1. Pertama, cek `protected/config/local.php` sama `protected/config/test.php`. Pastiin
   username dan passwordnya sesuai dengan konfigurasi komputer lu
2. Buka cmd, `cd` ke folder `protected\tests`
3. Masih di cmd, ketik `..\vendor\bin\phpunit unit`