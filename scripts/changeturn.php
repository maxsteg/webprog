<?php
$json_file = file_get_contents("../data/games.json");
$games = json_decode($json_file, true);
$gamenumber = $_POST['gamenumber'];
$turn = $games[$gamenumber]['turn'];

if ($games[$gamenumber]['turn'] == 1) {
    $games[$gamenumber]['turn'] = 2;
} elseif ($games[$gamenumber]['turn'] == 2) {
    $games[$gamenumber]['turn'] = 1;
}

// Save to external file
$json_file = fopen('../data/games.json', 'w');
fwrite($json_file, json_encode($games));
fclose($json_file);