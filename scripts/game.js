function checkPresence() {
    $.post("scripts/checkpresence.php", {game_number: '42ZWGA'});

    }


$(function() {
    window.setInterval(function (){
        checkPresence();
    }, 5000)
});