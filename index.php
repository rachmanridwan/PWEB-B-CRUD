<?php

session_start();

// if(!isset($_SESSION["login"])){
//     header("Location: login.php");
//     exit;
// }
require 'function.php';



// get data from databases
$animes = query("SELECT * FROM anime");

if(isset($_POST["find"])){
    $keyword = $_POST["keyword"];
    $animes = search($keyword);
}
// debug results
// var_dump($result);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <h1 class="mx-4">Anime List</h1>

    <form action="" method="post">
        <div class="mx-3 row g-3 align-items-center">
            <div class="col-auto">
                <label for="search" class="col-form-label">search</label>
            </div>
            <div class="col-auto">
                <input type="text" name="keyword" id="search" class="form-control" placeholder="find anime title">
            </div>
            <div class="col-auto">
                <button type="submit" name="find" class="btn btn-primary">find</button>
            </div>
        </div>
    </form>


    <a class="btn btn-primary m-4" href="tambah.php" role="button">Add to List</a>
    <a class="btn btn-primary m-4" href="Logout.php" role="button">Logout</a>
    <table class="mx-4" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td>No.</td>
            <td>Action</td>
            <td>Image</td>
            <td>Title</td>
            <td>Studio</td>
            <td>Genre</td>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($animes as $row) : ?>
        <tr>
            <td>
                <?= $i ?>
            </td>
            <td>
                <a href="update.php?id=<?=$row["id"];?>">edit</a> |
                <a href="delete.php?id=<?=$row["id"];?>" onclick="return confirm('yang bener ?');">delete</a>
            </td>
            <td>

                <img src="img/<?= $row["image"] ?>" alt="" width="100">
            </td>
            <td><?= $row["Title"]?></td>
            <td><?= $row["Studio"]?></td>
            <td><?= $row["Genre"]?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach ?>
    </table>


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