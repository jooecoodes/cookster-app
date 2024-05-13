<?php
session_start();
require_once("../../load_env.php");
if (isset($_SESSION['userId'])) {
        header("Location: ../index.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
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

        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    </body>

    </html>
<?php
}
?>