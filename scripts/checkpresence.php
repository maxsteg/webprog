<?php
$json_file = file_get_contents("../data/games.json");
$games = json_decode($json_file, true);
$game_number = $_POST['gamenumber'];
$player_number = $_POST['player_number'];
// Generate time number


if ($player_number == 1){
    $games[$game_number]['player1_time'] = time();
} elseif ($player_number == 2){
    $games[$game_number]['player2_time'] = time();
}


//array_push($games, [
//    'game_number' => $game_number,
//    'time' => $time
//]);

// Save to external file
$json_file = fopen('../data/games.json', 'w');
fwrite($json_file, json_encode($games));
fclose($json_file);

