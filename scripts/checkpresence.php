<?php
// Get files and variables
session_start();
$json_file = file_get_contents("../data/" . $_SESSION['gamenumber'] .".json");
$games = json_decode($json_file, true);
$gamenumber = $_POST['gamenumber'];
$playernumber = $_POST['playernumber'];

if (isset($gamenumber) and isset($playernumber)) {
    // Set time of the player
    if ($playernumber == 1) {
        $games[$gamenumber]['player1_time'] = time();
    } elseif ($playernumber == 2) {
        $games[$gamenumber]['player2_time'] = time();
    }

    // Save to external file
    $json_file = fopen("../data/" . $_SESSION['gamenumber'] .".json", 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);
}
