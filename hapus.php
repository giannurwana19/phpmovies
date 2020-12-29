<?php

// koneksi database & pilih database
$link = mysqli_connect('localhost', 'root', '', 'phpmovies');

// ambil id 
$id = $_GET['id'];

if(!isset($id)){
    header('Location: index.php');
    exit;
}

$query = "DELETE FROM movies WHERE id = '$id'";

mysqli_query($link, $query) or die(mysqli_error($link));

if(mysqli_affected_rows($link)){
    echo "<script>alert('data berhasil dihapus!'); document.location.href = 'index.php'</script>";
}


