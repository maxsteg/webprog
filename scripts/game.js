function checkPresence() {
    $.post("scripts/checkpresence.php", {game_number: '42ZWGA'});

    }

function makeGame() {
    let test $.post("scripts/makegame.php", {game_number: generateCode() });
    if (test === false) {
        makeGame();
    }

}

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


$(function() {
    window.setInterval(function (){
        checkPresence();
    }, 5000)


    $('#newGame').on('click', function() {
        makeGame();
    });
});