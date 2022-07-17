<?php  
session_start();
include "koneksi.php";

$user = $_SESSION['user'];
$sql = "SELECT * FROM mahasiswa WHERE npm='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	$_SESSION['npm']=$row["npm"];
    	$_SESSION['nama']=$row["nama"];
    	$_SESSION['alamat']=$row["alamat"];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIAMIK</title>
</head>
<body>
	<h1>SISTEM INFORMASI AKADEMIK</h1>
	<h1>SIAMIK</h1>

	<p>Nama</p>
	<?php echo $_SESSION['nama'];?><br>
	<p>NPM</p>
	<?php echo $_SESSION['npm'];?>
	<p>Alamat</p>
	<?php echo $_SESSION['alamat'];?>

	<ul>
        <li><a href="welcome.php">Beranda</a></li>
        <li><a href="#">Bukti Registrasi</a></li>
        <li><a href="menu_krs.php">Kartu Rencana Studi (KRS)</a></li>
        <li><a href="#">KHS</a></li>
        <li><a href="#">Transkrip</a></li>
        <li><a href="#">Presensi Kuliah</a></li>
        <li><a href="logout.php">Keluar</a></li>
    </ul>

</body>
</html>