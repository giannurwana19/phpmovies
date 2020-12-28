<?php

// koneksi database & pilih database
$link = mysqli_connect('localhost', 'root', '', 'phpmovies');

// query data: menampilkan semua data dari table movies (lakukan vardump)
$result = mysqli_query($link, "SELECT * FROM movies");

// mengambil dan mengubah respon data menjadi array assosiatif (lakukan vardump)
// yang diambil hanya 1 data, maka dari itu kita looping sampai data pada baris nya habis
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// atau bisa juga pake fetch all jika tidak ingin looping
// $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

// tampung data array
$movies = $data;

// var_dump($movies);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Movies</title>

    <!-- style css -->
    <style>
        body {
            font-family: sans-serif;
            margin: 3% 10%;

        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        table img {
            width: 100px;
        }
    </style>
</head>

<body>
    <h1>Daftar Movies</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Movie</th>
                <th>Genre</th>
                <th>Tahun</th>
                <th>Gambar</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($movies as $movie) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $movie['title']; ?></td>
                    <td><?= $movie['genre']; ?></td>
                    <td><?= $movie['year']; ?></td>
                    <td>
                        <img src="img/<?= $movie['cover'] ?>" alt="gambar">
                    </td>
                    <td>
                        <a href="detail.php?id=<?= $movie['id'] ?>">lihat detail</a>
                    </td>
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>