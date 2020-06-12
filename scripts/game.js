function checkSecondPlayer() {
    let checkSecondPlayer = $.post("scripts/checksecondplayer.php", {gamenumber: gameNumber});
    let response = checkSecondPlayer.done(function (data) {
        if (data === 'true') {
          return true;
        }
    })
    return response;
}

function checkPresence() {
    $.post("scripts/checkpresence.php", {gamenumber: gameNumber, playernumber: playerNumber});
    }

function checkOthersPresence() {
    let test2 = $.post("scripts/otherspresence.php", {gamenumber: gameNumber, playernumber: playerNumber});
    test2.done(function (data) {
        console.log(data);
    })
}


function openBox(box) {
    $.post("scripts/openbox.php", {gamenumber: gameNumber, playernumber: playerNumber, box: box}, function (state) {
        // Returns the state of a box
        console.log(state);
        // if state === bomb:
        //      explodeBomb(box, "loser")
        // else if hint
        //      doe dingen (pakketje grijs maken)
        //      showHint()
        //      $.post("changeturn.php", {gamenumber: gameNumber, playernumber: playerNumber, box: box}) <-- hoeft niks te returnen, gewoon beurt veranderen
        //      game()
        // else if empty
        //      doe dingen (pakketje grijs maken)
        //      $.post("changeturn.php", {gamenumber: gameNumber, playernumber: playerNumber, box: box}) <-- hoeft niks te returnen, gewoon beurt veranderen
        //      game()
        // else if state == opened
        //      game()

    });
}

function explodeBomb(box, loser) {
        $.post("endgame.php", {gamenumber: gameNumber, playernumber: playerNumber}, function(bomb) {
            // background a color (circle animation --> in makegame.php even toevoegen aan het algemene spel object (e.g. bomblocation), in welk pakketje bom zit, zodat dit makkelijk te returnen is hier bij endgame)
            // delete alle images
            // slidein You are the winner/loser/other player left (status === "left")
                // slideIn buttons (home button etc)
    });
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

$(function() {
    let startGame = true;

    window.setInterval( function () {
        if (checkSecondPlayer()) {
            startGame = true;
            clearInterval();
        }
    }, 3000);


function game() {
    let id = window.setInterval(function() {
        checkPresence();
        $.post("scripts/otherspresence.php", {gamenumber: gameNumber, playernumber: playerNumber}, function(presence) {
            console.log(presence);
            if (presence === "true") {
                $.post("scripts/yourturn.php", {gamenumber: gameNumber, playernumber: playerNumber}, function(yourTurn) {
                    console.log(yourTurn);
                    if (yourTurn === "true") {
                        $.post("scripts/bombactive.php", {gamenumber: gameNumber}, function(bombActive) {
                            if (bombActive === "true") { // toevoegen in makeGame.php --> bombActive = "true"
                                // The other player is present and it is your turn
                                // Verander tekst in dat het jouw beurt is
                                clearInterval(id);
                                $('img').unbind().on('click', function (e) {
                                    if (presence === "true" && yourTurn === "true") {
                                        yourTurn = false;
                                        openBox($(this).attr('id'))
                                    }
                            }

                            });
                        });
                    } else if {
                        // Verander tekst in dat het niet jouw beurt is
                    }
                })
            } else if {
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