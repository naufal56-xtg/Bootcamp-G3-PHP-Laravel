<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = "latihan_pertemuan8";

$connect = mysqli_connect($host, $user, $pass, $db);


$query = mysqli_query($connect, "SELECT * FROM users WHERE id='2'");

while ($user = mysqli_fetch_assoc($query)) {
    $id = $user['id'];
    $nama = $user['nama'];
}

function getBook()
{
    global $connect, $data, $id;
    $data = mysqli_query($connect, "SELECT * FROM books JOIN users ON users.id = books.user_id");
    // $data = mysqli_query($connect, "SELECT * FROM books JOIN users ON users.id = books.user_id WHERE user_id='$id'");
}

getBook();

if (isset($_POST['submit'])) {

    $judul = $_POST['judul'];
    $tema = $_POST['tema'];

    $insert = mysqli_query($connect, "INSERT INTO books (judul, tema, user_id) VALUES ('$judul', '$tema', '$id')");

    if ($insert) {
        getBook();
    } else {
        echo 'Error : ' . mysqli_error($connect);
    }
}

if (isset($_POST['delete'])) {
    $id_buku = $_POST['id_buku'];
    $delete = mysqli_query($connect, "DELETE FROM books WHERE id_buku='$id_buku'");

    if ($delete) {
        getBook();
    } else {
        echo 'Error : ' . mysqli_error($connect);
    }
}





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Penulis <?= $nama; ?></h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#add">
            <i class="fa-solid fa-book"></i>
            Tambah Buku
        </button>


        <table class="table mt-3 table-bordered" id="example" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Judul</th>
                    <th scope="col" class="text-center">Tema</th>
                    <th scope="col" class="text-center">Penulis</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 1; ?>
                <?php while ($book = mysqli_fetch_assoc($data)) { ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $index++; ?></th>
                        <td><?= $book['judul']; ?></td>
                        <td><?= $book['tema']; ?></td>
                        <td><?= $book['nama']; ?></td>
                        <td class="text-center">
                            <a href="#" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $index; ?>"><i class="fa-solid fa-pencil"></i></a>

                            <form method="post" class="d-inline-block">
                                <input type="hidden" name="id_buku" value="<?= $book['id_buku']; ?>">
                                <button class="btn btn-danger" name="delete"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="edit<?= $index; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Buku</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                        <input type="hidden" name="id_buku" value="<?= $book['id_buku']; ?>">
                                        <div class="mb-3">
                                            <label for="update_judul" class="form-label">Judul</label>
                                            <input type="text" class="form-control" id="update_judul" name="update_judul" value="<?= $book['judul']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="update_tema" class="form-label">Tema</label>
                                            <input type="text" class="form-control" id="update_tema" name="update_tema" value="<?= $book['tema']; ?>">
                                        </div>

                                        <button type="submit" name="edit" class="btn btn-warning">Update</button>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>




                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php

    if (isset($_POST['edit'])) {
        $edit_id = $_POST['id_buku'];
        $uj = $_POST['update_judul'];
        $ut = $_POST['update_tema'];

        $updateBook = mysqli_query($connect, "UPDATE books SET judul='$uj', tema='$ut' WHERE id_buku='$edit_id'");

        if ($updateBook) {
            getBook();
            header('Location: index.php');
        } else {
            echo 'Error : ' . mysqli_error($connect);
        }
    }


    ?>

    <!-- Modal -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Buku</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="post">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul">
                        </div>
                        <div class="mb-3">
                            <label for="tema" class="form-label">Tema</label>
                            <input type="text" class="form-control" id="tema" name="tema">
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>







    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>