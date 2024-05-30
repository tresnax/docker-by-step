# Perintah Docker lainnya

Melihat detail informasi dari image docker

```
docker inspect <image_id>
```

Melihat poer mapping dari container yang berjalan

```
docker port <container_id>
```

Melihat statistic dari container yang berjalan

```
docker stats <container_id>
```

Melihat task manger process pada container

```
docker top <container_id>
```

Menghapus selutuh container yang ada (container yang mati)
```
docker ps -a | awk '{print $1 }' | xargs -I {} docker rm {}
```