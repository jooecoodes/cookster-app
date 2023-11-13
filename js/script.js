$(document).ready(function() {
  
    var timeDuration = 60;
    appendSelection();
    
    $('#generalBttn').on('click', () => {
        $('.selection').remove();
        appendQuiz(timeDuration);
        initialiseGeneralQuiz();
    })
    $('#mythologyBttn').on('click', () => {
        $('.selection').remove();
        appendQuiz(timeDuration);
        initialiseMythologyQuiz();
    });
    $('#animalsBttn').on('click', () => {
        $('.selection').remove();
        appendQuiz(timeDuration);
        initialiseAnimalsQuiz();
    });
    $('#historyBttn').on('click', () => {
        $('.selection').remove();
        appendQuiz(timeDuration);
        initialiseHistoryQuiz();
    });
    $('#geographyBttn').on('click', () => {
        $('.selection').remove();
        appendQuiz(timeDuration);
        initialiseGeographyQuiz();
    });
    $('#gamingBttn').on('click', () => {
        $('.selection').remove();
        appendQuiz(timeDuration);
        initialiseGamingQuiz();
    });

   

    function initialiseAnimalsQuiz(){
        $.ajax({
        url: 'https://opentdb.com/api.php?amount=10&category=27&difficulty=easy&type=multiple',
        type: 'GET',
        success: function(data) {
            // Do something with the data
            console.log(data.results);
            data.results.forEach((question, index) => {
                // let question = question.question;
                let correct_answer = question.correct_answer;
                let incorrect_choices = question.incorrect_answers;
                let choices = incorrect_choices.concat(correct_answer);
                let shuffledChoices = shuffleArray(choices);


                const questionHtml = `
                                    <div>
                                        <p>Q${index + 1}: ${decodeHtml(question.question)}</p>
                                        ${shuffledChoices.map((answer) =>
                                            `<input type="radio" name="question${index}" value="${answer}"> ${decodeHtml(answer)}<br>`
                                        ).join('')}
                                        <input type="hidden" name="answer${index}" value="${correct_answer}">
                                        <input type="hidden" name="quiz${index}" value="${decodeHtml(question.question)}">
                                    </div>
                                    `;

                
                $('#quizForm').append(questionHtml);
                            
            });
            $('#quizForm').append(`<input type="submit" name="submitBttn" id="submitBttn">`);  
            
        },
        error: function(error) {
            // Handle any errors
            console.error('There was an error with the request:', error);
        }
        });
    }
    function initialiseGeographyQuiz(){
        $.ajax({
        url: 'https://opentdb.com/api.php?amount=10&category=22&difficulty=easy&type=multiple',
        type: 'GET',
        success: function(data) {
            // Do something with the data
            console.log(data.results);
            data.results.forEach((question, index) => {
                // let question = question.question;
                let correct_answer = question.correct_answer;
                let incorrect_choices = question.incorrect_answers;
                let choices = incorrect_choices.concat(correct_answer);
                let shuffledChoices = shuffleArray(choices);


                const questionHtml = `
                                        <div>
                                            <p>Q${index + 1}: ${question.question}</p>
                                            ${shuffledChoices.map((answer) =>
                                            `<input type="radio" name="question${index}" value="${answer}"> ${answer}<br>`
                                            ).join('')}
                                            <input type="hidden" name="answer${index}" value="${correct_answer}">
                                            <input type="hidden" name="quiz${index}" value="${question.question}">
                                        </div>
                                    `;

                
                $('#quizForm').append(questionHtml);
                            
            });
            $('#quizForm').append(`<input type="submit" name="submitBttn" id="submitBttn">`);  
            
        },
        error: function(error) {
            // Handle any errors
            console.error('There was an error with the request:', error);
        }
        });
    }

    function initialiseHistoryQuiz(){
        $.ajax({
        url: 'https://opentdb.com/api.php?amount=10&category=23&difficulty=easy&type=multiple',
        type: 'GET',
        success: function(data) {
            // Do something with the data
            console.log(data.results);
            data.results.forEach((question, index) => {
                // let question = question.question;
                let correct_answer = question.correct_answer;
                let incorrect_choices = question.incorrect_answers;
                let choices = incorrect_choices.concat(correct_answer);
                let shuffledChoices = shuffleArray(choices);


                const questionHtml = `
                                        <div>
                                            <p>Q${index + 1}: ${question.question}</p>
                                            ${shuffledChoices.map((answer) =>
                                            `<input type="radio" name="question${index}" value="${answer}"> ${answer}<br>`
                                            ).join('')}
                                            <input type="hidden" name="answer${index}" value="${correct_answer}">
                                            <input type="hidden" name="quiz${index}" value="${question.question}">
                                        </div>
                                    `;

                
                $('#quizForm').append(questionHtml);
                            
            });
            $('#quizForm').append(`<input type="submit" name="submitBttn" id="submitBttn">`);  
            
        },
        error: function(error) {
            // Handle any errors
            console.error('There was an error with the request:', error);
        }
        });
    }

    function initialiseMythologyQuiz(){
        $.ajax({
        url: 'https://opentdb.com/api.php?amount=10&category=20&difficulty=easy&type=multiple',
        type: 'GET',
        success: function(data) {
            // Do something with the data
            console.log(data.results);
            data.results.forEach((question, index) => {
                // let question = question.question;
                let correct_answer = question.correct_answer;
                let incorrect_choices = question.incorrect_answers;
                let choices = incorrect_choices.concat(correct_answer);
                let shuffledChoices = shuffleArray(choices);


                const questionHtml = `
                                        <div>
                                            <p>Q${index + 1}: ${question.question}</p>
                                            ${shuffledChoices.map((answer) =>
                                            `<input type="radio" name="question${index}" value="${answer}"> ${answer}<br>`
                                            ).join('')}
                                            <input type="hidden" name="answer${index}" value="${correct_answer}">
                                            <input type="hidden" name="quiz${index}" value="${question.question}">
                                        </div>
                                    `;

                
                $('#quizForm').append(questionHtml);
                            
            });
            $('#quizForm').append(`<input type="submit" name="submitBttn" id="submitBttn">`);  
            
        },
        error: function(error) {
            // Handle any errors
            console.error('There was an error with the request:', error);
        }
        });
    }

    function initialiseGamingQuiz(){
        $.ajax({
        url: 'https://opentdb.com/api.php?amount=10&category=15&difficulty=easy&type=multiple',
        type: 'GET',
        success: function(data) {
            // Do something with the data
            console.log(data.results);
            data.results.forEach((question, index) => {
                // let question = question.question;
                let correct_answer = question.correct_answer;
                let incorrect_choices = question.incorrect_answers;
                let choices = incorrect_choices.concat(correct_answer);
                let shuffledChoices = shuffleArray(choices);


                const questionHtml = `
                                        <div>
                                            <p>Q${index + 1}: ${question.question}</p>
                                            ${shuffledChoices.map((answer) =>
                                            `<input type="radio" name="question${index}" value="${answer}"> ${answer}<br>`
                                            ).join('')}
                                            <input type="hidden" name="answer${index}" value="${correct_answer}">
                                            <input type="hidden" name="quiz${index}" value="${question.question}">
                                        </div>
                                    `;

                
                $('#quizForm').append(questionHtml);
                            
            });
            $('#quizForm').append(`<input type="submit" name="submitBttn" id="submitBttn">`);  
            
        },
        error: function(error) {
            // Handle any errors
            console.error('There was an error with the request:', error);
        }
        });
    }

    function initialiseGeneralQuiz(){
        $.ajax({
        url: 'https://opentdb.com/api.php?amount=10&category=9&difficulty=easy&type=multiple',
        type: 'GET',
        success: function(data) {
            // Do something with the data
            console.log(data.results);
            data.results.forEach((question, index) => {
                // let question = question.question;
                let correct_answer = question.correct_answer;
                let incorrect_choices = question.incorrect_answers;
                let choices = incorrect_choices.concat(correct_answer);
                let shuffledChoices = shuffleArray(choices);


                const questionHtml = `
                                        <div>
                                            <p>Q${index + 1}: ${question.question}</p>
                                            ${shuffledChoices.map((answer) =>
                                            `<input type="radio" name="question${index}" value="${answer}"> ${answer}<br>`
                                            ).join('')}
                                            <input type="hidden" name="answer${index}" value="${correct_answer}">
                                            <input type="hidden" name="quiz${index}" value="${question.question}">
                                        </div>
                                    `;

                
                $('#quizForm').append(questionHtml);
                            
            });
            $('#quizForm').append(`<input type="submit" name="submitBttn" id="submitBttn">`);  
            
        },
        error: function(error) {
            // Handle any errors
            console.error('There was an error with the request:', error);
        }
        });
    }

    function appendQuiz(time){
        var timeLeft = time; // Set the quiz duration in seconds
        var timer = setInterval(function() {
            document.getElementById("timer").innerHTML = "Time Left: " + timeLeft + "s";
            timeLeft--;
    
            if (timeLeft < 0) {
                clearInterval(timer);
                $('#quizForm').append($('<input>').attr({
                    type: 'hidden',
                    name: 'unfinished', // The key that you will look for in your PHP file
                    value: 'true' // The value you want to pass
                }));
                $('#quizForm').submit();
            }
        }, 1000); // Update the timer every second
    
        const quizHtml = `
            <p id="timer"> </p>
            <form action="quiz.php" method="post" id="quizForm" accept-charset="UTF-8">
            </form>
        `;

        $(".quiz-container").append(quizHtml);
    }

    function appendSelection(){
        const selectionHtml = `
            <div class="selection">
                <p>Select Quiz:</p>
                <button id="generalBttn">General</button>   
                <button id="mythologyBttn">Mythology</button>
                <button id="animalsBttn">Animals</button>
                <button id="historyBttn">History</button>
                <button id="geographyBttn">Geography</button>
                <button id="gamingBttn">Gaming</button>
            </div>
        `
        $(".quiz-container").append(selectionHtml);
        
    }

    function decodeHtml(html) {
        var txt = document.createElement('textarea');
        txt.innerHTML = html;
        return txt.value;
    }

    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            // Generate random index
            let j = Math.floor(Math.random() * (i + 1));
            // Swap elements at indices i and j
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }
});
