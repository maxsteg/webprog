<?php
$json_file = file_get_contents("../data/games.json");
$games = json_decode($json_file, true);
$gamenumber = $_POST['gamenumber'];
$hints = $games[$gamenumber]['hints'];

$hint = reset($hints);
echo $hint;

unset($games[$gamenumber]['hints'][$hint]);

// Save to external file
$json_file = fopen('../data/games.json', 'w');
fwrite($json_file, json_encode($games));
fclose($json_file);
?>
