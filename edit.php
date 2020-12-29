<?php

// koneksi database & pilih database
$link = mysqli_connect('localhost', 'root', '', 'phpmovies');

// ambil id
$id = $_GET['id'];

// buat query
$query = "SELECT * FROM movies WHERE id = $id";

// jalankan query
$result = mysqli_query($link, $query);

// tampung data 
$movie = mysqli_fetch_assoc($result);

var_dump($movie);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data movie</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 3% 10%;
        }

        .input-group {
            margin: 10px 0;
        }

        .input-group label {
            display: block;
            font-size: 14px;
        }

        .btn-submit {
            margin: 10px 0;
            padding: 0.8rem 4rem;
        }
    </style>
</head>

<body>
    <h3>Formulir edit data movie</h3>

    <form action="" method="POST">

        <div class="input-group">
            <label for="title">Title</label>
            <input type="text" name="title" value="<?= $movie['title']; ?>" id="title" required autofocus>
        </div>

        <div class="input-group">
            <label for="year">Tahun</label>
            <input type="text" name="year" value id="year" required>
        </div>

        <div class="input-group">
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" required>
        </div>

        <div class="input-group">
            <label for="director">Director</label>
            <input type="text" name="director" id="director" required>
        </div>

        <div class="input-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="5" required></textarea>
        </div>

        <div class="input-group">
            <label for="release_date">Release Date</label>
            <input type="date" name="release_date" id="release_date" required>
        </div>

        <div class="input-group">
            <label for="cover">cover</label>
            <input type="text" name="cover" id="cover" required>
        </div>

        <button type="submit" class="btn-submit" name="submit">Submit</button>

    </form>
</body>

</html>