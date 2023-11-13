<?php 
    include "../login_checker.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="profile.js"></script>
    <title>Document</title>
</head>
<body>
    <p>Hello, This is the profile page</p>
    <form id="uploadForm" enctype="multipart/form-data">
        <input type="file" name="profile" id="profile">
        <input type="submit" id="submitBttn" value="Submit">
    </form>
</body>
</html>