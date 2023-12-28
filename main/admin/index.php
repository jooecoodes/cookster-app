<?php
include '../db_conn.php';
session_start();
$userCategory = (isset($_SESSION['usercategory'])) ? $_SESSION['usercategory'] : "category is not set";
// initiate empty array for users
$userCategoryToSelect = "user";
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

if (isset($_GET['num_q'])) {
    $numOfQuestions = $_GET['num_q'];
}
if (isset($_POST['dataIndex'])) {
    $dataIndex = $_POST['dataIndex'];
    $data = $users[$dataIndex];
    echo json_encode($data);
} else if (isset($_SESSION['userId']) && $userCategory == 'admin') {
    $userId = $_SESSION['userId'];
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
        <link rel="stylesheet" href="../../styles/admin.css">
        <style>
            #articleContentForm {
                display: flex;
                flex-direction: column;
            }

            #articleQuestionForm {
                display: flex;
                flex-direction: column;
            }
        </style>
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
                        <td><button class="edit-btn" data-index="<?= $index ?>" data-userid="<?= $user['id'] ?>">Edit</button></td>
                    </tr>
                <?php $index++;
                } ?>
            </tbody>
        </table>
        <div id="modal" style="display: none;">
            Hello Test
        </div>

        <h1>Content</h1>
        <div id="content-form-wrapper">
            <form id="articleContentForm" action="upload_handler.php" method="POST">
                <label for="">Title</label>
                <input type="text" name="title-article" id="titleField">

                <label for="videoIframeField">Video Iframe to embed</label>
                <input type="text" name="video-iframe-article-container" id="videoIframeField">

                <label for="contentField">Add /n/n for the end of the paragraph</label>
                <textarea name="content-article" id="contentField" cols="30" rows="10"></textarea>

                <select name="difficulty-article" id="difficultyField">
                    <option value="easy">Easy</option>
                    <option value="normal">Normal</option>
                    <option value="hard">Hard</option>
                </select>

                <input type="hidden" name="submit-article-content-form" value="1">
                <input type="submit" value="Submit">
            </form>
        </div>

        <h1>Questions</h1>
        <div id="question-form-wrapper">
            <form action="" method="GET">
                <label for="">Number Of Questions: </label>
                <input type="number" name="num_q">
                <input type="submit">
            </form>
            <form id="articleQuestionForm" action="upload_handler.php" method="POST">
                <?php for ($i = 0; $i < $numOfQuestions; $i++) { ?>
                    <label for="questionField">Question: </label>
                    <input type="text" name="question<?= $i ?>" id="questionField">
                    <label for="choicesFied">Choices: </label>
                    <textarea name="choices<?= $i ?>" id="choicesField" cols="30" rows="10"></textarea>
                    <label for="questionField">Answer: </label>
                    <input type="text" name="answer<?= $i ?>" id="answerField">

                   
                   
                <?php } ?>
                <input type="hidden" name="num-of-questions" value="<?= $numOfQuestions ?>">
                <input type="hidden" name="submit-article-quiz-form" value="1">
                <input type="submit">
            </form>
        </div>

        <button id="logoutBttn">Log out</button>

    </body>

    </html>

<?php

} else {
    echo "You're not an admin or not registered";
}

?>