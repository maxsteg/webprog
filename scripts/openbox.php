<?php
$json_file = file_get_contents("../data/games.json");
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
    $box['closed'] = false;

    // Save to external file
    $json_file = fopen('../data/games.json', 'w');
    fwrite($json_file, json_encode($games));
    fclose($json_file);
} else {
    echo "opened";
}

// toevoegen:
// box openen, veranderen dat hij op geopend staat
?>
