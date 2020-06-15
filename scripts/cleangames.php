<?php
// Get files and variables
$json_file = file_get_contents("../data/games.json");
$games = json_decode($json_file, true);

foreach ($games as $key => $value) {
    $timedelta = time() - $value['player1_time'];
    if ($timedelta > 30 and $key !== '#!dUa^')  {
        unset($games[$key]);
    }
}
// Save to external file
$json_file = fopen('../data/games.json', 'w');
fwrite($json_file, json_encode($games));
fclose($json_file);
