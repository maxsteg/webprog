function checkPresence() {
    $.post("scripts/checkpresence.php", {gamenumber: gameNumber, playernumber: playerNumber}, function () {
        console.log('Wauw');
    });
    }

function openBox(box, xcoor, ycoor) {
    $.post("scripts/openbox.php", {gamenumber: gameNumber, playernumber: playerNumber, box: box}, function (state) {
        // Returns the state of a box
        console.log(state);
        if (state === 'bomb') {
            console.log('boom');
            explodeBomb(xcoor, ycoor, "loser");
        } else if (state === 'hint') {
            var box_id = '#' + box;
            console.log(box_id);
            $(box_id).css('filter', 'grayscale(100%)');
            //      showHint()
            //      $.post("changeturn.php", {gamenumber: gameNumber}) <-- hoeft niks te returnen, gewoon beurt veranderen
            game()
        } else if (state === 'empty') {
            var box_id = '#' + box;
            console.log(box_id);
            $(box_id).css('filter', 'grayscale(100%)');

            //      doe dingen (pakketje grijs maken)
            //      $.post("changeturn.php", {gamenumber: gameNumber}) <-- hoeft niks te returnen, gewoon beurt veranderen
            game()
        } else if (state === 'opened') {
            game()
        }
    });
}

function explodeBomb(xcoor, ycoor, status) {
    $.post("endgame.php", {gamenumber: gameNumber, playernumber: playerNumber});
    var x = xcoor - 5;     // Get the horizontal coordinate
    var y = ycoor - 5;     // Get the vertical coordinate
    document.body.innerHTML += '<div id="explosion" style="position:absolute;left:' + x + 'px;top:' + y + 'px;transition: border-radius 0.3s ease-in 0.2s, left ease-in 0.5s, top ease-in 0.5s, width ease-in 0.5s, height ease-in 0.5s;width:10px;height:10px;border-radius:50%;z-index:100;background:#f4a259;"></div>';
    $('#explosion').css({'width': '100vw', 'height': '100vh', 'top': 0, 'left': 0,'border-radius': 0})
    setTimeout(function() {
        $('#explosion').css('transition', 'none');
        $('.mx-auto.px-5').remove();
        $('#explosion').append('<div id="endMessage" style="display:none;"></div>')
        if (status === "left") {
            $('#endMessage').append('<h1><b>Somebody left...</b></h1>');
        } else {
            $('#endMessage').append('<h1><b>The bomb has exploded!</b></h1>')
            if (status === "winner") {
                $('#endMessage').append('<h3><b>Congratulations!</b> You are the winner!</h3>')
            } else if (status === "loser") {
                $('#endMessage').append('<h3><b>Too bad!</b> You are the loser!</h3>')
            }
        }
        $('#endMessage').append('<h5>Click the button to return to the home page.</h5><a href="index.php" class="btn homeButton"><img alt="Home Icon" src="images/home_icon.svg"></a>');
        $('#endMessage').fadeIn(3000);
        }, 500);
    }


function yourTurn() {
    let yourTurn = $.post("scripts/yourturn.php",
                          {gamenumber: gameNumber, playernumber: playerNumber});
    let test = yourTurn.done(function ( data ) {
        if (data == "true"){
            return true;
        }
    })
    return test;
}


function game() {
    let test = 'hoi';
    let id = window.setInterval(function() {
        checkPresence();

        $.post("scripts/otherspresence.php", {gamenumber: gameNumber, playernumber: playerNumber}, function(presence) {
            console.log(presence);
            if (presence === "true") {
                $.post("scripts/yourturn.php", {gamenumber: gameNumber, playernumber: playerNumber}, function(yourTurn) {
                    console.log(yourTurn);
                    if (yourTurn === "true") {
                        $.post("scripts/bombactive.php", {gamenumber: gameNumber, set: 'test'}, function(bombActive) {
                            console.log(bombActive);
                            if (bombActive === 'true') { // toevoegen in makeGame.php --> bombActive = "true"
                                // The other player is present and it is your turn
                                // Verander tekst in dat het jouw beurt is
                                clearInterval(id);
                                $('img').unbind().on('click', function (e) {
                                    var xcoor = e.clientX;
                                    var ycoor = e.clientY;
                                    if (presence === "true" && yourTurn === "true") {
                                        yourTurn = false;
                                        openBox($(this).attr('id'), xcoor, ycoor)
                                    }
                                });
                                }
                            });
                    } else {
                        // Verander tekst in dat het niet jouw beurt is
                    }
                });
            } else {
                // Andere speler is weggegaan
                // Stop het spel
                // explodeBomb(0, left);
            }
        })
    }, 3000)
}

$(function() {

    // Check if there is a second player
    let id = window.setInterval( function () {
        $.post("scripts/checksecondplayer.php", {gamenumber: gameNumber}, function(data) {
            console.log(data);
            if (data === "true") {
                clearInterval(id);
                game();
            }
        })
    }, 3000)
});