<?php
$page_title = 'Game';
include __DIR__ . '/tpl/head.php';
include __DIR__ . '/tpl/body_start.php';
?>
<div class="row">
<?php
// If game_number is submitted (user joins game)
if (isset($_POST["gameCode"])) { // Needs to be changed
    include __DIR__ . '/scripts/joingame.php';
    $gamenumber = $_POST['gameCode'];
    $player_number = 2; // TO-DO Check which player you are
    joinGame($gamenumber);

    echo '<div class="topBar">
<div class="gameButtons">
<a href="index.php" class="btn homeButton"><img alt="Home Icon" src="images/home_icon.svg"></a>
<a href="index.php" class="btn helpButton"><img alt="Help Icon" src="images/help_icon.svg"></a></div>
<div class="turn">Not Your Turn<br/><b>Please wait!</b></div>
<div class="gameCodeBar">Game Number:<br/><b>'. $gamenumber . '</b></div>
</div>';

    // If two players --> Game can start

}
// User makes game
elseif (isset($_POST["newGame"])) {
    include __DIR__ . '/scripts/generate_code.php';
    $gamenumber = checkCode();
    $player_number = 1;
    include __DIR__ . '/scripts/makegame.php';
    // Make game with makegame.php
    makeGame($gamenumber);

    echo '<div class="topBar">
<div class="gameButtons">
<a href="index.php" class="btn homeButton"><img alt="Home Icon" src="images/home_icon.svg"></a>
<a href="index.php" class="btn helpButton"><img alt="Help Icon" src="images/help_icon.svg"></a></div>
<div class="turn">Your Turn<br/><b>Don\'t explode!</b></div>
<div class="gameCodeBar">Game Number:<br/><b>'. $gamenumber . '</b></div>
</div>';
}
else {
    // TO-DO: Add alert on homepage, this game does not exist.
    // Redirect to homepage
    header('Location: index.php', true, 301);
    die();
}
include __DIR__ . '/scripts/printboxes.php';
printBoxes($gamenumber);

?>
<script>
    var gameNumber = "<?php echo $gamenumber; ?>";
    var playerNumber = "<?php echo $player_number; ?>";
</script>
 <script type="application/javascript" src="scripts/game.js"></script>
</div>

<?php
include __DIR__ . '/tpl/body_end.php';
?>

