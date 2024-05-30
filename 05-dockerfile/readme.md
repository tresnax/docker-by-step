# Dockerfile

Dockerfile merupakan sebuah file yang berisikan text, dimana text tersebut merupakan perintah yang nantinya akan dijalankan oleh docker untuk membuat sebuah image baru. Image baru ini dibuat berdasarkan blueprint dari image yang ada, lalu dibuild sesuai dengan costumisasi yang kita perlukan.

## Example Case
Sebagai contoh kita akan membuat sebuah image docker yang berisikan webserver dengan detail berikut :
1. Service Apache dan php
2. Memiliki index.php yang berisi phpinfo
3. Memiliki nama webserver:1.0-tresnax
4. Base image ubuntu:18.04
5. Menjalankan port 80

## Dockerfile
Untuk struktur dari dockerfile yang akan kita buat adalah sebagai berikut :
```
|______Dockerfile
|______web
        |___index.php
```

Sedangkan isi dari dockerfilenya adalah sebagai berikut :
```
FROM ubuntu:18.04
RUN export DEBIAN_FRONTEND=noninteractive && \
    apt-get update && \
    apt-get -y install apache2 php
COPY web/index.php /var/www/html/
RUN rm /var/www/html/index.html
RUN chmod 775 /var/www/html/index.php
CMD apachectl -D FOREGROUND
EXPOSE 80
```

**Keterangan :**
- FROM = Menjelaskan image yang akan kita gunakan
- COPY = Merupakan perintah untuk memindahkan file kita kedalam docker image
- CMD = Untuk menjalankan command pada awal container dijalankan
- RUN = fungsinya untuk mengeksekusi perintah pada saat image dibuat
- EXPOSE = mendefinisikan port yang digunakan oleh container saat runtime
- DEBIAN_FRONTEND=noninteractive = Command ini digunakan untuk mematikan frontend bagi image base debian/ubuntu, tapi jika kamu menggunakan image lain yang bukan base maka bisasanya tidak perlu.


## Menjalankan Dockerfile (Membuat Image Docker)
```
docker build . -t webserver:1.0-tresnax
```

Check hasil dockerfile dengan menggunakan perintah ***docker images***, hasilnya akan seperti berikut.
```
$ docker images
REPOSITORY   TAG           IMAGE ID       CREATED         SIZE
webserver    1.0-tresnax   51ce599919c9   7 seconds ago   225MB
ubuntu       18.04         f9a80a55f492   5 months ago    63.2MB
php          7.2-apache    c61d277263e1   2 years ago     410MB
```

## Menjalankan Container
Jalankan image yang sudah kita buat tadi dengan perintah berikut.
```
docker run -p 8080:80 -d --name webserver webserver:1.0-tresnax
```

Check apakah docker sudah berjalan dengan menggunakan perintah ***docker ps***
```
CONTAINER ID   IMAGE                   COMMAND                  CREATED         STATUS        PORTS                  NAMES
7e5fc42db8ae   webserver:1.0-tresnax   "/bin/sh -c 'apachec…"   2 seconds ago   Up 1 second   0.0.0.0:8080->80/tcp   webserver
```

Setelah muncul seperti diatas, silahkan check menggunakan browser pada komputer anda dengan menekan **http://localhost:8080** atau **http://127.0.0.1:8080** Maka akan muncul informasi php dari phpinfo.


## Command on Dockerfile
Berikut beberapa command dalam dockerfile yang dapat kamu temukan atau gunakan pada case berikutnya :
- ARG = Instruksi ini digunakan untuk menentukan variabel yang dapat dilewati saat build-time. Kamu juga dapat menentukan nilai default.
- FROM = Menjelaskan image yang akan kita gunakan untuk membuat image baru.
- LABEL = Digunakan untuk menambahkan metadata ke image, seperti deskripsi, versi, author dll.
- RUN = Perintah yang berfungsi untuk mengeksekusi perintah pada saat image dibuat, dan tidak akan diulangi pada saat image dijalankan sebagai container.
- ADD = Digunakan untuk menyalin file dan direktori dari sumber yang ditentukan ke tujuan yang ditentukan pada image docker. Jika filenya berupa **.tar** maka akan secara otomatis di ekstrak ke dalam image Docker tersebut.
- COPY = Mirip dengan ADD tetapi sumbernya hanya berupa file atau direktori lokal.
- ENV = Instruksi digunakan untuk mendefinisikan environment variable.
- CMD = Untuk menjalankan command pada awal container dijalankan. kamu hanya dapat menggunakan satu instruksi CMD di Dockerfile.
- ENTRYPOINT = Mirip dengan CMD, instruksi ini mendefinisikan perintah apa yang akan dieksekusi ketika menjalankan sebuah container.
- WORKDIR = Directive ini menetapkan direktori kerja saat ini untuk instruksi RUN, CMD, ENTRYPOINT, COPY, dan ADD berikut. Kurang lebih sama seperti menjalankan comand **cd** ke direktory tertentu.
- USER = Untuk menetapkan nama user atau UID untuk digunakan ketika menjalankan instruksi RUN, CMD, ENTRYPOINT, COPY dan ADD.
- VOLUME = Digunakan untuk memasang docker volume dari host ke container.
- EXPOSE = Digunakan untuk menentukan port tempat Container berjalan saat runtime.

<br>

# Challange !

Setelah kamu mempelajari tentang dockerfile, sekarang kita coba untuk membuat sebuah dockerfile dengan kriteria berikut ini.
1. Image menggunakan **node:12.2.0-alpine**
2. Lakukan perintah **npm install** dan **npm run test** pada pembuatan image
3. Pindahkan file web kedalam image dengan directory **web**
4. Gunakan port 8000 untuk runtime container
5. Jalankan perintah **node** dan **app.js** pada saat container dijalankan
6. Build docker image dengan nama todolist 
7. Jalankan container dengan parameter name sesuai nama kamu dan port host sesuai yang kamu inginkan
8. Check apps melalui browser untuk memastikan semuanya berjalan dengan baik

<br>

Sebelum menjalankan challange, pastikan kamu mengunduh atau melakukan clone pada content git berikut https://github.com/tresnax/node-todo-cicd.git, file yang akan dipindahkan kedalam container adalah seluruh isi yang ada didalamnya.

## Note
Didalam git content tersebut sudah ada kunci jawaban untuk Dockerfile, tapi saya harap kamu berusaha membuat sendiri terlebih dahulu agar kamu bisa try and error. Selamat Mencoba !
