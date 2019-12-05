<?php

function randcode($n)
{
    $chars = '0123456789abcdefghijklmnopqrstuvwxyz';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $j = rand(0, strlen($chars) - 1);
        $randomString .= $chars[$j];
    }

    return $randomString;
}
?>