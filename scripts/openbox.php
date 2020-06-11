<?php
$json_file = file_get_contents("data/games.json");
$games = json_decode($json_file, true);
$gamenumber = $_POST['gamenumber'];
$playernumber = $_POST['playernumber'];
$box = $_POST['box'];
$box = $games[$gamenumber]['boxes'][$box];

if ($box['closed'] == true) {
    if ($box['bomb'] == true) {
        echo 'bomb';
    } elseif ($box['hint'] == true) {
        echo 'hint';
    } else {
        echo 'empty';
    }
}
?>
