function checkPresence() {
    $.post("scripts/checkpresence.php");

    }



$(function() {
    // let gameNumber = data[0];
    // let playerNumber = data[1]
    // console.log(gameNumber);
    window.setInterval(function (){
        checkPresence();
    }, 5000)

});