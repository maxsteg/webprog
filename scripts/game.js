function checkPresence() {
    $.post("scripts/checkpresence.php");

    }

function checkOthersPresence() {
    $.post("scripts/otherspresence.php");
}


$(function() {
    // let gameNumber = data[0];
    // let playerNumber = data[1]
    // console.log(gameNumber);
    window.setInterval(function (){
        checkPresence();
        if (checkOthersPresence()) {
            console.log('YAY IEMAND IS WEG EINDE')
        }
    }, 5000)

});