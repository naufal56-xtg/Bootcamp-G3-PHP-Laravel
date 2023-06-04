<?php

require_once('./data.php');


class Orang extends Data
{

    public function name($orang)
    {
        return $this->nama . " $orang";
    }
}

$orang = new Orang('Orang Ke 1', 2, 'P');

echo $orang->name('Cool');
