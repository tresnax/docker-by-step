# Docker Volume
Docker volume merupakan fitur yang diberikan oleh docker yang memungkinkan user untuk menyimpan atau berbagi data dengan container lainnya. Cara menggunakan docker volume cukup sederhana, kita dapat langsung membuatnya dengan docker run, Dockerfile maupun docker-swarm.

## Type Docker Volume
### 1. Host Volumes
Volume ini berbentuk direktori yang ada pada host dan di mounting kedalam container, sehingga host dapat berbagi data dengan container yang berjalan. Konsepnya sama seperti sharing file network.

Sebagai contoh kita buat sebuah direktory dengan nama **appdata** :
```
mkdir appdata
```

Selanjutnya kita jalankan sebuah docker webserver dan melakukan mounting direktory tersebut ke **/opt/app** :
```
docker run -d -v ./appdata:/opt/app --name webserver php:7.2-apache
```

Buat sebuah file didalam direcrory appdata lalu coba masuk kedalam container
```
touch appdata/foo
docker exec -it webserver bash
```

Check hasilnya dengan melakukan ls pada **/opt/app/** Maka hasilnya file yang kita buat akan ada didalam container tersebut.
```
root@019c2066bffd:/# ls /opt/app/
foo
root@019c2066bffd:/#
```

### 2. Named Volumes
Volume ini merupakan fasilitas yang di manage langsung oleh docker, data yang disimpan disana akan diatur lokasinya oleh docker dan di fasilitasi didalam host sehingga kita dapat saling berbagi dengan container lainnya.

Pertama kita membuat sebuah volume baru :
```
docker volume create datapertama
```

Kita dapat melihat volume yang telah dibuat dengan perintah ***docker volume ls*** seperti berikut :
```
$ docker volume ls
DRIVER    VOLUME NAME
local     datapertama
local     e705e2a3296060883ea1e9e4e318ac380ffea384d6bd1a3b4b6015f529299ef1
local     mydata
```

Selanjutnya mounting pada container baru yang akan kita jalankan :
```
docker run -d --mount source=datapertama,target=/opt/data --name webserver webserver:1.0-tresnax
```

Masuk kedalam container yang sudah kita jalankan dan buat beberapa file untuk kita test :
```
docker exec -it webserver bash
touch /opt/data/satu.txt
touch /opt/data/dua.txt
touch /opt/data/tiga.txt
```

Kita pastikan ketiga file yang kita buat benar-benar ada dengan perintah ls ***/opt/data*** :
```
ls /opt/data/
```

Sekarang kita coba lakukan sharing volume dengan container lain, buat container baru dengan target mounting ***/opt/database/*** lalu check hasilnya :
```
docker run -d --mount source=datapertama,target=/opt/database --name webserver2 webserver:1.0-tresnax
docker exec -it webserver2 bash
ls /opt/database/
```

## Other Command

### 1. Inspect Volume
Untuk melihat informasi dari volume yang sudah kita buat dengan perintah inspect :
```
$ docker volume inspect datapertama
[
    {
        "CreatedAt": "2023-11-28T03:29:25Z",
        "Driver": "local",
        "Labels": null,
        "Mountpoint": "/var/lib/docker/volumes/datapertama/_data",
        "Name": "datapertama",
        "Options": null,
        "Scope": "local"
    }
]

```

### 2. Menghapus volume
```
docker volume rm datapertama
```

### 3. Menghapus volume yang tidak terpakai
```
docker volume prune
```


## Implementasi
### 1. Dockerfile
Kita dapat menyematkan volume pada Dockerfile, fungsinya nanti image akan membuat sebuah anonymous volume ketika image dijalankan sebagai container. Pertama kita buat Dockerfile.
```
FROM ubuntu:18.04
VOLUME /datakedua
RUN apt-get update && apt-get -y install apache2
CMD apachectl -D FOREGROUND
EXPOSE 80
```

Build Dockerfile dan jalankan container image
```
docker build . -t webvolume:latest
docker run -d --name webvolume webvolume:latest
```

Lalukan inspect pada container yang dijalankan, lalu cari bagian Mount :
```
$ docker inspect webvolume
...
 "Mounts": [
            {
                "Type": "volume",
                "Name": "92250a7e4f9ab14c4cb6177fee3681c846ddf63fe27058dda1461189269a2e34",
                "Source": "/var/lib/docker/volumes/92250a7e4f9ab14c4cb6177fee3681c846ddf63fe27058dda1461189269a2e34/_data",
                "Destination": "/datakedua",
                "Driver": "local",
                "Mode": "",
                "RW": true,
                "Propagation": ""
            }
        ],

```

Copy pada bagian Name lalu kita check pada docker volume, apakah ada volume tersebut :
```
$ docker volume ls | grep 92250a7e4f9ab14c4cb6177fee3681c846ddf63fe27058dda1461189269a2e34
local     92250a7e4f9ab14c4cb6177fee3681c846ddf63fe27058dda1461189269a2e34
```

Meskipun sudah membuat volume secara otomatis, kita masih tetap bisa melakukan mounting volume pada container tersebut baik pada alamat mounting baru atau pada alamat mounting yang dibuat otomatis.

### 2. Docker Compose
Kamu dapat menambahkan Volume pada saat membuat docker-compose, dengan cara ini kamu akan membuat sebuah volume baru pada saat docker-compose diaktifkan. Pertama buat file docker-compose.yml
```
version: '3'
services:
  appvolume:
      image: php:7.2-apache
      container_name: appvolume
      volumes:
         - dataketiga:/data
    
volumes:
   dataketiga:
```

check volume yang dibuat otomatis dengan ***docker volume ls***
```
DRIVER    VOLUME NAME
local     07-docker-volume_dataketiga
local     556ec1bb01619e114f55288757f26923e1d97ec997471b6455f407a3915f1d51
local     0945e17627a360883bb42ba59649f933faa9b855d31fb141dcb10db84d2c8f15
local     92250a7e4f9ab14c4cb6177fee3681c846ddf63fe27058dda1461189269a2e34
```

#### Menambahkan Volume yang sudah ada
Untuk menambahkan volume yang sudah ada tanpa membuat volume baru, bisa kamu gunakan docker-compose berikut :
```
version: '3'
services:
  appvolume:
      image: php:7.2-apache
      container_name: appvolume
      volumes:
         - datapertama:/data
    
volumes:
   datapertama:
      external: true

```