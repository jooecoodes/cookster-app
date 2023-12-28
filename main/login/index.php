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
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script>
            function onSubmit(token) {
                $("#loginForm").submit();
            }
        </script>
        <script src="login.js"></script>
        <title>Document</title>
    </head>

    <body>
        <?= $_ENV['CAPTCHA_SITE_KEY_V3']; ?>
        <form id="loginForm" action="login.php" method="post">
            <input type="text" name="email" id="email">
            <p id="emailIndicator"></p>
            <input type="password" name="password" id="password">
            <p id="passwordIndicator"></p>
            <input type="hidden" name="submit_frm" value="1">
            <button class="g-recaptcha" data-sitekey=" <?= $_ENV['CAPTCHA_SITE_KEY_V3']; ?>" data-callback='onSubmit' data-action='submit'>Submit</button>
        </form>
        <a href="../register/">Sign up</a>
    </body>

    </html>
<?php
}
?>