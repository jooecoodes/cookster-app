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
            $_SESSION['userQuizIndicator'] = $row['quiz_indicator'];
        }
    }

    if ($quizIndicator == 1) {
        $sqlSelectQuiz = "SELECT * FROM quiz";
        $result = mysqli_query($conn, $sqlSelectQuiz);
        $maxTimeInSeconds = 180;


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
            <link rel="stylesheet" href="../../styles/css/quiz.css">
            <script defer>
                let quizStarted = true;
                let timeLeft = <?= isset($_SESSION['quizTimer']) ? $_SESSION['quizTimer'] : $maxTimeInSeconds ?>;
                var timer = setInterval(function() {
                    $("#timer").text(`Time Left: ${timeLeft} s`)
                    timeLeft--;
                    
                    $.ajax({
                        type: "POST",
                        url: "update_timer_session.php",
                        data: {timeLeft: timeLeft},
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(error) {
                            console.error(error);
                        }
                    });
                    $('#timeLeftField').val(timeLeft);

                    if (timeLeft == 0) {
                        clearInterval(timer);
                        $('#quizForm').submit();
                    }
                    
                }, 1000);
            </script>

        </head>

        <body>
            <header>
                <?php include "../components/logged-in-nav.php" ?>
            </header>
            <main>
                <div id="quiz-container">
                    <div id="upper-title-part-quiz">
                        <h1>Online Quiz</h1>
                        <h1 id="timer"></h1>
                    </div>
                    <div id="centerer">

                        <div id="quiz-form-container">

                            <form action="quiz.php" method="POST" id="quizForm">

                                <!-- quiz part  -->

                                <?php for ($i = 0; $i < count($dataStorer); $i++) : ?>
                                    <div class="questions">
                                        <?php
                                        $choices = explode(",", $dataStorer[$i]['choices']);
                                        ?>
                                        <input type="hidden" name="questionId<?= $i ?>" value="<?= $dataStorer[$i]['id'] ?>">
                                        <input type="hidden" name="question<?= $i ?>" value="<?= $dataStorer[$i]['question'] ?>">
                                        <div id="question-part">
                                            <h2>Q<?= ($i + 1) ?></h2>
                                            <p><?= $dataStorer[$i]['question'] ?></p>
                                        </div>

                                        <div id="choices-part">
                                            <?php foreach ($choices as $choice) : ?>
                                                <div id="choices">

                                                    <input type="radio" name="choice<?= $i ?>" class="choiceField<?= $i ?>" value="<?= $choice ?>">
                                                    <label for="choiceFied"><?= $choice ?></label>
                                                </div>
                                            <?php endforeach; ?>
                                            <?php if ($userCategory == "admin") { ?>
                                                <a href="delete_quiz.php?quizId=<?= $dataStorer[$i]['id'] ?>">Delete Quiz</a>
                                            <?php } ?>
                                        </div>
                                    <?php endfor; ?>
                                    <input type="hidden" name="maxTime" value="<?= $maxTimeInSeconds ?>">
                                    <input type="hidden" name="userId" value="<?= (isset($_SESSION['userId'])) ? $_SESSION['userId'] : "no id"; ?>">
                                    <input type="hidden" name="timeLeft" id="timeLeftField">
                                    <input type="hidden" name="numOfQuiz" value="<?= count($dataStorer) ?>">
                                    <input type="hidden" name="submit-quiz-frm" value="1">
                                    <div id="submit-bttn-quiz">
                                        <input type="submit" id="submitBttn">
                                    </div>

                                    </div>
                            </form>
                        </div>
                    </div>

                </div>
            </main>
        </body>

        </html>
<?php
    } else {
        header("Location: ../profile/");
      
    }
} else {
    header("Location: ../login/");
}
