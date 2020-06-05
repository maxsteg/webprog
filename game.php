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
if (isset($_POST["gameCode"])) {
    include __DIR__ . '/scripts/joingame.php';
    $_SESSION['game_number'] = $_POST['gameCode'];
    $_SESSION['player_number'] = 2;
    // Check if this gameCode exist (check if input is safe too)
    joinGame($_SESSION['game_number']);
        // If two players --> Game can start
    // Return to home page with alert: this game does not exist
}
// User makes game
elseif (isset($_POST["newGame"])) {
    include __DIR__ . '/scripts/generate_code.php';
    $_SESSION['game_number'] = checkCode();
    $_SESSION['player_number'] = 1;
    include __DIR__ . '/scripts/makegame.php';
    // Make game with makegame.php
    makeGame($_SESSION['game_number']);
    echo '<h1>Game number is: '. $_SESSION['game_number'] . '</h1>';

}

else {
    // Redirect to homepage
    header('Location: index.php', true, 301);
    die();
}

?>

 <script type="application/javascript" src="scripts/game.js"></script>
</div>

<?php
include __DIR__ . '/tpl/body_end.php';
?>

