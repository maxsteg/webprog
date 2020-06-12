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
    $('#joinGame').on('click', function(e) {
        $('#enterCode').show();
        $('#joinGame').hide();
        $('#newGame').hide();
        e.preventDefault();
    });

    $('#gameCode').keyup(function (e) {
        validateGameCode();
        e.preventDefault();
    });

    $('#submitGameCode').on('click', function(e) {
        e.preventDefault();
        if (validateGameCode()) {
            $('#gameCode').val().toUpperCase();
            document.getElementById('joinGameForm').submit()
        }

    });
});