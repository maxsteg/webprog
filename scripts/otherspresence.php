<?php
$json_file = file_get_contents("../data/games.json");
$games = json_decode($json_file, true);
$gamenumber = $_POST['gamenumber'];
$playernumber = $_POST['playernumber'];
$current_time = time();

// Get the time of the other player
if ($playernumber == 1) {
    if (isset($games[$gamenumber]['player2_time'])) {
        $other_player_time = $games[$gamenumber]['player2_time'];
} else {
        $other_player_time = $games[$gamenumber]['player1_time'];
    }
}

// Get time difference between the current time and the time of the other player
$time_delta = $current_time - $other_player_time;

// If the time difference is bigger than 30 seconds, the other player left
if ($time_delta > 30) {
    $test = 'spelerstelangweg'

} else if {
    $test = 'test2';

}

//header('Content-Type: application/json');
//echo json_encode($test);