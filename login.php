<?php
include 'config.php';

if (isset($_POST["login"])) {
    login($_POST);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>login</title>
</head>

<body>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Log In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"><a href="register.php">Register</a></label>
            <form action="" method="post" class="login-form">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="user" class="label">Email</label>
                        <input id="user" type="email" class="input" name="email">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input" data-type="password" name="password">
                    </div>
                    <div class="group">
                        <input type="submit" class="button" name="login">
                    </div>
                    <div class="hr"></div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>