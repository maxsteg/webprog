<?php
session_start();
$json_file = file_get_contents("../data/games.json");
$games = json_decode($json_file, true);
// Generate time number
$game_number = $_SESSION['game_number'];
$player_number = $_SESSION['player_number'];
$games[$game_number]['player'. $player_number . '_time'] = time();


//array_push($games, [
//    'game_number' => $game_number,
//    'time' => $time
//]);

// Save to external file
$json_file = fopen('../data/games.json', 'w');
fwrite($json_file, json_encode($games));
fclose($json_file);

