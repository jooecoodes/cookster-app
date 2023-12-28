<?php 
    session_start();
        if(isset($_SESSION['userId'])){
            
        ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <p> User is already logged in </p>
    </body>
    </html>

    <?php
    } else {
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <script src="login.js"></script>
            <title>Document</title>
        </head>
        <body>
            <form id="loginForm" method="post">
                <input type="text" name="email" id="email">
                <p id="emailIndicator"></p>
                <input type="password" name="password" id="password">
                <p id="passwordIndicator"></p>
                <div class="g-recaptcha" data-sitekey="6LfEiSIpAAAAAFKQy5YbTK7vMqMMOVbrMQMM64sr"></div>
                <input type="submit" name="submit" id="submitBttn">
            </form>
            <a href="../register/">Sign up</a>
        </body>
        </html>
    <?php
    }
?>

