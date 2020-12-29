<?php

// koneksi database & pilih database
$link = mysqli_connect('localhost', 'root', '', 'phpmovies');

// cek jika tombol submit sudah ditekan
if (isset($_POST['submit'])) {
    // ambil semua data form
    // htmlspecialchars(): memfilter jika ada tag html

    $title = htmlspecialchars($_POST['title']);
    $slug = strtolower(str_replace(' ', '-', $title));
    $year = htmlspecialchars($_POST['year']);
    $genre = htmlspecialchars($_POST['genre']);
    $director = htmlspecialchars($_POST['director']);
    $description = htmlspecialchars($_POST['description']);
    $release_date = htmlspecialchars($_POST['release_date']);
    $cover = htmlspecialchars($_POST['cover']);

    $query = "INSERT INTO movies
        (title, slug, year, genre, director, description, release_date, cover)
        VALUES ('$title', '$slug', '$year', '$genre', '$director', '$description', '$release_date', '$cover')
    ";

    // jalankan query, jika error, proses nya akan berhenti dan ditampilkan pesan
    mysqli_query($link, $query) or die(mysqli_error($link));

    // cek apakah ada baris data yang berpengaruh
    if(mysqli_affected_rows($link)){
        echo "<script>alert('data movie berhasil ditambahkan!'); document.location.href = 'index.php'</script>";
    }else{
        echo "<script>alert('data movie gagal ditambahkan!'); document.location.href = 'tambah.php'</script>";
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data movie</title>
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
    <h3>Formulir tambah data movie</h3>

    <form action="" method="POST">

        <div class="input-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required autofocus>
        </div>

        <div class="input-group">
            <label for="year">Tahun</label>
            <input type="text" name="year" id="year" required>
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