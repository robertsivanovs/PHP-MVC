<?php
$config = new Config();
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
    <div class="container">
        <div class="box--blue">
            <h1>Don't have an account?</h1>
            <span>
                <!-- Blue line under h1 title -->
            </span>
            <p>Lorem Ipsum is simply dummy text
of the printing and typesetting industry.
Lorem Ipsum has been the industry's standard
dummy text ever since the 1500s,when
an unknown printer took a galley of type
and scrambled it to make a type specimen book. </p>
            <button class="box__button" onclick='fadeOut("box-login--white"); fadeIn("box-signup--white");'>SIGN UP</button>
        </div>
        <div class="box-second--blue">
            <h1>Have an account?</h1>
            <span>
                <!-- Blue line under h1 title -->
            </span>
            <p>Lorem ipsum dolor sit amet consecutor
adipisicng ellt.</p>
            <button class="box-second__button" onclick="fadeOut('box-signup--white'); fadeIn('box-login--white');">LOGIN</button>
        </div>
        <div class="box-login--white">
            <h1>Login</h1>
            <img class="box-login__icon-magebit" src="images/magebit.jpg">
            <span>
                <!-- Blue line under h1 title -->
            </span>
            <form action="<?= $config::ROOT_DIRECTORY; ?>login/" method="POST">
                <label class="box-login__label-email">Email<font color="red">*</font></label>
                <input class="box-login__input-email" type="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="box-login__input-email" size="37">
                <img class="box-login__icon-active-email" src="images/email_colored.ico">
                <img class="box-login__icon-inactive-email" src="images/email.ico">
                <label class="box-login__label-password"> Password<font color="red">*</font></label>
                <input class="box-login__input-password" type="password" required pattern="^[a-zA-Z0-9][a-zA-Z0-9-_\.]{4,}$" title="Min: 5 Symbols, only A-z , 0-9" name="box-login__input-password" size="37">
                <img class="box-login__icon-active-password" src="images/pwd_colored.ico">
                <img class="box-login__icon-inactive-password" src="images/pwd.ico">
                <input type="submit" name="box-login__button" Value="LOGIN">
                <label class="box-login__label-forgot">Forgot?</label>
            </form>
        </div>
        <div class="box-signup--white">
            <h1>Sign Up</h1>
            <span>
                <!-- Blue line under h1 title -->
            </span>
            <img class="box-signup__icon-magebit" src="images/magebit.jpg">
            <form name="signup" action="<?= $config::ROOT_DIRECTORY; ?>register/" method="POST">
                <label class="box-signup__label-name">Name<font color="red">*</font>
                    </font></label>
                <input type="text" class="box-signup__input-name" required pattern="^[a-zA-Z0-9][a-zA-Z0-9-_\.]{4,}$" title="Min: 5 Symbols, only A-z , 0-9" name="box-signup__input-name" size="37">
                <img class="box-signup__icon-active-name" src="images/cuvaks2.ico">
                <img class="box-signup__icon-inactive-name" src="images/cuvaks.ico">
                <label class="box-signup__label-email">Email<font color="red">*</font></label>
                <input type="email" class="box-signup__input-email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="box-signup__input-email" size="37">
                <img class="box-signup__icon-active-email" src="images/email_colored.ico">
                <img class="box-signup__icon-inactive-email" src="images/email.ico">
                <label class="box-signup__label-password">Password<font color="red">*</font></label>
                <input type="password" class="box-signup__input-password" required pattern="^[a-zA-Z0-9][a-zA-Z0-9-_\.]{4,}$" title="Min: 5 Symbols, only A-z , 0-9" name="box-signup__input-password" size="37">
                <img class="box-signup__icon-active-password" src="images/pwd_colored.ico">
                <img class="box-signup__icon-inactive-password" src="images/pwd.ico">
                <input type="submit" name="box-signup__button" Value="SIGN UP">
            </form>
        </div>
    </div>
    <script src="JS/script.js">
        async
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
        async
    </script>
    <script>
        $(document).ready(function() {
            $(".box__button").click(function() {
                $('.box-login--white').animate({
                    'marginLeft': "-=430px"
                });
            });
        });
        $(document).ready(function() {
            $(".box-second__button").click(function() {
                $('.box-signup--white').animate({
                    'marginLeft': "+=430px"
                });
                $('.box-login--white').animate({
                    'marginLeft': "+=430px"
                });
                document.getElementsByClassName("box-signup--white")[0].style.display = 'none';
                $('.box-signup--white').animate({
                    'marginLeft': "-=430px"
                });
            });
        });
    </script>
</body>

</html>