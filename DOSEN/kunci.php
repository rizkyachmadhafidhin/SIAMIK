<?php
include "../koneksi.php";
session_start();
    $id = $_GET['param'];

    $sql = "UPDATE krs SET kunci = 1 WHERE id_krs = '$id'";
    
    $query = mysqli_query($conn,$sql);
    header('location:welcome_dosen.php');

?>