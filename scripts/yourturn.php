<?php
session_start();
$json_file = file_get_contents("../data/" . $_SESSION['gamenumber'] .".json");
$games = json_decode($json_file, true);
$gamenumber = $_POST['gamenumber'];
$playernumber = $_POST['playernumber'];

if (isset($gamenumber) && isset($playernumber)) {
    if ($games[$gamenumber]['turn'] == $playernumber) {
        echo "true";
    } else {
        echo "false";
    }
}

