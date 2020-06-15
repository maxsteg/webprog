<?php
session_start();
$json_file = file_get_contents("../data/" . $_SESSION['gamenumber'] .".json");
$games = json_decode($json_file, true);
$gamenumber = $_POST['gamenumber'];

if (isset($gamenumber)) {
    $bomb_active = $games[$gamenumber]['bomb_active'];
    if ($bomb_active == "true") {
        echo "true";
    } elseif ($bomb_active == 'false') {
        echo "false";
    }
}
