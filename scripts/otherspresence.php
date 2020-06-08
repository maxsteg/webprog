<?php
session_start();
$json_file = file_get_contents("../data/games.json");
$games = json_decode($json_file, true);
$game_number = $_SESSION['game_number'];
$player_number = $_SESSION['player_number'];
$current_time = time();

// Get the time of the other player
if ($player_number == 1) {
    if ($games[$game_number]['player2_time']) {
        $other_player_time = $games[$game_number]['player2_time'];
    } else {
        $other_player_time = 0;
    }
} else {
    if ($games[$game_number]['player1_time']) {
        $other_player_time = $games[$game_number]['player1_time'];
    } else {
        $other_player_time = 0;
    }
}

// Get time difference between the current time and the time of the other player
$time_delta = $current_time - $other_player_time;

// If the time difference is bigger than 30 seconds, the other player left
if ($time_delta > 30) {
    return true;
} else {
    return false;
}
