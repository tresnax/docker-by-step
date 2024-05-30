# Docker

Docker merupakan salah satu service container yang cukup terkenal dan banyak digunakan saat ini, kamu bisa coba melakukan installasinya terlebih dahulu sebelum menjalankan service lainnya. Untuk panduan installasi ubuntu bisa gunakan panduan berikut.

## Konsep Docker
...


## Install Docker


**Install Docker Service**
```
# Add Docker's official GPG key:
sudo apt-get update
sudo apt-get install ca-certificates curl gnupg
sudo install -m 0755 -d /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg
sudo chmod a+r /etc/apt/keyrings/docker.gpg

# Add the repository to Apt sources:
echo "deb [arch="$(dpkg --print-architecture)" signed-by=/etc/apt/keyrings/docker.gpg] \ 
   https://download.docker.com/linux/ubuntu \
  "$(. /etc/os-release && echo "$VERSION_CODENAME")" stable" | \
  sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
sudo apt-get update

sudo apt-get -y install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
```

**Menjalankan docker tanpa sudo**
```
sudo usermod -aG docker $USER
```

**Melihat Versi**
```
docker --version
```

## Reference
- [Docker Documentation](https://docs.docker.com)
- [Abhisek's blog](https://abhisek6.hashnode.dev/docker-for-devops-engineers)
- [Linux ID](https://www.linuxid.net/31073/cara-membuat-docker-images-dengan-dockerfile/)