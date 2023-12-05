<?php
include '../db_conn.php';
session_start();
$userCategory = (isset($_SESSION['usercategory'])) ? $_SESSION['usercategory'] : "category is not set";
//check if admin
if (isset($_SESSION['userId']) && $userCategory == 'admin') {
    $userCategoryToSelect = "user";
    $userId = $_SESSION['userId'];
    // initiate empty array for users
    $users = array();
    // selects all users
    $stmt    = $conn->prepare("SELECT * FROM user WHERE usercategory = ?");
    $stmt->bind_param("s", $userCategoryToSelect);
    $stmt->execute();

    // check result
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        array_push($users, $row);
    }

    // close conn
    $conn->close();

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="chart.js" defer></script>
        <script src="admin.js" defer></script>
        <title>Document</title>
    </head>

    <body>
        <canvas id="chart-canvas"></canvas>
        <table id="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Date of Registration</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // loop through users
                $index = 0;
                foreach ($users as $user) { 
             

                    ?>
                    
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['userprofile'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td> <?= $user['useremail'] ?></td>
                        <td><?= $user['fname'] ?></td>
                        <td><?= $user['lname'] ?></td>
                        <td><?= $user['gender'] ?></td>
                        <td><?= $user['dateregistration'] ?></td>
                        <td><button class="edit-btn" data-index="<?= $index?>" data-userid="<?= $user['id'] ?>">Edit</button></td>
                    </tr>
                <?php $index++; } ?>
            </tbody>
        </table>
        <div id="modal" style="display: none;">
                Hello Test
        </div>


        <button id="logoutBttn">Log out</button>

    </body>

    </html>

<?php


    //handle additional requests from client
    if(isset($_POST['getData'], $_POST['dataIndex']) && $_POST['getData'] == "success" ) {
        $dataIndex = $_POST['dataIndex'];
        echo json_encode($users[$dataIndex]);
    }
} else {
    echo "You're not an admin or not registered";
}

?>