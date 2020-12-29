<?php

// koneksi database & pilih database
$link = mysqli_connect('localhost', 'root', '', 'phpmovies');

// ambil id, bisa pake $_GET atau $_REQUEST
$id = $_GET['id'];
// var_dump($id);

// query data: menampilkan data berdasarkan id
$result = mysqli_query($link, "SELECT * FROM movies WHERE id = '$id'");

$movie = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Movie</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 3% 10%;
        }
    </style>
</head>

<body>
    <h1>Detail Movie</h1>
    <div class="card-image">
        <img src="img/<?= $movie['cover']; ?>" alt="<?= $movie['title']; ?>">
    </div>
    <h3><?= $movie['title']; ?> (<em><?= $movie['year']; ?>)</h3>
    <em><?= $movie['genre']; ?></em> | <em><?= $movie['release_date']; ?></em>
    <p><?= $movie['description']; ?></p>
    <ul>
        <li>Director : <?= $movie['director']; ?></li>
    </ul>

    <a href="">Edit</a> |
    <a href="hapus.php?id=<?= $movie['id']; ?>">Hapus</a> |
    <a href="index.php">Home</a>
</body>

</html>