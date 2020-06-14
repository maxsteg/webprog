<?php
// Get files and variables
$json_file = file_get_contents("../data/games.json");
$games = json_decode($json_file, true);
$gamenumber = $_POST['gamenumber'];
$bomb_active = $_POST['bombactive'];

if (isset($gamenumber) && isset($bomb_active)) {
    //if ($bomb_active == true):
        // $bomb_active = false;
    // else:
        // delete game
        // unset($games[$gamenumber]);

    // Save to external file
    $json_file = fopen('../data/games.json', 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);
}