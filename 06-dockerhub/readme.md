# Dockerhub

Pada pembahasan awal docker image kita sempat membahas mengenai dockerhub, intinya dockerhub ini berfungsi sebagai tempat berkumpulnya docker image dari berbagai orang yang di publish secara public. Selain itu kita dapat mempublish docker image yang kita miliki secara private sehingga hanya kita saja yang dapat mengakses atau mengunduhnya.

Pada bagian ini kita akan membahas bagaimana cara kita mempublish docker image yang sudah kita buat pada pembahasan dockerfile ke dockerhub.

## Register Dockerhub
Pertama, silahkan kamu registrasi akun terlebih dahulu ke dockerhub sesuai dengan intruksi yang ada didalamnya. Gunakan packet yang free untuk akun yang kamu buat. [https://hub.docker.com](https://hub.docker.com)


## Login Dockerhub di Host
Selanjutnya login kedalam dockerhub melalui komputer host yang akan kita gunakan untuk mempublish docker image yang kita buat sebelumnya.
```
docker login
```

## Publish Image Docker
Pertama kita berikan tag terlebih dahulu pada image yang akan kita publish dengan format sebagai berikut ***docker image tag docker-image username-hub/docker-image*** seperti berikut :
```
docker image tag webserver:1.0-tresnax tresnax/webserver:1.0-tresnax
```

Selanjutnya kita push menggunakan perintah berikut :
```
docker push tresnax/webserver:1.0-tresnax
```

Tunggu hingga proses publish selesai dilakukan
```
$ docker push tresnax/webserver:1.0-tresnax
The push refers to repository [docker.io/tresnax/webserver]
9509f4ba14b3: Pushed 
db1224dea1a5: Pushed 
17bcd696f852: Pushed 
69d986143884: Pushed 
548a79621a42: Mounted from library/ubuntu 
1.0-tresnax: digest: sha256:2ccfc86c257ad773f51503e58be761d143921955eb1a8ad27f8814097dd80320 size: 1362
```

Check pada halaman repository docker hub yang kamu miliki, dan lihat apakah kamu sudah berhasil melakukan publish pada image yang sudah kamu buat atau belum [Your Repositories](https://hub.docker.com/repositories/).