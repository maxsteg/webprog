<?php
$json_file = file_get_contents("../data/games.json");
$games = json_decode($json_file, true);
$gamenumber = $_POST['gamenumber'];
$setting = $_POST['set'];

if ($setting == 'test') {
    $bomb_active = $games[$gamenumber]['bomb_active'];
    echo $bomb_active;
} elseif ($setting == 'set') {
    $games[$gamenumber]['bomb_active'] = 'false';

    // Save to external file
    $json_file = fopen('../data/games.json', 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);
}
