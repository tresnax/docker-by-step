# Docker Compose

Docker compose merupakan sebuah tools yang berfungsi untuk memungkinakn docker memanage lebih dari satu container dalam satu waktu, dengan dockerfile kamu dapat mendefinisikan container, image, volume hanya dalam satu buah configuration file dengan format file YAML atau biasanya di definisikan dengan nama file **docker-compose.yaml**

## Install Docker Compose
Docker compose biasanya tidak termasuk kedalam paket installasi bundle pada saat installasi awal docker, maka kita perlu menginstallnya terlebih dahulu. Kecuali docker for windows

```
sudo apt-get install -y docker-compose
```

## Membuat Docker Compose
Pertama kita buat sebuah file dengan nama **docker-compose.yaml** setelah itu kita isikan konfigurasinya seperti berikut :
```
version: '3.9'
services:
   web:
     image: webserver:1.0-tresnax
     container_name : webserver
     ports:
       - "8080:80"
```

Setelah itu simpan file konfigurasi tersebut, disini kita akan menjalankan satu container yang berisikan webserver yang sudah kita buat sebelumnya.

## Jalankan Docker Compose
Pastikan kamu berada pada direktori tempat menyimpan file **docker-compose.yaml** tersebut, lalu berikan perintah :
```
docker-compose up -d
```

Hasilnya akan seperti berikut ini :
```
$ docker-compose up -d 
[+] Building 0.0s (0/0)                                                                     docker:desktop-linux
[+] Running 1/1
 ✔ Container webserver  Started 
```

Kamu dapat melihat container yang berjalan menggunakan perintah **docker-compose ps** atau menggunakan perintah biasa yaitu **docker ps**.

```
$ sudo docker-compose ps
NAME        IMAGE                   COMMAND                  SERVICE   CREATED          STATUS          PORTS
webserver   webserver:1.0-tresnax   "/bin/sh -c 'apachec…"   web       44 seconds ago   Up 43 seconds   0.0.0.0:8080->80/tcp
```

## Mematikan Docker Compose
Pastikan kamu berada pada direktori tempat menyimpan file **docker-compose.yaml** tersebut, lalu berikan perintah :
```
docker-compose down
```

Hasilnya akan seperti berikut ini :
```
$ docker-compose down
[+] Running 2/1
 ✔ Container webserver        Removed                                                                      10.2s 
 ✔ Network 01-case-1_default  Removed
```

Dengan ini docker akan menghapus container yang berjalan, sehingga ketika kamu mengecek menggunakan perintah **docker ps -a** tidak akan ada history container yang berjalan.


## Studie Case Lainnya
- Menjalankan dua container apps [link](/01-case-1)
- Deployment apps ke web directory [link](/01-case-2)
- Deploy apps dan database [link](/01-case-3)