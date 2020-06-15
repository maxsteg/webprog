<?php
session_start();
$json_file = file_get_contents("../data/" . $_SESSION['gamenumber'] .".json");
$games = json_decode($json_file, true);
$gamenumber = $_POST['gamenumber'];
$playernumber = $_POST['playernumber'];
$current_time = time();

if (isset($gamenumber) && isset($playernumber) && isset($current_time)) {
    if ($playernumber == 1) {
        if (isset($games[$gamenumber]['player2_time'])) {
            $other_player_time = $games[$gamenumber]['player2_time'];
        }
    } else {
        if (isset($games[$gamenumber]['player1_time'])) {
            $other_player_time = $games[$gamenumber]['player1_time'];
        }
    }

    if (isset($other_player_time)) {
        $time_delta = $current_time - $other_player_time;
        if ($time_delta > 60) {
            echo 'false';
        } else {
            echo 'true';
        }
    }
}
