<?php
$json_file = file_get_contents("../data/games.json");
$games = json_decode($json_file, true);
$gamenumber = $_POST['gamenumber'];
$playernumber = $_POST['playernumber'];
if ($games[$gamenumber]['turn'] == $playernumber) {
    echo "true";
} else {
    echo "false";
}
