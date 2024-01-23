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
        <title>Log in</title>
        <link rel="stylesheet" href="../../styles/css/login.css">
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
        <title>Log in</title>
        <link rel="stylesheet" href="../../styles/css/login.css">
        <script>
            function onSubmit(token) {
                $("#loginForm").submit();
            }
        </script>
        <script src="login.js"></script>
        <title>Sign in</title>
    </head>

    <body>
        <header>
            <?php
            include "../components/nav.php";
            ?>
        </header>
        <main>
            <form id="loginForm" action="login.php" method="post">
                <h1>Sign in to your account</h1>
                <div id="line-flexer">
                    <div class="line-dash line-top"></div>
                </div>
                <div class="left-flexer">
                    <label for="email">Email:</label>
                </div>
                <input type="text" name="email" id="email">
                <p id="emailIndicator"></p>

                <div class="left-flexer">
                    <label for="email">Password:</label>
                </div>
                <input type="password" name="password" id="password">
                <p id="passwordIndicator"></p>



                <input type="hidden" name="submit_frm" value="1">
                <div id="line-flexer">
                    <div class="line-dash line-bottom-1"></div>
                    <label for="">Don't have an account?</label>
                    <div class="line-dash line-bottom-2"></div>
                </div>



                <a href="../register/">Sign up</a>
                <button class="g-recaptcha" data-sitekey=" <?= $_ENV['CAPTCHA_SITE_KEY_V3']; ?>" data-callback='onSubmit' data-action='submit'>Submit</button>
            </form>
        </main>
        <footer>

        </footer>


    </body>

    </html>
<?php
}
?>