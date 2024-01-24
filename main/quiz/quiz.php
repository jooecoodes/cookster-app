<?php
require_once("../db_conn.php");
session_start();
session_regenerate_id();
header('Content-Type: text/html; charset=utf-8');

$userCategory = (isset($_SESSION['usercategory'])) ?  $_SESSION['usercategory'] : "user category not set";
$userId = (isset($_SESSION['userId'])) ? $_SESSION['userId'] : "user id not set";

// select validator from database
$quizIndicator = 0;
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
if (isset($_POST['submit-quiz-frm']) && $quizIndicator == 1) {
	$pastPoints = $_SESSION['userPoints'];
	$numOfQuestions = (isset($_POST['numOfQuiz'])) ? $_POST['numOfQuiz'] : "num of questions not set";
	// var_dump($dataStorer);
?>

	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../../styles/css/quiz-result.css">
		<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

		<script>
			$(document).ready(function() {
				$('#playAgainBttn').on('click', () => {
					window.location.href = '.';
				})
			})
		</script>
	</head>

	<body>
		<main>

			<div id="quiz-container">
				<h1 id="quiz-result-title">Quiz Results</h1>
				<div id="center-quiz-result">

					<div id="centerer-with-width-for-quiz-result">

						<div id="quiz-result-container">

							<?php
							$score = 0;

							?>

							<?php for ($i = 0; $i < $numOfQuestions; $i++) : ?>
								<?php
								$choice = (isset($_POST["choice{$i}"])) ?  $_POST["choice{$i}"] : "No answer";
								$questionId = $_POST["questionId{$i}"];
								$sqlSelectQuiz = "SELECT * FROM quiz WHERE id='$questionId'";
								$results = mysqli_query($conn, $sqlSelectQuiz);

								$dataStorer = [];
								if (mysqli_num_rows($results)) {
									while ($row = mysqli_fetch_assoc($results)) {
										$dataStorer[] = $row;
									}
								}

								?>

								<h1>Q<?= $i ?></h1>
								<p><?= $_POST["question{$i}"] ?></p>

								<div id="result-show">
									<?php if (!isset($_POST["choice{$i}"])) { ?>
										<img src="../../assets/question.png" alt="question-mark">
										<p>No answer </p>
										<img src="../../assets/correct.png" alt="correct-mark">
										<p><?= $dataStorer[0]["answer"] ?></p>
									<?php } else if (trim($dataStorer[0]["answer"]) == trim($choice)) { ?>
										<?php $score++; ?>
										<img src="../../assets/checked.png" alt="correct-mark">
										<p><?= $choice ?></p>
										<img src="../../assets/correct.png" alt="correct-mark">
										<p><?= $dataStorer[0]["answer"] ?></p>
									<?php } else { ?>
										<img src="../../assets/cross.png" alt="cross-mark">
										<p> <?= $choice ?></p>
										<img src="../../assets/correct.png" alt="correct-mark">
										<p> <?= $dataStorer[0]["answer"] ?></p>
									<?php } ?>
								</div>


							<?php endfor; ?>

							<?php

							// indicator part 

							if (isset($_POST['unfinished'])) {
								echo "<p>Your time is up!</p>";
							}
							echo "<p>Your corrects: $score / $numOfQuestions </p>";

							$pointsPerQuestion = 20;
							$pointsFromQuiz = (($score * $pointsPerQuestion));
							$userOverallPoints = $pastPoints + $pointsFromQuiz;
							$perfectScore = ($numOfQuestions * $pointsPerQuestion);

							// update points in the database
							$stmt = $conn->prepare("UPDATE user SET points = ? WHERE id = ? ");
							$stmt->bind_param("ii", $userOverallPoints, $_POST['userId']);
							$result = $stmt->execute();
							if ($result) {
							} else {
								echo "Data update failed";
								die;
							}

							echo "<p> Your score is: $pointsFromQuiz </p> <br>";

							echo "<p> Perfect score $perfectScore </p>";
							//update user points in the session 
							$_SESSION['userPoints'] = $userOverallPoints;

							if ($pointsFromQuiz >= $perfectScore) {
								$additionalPoints = 10000;
								$userOverallPointsWAddtional = $additionalPoints + $userOverallPoints;
								// update points in the database
								$stmt = $conn->prepare("UPDATE user SET points = ? WHERE id = ? ");
								$stmt->bind_param("ii", $userOverallPointsWAddtional, $_POST['userId']);
								$result = $stmt->execute();
								if ($result) {
								} else {
									echo "Data update failed";
									die;
								}
							?>
								<p>You have earned a certificate</p>
								<p>You gained additional 10000 points</p>
								<a href="../certificate/">Get certificate</a>
								<?php
								$_SESSION['userCertEligible'] = 1;

								// update and add completion badge
								$badgeCompletion = ",completion-badge";
							
								$sqlUpdateCompBadge = "UPDATE user SET badges = CONCAT(badges, ?) WHERE id = ?";
								$stmtUpdateCompBadge = $conn->prepare($sqlUpdateCompBadge);
								$stmtUpdateCompBadge->bind_param("si", $badgeCompletion, $userId);
								$stmtUpdateCompBadge->execute();

								if (!$stmtUpdateCompBadge->affected_rows > 0) {
									echo "Failed to add badge";
								}
								?>
							<?php
							} else {
							?>
								<p>You did not get the certificate, better luck next week</p>
							<?php
							}

							?>


							<a href="../profile/">Go back to profile</a>


						</div>
					</div>
				</div>
			</div>
		</main>

	</body>

	</html>
<?php

	//update quiz indicator and date

	$currentDate = new DateTime();
	$currentDateString = $currentDate->format('Y-m-d');
	$currentDateForEUD = $currentDate->add(new DateInterval('P1W'));
	$expectedUpdateDate = $currentDateForEUD->format('Y-m-d');

	$sqlUpdateQI = "UPDATE user SET quiz_indicator = 0, last_update_qi = ?, expected_update_qi = ? WHERE id = ?";
	$stmtUpdateQI = $conn->prepare($sqlUpdateQI);
	$stmtUpdateQI->bind_param("ssi", $currentDateString, $expectedUpdateDate, $userId);
	$stmtUpdateQI->execute();

	if (!$stmtUpdateQI->affected_rows > 0) {
		echo "Failed to edit QI";
	}
} else {
	echo "You can't just skip like that, please finish the quiz first";
}
