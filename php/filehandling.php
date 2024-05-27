<?php
    $file = fopen("contoh.txt", "r") or die("Tidak bisa membuka file!");
    echo fread($file, filesize("contoh.txt"));
    fclose($file);
?>