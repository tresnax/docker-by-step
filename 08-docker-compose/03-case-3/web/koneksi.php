<?php

//Variabel database
    $servername = "data_sensor";
    $username = "root";
    $password = "c0c0d0tb4u";
    $dbname = "db_warriornux";

	$koneksi = mysqli_connect($servername, $username, $password, $dbname); // menggunakan mysqli_connect

	if(mysqli_connect_errno()){ // mengecek apakah koneksi database error
		echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error(); // pesan ketika koneksi database error
	}
?>

