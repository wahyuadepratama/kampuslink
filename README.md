# KampusLink

### 1. Requirement
- Menggunakan XAMPP atau LAMPP dengan PHP minimal versi 7.0
- Sudah terinstall git (https://git-scm.com/downloads)
- Sudah terinstall composer (https://getcomposer.org/download/)

### 2. Deployment
1. Masuk ke folder htdocs (jika menggunakan XAMPP) dan masukan perintah
```sh
git clone https://github.com/wahyuadepratama/kampuslink.git
```
2. Selelah selesai, masuk ke folder kampuslink dan ketikan perintah berikut
```sh
composer update
```
3. Selanjutnya buat database pada mysql (gunakan phpmyadmin). Nama database bebas.
4. Setelah selesai, ubah file .env.example menjadi file .env dan ubah isi file sesuai dengan nama, username dan password database yang kamu gunakan.
```sh
DB_DATABASE=isi ini dengan nama database kamu
DB_USERNAME=isi ini dengan user database kamu
DB_PASSWORD=isi ini dengan password database kamu
```
5. Selanjutnya masukan perintah berikut
```sh
php artisan key:generate
```
6. Terakhir jalankan server dengan perintah
```sh
php artisan serve
```
7. Untuk mengaksesnya via browser, buka link: localhost:8000 di browser kamu
