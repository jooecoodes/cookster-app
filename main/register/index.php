<?php
session_start();
require_once("../../load_env.php");
if (isset($_SESSION['userId'])) {
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../styles/css/register.css">
        <title>Document</title>
    </head>

    <body>
        <p>You're already logged in</p>
        <a href="../logout.php">Log out</a>
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
        <link rel="stylesheet" href="../../styles/css/register.css">
        <script src="register.js"></script>
        <title>Document</title>
    </head>

    <body>
        <nav>
            <div id="division-1">
                <div>
                    <img src="../../assets/logo/image-cookster-logo.jpg" alt="">
                    <p>Cookster</p>
                </div>
            </div>
            <div id="division-2">
                <div>
                    <a href="../login/">Log in</a>
                    <a href="../register/">Sign Up</a>
                </div>
            </div>

        </nav>
        <div id="form-division">
            <h1>Registration</h1>
            <form id="registrationForm">
                <input type="hidden" name="submit_frm" value="1" id="submitIdentifier">
                <div id="fullName">
                    <input type="text" name="fname" id="fname" placeholder="First Name">
                    <p id="fnameIndicator"></p>
                    <input type="text" name="lname" id="lname" placeholder="Last Name">
                    <p id="lnameIndicator"></p>
                </div>
                <div id="emailDiv">
                    <input type="text" name="email" id="email" placeholder="Email">
                    <p id="emailIndicator"></p>
                </div>
                <div id="passwordDiv">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <p id="pwdIndicator"></p>
                    <input type="password" name="confPassword" id="confpwd" placeholder="Confirm Password">
                    <p id="confPwdIndicator"></p>
                </div>
                <div id="genderSubmitDiv">
                    <div id="optional-div">

                        <label>Optional</label>
                    </div>
                    <div id="gender-division">
                        <div id="gender-option">

                            <div>
    
                                <label for="male">Male</label>
                                <input type="radio" name="gender" value="male" id="male">
                            </div>
                            <div>
    
                                <label for="female">Female</label>
                                <input type="radio" name="gender" value="female" id="female">
                            </div>
                        </div>
                    </div>
                    <div id="recaptcha">
                        <div class="g-recaptcha" data-sitekey="<?= $_ENV['CAPTCHA_SITE_KEY_V2'] ?>"></div>
                    </div>
                    
                        <div id="submit-bttn-div">
                            <input type="submit" name="submit" id="submitBttn">
                        </div>

                </div>

            </form>
        </div>

        <a href="../login/">Log in</a>

    </body>

    </html>



<?php


}
?>