<?php 
    session_start();
    if(isset($_SESSION['userId'])){
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script>
                $(document).ready(() => {
                    $("#logoutBttn").on("click", () => {
                        $.ajax({
                            type: "POST",
                            url: "../logout.php",
                            data: {},
                            success: function(response) {                            
                            location.reload();
                            console.log("user logged out");
                                            
                            },
                            error: function(error) {
                
                            console.error("Error:", error);
                
                            },
                        })
                
                    })
                    
                })
            </script>
            <title>Document</title>
        </head>
        <body>
            <p>You\'re already logged in</p>
            <button id="logoutBttn">Log out</button>
        </body>
        </html>
        
        ';
        
    } else {

        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script src="register.js"></script>
            <title>Document</title>
        </head>
        <body>
            <form id="registrationForm">
                <div class="fullName">
                    <input type="text" name="fname" id="fname" placeholder="First Name">
                    <p id="fnameIndicator"></p>
                    <input type="text" name="lname" id="lname" placeholder="Last Name">
                    <p id="lnameIndicator"></p>
                </div>
                <div class="emailDiv">
                    <input type="text" name="email" id="email" placeholder="Email">
                    <p id="emailIndicator"></p>
                </div>
                <div class="passwordDiv">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <p id="pwdIndicator"></p>
                    <input type="password" name="confPassword" id="confpwd" placeholder="Confirm Password">
                    <p id="confPwdIndicator"></p>
                </div>
                <label>Optional</label>
               
                
                    <label for="male">Male</label>
                    <input type="radio" name="gender" value="male" id="male">
                    <label for="female">Female</label>
                    <input type="radio" name="gender" value="female" id="female">
                
          

                <input type="submit" name="submit" id="submitBttn">
                
            </form>
            <a href="../login/">Log in</a>
            
        </body>
        </html>
        ';
            
        
        

    }
?>

