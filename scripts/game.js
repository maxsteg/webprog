// let test = $.post("scripts/otherspresence.php", {gamenumber: gameNumber, playernumber: playerNumber});
// test.done(function ( data ) {
//     console.log(JSON.parse(data)[0]);
//
// });
// Bovenstaande voor iedereen handig..

function checkSecondPlayer() {
    $.post("scripts/checksecondplayer.php", {gamenumber: gameNumber});
}

function checkPresence() {
    $.post("scripts/checkpresence.php", {gamenumber: gameNumber, playernumber: playerNumber});
    }

function checkOthersPresence() {


}

function openBox(box) {
    $.post("scripts/openbox.php", {gamenumber: gameNumber, playernumber: playerNumber, box: box}, function(data){
        $state = data;
    })
    return $state;
}

function explodeBomb() {
    // background a color (circle animation)
    // delete alle images
    // slidein You are the winner/loser
    // slideIn buttons
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

    var yourTurn = true;

    window.setInterval(function () {
        if (startGame) {
            console.log('hoi');
            yourTurn = yourTurn();
            if (checkOthersPresence()) {
                // end game
                // deletegame
                // }
            }
        }

        $('img').unbind().on('click', function (e) {
            if (startGame && yourTurn()) {
                // checkPresence();
                // if (checkOthersPresence()) {
                //     // end game
                //     // deletegame
                // }
                // }, 3000);
                console.log('test');
                if (openBox() == "opened"):
                    // IS AL GEOPEND
                else if (openBox() == "empty"):
                    changeTurn();
                else if (openBox() == "bomb"):
                    explodeBomb("loser");
                    changeTurn();
                else if (openBox() == "hint"):
                    showHint();
                    changeTurn();
            }
        });

    }, 3000);


        // window.setInterval(function() {
        //
        // }, 3000)


            // if (yourTurn()) {
                // Check last_opened box:
                // If last_opened_box == bomb:
                    // explodeBomb
                    // end game
                    // winner
                // else: (dus geen bom)
                    // change last_opened_box into opened box (grijs):
                    // interface veranderen --> JIJ BENT AAN DE BEURT YAY
                    // box = $('img').on('click', function() {
                        // krijg het id
                        // openBox(id)
                            // check of het nog gesloten, zo niet doe je niks
                            // open box --> return of het normale box is, hint of bom
                            // change properties of box (close == false)
                            // maak box grijs
                    // )}
                    // if box = bom:
                        // explodeBomb(loser)
                        // end game
                        // loser
                    // else if box = hint:
                        // show hint
                // changeTurn() --> which will make yourTurn false
                // call php function --> endgame.php
                // if box = hint:
                // pop-up met de hint
                // aanpassen in json dat het niet meer jouw beurt is
                // })
                // else (bom niet intact --> jij hebt gewonnen! : )
                // explodeBomb(winner)
                // deletegame()


                // } else {
                // Niet jouw turn
                // interface veranderen --> JIJ BENT NIET AAN DE BEURT NAY
                // }
            // }
});