<?php

class Database

{
    private $host = "localhost";
    private $user = "root";
    private $pass = "021admin56";
    private $db = "latihan_9_db";

    protected function connect()
    {

        return mysqli_connect($this->host, $this->user, $this->pass, $this->db);
    }
}

// if (!$con) {
//     global $con;
//     echo "Error" . mysqli_error($con);
// } else {
//     echo "Berhasil";
// }
