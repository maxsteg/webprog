<script>
    function generateCode() {
        // Generates a game code
        $possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"
        $code = '';
        for (i = 0; i < 6; i++) {
            $num = Math.floor(Math.random() * 36);
            $code += $possible[$num];
        }
        // Add check to see if code already exists?
        return $code
    }
</script>

<?php
$page_title = 'Game';
include __DIR__ . '/tpl/head.php';
include __DIR__ . '/tpl/body_start.php';


// Must be replace with a real random code
function randomCode() {
    return "ABCDEF";
}
?>

<div class="row">

<?php
// If game_number is submitted (user joins game)
if (isset($_POST["joinGame"])) {
    include __DIR__ . '/scripts/joingame.php';
    $game_number = ($_POST['gameCode']);
    $player2 = true;
    // Check if this gameCode exist (check if input is safe too)
    joinGame($game_number);
        // If two players --> Game can start
    // Return to home page with alert: this game does not exist
}
// User makes game
elseif (isset($_POST["newGame"])) {

    $game_number = randomCode();
    include __DIR__ . '/scripts/makegame.php';
    // Make game with makegame.php
    makeGame($game_number);
    $player_number = 1;
    echo '<h1>Game number is: '. $game_number . '</h1>';

}

else {
    // Redirect to homepage
}


?>

<!-- <script type="application/javascript" src="scripts/game.js"></script> -->
</div>

<?php
include __DIR__ . '/tpl/body_end.php';
?>

