<html>
<body onload="lol()">
<h1>Etusivu aukeaa pian...</h1>
    <script>
        var timer = setTimeout(function() {
            window.location='index.php'
        }, 3000);
</script>
</html>
<?php

function is_valid_user($email, $password){

    $file = fopen("user.txt", "r");
    while (!feof($file)) {
        $row = fgetcsv($file, 0, ";");
        if ($email == $row[0]) {
            if (password_verify($password, $row[1])){
                return true;
            } else {
                return false;
            }
        break;
        }
    }
    return false;
}
?>