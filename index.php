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
                <h4>Explanation and Rules</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </div>
</div>


<?php
include __DIR__ . '/tpl/body_end.php';
?>
