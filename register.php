<?php
include 'config.php';

if (isset($_POST["register"])) {
    register($_POST);
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
            <input id="tab-1" type="radio" name="tab" class="sign-in"><label for="tab-1" class="tab"><a href="login.php">Log In</a></label>
            <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Register</label>
            <form action="" method="post" class="login-form">
                <div class="sign-up-htm">
                    <div class="group">
                        <label for="user" class="label">Nama</label>
                        <input id="user" type="text" class="input" name="nama">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">No-Telpon</label>
                        <input id="pass" type="text" class="input" data-type="email" name="nomortlp">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Email</label>
                        <input id="pass" type="email" class="input" data-type="email" name="email_reg">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input" data-type="password" name="password_reg">
                    </div>
                    <input type="hidden" name="level" value="user">
                    <div class="group">
                        <input type="submit" class="button" name="register">
                    </div>
                    <div class="hr"></div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>