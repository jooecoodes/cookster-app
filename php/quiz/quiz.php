<?php 
	header('Content-Type: text/html; charset=utf-8');
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
				window.location.href = 'index.html';
			})
		})
	</script>
</head>
<body>
    <div class="quiz-container">
        <h1>Quiz Results</h1>

        <?php
		$score = 0;

		for ($i = 0; $i < 10; $i++) {
			$questionKey = 'question' . $i;
			$answerKey = 'answer' . $i;
			$quizKey = 'quiz' . $i;
			$indexPlusOne = $i + 1;
			if(isset($_POST)){
				if (isset($_POST[$questionKey], $_POST[$answerKey], $_POST[$quizKey])) {
					$correctAnswer = htmlspecialchars($_POST[$answerKey]);
					$userAnswer = htmlspecialchars($_POST[$questionKey]); 
					$quiz =  htmlspecialchars($_POST[$quizKey]);
					if ($_POST[$questionKey] == $_POST[$answerKey]) {
						echo "
						<p> Q{$indexPlusOne}: {$quiz}</p>
						<div style=\"display: flex; width: 50%; justify-content: space-between; align-items: space-between; height: 50px\">
							<img class=\"image\" src=\"../../assets/checked.png\" style=\"width 50%; height: 50px; object-fit: cover;\">
							<p style=\" font-size: 16px;  width: 50%;\">{$userAnswer}</p>
						</div>
						<div style=\"display: flex; width: 50%; justify-content: space-between; align-items: space-between; height: 50px\">
							<img class=\"image\" src=\"../../assets/correct.png\" style=\"width 50%; height: 50px; object-fit: cover;\">
							<p style=\" font-size: 16px;  width: 50%;\">{$correctAnswer}</p>
						</div>
							";
						$score++;
						
					} else {
						echo "
						<p>Q{$indexPlusOne}: {$quiz}</p>
						<div style=\"display: flex; width: 50%; justify-content: space-between; align-items: space-between; height: 50px \">
							<img class=\"image\" src=\"../../assets/cross.png\" style=\"width 50%; height: 50px; object-fit: cover; \">
							<p style=\" font-size: 16px; width: 50%;\">{$userAnswer}</p>
						</div>
						<div style=\"display: flex; width: 50%; justify-content: space-between; align-items: space-between; height: 50px\">
							<img class=\"image\" src=\"../../assets/correct.png\" style=\"width 50%; height: 50px; object-fit: cover;\">
							<p style=\" font-size: 16px;  width: 50%;\">{$correctAnswer}</p>
						</div>
							";
					}  
				} else {
					// If $userAnswer is not set, you should initialize it before using it to avoid undefined variable notice
					$userAnswer = isset($_POST[$questionKey]) ? htmlspecialchars($_POST[$questionKey]) : 'Not answered';
					$quiz =  isset($_POST[$quizKey]) ? htmlspecialchars($_POST[$quizKey]) : "Question Not Found";
					$correctAnswer = isset($_POST[$answerKey]) ? htmlspecialchars($_POST[$answerKey]) : "Answer Not Found";
					echo "
					<p>Q{$indexPlusOne}: {$quiz}</p>
						<div style=\"display: flex; width: 50%; justify-content: space-between; align-items: space-between; height: 50px\">
							<img class=\"image\" src=\"../../assets/question.png\" style=\"width 50%; height: 50px;  object-fit: cover;\">
							<p style=\" font-size: 16px; width: 50%;\">{$userAnswer}</p>
						</div>
						<div style=\"display: flex; width: 50%; justify-content: space-between; align-items: space-between; height: 50px\">
							<img class=\"image\" src=\"../../assets/correct.png\" style=\"width 50%; height: 50px; object-fit: cover;\">
							<p style=\" font-size: 16px;  width: 50%;\">{$correctAnswer}</p>
						</div>
							";
				}
			}
			
		}
		if (isset($_POST['unfinished'])) {
			echo "<p>Your time is up!</p>";
		}
		 echo "<p>Your score: $score / 10 </p>";
        ?>
		
		<button id="playAgainBttn">Play again<button>
		
    </div>
	
</body>
</html>