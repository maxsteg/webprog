<?php
$page_title = 'Game';
include __DIR__ . '/tpl/head.php';
include __DIR__ . '/tpl/body_start.php';

session_set_cookie_params([
    'lifetime' => time() + 86400,
    'path' => '/',
    'domain' => 'localhost/webprog',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict',
]);
session_start();



?>

<div class="row">

<?php
// If game_number is submitted (user joins game)
if (isset($_POST["gameCode"])) { // Needs to be changed
    include __DIR__ . '/scripts/joingame.php';
    $_SESSION['game_number'] = $_POST['gameCode'];
    $_SESSION['player_number'] = 2; // TO-DO Check which player you are
    // Check if this gameCode exist (check if input is safe too)
    joinGame($_SESSION['game_number']);
    echo '<h1>Joined Game, Game number is: '. $_SESSION['game_number'] . '</h1>';

    // If two players --> Game can start

}
// User makes game
elseif (isset($_POST["newGame"])) {
    include __DIR__ . '/scripts/generate_code.php';
    $_SESSION['game_number'] = checkCode();
    $_SESSION['player_number'] = 1;
    include __DIR__ . '/scripts/makegame.php';
    // Make game with makegame.php
    makeGame($_SESSION['game_number']);
    echo '<h1>New Game, Game number is: '. $_SESSION['game_number'] . '</h1>';
}

else {
    // TO-DO: Add alert on homepage, this game does not exist.
    // Redirect to homepage
    header('Location: index.php', true, 301);
    die();
}

include __DIR__ . '/scripts/checkready.php';
// Check if there are two players -> checkready.php {
    include __DIR__ . '/scripts/printboxes.php';
?>

    <?php
//    }

    ?>

 <script type="application/javascript" src="scripts/game.js"></script>
</div>

<?php
include __DIR__ . '/tpl/body_end.php';
?>

