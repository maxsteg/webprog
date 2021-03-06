<?php
function makeGame($game_number){
    // Makes game

    $games[$game_number]['boxes'] = makeBoxes();
    $games[$game_number]['hints'] = makeHints($games[$game_number]['boxes']);
    $games[$game_number]['player1_time'] = time();
    $games[$game_number]['turn'] = 1;
    $games[$game_number]['bomb_active'] = "true";
    $json_file = fopen("data/" . $_SESSION['gamenumber'] .".json", 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);
}

function makeBoxes(){
    // Generates an array with all colour possibilities, except matching pairs, like ['red', 'red'].
    $colors = array('red', 'orange', 'yellow', 'green', 'blue', 'purple');
    $color_combinations = array();
    foreach ($colors as $box_color) {foreach ($colors as $bow_color) {
            if ($box_color !== $bow_color) {
                array_push($color_combinations, array($box_color, $bow_color));
            }
        }
    }

    // Makes arrays of bomb and hint possibilities.
    $box_amount = 30;
    $bomb_amount = 1;
    $hint_amount = 5;

    $bomb_list = array();
    for ($x = 1; $x <= $bomb_amount; $x++) {array_push($bomb_list, true);}
    for ($x = 1; $x <= ($box_amount - $bomb_amount); $x++) {array_push($bomb_list, false);}

    $hint_list = array();
    for ($x = 1; $x <= $hint_amount; $x++) {array_push($hint_list, true);}
    for ($x = 1; $x <= ($box_amount - $bomb_amount - $hint_amount); $x++) {array_push($hint_list, false);}

    // Makes all unique boxes with information about hints, bombs, et cetera.
    $boxes = array();
    for ($x = 1; $x <= $box_amount; $x++) {
        $box_info = array();

        $color_combination_index = array_rand($color_combinations, 1);
        $color_combination = $color_combinations[$color_combination_index];
        unset($color_combinations[$color_combination_index]);

        $bomb_index = array_rand($bomb_list, 1);
        $bomb = $bomb_list[$bomb_index];
        unset($bomb_list[$bomb_index]);

        if ($bomb === true) {
            $hint = false;
        } else {
            $hint_index = array_rand($hint_list, 1);
            $hint = $hint_list[$hint_index];
            unset($hint_list[$hint_index]);
        }

        $box_info['image'] = 'box_' . $color_combination[0] . '_bow_' . $color_combination[1] . '.png';
        $box_info['box_color'] = $color_combination[0];
        $box_info['bow_color'] = $color_combination[1];
        $box_info['closed'] = true;
        $box_info['bomb'] = $bomb;
        $box_info['hint'] = $hint;
        $boxes['box' . $x] = $box_info;
    }
    return $boxes;
}

function makeHints($boxes){
    $colors = array('red', 'orange', 'yellow', 'green', 'blue', 'purple');
    foreach ($boxes as $box) {
        if ($box['bomb'] == true){
            $bomb_color = $box['box_color'];
            $bomb_bow = $box['bow_color'];
        } elseif ($box['hint'] == true) {
            if (isset($hint_color) == false) {
                $hint_color = $box['box_color'];
                $hint_bow = $box['bow_color'];
            }
        }
    }
    $bomb_colors = array($bomb_color, $bomb_bow);
    $possible_colors = array_diff($colors,$bomb_colors);

    $hint1 = "The bomb is not in a box that has a(n) " . reset($possible_colors) . " color.";
    $hint2 = "The bomb is not in a box that has a(n) " . next($possible_colors) . " color.";
    $hint3 = "The bomb is not in a box that has a(n) " . next($possible_colors) . " bow.";
    $hint4 = "The bomb is not in a box that has a(n) " . next($possible_colors) . " bow.";
    $hint5 = "There is a hint in the " . $hint_color . " box with a(n) " . $hint_bow . " bow.";

    $hints = array($hint5, $hint2, $hint3, $hint1, $hint4);

    return $hints;
}

