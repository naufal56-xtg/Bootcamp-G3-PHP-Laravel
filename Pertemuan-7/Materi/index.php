<?php
require_once('connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Get & Post</title>
</head>

<body>

    <form action="" method="post">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama">
        <label for="umur">Umur</label>
        <input type="text" name="umur" id="umur" placeholder="Masukkan Nama">
        <button type="submit" name="submit" style="display: inline-block;">Submit</button>
    </form>

    <?php

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $usia = $_POST['umur'];

        echo 'Nama : ' . $nama;
        echo '<br>';
        echo 'Usia : ' . $usia;
    }


    ?>

</body>

</html>