<?php
session_start();
include '../db_conn.php';

// handle requests
if (isset($_POST['unameField'])) {
    $newUname = $_POST['unameField'];
    $userId = (isset($_POST['userId'])) ? $_POST['userId'] : 'user id not set';

    changeUname($conn, $userId, $newUname);
}
if (isset($_POST['emailField'])) {
    $newEmail = $_POST['emailField'];
    $userId = (isset($_POST['userId'])) ? $_POST['userId'] : 'user id not set';

    changeEmail($conn, $userId, $newEmail);
}
if (isset($_POST['pwdField'])) {
    $newPwd = $_POST['pwdField'];
    $userId = (isset($_POST['userId'])) ? $_POST['userId'] : 'user id not set';

    changePwd($conn, $userId, $newPwd);
}
if (isset($_POST['fnameField'])) {
    $newFname = $_POST['fnameField'];
    $userId = (isset($_POST['userId'])) ? $_POST['userId'] : 'user id not set';

    changeFname($conn, $userId, $newFname);
}
if (isset($_POST['lnameField'])) {
    $newLname = $_POST['lnameField'];
    $userId = (isset($_POST['userId'])) ? $_POST['userId'] : 'user id not set';

    changeLname($conn, $userId, $newLname);
}



// edit uname
function changeUname($conn, $userId, $newUname)
{
    $stmt   = $conn->prepare("UPDATE user SET username = ? WHERE id = ?");
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
function changeEmail($conn, $userId, $newEmail)
{
    $stmt = $conn->prepare("UPDATE user SET useremail = ? WHERE id = ?");
    $stmt->bind_param("si", $newEmail, $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Successfully edited email";
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

// edit fname
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

// edit lname
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

//delete

function deleteUser($conn, $userId)
{
    $stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Successfully deleted user";
    } else {
        echo "No rows found";
    }
}
