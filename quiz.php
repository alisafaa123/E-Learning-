<?php 
require 'configration.php';
session_start();
if (!isset($_SESSION['id_admin']) && !isset($_SESSION['id'])){
    header("location: login.php");
    exit();
}

$option = $_GET['type'];
$id = $_GET['t'];
$i = 0;
$quiz = "SELECT * FROM quiz WHERE option_ = '$option' and course = '$id' ";
$result_quiz = $conn->query($quiz);
if ($result_quiz->num_rows > 0) {
    // Initialize an array to store the quiz data
    $quizData = array();

    // Fetch each row and store it in the array
    while ($row = $result_quiz->fetch_assoc()) {
        $correctAnswer = '';
        if ($row['correct_nu'] == 1) {
            $correctAnswer = 'a';
        } elseif ($row['correct_nu2'] == 1) {
            $correctAnswer = 'b';
        } elseif ($row['correct_nu3'] == 1) {
            $correctAnswer = 'c';
        }

        $quizData[] = array(
            'question' => $row['question'],
            'a' => $row['answer1'],
            'b' => $row['answer2'],
            'c' => $row['answer3'],
            'correct' => $correctAnswer
        );
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
            @import url("https://fonts.googleapis.com/css2?family&display=swap");

            * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Josefin sans", sans-serif;
            font-weight: 300;
            }

            body {
            background-color: hsl(206, 92%, 94%);
            ;
            font-family: "Poppins", sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
            margin: 0;
            }

            .top-btn {
            color: black;
            position: fixed;
            bottom: 10px;
            right: 10px;
            padding: 2px;
            border-radius: 50%;
            width: 40px;
            font-weight: bold;
            text-decoration: none;
            font-size: 30px;
            text-align: center;
            }

            .top-btn:hover {
            box-shadow: 0 0 10px 3px gray;
            cursor: pointer;
            color: #000;
            }


            .quiz-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 1rem 1rem -0.7 rgba(0, 0, 0, 0.4);
            width: 700px;
            max-width: 95vw;
            overflow: hidden;

            }

            .quiz-header {
            padding: 3rem;
            }

            h2 {
            padding: 1rem;
            text-align: center;
            margin: 0;
            }

            ul {
            list-style-type: none;
            padding: 0;
            }

            ul li {
            font-size: 1.2rem;
            margin: 1rem 0;
            }

            ul li label {
            cursor: pointer;
            }

            button {
            background-color: #00ccff;
            color: #fff;
            border: none;
            display: block;
            width: 100%;
            cursor: pointer;
            font-size: 1.1rem;
            font-family: inherit;
            padding: 1.3rem;
            }

            button:hover {
            background-color: rgb(100, 220, 224);
            ;
            }
    </style>
    <title>Quiz-html</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<a href="info.php" class="top-btn">
    <i class="fa-sharp fa-solid fa-circle-arrow-left"></i>
    </a>
<div class="quiz-container" id="quiz">
    <div class="quiz-header ">
        <a href="info.php"><i class="fa-solid fa-xmark float-end mt-0 text-dark "></i></a>
        <h2 id="question">Question is loading...</h2>
        <ul>
            <li>
                <input type="radio" name="answer" id="a" class="answer" />
                <label for="a" id="a_text">Answer...</label>
            </li>
            <li>
                <input type="radio" name="answer" id="b" class="answer" />
                <label for="b" id="b_text">Answer...</label>
            </li>
            <li>
                <input type="radio" name="answer" id="c" class="answer" />
                <label for="c" id="c_text">Answer...</label>
            </li>
           
        </ul>
    </div>
    <button id="submit">submit</button>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
    <script>
    const quizData = <?php echo json_encode($quizData); ?>;
    
    const quiz = document.getElementById("quiz");
    const answerElements = document.querySelectorAll(".answer");
    const questionElement = document.getElementById("question");
    const a_text = document.getElementById("a_text");
    const b_text = document.getElementById("b_text");
    const c_text = document.getElementById("c_text");
    const submitButton = document.getElementById("submit");
    let currentQuiz = 0;
    let score = 0;
    
    const deselectAnswers = () => {
        answerElements.forEach((answer) => (answer.checked = false));
    };
    
    const getSelected = () => {
        let answer;
        answerElements.forEach((answerElement) => {
            if (answerElement.checked) answer = answerElement.id;
        });
        return answer;
    };
    
    const loadQuiz = () => {
        deselectAnswers();
        const currentQuizData = quizData[currentQuiz];
        questionElement.innerText = currentQuizData.question;
        a_text.innerText = currentQuizData.a;
        b_text.innerText = currentQuizData.b;
        c_text.innerText = currentQuizData.c;
    };
    
    loadQuiz();
    
    submitButton.addEventListener("click", () => {
        const answer = getSelected();
        if (answer) {
            if (answer === quizData[currentQuiz].correct) score++;
            currentQuiz++;
            if (currentQuiz < quizData.length) loadQuiz();
            else {
                quiz.innerHTML =
        `<h2>You Score ${score}/${quizData.length} 🥳✌🏻</h2>
        <button onclick="history.go(0)">Play Again</button>` 
        // location.reload() won't work in CodePen for security reasons;
    }
}

});
</script>
</body>

</html>