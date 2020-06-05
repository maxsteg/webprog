<?php
function makeGame($game_number){
    $json_file = file_get_contents("data/games.json");
    $games = json_decode($json_file, true);
    $games[$game_number]['player1_time'] = time();
    $games[$game_number]['boxes'] = makeBoxes();
    $json_file = fopen('data/games.json', 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);
}

function makeBoxes(){
    // Associative array with 30 items, every item (box) has its own associative array with all properties.

}




