<?php

function joinGame($game_number){
    // Adds time of second player as a game number property in games.json
    $json_file = file_get_contents("data/" . $_SESSION['gamenumber'] .".json");
    $games = json_decode($json_file, true);
    if (isset($games[$game_number])) {
        $games[$game_number]['player2_time'] = time();
    } else {
        header('Location: /', true, 301);
        die();
    }


    // Save to external file
    $json_file = fopen("data/" . $_SESSION['gamenumber'] .".json", 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);
}

