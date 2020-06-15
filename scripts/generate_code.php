<?php
function generateCode() {
    // Generates a game code.
    $possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $code = '';
    for ($i = 0; $i < 6; $i++) {
        $num = rand(0,35);
        $code .= $possible[$num];
    }
    return $code;
}

function checkCode() {
    // Checks if a game code already exists.
    $json_file = file_get_contents("data/games.json");
    $games = json_decode($json_file, true);
    $valid = false;
    while ($valid != true) {
        $code = generateCode();
        if (array_key_exists($code, $games) == false) {
            $valid = true;
        }
    }
    return $code;
}
