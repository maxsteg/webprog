<?php
session_start();
$page_title = 'Game';
include __DIR__ . '/tpl/head.php';
include __DIR__ . '/tpl/body_start.php';
?>
<div class="row">
<?php
// If game_number is submitted (user joins game)
if (isset($_POST["gameCode"])) { // Needs to be changed
    include __DIR__ . '/scripts/joingame.php';
    $gamenumber = strtoupper($_POST['gameCode']);
    $_SESSION['gamenumber'] = $gamenumber;
    $player_number = 2; // TO-DO Check which player you are
    joinGame($gamenumber);

    echo '<div class="topBar">
<div class="gameButtons">
<a href="index.php" class="btn homeButton"><img alt="Home Icon" src="images/home_icon.svg"></a>
<div id="helpButton" class="btn helpButton"><img alt="Help Icon" src="images/help_icon.svg"></div></div>
<div class="turn d-none" id="your-turn">Your turn<br/><b>Don\'t explode!</b></div>
<div class="turn d-block" id="not-your-turn">Not Your Turn<br/><b>Please wait!</b></div>
<div class="gameCodeBar">Game Number:<br/><b>'. $gamenumber . '</b></div>
</div>';

    // If two players --> Game can start

}
// User makes game
elseif (isset($_POST["newGame"])) {
    include __DIR__ . '/scripts/generate_code.php';
    $gamenumber = checkCode();
    $player_number = 1;
    $_SESSION['gamenumber'] = $gamenumber;
    include __DIR__ . '/scripts/makegame.php';
    // Make game with makegame.php
    makeGame($gamenumber);


    echo '<div class="topBar">
<div class="gameButtons">
<a href="index.php" class="btn homeButton"><img alt="Home Icon" src="images/home_icon.svg"></a>
<div id="helpButton" class="btn helpButton"><img alt="Help Icon" src="images/help_icon.svg"></div></div>
<div class="turn d-none" id="your-turn">Your Turn<br/><b>Don\'t explode!</b></div>
<div class="turn d-none" id="not-your-turn">Not Your Turn<br/><b>Please wait!</b></div>
<div class="turn d-block">Waiting for other player<br/><b>Make sure to send them the game number!</b></div>
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
    <div class="backGroundFiller" id="backGroundFillerHelp" style="display:none;"></div>
    <div class="popUp" id="popUpHelp" style="display:none;">
        <div class="popUpContent">
            <h4>BombBox: The Rules</h4>
            <p>BombBox is a fun two-player game where you take turns clicking one of the thirty boxes. Be careful though, because one of the boxes contains a bomb and if you click that one you lose! Five of the boxes contain a hint which will tell you about where another hint is or where you won't find the bomb. That leaves 24 empty boxes, click one of those and you will have survived another turn!<br/><br/>So create a new game or join one using a game code and keep in mind: don't explode!</p>
        </div>
    </div>
    <div class="closePopUp" id="closePopUpHelp" style="display:none;"><img class="closePopUpIcon" src="images/crossmark.svg" alt="Cross Mark"></div>

    <div class="backGroundFiller" id="backGroundFillerHint" style="display:none;"></div>
    <div class="popUp" id="popUpHint" style="display:none;"><div class="popUpContent" id="popUpContentHint"></div></div>
    <div class="closePopUp" id="closePopUpHint" style="display:none;"><img class="closePopUpIcon" src="images/crossmark.svg" alt="Cross Mark"></div>
    <script>
        var gameNumber = "<?php echo $gamenumber; ?>";
        var playerNumber = "<?php echo $player_number; ?>";
    </script>
 <script type="application/javascript" src="scripts/game.js"></script>
</div>

<?php
include __DIR__ . '/tpl/body_end.php';
?>

