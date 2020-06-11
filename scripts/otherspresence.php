<?php
$json_file = file_get_contents("../data/games.json");
$games = json_decode($json_file, true);
$gamenumber = $_POST['gamenumber'];
$playernumber = $_POST['playernumber'];
$current_time = time();

if ($playernumber == 1) {
    if (isset($games[$gamenumber]['player2_time'])) {
        $other_player_number = 2;
        $other_player_time = $games[$gamenumber]['player2_time'];
    }
} else {
    $other_player_number = 1;
    $other_player_time = $games[$gamenumber]['player1_time'];
}

if (isset($other_player_time)) {
    $time_delta = $current_time - $other_player_time;
    if ($time_delta > 30) {
        echo 'false';
        //header('Content-Type: application/json');
    } else {
        echo 'true';
    }
}