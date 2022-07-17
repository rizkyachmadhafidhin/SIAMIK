<?php

include "koneksi.php";
session_start();

$param = $_GET['param'];
// echo $param;
$npm=$_SESSION['npm'];
// echo "<script>alert('$param')</script>";
// echo "<script>alert('$npm')</script>";

$sqlmatkul = "SELECT * FROM mata_kuliah WHERE kode_mk='$param'";
$resultmatkul = $conn->query($sqlmatkul);

if ($resultmatkul->num_rows > 0) {
    while($row = $resultmatkul->fetch_assoc()){
        $namamk = $row['nama_mk'];
        $sksmk = $row['sks'];
        $kelasmk = $row['kelas'];
        $kategorimk = $row['kategori'];
    }
}

$sqlidkrs = "SELECT id_krs FROM krs";

$sqlkrs = "SELECT * FROM krs WHERE npm='$npm' and kode_mk='$param'";
$resultkrs = $conn->query($sqlkrs);

if ($resultkrs->num_rows > 0) {
    while($row = $resultkrs->fetch_assoc()){
        echo "<script>alert('Data Sudah Ada');</script>";
    }
}
else{
    $sqlidkrs = "SELECT SUBSTRING(id_krs,13,3) AS nokrs FROM krs";
    $resultidkrs = $conn->query($sqlidkrs);

    if ($resultidkrs->num_rows > 0) {
        while($row = $resultidkrs->fetch_assoc()){
            echo $row['nokrs'];
            $idkrstemp = $row['nokrs'];
            $idkrstemp = (int)$idkrstemp;
            $idkrstemp++;
            $idkrstemp2 = str_pad($idkrstemp,3,"0",STR_PAD_LEFT);
            $idkrs = $npm.'4'.$idkrstemp2;
            echo $idkrs;
        }
}
        
    $sqlinput = "INSERT INTO krs (id_krs, kode_mk, nama_mk, npm, sks, kelas, semester, kategori) VALUES ('$idkrs', '$param', '$namamk', '$npm', '$sksmk', '$kelasmk', 4, '$kategorimk')";
    $inputdb = mysqli_query($conn,$sqlinput);
    echo "<script>alert('Data Berhasil Ditambahkan');</script>";
    
}
echo "<script>window.location.href='tambah_krs.php'</script>";
?>