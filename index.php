<?php
$page_title = 'Home';
include __DIR__ . '/tpl/head.php';
include __DIR__ . '/tpl/body_start.php';

?>

<div class="homePage">
    <div class="logoHome">
        <img class="logo" src="images/temp_logo.png">
    </div>
    <div class="homeRow">
        <div id="homeButtons">
            <form id="joinGameForm" action="game.php" method="POST">
                <div id="enterCode" style="display:none;">
                    <div class="form-group">
                        <label>Game Code</label>
                        <input id="gameCode" class="form-control text-uppercase" name="gameCode" type="text" placeholder="e.g. ABC123" maxlength="6">
                        <div class="valid-feedback">
                            <b>Great!</b> This field looks good!</div>
                        <div class="invalid-feedback">
                            <b>Uh oh!</b> This field should contain 6 characters (capital letters or numbers)!</div>
                    </div>
                    <button type="submit" id="submitGameCode" name="submitGameCode" class="btn">Join</button>
                    <div id="backButton" name="submitGameCode" class="btn"><img alt="Home Icon" src="images/home_icon.svg"></div>
                </div>
                <button name="joinGame" id="joinGame" class="btn">Join Game</button>
            </form>
            <form id="gameCodeForm" action="game.php" method="POST">
                <button name="newGame" id="newGame" class="btn">New Game</button>
            </form>
        </div>
        <div class="explanation">
            <div>
                <h4>BombBox: The Rules</h4>
                <p>BombBox is a fun two-player game where you take turns clicking one of the thirty boxes. Be careful though, because one of the boxes contains a bomb and if you click that one you lose! Five of the boxes contain a hint which will tell you about where another hint is or where you won't find the bomb. That leaves 24 empty boxes, click one of those and you will have survived another turn!<br/><br/>So create a new game or join one using a game code and keep in mind: don't explode!</p>
            </div>
        </div>
    </div>
</div>


<?php
include __DIR__ . '/tpl/body_end.php';
?>
