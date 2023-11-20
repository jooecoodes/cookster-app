<?php 
    session_start();
    
    if(isset($_SESSION['userId'])) {

        echo $_SESSION['userId'];   
        ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                </head>
                <body>
                    <header>
                        <img src="" alt="">
                        <div class="login-signup">
                            <p>User is logged in</p>
                            
                        </div>

                    </header>
                </body>
                </html>

    <?php 
    
    }  else {

        ?>  
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                <header>
                    <img src="" alt="">
                    <div class="login-signup">
                        <a href="../login/">Log in</a>
                        <a href="../register/">Sign up</a>
                    </div>

                </header>
            </body>
            </html>


        <?php 
    }

?>