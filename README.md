# Tentang Post Article
Saya membuat frontend menggunakan laravel, dengan mengkoneksikan microservice article yang telah dibuat. Cara menjalankannya sebagai berikut :

1. Download file post article terlebih dahulu
2. Copy dan paste pada web server
3. Jalankan terminal, lalu arahkan ke folder projectnya
4. Jalankan perintah "compose install" untuk mendownload vendor dari laravel
5. Setting Environtment File ".env", ubahlah pada bagian :
    - DB_DATABASE= menjadi DB_DATABASE=article
    - DB_USERNAME= isikan dengan user pada microservice yang telah dibuat, jika default isikan "root"
    - DB_PASSWORD= isikan dengan password pada microservice yang telah dibuat, jika default kosongkan saja
    - Tambahkan "URL_SERVICE=http://localhost/microservice-article/public/", untuk main url microservice. Sesuaikan path microservice yang telah didownload.
6. Jalankan "key:generate" untuk megenerate "APP_KEY"
7. Jalankan aplikasinya. Selesai    



