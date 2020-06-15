<?php
session_start();
$json_file = file_get_contents("../data/" . $_SESSION['gamenumber'] .".json");
$games = json_decode($json_file, true);
$gamenumber = $_POST['gamenumber'];
$hints = $games[$gamenumber]['hints'];

$hint = reset($hints);
echo $hint;

$hint_index = array_search($hint, $hints);
unset($games[$gamenumber]['hints'][$hint_index]);

// Save to external file
$json_file = fopen("../data/" . $_SESSION['gamenumber'] .".json", 'w');
fwrite($json_file, json_encode($games));
fclose($json_file);
