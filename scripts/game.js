function checkPresence(time) {
    $.post("scripts/checkpresence.php", {time: time});

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
        checkPresence(time);
        if (checkOthersPresence()) {
            console.log('YAY IEMAND IS WEG EINDE');
        }
    }, 10000)

});