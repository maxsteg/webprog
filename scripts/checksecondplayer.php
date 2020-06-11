<?php
$json_file = file_get_contents("../data/games.json");
$games = json_decode($json_file, true);
$gamenumber = $_POST['gamenumber'];

// Check if in games.json with your gamecode a variable exist with player1_time and player2_time
if (isset($games[$gamenumber]['player1_time']) and isset($games[$gamenumber]['player2_time'])) {
    echo 'true';
}
else {
    echo 'false';
}
