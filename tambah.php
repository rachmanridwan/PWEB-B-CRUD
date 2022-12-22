<?php
session_start();

// if(!isset($_SESSION["login"])){
//     header("Location: login.php");
//     exit;
// }
require 'function.php';


if(isset($_POST['submit'])){
    if(tambah($_POST) > 0){
        echo "<script>
            alert('Data Berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal ditambahkan!');
            document.location.href = 'index.php';
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <h1 class="mt-3 ml-3">Add Anime to The List</h1>
    <form class="mx-auto mt-5" style="width: 400px;" action="" method="post" enctype="multipart/form-data">

        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="title" required>
        <label for="studio" class="form-label">Studio</label>
        <input type="text" name="studio" class="form-control" id="studio" required>
        <label for="genre" class="form-label">Genre</label>
        <input type="text" name="genre" class="form-control" id="genre" required>
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="image" required>

        <button type="submit" name="submit" class="btn btn-primary mt-3">Add</button>
    </form>

    <a class="btn btn-primary m-4" href="index.php" role="button">Back to List</a>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>