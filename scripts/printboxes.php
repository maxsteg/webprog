<?php
$json_file = file_get_contents("data/games.json");
$games = json_decode($json_file, true);
$game_number = $_SESSION['game_number'];
$boxes = $games[$game_number]['boxes'];
$boxcount = 0;

echo '<div class="boxes">';
for ($i = 0; $i < 5; $i++) {
    echo '<div class="row">';
    for ($x = 0; $x < 6; $x++) {
        ++$boxcount;
        $box = 'box' . $boxcount;
        $image = $boxes[$box]['image'];
        echo '<div class="col" id="' . $box . '">';
        echo '<img src="images/' . $image . '" alt="' . $image . '">';
        echo '</div>';
    }
    echo '</div>';
}
echo '</div>';
?>