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


#### Install package js (Internet|Opsional)

```cli
npm install
```


#### Build File Js / Css Untuk Asset


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

copy file **.env.example** menjadi *.env* pada directory/folder yang sama

buka .env dan ubah menjadi

**DB_DATABASE=laravel** jadi **DB_DATABASE=satker**

```env

APP_NAME=Laravel
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

##### migrate

untuk membuat kolom pada database **satker**

masih di cmd
dan directory yang sama

```cli

php artisan migrate

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