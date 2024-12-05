# Studie Case - Proxy URL phpMyAdmin with Nginx

Pada kasus non docker phpmyadmin biasanya di install pada host yang sama dengan webserver, sehingga untuk dapat mengakses phpmyadmin kita hanya perlu mengakses localhost/phpmyadmin. Tetapi pada kasus docker tidak bisa seperti itu karena phpmyadmin dan webserver berjalan pada container yang berbeda, sehingga pemanggilan phpmyadmin harus dilakukan dengan port mapping seperti localhost:8080.

Pada kasus ini kita akan membuat phpmyadmin dapat diakses melalui webserver dengan menggunakan proxy, sehingga kita tidak perlu melakukan mapping port pada container phpmyadmin.

```
+---------+
|  Client |
+---------+
     |
     |  (localhost/phpmyadmin)
     |
+-----------------+
|   Webserver     |
|    Container    |
+-----------------+
     |
     | (proxy to phpmyadmin)
     |
+-----------------+
|  phpMyAdmin     |
|   Container     |
+-----------------+

```

More detail in english : https://tresnax.com/blog/proxy-phpmyadmin-docker/