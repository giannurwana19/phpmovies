<?php 

// koneksi database & pilih database
$link = mysqli_connect('localhost', 'root', '', 'phpmovies');

// query data: menampilkan semua data dari table movies
mysqli_query($link, "SELECT * FROM movies");

// mengubah respon data menjadi array

// tampung data array

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
            margin: 10%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
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
            <tr>
                <td>1</td>
                <td>Joker</td>
                <td>Crime, drama</td>
                <td>2019</td>
                <td>
                    <img src="img/joker.jpg" alt="gambar">
                </td>
                <td>
                    <a href="#">Edit</a> | 
                    <a href="#">Hapus</a>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>