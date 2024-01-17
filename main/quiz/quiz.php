<?php
require_once("../db_conn.php");
session_start();
session_regenerate_id();
header('Content-Type: text/html; charset=utf-8');

$userCategory = (isset( $_SESSION['usercategory'])) ?  $_SESSION['usercategory'] : "user category not set";

if (isset($_POST['submit-quiz-frm'])) {
	$pastPoints = $_SESSION['userPoints'];
	$numOfQuestions = (isset($_POST['numOfQuiz'])) ? $_POST['numOfQuiz'] : "num of questions not set";
	var_dump($_POST);
	// var_dump($dataStorer);
?>

	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../../styles/style.css">
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
		<div class="quiz-container">
			<h1>Quiz Results</h1>

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

				var_dump($dataStorer);
				?>

				<h1>Q<?= $i ?></h1>
				<p><?= $_POST["question{$i}"] ?></p>

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

			<?php endfor; ?>

			<?php


			if (isset($_POST['unfinished'])) {
				echo "<p>Your time is up!</p>";
			}
			echo "<p>Your corrects: $score / $numOfQuestions </p>";
			
			
			$pointsFromQuiz = (($_POST['maxTime'] - ($_POST['maxTime'] - $_POST['timeLeft'])) + ($score * 20));
			$userOverallPoints = $pastPoints + $pointsFromQuiz;
			$perfectScore = $_POST['maxTime'] + ($numOfQuestions * 20);

			// update points in the database
			$stmt = $conn->prepare("UPDATE user SET points = ? WHERE id = ? ");
			$stmt->bind_param("ii", $userOverallPoints, $_POST['userId']);
			$result = $stmt->execute();
			if ($result) {
				echo "Data updated successfully";
			} else {
				echo "Data update failed";
			}

			echo "<p> You gained: $pointsFromQuiz";

			echo "Perfect score $perfectScore";
			//update user points in the session 
			$_SESSION['userPoints'] = $userOverallPoints;

			if ($pointsFromQuiz >= $perfectScore) {
				
			?>
				<p>You have earned a certificate</p>
				<a href="../certificate/">Get certificate</a>

			<?php
			} else {
				?> 
					<p>You did not get the certificate, better luck next time</p>
				<?php 
			}

			?>


			<button id="playAgainBttn">Play again<button>


		</div>

	</body>

	</html>
<?php
} else {
	echo "You can't just skip like that, please finish the quiz first";
}
