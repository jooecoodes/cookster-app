<?php
require_once("../db_conn.php");
session_start();

$userCategory = (isset($_SESSION['usercategory'])) ?  $_SESSION['usercategory'] : "user category not set";
$quizIndicator = 0;
if (isset($_SESSION['userId'])) {
    // take the user id

    $stmtSelectValidation = $conn->prepare("SELECT quiz_indicator FROM user WHERE id = ? ");
    $stmtSelectValidation->bind_param("i", $_SESSION['userId']);
    $stmtSelectValidation->execute();
    $result = $stmtSelectValidation->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    if (!empty($rows)) {
        foreach ($rows as $row) {
            $quizIndicator = $row['quiz_indicator'];
        }
    }


    $sqlSelectQuiz = "SELECT * FROM quiz";
    $result = mysqli_query($conn, $sqlSelectQuiz);
    $maxtime = 30;

    $dataStorer = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dataStorer[] = $row;
        }
    } else {
        echo "No quizes found";
    }


?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../../styles/style.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script defer>
            let timeLeft = <?= $maxtime ?>;
            var timer = setInterval(function() {
                $("#timer").text(`Time Left: ${timeLeft} s`)
                timeLeft--;
                $('#timeLeftField').val(timeLeft);

                if (timeLeft == 0) {
                    clearInterval(timer);
                    $('#quizForm').submit();
                }
            }, 1000);
        </script>
    </head>

    <body>
        <div class="quiz-container">
            <h1>Online Quiz</h1>
            <h1 id="timer"></h1>
            <form action="quiz.php" method="POST" id="quizForm">

                <!-- quiz part  -->

                <?php for ($i = 0; $i < count($dataStorer); $i++) : ?>
                    <div class="questions">
                        <?php
                        $choices = explode(",", $dataStorer[$i]['choices']);
                        ?>
                        <input type="hidden" name="questionId<?= $i ?>" value="<?= $dataStorer[$i]['id'] ?>">
                        <input type="hidden" name="question<?= $i ?>" value="<?= $dataStorer[$i]['question'] ?>">
                        <h2>Q<?= ($i + 1) ?></h2>
                        <p><?= $dataStorer[$i]['question'] ?></p>
                        <?php foreach ($choices as $choice) : ?>
                            <input type="radio" name="choice<?= $i ?>" class="choiceField<?= $i ?>" value="<?= $choice ?>">
                            <label for="choiceFied"><?= $choice ?></label>
                        <?php endforeach; ?>
                        <?php if ($userCategory == "admin") { ?>
                            <a href="delete_quiz.php?quizId=<?= $dataStorer[$i]['id'] ?>">Delete Quiz</a>
                        <?php } ?>
                    <?php endfor; ?>
                    <input type="hidden" name="maxTime" value="<?= $maxtime ?>">
                    <input type="hidden" name="userId" value="<?= (isset($_SESSION['userId'])) ? $_SESSION['userId'] : "no id"; ?>">
                    <input type="hidden" name="timeLeft" id="timeLeftField">
                    <input type="hidden" name="numOfQuiz" value="<?= count($dataStorer) ?>">
                    <input type="hidden" name="submit-quiz-frm" value="1">
                    <input type="submit">
                    </div>

            </form>

        </div>
    </body>

    </html>
<?php
} else {
    header("Location: ../login/");
}
