<?php
session_start();
// Get files and variables
$json_file = file_get_contents("../data/" . $_SESSION['gamenumber'] .".json");
$games = json_decode($json_file, true);
$gamenumber = $_POST['gamenumber'];

if (isset($gamenumber)) {
    $bomb_active = $games[$gamenumber]['bomb_active'];
    if ($bomb_active == "true") {
        $games[$gamenumber]['bomb_active'] = "false";
    }

    $json_file = fopen("../data/" . $_SESSION['gamenumber'] .".json", 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);
}
