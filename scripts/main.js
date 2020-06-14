function validateGameCode() {
    // Validates Game Code entered by user.
    let codeVal = $('#gameCode').val();
    let codeRegex = "^[a-zA-Z0-9]+$";
    if (codeVal.match(codeRegex) && codeVal.length == 6) {
        ($('#gameCode').removeClass('is-invalid')).addClass('is-valid');
        return true;
    } else {
        ($('#gameCode').removeClass('is-valid')).addClass('is-invalid');
        return false;
    }
}


$(function() {
    // Toggles field to join a game using a game code
    $('#joinGame').on('click', function(e) {
        $('#enterCode').show();
        $('#joinGame').hide();
        $('#newGame').hide();
        $('#homeButtons').css('height', '255px');
        e.preventDefault();
    });

    $('#backButton').on('click', function(e) {
        $('#enterCode').hide();
        $('#joinGame').show();
        $('#newGame').show();
        $('#homeButtons').css('height', '135px');
        e.preventDefault();
    });

    // Validates game code entered by user after every key.
    $('#gameCode').keyup(function (e) {
        validateGameCode();
        e.preventDefault();
    });

    // Submits game code to join the game that corresponds the game code.
    $('#submitGameCode').on('click', function(e) {
        e.preventDefault();
        if (validateGameCode()) {
            $('#gameCode').val().toUpperCase();
            document.getElementById('joinGameForm').submit()
        }
    });

    // Toggles pop ups, like the explanation pop up.
    $('.helpButton').on('click', function() {
        $('#popUpHelp').toggle();
        $('#backGroundFillerHelp').toggle();
        $('#closePopUpHelp').toggle();
    });

    $('#closePopUpHelp').on('click', function() {
        $('#popUpHelp').toggle();
        $('#backGroundFillerHelp').toggle();
        $('#closePopUpHelp').toggle();
    });

    $('#closePopUpHint').on('click', function() {
        $('#popUpHint').toggle();
        $('#backGroundFillerHint').toggle();
        $('#closePopUpHint').toggle();
    });
});