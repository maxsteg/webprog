function generateCode() {
    // Generates a game code
    $possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"
    $code = '';
    for (i = 0; i < 6; i++) {
        $num = Math.floor(Math.random() * 36);
        $code += $possible[$num];
    }
    // Add check to see if code already exists?
    return $code
}

function validateGameCode() {
    let codeVal = $('#gameCode').val();
    let codeRegex = "[a-zA-Z0-9]+";
    if (codeVal.match(codeRegex) && codeVal.length == 6) {
        ($('#gameCode').removeClass('is-invalid')).addClass('is-valid');
        return true;
    } else {
        ($('#gameCode').removeClass('is-valid')).addClass('is-invalid');
        return false;
    }
}


$(function() {
    $('#newGame').on('click', function() {
        var gameCode = generateCode();
        alert(gameCode);
        event.preventDefault();
    });

    $('#joinGame').on('click', function() {
        $('#enterCode').show();
        $('#startGameButtons').hide();
        event.preventDefault();
    });

    $('#gameCode').keyup(function () {
        validateGameCode();
        event.preventDefault();
    });

    $('#submitGameCode').on('click', function() {
        if (validateGameCode()) {
            var gameCode = $('#gameCode').val().toUpperCase();
            alert(gameCode);
        };
        event.preventDefault();
    });
});