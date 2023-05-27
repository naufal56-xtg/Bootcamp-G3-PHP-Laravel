<?php

//TODO Array

//! Array 

// $datas = ['Merah', 'Biru', 'Hijau', 'Ungu'];

// //? Perulangan Array
// foreach ($datas as $key => $data) {
//     echo $key = $key + 1 . ' ' . $data;
//     echo '<br>';
// }


//! Array Multi Dimensi

// $datas = [
//     ['Naufal', '11B', '12182376', 'L'],
//     ['Siti', '12B', '12182992', 'P'],
//     ['Mamat', '11B', '12183312', 'L'],
// ];


// foreach ($datas as $key => $data) {
//     echo 'Nama : ' . $data[0];
//     echo '<br>';
//     echo 'Kelas : ' . $data[1];
//     echo '<br>';
//     echo 'Nim : ' . $data[2];
//     echo '<br>';
//     echo 'Jenis Kelamin : ' . $data[3];
//     echo '<br>';
//     echo '<br>';
// }

//! Array Associative

// $datas = [
//     'nama' => 'Naufal Hadi Putra',
//     'umur' => 25,
//     'jk' => 'L',
// ];
// unset($datas['jk']);

// echo $datas['nama'];
// echo '<br>';
// echo $datas['umur'];
// echo '<br>';
// echo $datas['jk'];

$datas = [
    [
        'nama' => 'Naufal Hadi Putra',
        'umur' => 25,
        'hoby' => 'Nonton',
        'jk' => 'L',
    ],
    [
        'nama' => 'Ahmad',
        'umur' => 20,
        'hoby' => 'Main Bola',
        'jk' => 'L',
    ],
    [
        'nama' => 'Santi',
        'umur' => 30,
        'hoby' => 'Masak',
        'jk' => 'P',
    ],
    [
        'nama' => 'Sarah',
        'umur' => 23,
        'hoby' => 'Nonton',
        'jk' => 'P',
    ],
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Array</title>
</head>

<body>

    <table border="1" cellspacing='0' cellpadding="10">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Hoby</th>
            <th>JK</th>
        </thead>
        <tbody>
            <?php foreach ($datas as $key => $data) { ?>
                <tr>
                    <td><?= $key = $key + 1; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['umur']; ?></td>
                    <td><?= $data['hoby']; ?></td>
                    <td><?= $data['jk']; ?></td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>

</body>

</html>