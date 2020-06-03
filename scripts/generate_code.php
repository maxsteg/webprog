<?php
function generateCode() {
    $possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $code = '';
    for ($i = 0; $i < 6; $i++) {
        $num = rand(0,35);
        $code .= $possible[$num];
    }
    return $code;
}