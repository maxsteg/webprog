function checkPresence(time) {
    $.post("scripts/checkpresence.php", {gamenumber: gameNumber, player_number: playerNumber});
    }

function checkOthersPresence() {
    $.post("scripts/otherspresence.php");
}

//
$(function() {
    // var gameNumber = "<?php echo $gamenumber ?>";
    // var playerNumber = "<?php echo $player_number ?>";
    console.log(playerNumber);
    console.log(gameNumber);
    window.setInterval(function (){
        checkPresence();
        // if (checkOthersPresence()) {
        //     console.log('YAY IEMAND IS WEG EINDE');
        // }
    }, 3000)

});