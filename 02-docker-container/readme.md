# Docker Container

Untuk menjalankan container, kita memerlukan image yang sudah terunduh di komputer. Apabila belum maka docker akan mengunduhnya terlebih dahulu sebelum menjalankannya secara langsung. Jadi sebenarnya jika kamu tidak melakukan pull image seperti yang ada di bagian [Docker Images](../01-docker-images/) tidak akan masalah.

## Menjalankan Container
```
docker run -p 8080:80 -d php:7.2-apache
```
**Keterangan**
- -p 80:80 : Maksudnya menjalankan forward untuk port 8080 komputer kita ke 80 container yang kita jalankan.
- -d : Maksudnya menjalankan proses kedalam backgorund, kamu bisa coba hilangkan bagian ini apabila ingin melihat prosesnya.

## Melihat Container yang berjalan
```
docker ps
```

Hasilnya akan seperti berikut
```
$ docker ps
CONTAINER ID   IMAGE            COMMAND                  CREATED         STATUS         PORTS                  NAMES
4e25db611bf6   php:7.2-apache   "docker-php-entrypoi…"   7 seconds ago   Up 5 seconds   0.0.0.0:8080->80/tcp   magical_wu
```

Setelah muncul seperti diatas, silahkan check menggunakan browser pada komputer anda dengan menekan **http://localhost:8080** atau **http://127.0.0.1:8080** Maka akan muncul status webserver meskipun forbidden.

## Masuk kedalam console container
Kamu bisa menggunakan format berikut ***docker exec -it container-id bash*** atau ***docker exec -it container-names bash*** akan tetapi perlu diperhatikan bahwa tidak semua image container ini memiliki console sehingga kalian bisa check sendiri apabila muncul error.

```
docker exec -it 4e25db611bf6 bash
```

## Mematikan Container
Kamu bisa menggunakan format berikut ***docker stop container-id*** atau ***docker stop container-names***
```
docker stop 4e25db611bf6
```

## Melihat Semua Container yang hidup dan mati
```
docker ps -a
```

Hasilnya akan menjadi seperti berikut
```
$ docker ps -a
CONTAINER ID   IMAGE            COMMAND                  CREATED         STATUS                      PORTS     NAMES
4e25db611bf6   php:7.2-apache   "docker-php-entrypoi…"   8 minutes ago   Exited (0) 43 seconds ago             magical_wu
```

## Menghapus Container
Kontainer yang di matikan hanya akan mati dan tidak akan terhapus, untuk menghapusnya kamu bisa gunakan perintah berikut ***docker rm container-id***.

```
docker rm 4e25db611bf6
```