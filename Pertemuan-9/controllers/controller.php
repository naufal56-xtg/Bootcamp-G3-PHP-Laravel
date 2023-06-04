<?php
require_once "../models/database.php";

class Controllers extends Database
{
    public $nama_buku;
    public $id_buku;
    public $judul_buku;
    public $tema_buku;
    public $email_buku;


    public function view()
    {
        $getQuery = mysqli_query($this->connect(), "SELECT * FROM books");
        $rows = mysqli_fetch_all($getQuery, MYSQLI_ASSOC);
        if ($rows) {
            return $rows;
        } else {
            return "Error " . mysqli_error($this->connect());
        }
    }

    public function insert($nama_buku, $judul, $tema, $email)
    {
        var_dump($nama_buku, $judul, $tema, $email);
        $queryInsert = mysqli_query($this->connect(), "INSERT INTO books (nama_buku, judul, tema, email) VALUES ('$nama_buku', '$judul', '$tema', '$email')");

        if ($queryInsert) {
            return $queryInsert;
        } else {
            return "Error" . mysqli_error($this->connect());
        }
    }

    public function edit($id_buku)
    {
        $query = mysqli_query($this->connect(), "SELECT * FROM books WHERE id_buku='$id_buku'");
        while ($data = mysqli_fetch_assoc($query)) {
            $this->judul_buku = $data['judul'];
            $this->nama_buku = $data['nama_buku'];
            $this->tema_buku = $data['tema'];
            $this->email_buku = $data['email'];
            $this->id_buku = $data['id_buku'];
        }
    }

    public function update($id_buku, $nama_buku, $judul, $tema, $email)
    {

        $queryUpdate = mysqli_query($this->connect(), "UPDATE books SET 
        nama_buku='$nama_buku', 
        judul='$judul', 
        tema='$tema', 
        email='$email'
        WHERE id_buku='$id_buku'");

        if ($queryUpdate) {
            return "Sukses";
        } else {
            return "Error" . mysqli_error($this->connect());
        }
    }

    public function delete($id_buku)
    {

        $queryDelete = mysqli_query($this->connect(), "DELETE FROM books WHERE id_buku='$id_buku'");

        if ($queryDelete) {
            return $queryDelete;
        } else {
            return "Error" . mysqli_error($this->connect());
        }
    }
}
