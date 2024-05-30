# Offline Images

Sejatinya docker image dapat kita unduh dengan melakukan **docker pull** tapi pada beberapa kondisi image docker ini dapat kita unduh dan kita install secara offline. Case ini saya dapatkan sendiri pada saat menjalankan service pada server intranet yang minim koneksi.

## Download Image Docker
Image docker akan terunduh dalam format file tar, untuk formatnya sediri adalah sebagai berikut ***docker save -o nama-file.tar nama-image***.
```
#example
docker save -o php72.tar php:7.2-apache

#example simpan ke directory langsung
docker save -o ~/Downloads/php72.tar php:7.2-apache

```

## Install Image Docker Offline 
```
#example
docker load -i php72.tar

#example disimpan di directory lain
docker load -i ~/Downloads/php72.tar
```

System akan melakukan installasi layaknya mengunduh image baru.
```
$ docker load -i php72.tar
87c8a1d8f54f: Loading layer [==================================================>]   72.5MB/72.5MB
ddcd8d2fcf7e: Loading layer [==================================================>]  3.584kB/3.584kB
e45a78df7536: Loading layer [==================================================>]  231.4MB/231.4MB
02eef72b445f: Loading layer [==================================================>]   5.12kB/5.12kB
bc0429138e0d: Loading layer [==================================================>]  46.65MB/46.65MB
d666585087a1: Loading layer [==================================================>]  9.728kB/9.728kB
0ff9183bd099: Loading layer [==================================================>]   7.68kB/7.68kB
914a1eddd57a: Loading layer [==================================================>]  13.62MB/13.62MB
e1cd0107ea85: Loading layer [==================================================>]  4.096kB/4.096kB
ce60a0c97d4a: Loading layer [==================================================>]  54.61MB/54.61MB
9a60d912a14f: Loading layer [==================================================>]  12.29kB/12.29kB
6ec4d4ce53cc: Loading layer [==================================================>]  4.608kB/4.608kB
cc45506c4447: Loading layer [==================================================>]  3.584kB/3.584kB
5dc980197467: Loading layer [==================================================>]  4.608kB/4.608kB
Loaded image: php:7.2-apache
```

Hasilnya dapat kamu lihat dengan menggunakan perintah images.
```
docker images
```