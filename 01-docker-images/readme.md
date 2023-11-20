# Docker Image

Untuk mengunduh image docker, kamu perlu tahu terlebih dahulu image apa yang akan kamu unduh, untuk dapat mengetahuinya kamu dapat mengunduhnya di [Dockerhub](https://hub.docker.com/search?q=). Tapi disini kita akan menggunakan contoh image php:7.2-apache.

## Mengunduh Image
```
docker pull php:7.2-apache
```

Sistem akan mengunduh image seperti berikut
```
$ docker pull php:7.2-apache
7.2-apache: Pulling from library/php
6ec7b7d162b2: Pull complete 
db606474d60c: Pull complete 
afb30f0cd8e0: Pull complete 
3bb2e8051594: Pull complete 
4c761b44e2cc: Pull complete 
c2199db96575: Pull complete 
1b9a9381eea8: Pull complete 
fd07bbc59d34: Pull complete 
72b73ab27698: Pull complete 
983308f4f0d6: Pull complete 
6c13f026e6da: Pull complete 
e5e6cd163689: Pull complete 
5c5516e56582: Pull complete 
154729f6ba86: Pull complete 
Digest: sha256:4dc0f0115acf8c2f0df69295ae822e49f5ad5fe849725847f15aa0e5802b55f8
Status: Downloaded newer image for php:7.2-apache
docker.io/library/php:7.2-apache
```

## Melihat Image yang tersedia
```
docker images
```

Hasilnya akan seperti berikut
```
REPOSITORY   TAG          IMAGE ID       CREATED       SIZE
php          7.2-apache   c61d277263e1   2 years ago   410MB
```

## Menghapus Image
format untuk menghapus docker image adalah ***docker image rm image-id*** contohnya:
```
docker image rm c61d277263e1
```

## Penutup

Image ini akan kita gunakan pada percobaan selanjutnya, silahkan lanjut