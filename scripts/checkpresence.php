<?php
session_start();
$json_file = file_get_contents("../data/games.json");
$games = json_decode($json_file, true);
// Generate time number
$game_number = $_SESSION['game_number'];
$player_number = $_SESSION['player_number'];
date_default_timezone_set("Europe/Amsterdam");
$time = $_POST['time'];
if ($player_number == 1){
    $games[$game_number]['player1_time'] = $time;
} elseif ($player_number == 2){
    $games[$game_number]['player2_time'] = $time;
}


//array_push($games, [
//    'game_number' => $game_number,
//    'time' => $time
//]);

// Save to external file
$json_file = fopen('../data/games.json', 'w');
fwrite($json_file, json_encode($games));
fclose($json_file);

