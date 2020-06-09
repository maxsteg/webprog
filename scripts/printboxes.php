<?php
function printBoxes($gamenumber)
{
    $json_file = file_get_contents("data/games.json");
    $games = json_decode($json_file, true);
    $boxes = $games[$gamenumber]['boxes'];
    $boxcount = 0;

    echo '<div class="boxes">';
    for ($i = 0; $i < 5; $i++) {
        echo '<div class="row">';
        for ($x = 0; $x < 6; $x++) {
            ++$boxcount;
            $box = 'box' . $boxcount;
            $image = $boxes[$box]['image'];
            echo '<div class="col">';
            echo '<img src="images/' . $image . '" id="' . $box . '" alt="' . $image . '">';
            echo '</div>';
        }
        echo '</div>';
    }
    echo '</div>';
}
?>