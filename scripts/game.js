function checkSecondPlayer() {
    $.post("scripts/checksecondplayer.php", {gamenumber: gameNumber});
}

function checkPresence() {
    $.post("scripts/checkpresence.php", {gamenumber: gameNumber, playernumber: playerNumber});
    }

function checkOthersPresence() {
    $.post("scripts/otherspresence.php", {gamenumber: gameNumber, playernumber: playerNumber});
//     test.done(function (data) {
//         console.log(data.presence);
//     });
}



function openBox() {
    $.post("scripts/openbox.php", {gamenumber: gameNumber, playernumber: playerNumber, boxnumber: boxNumber})

}

function explodeBomb() {
    // background a color (circle animation)
    // delete alle images
    // slidein You are the winner/loser
    // slideIn buttons
}



$(function() {
    let startGame = false;

    while (startGame === false) {
        if (checkSecondPlayer()) {
            startGame = true;
        }
    }


    if (startGame) {
        //    }
        window.setInterval(function (){
            checkPresence();
            if (checkOthersPresence()) {
                // end game
                // deletegame
            }

            if (yourTurn()) {
                // check if bomb is intact:
                    // interface veranderen --> JIJ BENT AAN DE BEURT YAY
                    $('img').on('click', function() {
                        // krijg het id
                        // openBox(id)
                        // check of het nog gesloten, zo niet doe je niks
                        // open box --> return of het normale box is, hint of bom
                        // change properties of box (close == false)
                        // maak box grijs

                        // if box = bom:
                            // explodeBomb(loser)
                        // call php function --> endgame.php
                        // if box = hint:
                        // pop-up met de hint
                        // aanpassen in json dat het niet meer jouw beurt is
                })
                // else (bom niet intact --> jij hebt gewonnen! : )
                    // explodeBomb(winner)
                    // deletegame()


            } else {
                // Niet jouw turn
                // interface veranderen --> JIJ BENT NIET AAN DE BEURT NAY
            }
        }
            }
        , 3000)


});