<?php
$page_title = 'Home';
include __DIR__ . '/tpl/head.php';
include __DIR__ . '/tpl/body_start.php';
?>

<div class="row">
    <div class="col-md-12" style="background-color: darkgray;">
        <form action="index.php" method="POST">
            <?php
            if (isset($_POST['joinGame'])) {
                echo '<div class="form-group"><label>Game Code</label><input id="gameCode" class="form-control text-uppercase" name="gameCode" type="text" placeholder="Enter a game code..."></div>';
                echo '<button type="submit" name="joinGameCode" class="btn btn-primary">Join</button>';
            } else if (isset($_POST['newGame'])) {
                echo '<h1>Game Code</h1>';
            }

            if ((isset($_POST['joinGameCode'])) && (isset($_POST['gameCode']))) {
                echo '<h1>' . $_POST['gameCode'] . '</h1>';
            }

            ?>
            <div class="form-group" id="startGameButtons"
                <?php
                if ((isset($_POST['newGame'])) || (isset($_POST['joinGame'])) || (isset($_POST['gameCode']))) {
                    echo 'style="display:none;"'; }
                ?>
            >
                <button type="submit" name="newGame" id="newGame" class="btn btn-primary">New Game</button>
                <button type="submit" name="joinGame" id="joinGame" class="btn btn-secondary">Join Game</button>
            </div>
        </form>
    </div>
</div>


<?php
include __DIR__ . '/tpl/body_end.php';
?>
