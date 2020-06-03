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