<?php

// koneksi database & pilih database
$link = mysqli_connect('localhost', 'root', '', 'phpmovies');

// ambil id 
$id = $_GET['id'];

$query = "DELETE FROM movies WHERE id = '$id'";

mysqli_query($link, $query) or die(mysqli_error($link));

header('Location: index.php');


