<?php
$json_file = file_get_contents("../data/games.json");
$games = json_decode($json_file, true);
$gamenumber = $_POST['gamenumber'];
$boxes = $games[$gamenumber]['boxes'];
$opened_boxes = array();

foreach ($boxes as $key => $value) {
    if ($value['closed'] == false) {
        array_push($opened_boxes, $key);
    }
}

echo json_encode($opened_boxes);
?>
