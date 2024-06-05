
<?php
// fetch_next_question.php

// Assuming $quizData is an array with your quiz questions
$nu = $_POST['nu'] + 1; // Increase the question number
$nu1 = $_POST['nu1'] + 1;
$nu2 = $_POST['nu2'] + 1;
$nu3 = $_POST['nu3'] + 1;
$nu4 = $_POST['nu4'] + 1;
$nu5 = $_POST['nu5'] + 1;
$nu6 = $_POST['nu6'] + 1;

// Fetch the next question
$nextQuestion = $quizData[$nu];

// Return the HTML for the next question
echo '<h2 class="text-center mb-4">' . $nextQuestion['question'] . '</h2>';
echo '<div class="form-check mb-3">';
// ... (continue with your HTML for options, buttons, etc.)
?>

