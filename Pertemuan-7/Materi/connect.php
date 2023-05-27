<?php


$host = 'localhost';
$user = "root";
$password = "021admin56";
$db = 'latihan_php_database';

$con = mysqli_connect($host, $user, $password, $db);

if (!$con) {
    global $con;
    echo 'Error : ' . mysqli_error($con);
}

function get()
{
    global $con, $result;
    $query = "SELECT * FROM users";
    $result = mysqli_query($con, $query);
}

get();

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $hobi = $_POST['hobi'];
    $umur = $_POST['umur'];

    $insert = "INSERT INTO users (nama, hobi, umur) VALUES ('$nama', '$hobi', '$umur')";
    $result2 = mysqli_query($con, $insert);

    if ($result2) {
        echo 'Berhasil';
        get();
    } else {
        echo 'Error : ' . mysqli_error($con);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan MySqli</title>
</head>

<body>

    <form action="" method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td>
                    <input type="text" name="nama" id="" placeholder="Masukkan Nama">
                </td>
            </tr>
            <tr>
                <td>Hobi</td>
                <td>
                    <input type="text" name="hobi" id="" placeholder="Masukkan Hobi">
                </td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>
                    <input type="text" name="umur" id="" placeholder="Masukkan Umur">
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Submit</button></td>
            </tr>
        </table>
    </form>

    <br>

    <h2>Data User</h2>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Hobi</th>
            <th>Umur</th>
        </thead>
        <tbody>
            <?php $index = 1; ?>
            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $index++; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['hobi']; ?></td>
                    <td><?= $data['umur']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>