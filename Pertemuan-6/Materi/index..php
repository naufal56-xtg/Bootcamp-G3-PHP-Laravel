<?php

// $name = 'Sinta';

// $kondisi = 0;

// while ($kondisi <= 10) {
//     echo 'Ini ' . $kondisi;
//     echo '<br>';
//     $kondisi++;
// }

// echo '<br>';
// echo '<br>';
// echo '=================================';
// echo '<br>';
// echo '<br>';

// for ($i = 0; $i < 10; $i++) {
//     echo 'Ini Angka ' . $i;
//     echo '<br>';
// }
// if ($name == 'Naufal') {
//     echo 'Ini Naufal';
// } elseif ($name == 'Jajang') {
//     echo 'Ini Jajang';
// } else {
//     echo 'Tidak Ditemukan';
// }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP</title>
</head>

<body>
    <?php

    $name = 'Naufal';

    if ($name == 'Naufal') {
        echo '<p>Ini Naufal</p>';
    } elseif ($name == 'Anang') {
        echo '<p>Ini Anang</p>';
    } else {
        echo '<p>Tidak Ditemukan</p>';
    }

    ?>



    <ul style="list-style: none;">
        <?php for ($i = 0; $i < 10; $i++) { ?>
            <li>List Ke - <?= $i; ?></li>
        <?php } ?>
    </ul>
</body>

</html>