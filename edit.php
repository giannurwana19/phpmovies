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

if (isset($_POST['submit'])) {
    // ambil semua data form
    // htmlspecialchars(): memfilter jika ada tag html

    $id = htmlspecialchars($_POST['id']);
    $title = htmlspecialchars($_POST['title']);
    $slug = strtolower(str_replace(' ', '-', $title));
    $year = htmlspecialchars($_POST['year']);
    $genre = htmlspecialchars($_POST['genre']);
    $director = htmlspecialchars($_POST['director']);
    $description = htmlspecialchars($_POST['description']);
    $release_date = htmlspecialchars($_POST['release_date']);
    $cover = htmlspecialchars($_POST['cover']);

    $query = "UPDATE movies 
    SET
        title = '$title',
        slug = '$slug',
        year = '$year',
        genre = '$genre',
        director = '$director',
        description = '$description',
        release_date = '$release_date',
        cover = '$cover'
    WHERE id = $id";

    // jalankan query, jika error, proses nya akan berhenti dan ditampilkan pesan
    mysqli_query($link, $query) or die(mysqli_error($link));

    // cek apakah ada baris data yang berpengaruh
    if (mysqli_affected_rows($link)) {
        echo "<script>alert('data movie berhasil diupdate!'); document.location.href = 'index.php'</script>";
    }
}


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
        <input type="hidden" name="id" value="<?= $movie['id']; ?>">

        <div class="input-group">
            <label for="title">Title</label>
            <input type="text" name="title" value="<?= $movie['title']; ?>" id="title" required autofocus>
        </div>

        <div class="input-group">
            <label for="year">Tahun</label>
            <input type="text" name="year" value="<?= $movie['year']; ?>" id="year" required>
        </div>

        <div class="input-group">
            <label for="genre">Genre</label>
            <input type="text" name="genre" value="<?= $movie['genre']; ?>" id="genre" required>
        </div>

        <div class="input-group">
            <label for="director">Director</label>
            <input type="text" name="director" value="<?= $movie['director']; ?>" id="director" required>
        </div>

        <div class="input-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="5" required><?= $movie['description']; ?></textarea>
        </div>

        <div class="input-group">
            <label for="release_date">Release Date</label>
            <input type="date" name="release_date" value="<?= $movie['release_date']; ?>" id="release_date" required>
        </div>

        <div class="input-group">
            <label for="cover">cover</label>
            <input type="text" name="cover" value="<?= $movie['cover']; ?>" id="cover" required>
        </div>

        <button type="submit" class="btn-submit" name="submit">Submit</button>

    </form>
</body>

</html>