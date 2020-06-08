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
//$other_player_time = $other_player_time / 1000;
echo $game_number . '<br />';
echo $other_player_time . '<br/>';
echo $current_time;
$time_delta = $current_time - $other_player_time;
$time_delta2 = $other_player_time - $current_time;


// If the time difference is bigger than 30 seconds, the other player left
if ($time_delta > 30 or $time_delta2 > 30) {
    echo '<p>Test</p>';
    echo $time_delta;

} else {
    echo '<p>Test 2</p>';
    echo $time_delta;
}
