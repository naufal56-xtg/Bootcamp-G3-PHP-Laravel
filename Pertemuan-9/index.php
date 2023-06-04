<?php

require_once('./db.php');

function getData()
{
    global $con, $getQuery;
    $getQuery = mysqli_query($con, "SELECT * FROM books");
}

getData();


if (isset($_POST['submit'])) {
    $nama_buku = $_POST['nama_buku'];
    $judul = $_POST['judul'];
    $tema = $_POST['tema'];
    $email = $_POST['email'];

    $queryInsert = mysqli_query($con, "INSERT INTO books (nama_buku, judul, tema, email) VALUES ('$nama_buku', '$judul', '$tema', '$email')");

    if ($queryInsert) {
        getData();
    } else {
        echo "Error" . mysqli_error($con);
    }
}

if (isset($_POST['update'])) {
    $id_update = $_POST['id_update'];
    $nama_buku = $_POST['nama_buku'];
    $judul = $_POST['judul'];
    $tema = $_POST['tema'];
    $email = $_POST['email'];

    $queryUpdate = mysqli_query($con, "UPDATE books SET nama_buku='$nama_buku', judul='$judul', tema='$tema', email='$email' WHERE id_buku='$id_update'");

    if ($queryUpdate) {
        getData();
    } else {
        echo "Error" . mysqli_error($con);
    }
}


if (isset($_POST['delete'])) {
    $id_buku = $_POST['id_buku'];

    $queryDelete = mysqli_query($con, "DELETE FROM books WHERE id_buku='$id_buku'");

    if ($queryDelete) {
        getData();
    } else {
        echo "Error" . mysqli_error($con);
    }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 9</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body data-bs-theme="dark">

    <nav class="navbar navbar-expand-lg bg-body-tertiary py-3">
        <div class="container">
            <a class="navbar-brand" href="#">Library Books</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <content>
        <div class="container mt-5">
            <h1>
                Selamat Datang Di Library Buku
            </h1>

            <br>

            <a href="form.php" class="btn btn-primary">
                <i class="fa fa-add"></i>
                Tambah Buku
            </a>

            <table class="table table-dark mt-3 table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Judul</th>
                        <th>Tema</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $index = 1; ?>
                    <?php while ($buku = mysqli_fetch_assoc($getQuery)) { ?>
                        <tr>
                            <td><?= $index++; ?></td>
                            <td><?= $buku['nama_buku']; ?></td>
                            <td><?= $buku['judul']; ?></td>
                            <td><?= $buku['tema']; ?></td>
                            <td><?= $buku['email']; ?></td>
                            <td>
                                <a href="form.php?judul=Edit&id_buku=<?= $buku['id_buku']; ?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form method="post" class="d-inline-block">
                                    <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">
                                    <button class="btn btn-danger btn-sm" name="delete">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </content>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>