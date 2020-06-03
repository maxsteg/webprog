// function generateCode() {
//     // Generates a game code
//     $possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"
//     $code = '';
//     for (i = 0; i < 6; i++) {
//         $num = Math.floor(Math.random() * 36);
//         $code += $possible[$num];
//     }
//     // Add check to see if code already exists?
//     return $code
// }

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
        $('#startGameButtons').hide();
        e.preventDefault();
    });

    $('#gameCode').keyup(function (e) {
        validateGameCode();
        e.preventDefault();
    });

    $('#submitGameCode').on('click', function(e) {
        if (validateGameCode()) {
            $('#gameCode').val().toUpperCase();
            $('form').trigger("submit");
            // $.post("scripts/joingame.php", {game_number: gameCode});
        }
        e.preventDefault();
    });
});