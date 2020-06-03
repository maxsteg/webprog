function checkPresence() {
    $.post("scripts/checkpresence.php", {game_number: '42ZWGA'});

    }

function makeGame() {
    $.post("scripts/makegame.php", {game_number: 'ABCDEF'});

}


$(function() {
    window.setInterval(function (){
        checkPresence();
    }, 5000)
});