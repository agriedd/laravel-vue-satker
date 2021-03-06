## Cara install pertama

pastikan sudah install composer

karena composer itu package dependensynya php bgitu mirip npm nodejs

### Minimun Requirement

1. >= php v7.2
2. NodeJs (Snde terlalu penting sih, kecuali mau tes ubah tampilan vue, atau mau build ulang dia pu file js)
3. 

### Langkah awal

#### download composer
[https://getcomposer.org/download/](https://getcomposer.org/download/)

#### Clone

```cli

git clone https://github.com/agriedd/laravel-vue-satker.git aplikasi

```

***aplikasi** nama folder target

#### Install package php (Internet)

```cli

cd aplikasi

```

***aplikasi** nama folder target


```cli

composer install

```

tunggu sampe selesai


#### Install package js (Internet|Opsional) Bisa diabaikan

```cli
npm install
```


#### Build File Js / Css Untuk Asset (Opsional) Bisa diabaikan


```cli
npm run dev
```

untuk menjalankan run dev ketika ada perubahan file. supaya tidak run npm run dev setiap kali ada perubahan

```cli
npm run watch
```

untuk production (jadi file / ukuran file akan jadi lebih dicompress)
```cli
npm run prod
```

#### Database


##### buat database baru

buat database dengan nama **satker**

##### pengaturan .env

kalau .env tidak ada

copy file **.env.example** menjadi **.env** pada directory/folder yang sama

buka .env dan ubah menjadi

**DB_DATABASE=laravel** jadi **DB_DATABASE=satker**

**APP_NAME=Laravel** jadi **APP_NAME=satker**

```env

APP_NAME=Satker
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=satker
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"


```


#### Key

penting ni

```cli

php artisan key:generate

```


##### migrate

untuk membuat kolom pada database **satker**

masih di cmd
dan directory yang sama

```cli

php artisan migrate:fresh --seed

```

kalau successfully semua lanjut >>>

#### Storage

untuk folder upload

masih di cmd
dan directory yang sama

```cli

php artisan storage:link

```

## Menjalankan Aplikasi

masih di cmd
dan directory yang sama

```cli

php artisan serve

```

aplikasi akan berjalan di localhost dengan port 8080
http://localhost:8080

### Login Admin
| Email | password |
|-------|----------|
| admin@satker.com | password |


### Login Pimpinan
Login admin, dimenu pimpinan
tambah pimpinan dengan nip 12345678910

untuk login
| NIP | password |
|-----|----------|
| 12345678910 | 12345678910 |

password = NIP


# Laporan

untuk laporan

bisanya laporan untuk php di file controller

lokasinya

+ app
    
    + Http
        + Controllers
            + Api
                + AdminController.php
                    + index() 
                        > untuk mengambil daftar admin
                    + store(Request $request)
                        > untuk menambah sebuah data admin baru
                        > field / $_POST yang dikirim dari form di bind ke object $request
                        > method validated() untuk mengambil data request yang dikirim dan sudah divalidasi
                        > untuk melihat validasinya misalkan untuk validasi admin di directory app/Http/Request/RequestStoreAdmin.php
                        > didalama file RequestStoreAdmin.php terdapat rule untuk setiap field request yang dikirim dari form.
                        > lalu untuk menambah dengan memanggil method created() secara static
                        > Res::create(), Res::update() hanya untuk parsing hasil return boolean ke array dengan pesan "sukses/gagal" agar lebih mudah dibaca manusia
                    + show(User $admin)
                        > untuk mengambil satu data admin berdasarkan id yang dikirim / dilaravel id langsung di cast ke object $admin
                    + update(Request $request, User $admin)
                        > sama seperti store pertama divalidasi dan kemudian data admin yang diparsing/hasil cast dari id (mirip show), panggil method update() dengan mengirim hasil validasi data tadi
                    + destroy
                        > untuk menghapus salah satu data admin, dengan memanggil method delete()
