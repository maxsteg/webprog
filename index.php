<?php
$page_title = 'Home';
include __DIR__ . '/tpl/head.php';
include __DIR__ . '/tpl/body_start.php';

?>

<div class="row">
    <div class="col-md-12 logoHome">
        <img class="logo" src="images/temp_logo.png">
    </div>
    <div class="col-md-12 homeButtons">
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
            </div>
            <button name="joinGame" id="joinGame" class="btn">Join Game</button>
        </form>
        <form id="gameCodeForm" action="game.php" method="POST">
            <button name="newGame" id="newGame" class="btn">New Game</button>
        </form>
    </div>
</div>


<?php
include __DIR__ . '/tpl/body_end.php';
?>
