<?php

$json_file = file_get_contents("../data/games.json");
$games = json_decode($json_file, true);
// Generate time number
$game_number = $_POST['game_number'];

if ($games[$game_number]['player1_time']) {
    $games[$game_number]['player2_time'] = time();
}


// Save to external file
$json_file = fopen('../data/games.json', 'w');
fwrite($json_file, json_encode($games));
fclose($json_file);

