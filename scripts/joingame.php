<?php
function joinGame($game_number){
//    Adds time of second player as a game number property in games.json
    $json_file = file_get_contents("data/games.json");
    $games = json_decode($json_file, true);
    if (isset($games[$game_number])) {
        $games[$game_number]['player2_time'] = time();
    } else {
        echo "false";
    }


// Save to external file
    $json_file = fopen('data/games.json', 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);

}

