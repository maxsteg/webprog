function checkPresence(time) {
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
        var d = new Date();
        var time = d.getTime()
        console.log(time)
        // checkPresence(time);
        checkPresence();
        // if (checkOthersPresence()) {
        //     console.log('YAY IEMAND IS WEG EINDE');
        // }
    }, 3000)

});