<?php
$json_file = file_get_contents("../data/games.json");
$games = json_decode($json_file, true);
$gamenumber = $_POST['gamenumber'];
$playernumber = $_POST['playernumber'];
// Generate time number


if ($playernumber == 1){
    $games[$gamenumber]['player1_time'] = time();
} elseif ($playernumber == 2){
    $games[$gamenumber]['player2_time'] = time();
}


//array_push($games, [
//    'game_number' => $game_number,
//    'time' => $time
//]);

// Save to external file
$json_file = fopen('../data/games.json', 'w');
fwrite($json_file, json_encode($games));
fclose($json_file);

