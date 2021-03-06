function checkPresence() {
    // Checks if both players are present
    $.post("scripts/checkpresence.php", {gamenumber: gameNumber, playernumber: playerNumber});
}

function displayTurn(status) {
    if (status === 'yourturn') {
        $('div.turn').addClass('d-none').removeClass('d-block');
        $('div.turn#your-turn').addClass('d-block').removeClass('d-none');
    } else if (status === 'notyourturn') {
        $('div.turn').addClass('d-none').removeClass('d-block');
        $('div.turn#not-your-turn').addClass('d-block').removeClass('d-none');
    }
}

function openBox(box, xcoor, ycoor) {
    $.post("scripts/openbox.php", {gamenumber: gameNumber, playernumber: playerNumber, box: box}, function (state) {
        // Returns the state of a box
        var box_id = '#' + box;
        if (state === 'bomb') {
            explodeBomb(xcoor, ycoor, "loser");
            $.post("scripts/changeturn.php", {gamenumber: gameNumber});
            game();
        } else if (state === 'hint') {
            $(box_id).css('filter', 'grayscale(100%)');
            $.post("scripts/changeturn.php", {gamenumber: gameNumber});
            game();
            showHint();
        } else if (state === 'empty') {
            $(box_id).css('filter', 'grayscale(100%)');
            $.post("scripts/changeturn.php", {gamenumber: gameNumber});
            game();
        } else if (state === 'opened') {
            game();
        }
    });
}

function explodeBomb(xcoor, ycoor, status) {
    $.post("scripts/endgame.php", {gamenumber: gameNumber});
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

function showHint() {
    $.post("scripts/gethint.php", {gamenumber: gameNumber}, function (hint) {
        $('#popUpContentHint').text(hint);
        $('#popUpHint').toggle();
        $('#backGroundFillerHint').toggle();
        $('#closePopUpHint').toggle();
    });
}

function game() {
    let id = window.setInterval(function() {
        checkPresence();

        $.post("scripts/otherspresence.php", {gamenumber: gameNumber, playernumber: playerNumber}, function(presence) {
            if (presence === "true") {
                $.post("scripts/yourturn.php", {gamenumber: gameNumber, playernumber: playerNumber}, function(yourTurn) {
                    if (yourTurn === "true") {
                        displayTurn('yourturn');
                        $.post("scripts/grayboxes.php", {gamenumber: gameNumber}, function (openedBoxes) {
                            openedBoxes = JSON.parse(openedBoxes);
                            console.log(openedBoxes);
                            var i;
                            for (i = 0; i < openedBoxes.length; i++) {
                                var box = openedBoxes[i];
                                var box_id = '#' + box;
                                $(box_id).css('filter', 'grayscale(100%)');
                            }
                        });
                        $.post("scripts/bombactive.php", {gamenumber: gameNumber}, function(bombActive) {
                            if (bombActive === 'true') {
                                clearInterval(id);
                                $('.box').unbind().on('click', function (e) {
                                    var xcoor = e.clientX;
                                    var ycoor = e.clientY;
                                    if (presence === "true" && yourTurn === "true") {
                                        yourTurn = false;
                                        openBox($(this).attr('id'), xcoor, ycoor)
                                    }
                                });
                            } else if (bombActive === 'false') {
                                var xcoor = $(window).width() / 2;
                                var ycoor = $(window).height() / 2;
                                explodeBomb(xcoor, ycoor, 'winner');
                                clearInterval(id);
                            }
                        });
                    } else {
                        displayTurn('notyourturn');
                    }
                });
            } else if (presence === "false") {
                 clearInterval(id);
                 let xcoor = $(window).width() / 2;
                 let ycoor = $(window).height() / 2;
                 explodeBomb(xcoor, ycoor, 'left');
            }
        })
    }, 2000);
}

$(function() {
    // Check if there is a second player
    let id = window.setInterval( function () {
        $.post("scripts/checksecondplayer.php", {gamenumber: gameNumber}, function(data) {
            if (data === "true") {
                clearInterval(id);
                game();
            }
        })
    }, 3000)
});