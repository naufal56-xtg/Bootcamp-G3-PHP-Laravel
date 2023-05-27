<?php


$name = 'Ahmad';

function nama()
{
    global $name;
    $name = 'Jajang';
    echo 'Nama : ' . $name;
}

nama();
echo '<br>';
echo 'Nama : ' . $name;
