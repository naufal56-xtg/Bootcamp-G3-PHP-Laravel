<?php
require_once('../controllers/controller.php');


$book = new Controllers();

$judul = $_GET['judul'];
if (isset($judul)) {
    $judul;
} else {
    $judul = 'Form Input';
}


$id_buku = $_GET['id_buku'];

$book->edit($id_buku);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>


    <div class="container mt-5">
        <h1><?= $judul; ?> Buku <?= $book->judul_buku; ?></h1>

        <div class="col-md-6 mt-3">

            <form action="index.php" method="post">
                <input type="hidden" name="id_update" value="<?= $book->id_buku; ?>">
                <div class="mb-3">
                    <label for="nama_buku">Nama Buku</label>
                    <input type="text" class="form-control" name="nama_buku" value="<?= $book->nama_buku; ?>">
                </div>
                <div class="mb-3">
                    <label for="judul">Judul Buku</label>
                    <input type="text" class="form-control" name="judul" value="<?= $book->judul_buku; ?>">
                </div>
                <div class="mb-3">
                    <label for="tema">Tema Buku</label>
                    <select name="tema" id="tema" class="form-control">
                        <option value="" hidden>- Silahkan Pilih Tema -</option>
                        <option value="Action" <?= ($book->tema_buku == 'Action') ? 'selected' : '' ?>>Action</option>
                        <option value="Fantasy" <?= ($book->tema_buku == 'Fantasy') ? 'selected' : '' ?>>Fantasy</option>
                        <option value="Sci-Fi" <?= ($book->tema_buku == 'Sci-Fi') ? 'selected' : '' ?>>Sci-Fi</option>
                        <option value="Romance" <?= ($book->tema_buku == 'Romance') ? 'selected' : '' ?>>Romance</option>
                        <option value="Drama" <?= ($book->tema_buku == 'Drama') ? 'selected' : '' ?>>Drama</option>
                        <option value="Thriler" <?= ($book->tema_buku == 'Thriler') ? 'selected' : '' ?>>Thriler</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email">Email Buku</label>
                    <input type="email" class="form-control" name="email" value="<?= $book->email_buku; ?>">
                </div>

                <?php if ($judul == 'Edit') { ?>
                    <button type="submit" class="btn btn-warning" name="update">Update</button>
                <?php } else { ?>
                    <button type="submit" class="btn btn-primary" name="submit">Kirim</button>
                <?php } ?>

            </form>

            <div class="mt-3">
                <a href="index.php" class="btn btn-primary">
                    <i class="fa fa-angle-left"></i>
                    Back
                </a>

            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>