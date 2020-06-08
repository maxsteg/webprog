<?php
session_start();
$json_file = file_get_contents("../data/games.json");
$games = json_decode($json_file, true);
$game_number = $_SESSION['game_number'];
$player_number = $_SESSION['player_number']; // Check which player you are
$current_time = time();

if ($player_number == 1) { // Check/get other player time variable
    $other_player_time = $games[$game_number]['player2_time'];
} else {
    $other_player_time = $games[$game_number]['player1_time'];
}

$time_delta = $current_time - $other_player_time; // Get time difference

if ($time_delta > 30) { // Time difference bigger than 30 seconds -> Someone left
    return true;
} else {
    return false;
}

// Check which player you are -> $player_number = $_SESSION['player_number'];
// Check if other player time variable exist
// Time delta
    // If less than 30 seconds -> return true
    // Else false
