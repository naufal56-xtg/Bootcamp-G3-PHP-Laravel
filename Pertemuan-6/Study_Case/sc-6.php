<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menghitung Nilai Faktorial</title>

    <style>
        .container-img {
            display: flex;
            justify-content: center;
            margin-bottom: 5%;
        }

        .form-bil {
            display: flex;
            justify-content: center;
        }

        .form-bil input {
            width: 25vh;
            height: 5vh;
            margin-right: 1%;
            border-radius: 5px;
        }

        .form-bil input::placeholder {
            padding-left: 2%;
        }

        .form-bil button {
            display: inline-block;
            width: 10vh;
            background-color: lightblue;
            color: black;
            border-radius: 5px;
        }

        p {
            display: flex;
            justify-content: center;
            font-size: 28px;
        }

        .p-bil {
            font-size: 24px;
        }
    </style>

</head>

<body>

    <div class="container-img">
        <img src="assets/nf.jpg" alt="">
    </div>


    <p class="p-bil">Masukkan Bilangan Bulat : </p>


    <form action="" method="POST" class="form-bil">
        <input type="number" name="angka" id="" placeholder="Silahkan Masukkan Bilangan Bulat">
        <button type="submit" name="proses">Proses</button>
    </form>

    <?php

    function faktorial($nilai)
    {
        $number = 1;
        $faktorial = 1;

        while ($number <= $nilai) {
            $faktorial = $faktorial * $number;
            $number++;
        }

        return $faktorial;
    }



    if (isset($_POST['proses'])) {
        $n = $_POST['angka'];

        echo '<p>Nilai Faktorial Bilangan !' . $n . ' = ' . faktorial($n) . '</p>';
    }


    ?>
</body>

</html>