<?php
session_start();
include '../db_conn.php';

// handle request

// uname
if (isset($_POST['hiddenUname'])) {
    $newUname = (isset($_POST['uname'])) ? $_POST['uname'] : 'uname not set';
    $userId   = (isset($_SESSION['userId'])) ? $_SESSION['userId'] : 'user id not set';
    $pwd      = (isset($_POST['pwd'])) ? $_POST['pwd'] : 'pwd is not set';
    $stmt     = $conn->prepare("SELECT userpassword FROM user WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();

    // check result
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        //conf pwd
        if ($pwd == $row['userpassword']) {
            changeUname($conn, $userId, $newUname);
        } else {
            echo "Password error";
        }
    }
}

// pwd
if (isset($_POST['hiddenPwd'])) {
    $newPwd  = (isset($_POST['newpwd'])) ? $_POST['newpwd'] : 'password not set';
    $confPwd = (isset($_POST['confpwd'])) ? $_POST['confpwd'] : 'confpwd not set';
    $userId  = (isset($_SESSION['userId'])) ? $_SESSION['userId'] : 'user id not set';
    $pwd     = (isset($_POST['pwd'])) ? $_POST['pwd'] : 'pwd is not set';
    $stmt    = $conn->prepare("SELECT userpassword FROM user WHERE id = ? ");
    $stmt->bind_param("i", $userId);
    $stmt->execute();

    // check result
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        //conf pwd
        if ($newPwd == $confPwd) {
            if ($pwd == $row['userpassword']) {
                changePwd($conn, $userId, $newPwd);
            } else {
                echo "Password error";
            }
        } else {
            echo "Password doesn't match";
        }
    }
}

// fname
if (isset($_POST['hiddenFname'])) {
    $newFname = (isset($_POST['newfname'])) ? $_POST['newfname'] : 'new fname not set';
    $userId   = (isset($_SESSION['userId'])) ? $_SESSION['userId'] :  ' id not set';
    $pwd      = (isset($_POST['pwd'])) ? $_POST['pwd'] : 'pwd is not set';
    $stmt     = $conn->prepare("SELECT userpassword FROM user WHERE id = ? ");
    $stmt->bind_param("i", $userId);
    $stmt->execute();

    // check result
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        //conf pwd
        if ($pwd == $row['userpassword']) {
            changeFname($conn, $userId, $newFname);
        } else {
            echo "Password error";
        }
    }
}

//lname 
if (isset($_POST['hiddenLname'])) {
    $newLname = (isset($_POST['newlname'])) ? $_POST['newlname'] : 'new lname not set';
    $userId   = (isset($_SESSION['userId'])) ? $_SESSION['userId'] :  ' id not set';
    $pwd      = (isset($_POST['pwd'])) ? $_POST['pwd'] : 'pwd is not set';
    $stmt     = $conn->prepare("SELECT userpassword FROM user WHERE id = ? ");
    $stmt->bind_param("i", $userId);
    $stmt->execute();

    // check result
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        //conf pwd
        if ($pwd == $row['userpassword']) {
            changeLname($conn, $userId, $newLname);
        } else {
            echo "Password error";
        }
    }
}




// edit uname
function changeUname($conn, $userId, $newUname)
{
    $stmt = $conn->prepare("UPDATE user SET username = ? WHERE id = ?");
    $stmt->bind_param("si", $newUname, $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Successfully edited uname'";
    } else {
        echo "No rows found";
    }
}
// edit pwd
function changePwd($conn, $userId, $newPwd)
{
    $stmt = $conn->prepare("UPDATE user SET userpassword = ? WHERE id = ?");
    $stmt->bind_param("si", $newPwd, $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Successfully edited pwd";
    } else {
        echo "No rows found";
    }
}

// edit pfp
function changePfp($conn, $userId, $newPfp)
{
    $stmt = $conn->prepare("UPDATE user SET userprofile = ? WHERE id = ?");
    $stmt->bind_param("si", $newPfp, $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Successfully edited pfp";
    } else {
        echo "No rows found";
    }
}

// change fname
function changeFname($conn, $userId, $newFname)
{
    $stmt = $conn->prepare("UPDATE user SET fname = ? WHERE id = ?");
    $stmt->bind_param("si", $newFname, $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Successfully edited fname";
    } else {
        echo "No rows found";
    }
}

// change lname
function changeLname($conn, $userId, $newLname)
{
    $stmt = $conn->prepare("UPDATE user SET fname = ? WHERE id = ?");
    $stmt->bind_param("si", $newLname, $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Successfully edited lname";
    } else {
        echo "No rows found";
    }
}
