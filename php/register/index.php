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
        <div class="emailDiv">
             <input type="text" name="email" id="email" placeholder="email">
             <p id="emailIndicator"></p>
        </div>
        <div class="passwordDiv">
            <input type="password" name="password" id="password" placeholder="password">
            <p id="pwdIndicator"></p>
            <input type="password" name="confPassword" id="confpwd" placeholder="confirm password">
            <p id="confPwdIndicator"></p>
        </div>
        <input type="submit" id="submitBttn">
    </form>
    
</body>
</html>