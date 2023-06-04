<?php

class Data
{
    public $nama;
    public $umur;
    public $jk;

    public function __construct($nama, $umur, $jk)
    {
        $this->nama = $nama;
        $this->umur = $umur;
        $this->jk = $jk;
    }

    // public function name()
    // {
    //     return $this->nama;
    // }
}

// $data1 = new Data("Data Ke 1", 12, "L");
// $data2 = new Data("Data Ke 2", 5, "P");
// $data3 = new Data("Data Ke 3", 10, "L");


// echo $data1->nama . ' ' . $data1->umur . ' ' . $data1->jk;
// echo '<br>';

// echo $data2->nama . ' ' . $data2->umur . ' ' . $data2->jk;
// echo '<br>';

// echo $data3->nama . ' ' . $data3->umur . ' ' . $data3->jk;
// echo '<br>';
