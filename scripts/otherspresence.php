<?php
//$json_file = file_get_contents("../data/games.json");
//$games = json_decode($json_file, true);
//$gamenumber = $_POST['gamenumber'];
//$playernumber = $_POST['playernumber'];
//$current_time = time();
//
//// Get the time of the other player
//if ($playernumber == 1) {
//    if (isset($games[$gamenumber]['player2_time'])) {
//        $other_player_time = $games[$gamenumber]['player2_time'];
//} else {
//        $other_player_time = $games[$gamenumber]['player1_time'];
//    }
//}
//
//// Get time difference between the current time and the time of the other player
//$time_delta = $current_time - $other_player_time;
//
//// If the time difference is bigger than 30 seconds, the other player left
$time_delta = ["test", "test2", "test3"];
if ($time_delta > 30) {
    $test = 'pizza';
} else {
    $test = 'test2';
}


echo json_encode($time_delta);
