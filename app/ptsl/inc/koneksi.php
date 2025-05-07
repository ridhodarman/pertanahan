<?php 

try {
	//$koneksi = mysqli_connect("localhost","root","","pertek");

	define('HOST','localhost');
	define('USER','root');
	define('PASS','');
	define('DB1', 'pertek');
	 
	// Buat Koneksinya
	$koneksi = new mysqli(HOST, USER, PASS, DB1);
}

catch (exception $e) {
	// Cek koneksi
	if (mysqli_connect_errno()){
	echo "Koneksi database gagal, kendalanyo:<br/>" . mysqli_connect_error();
	}
}
 
?>