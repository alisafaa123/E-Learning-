<?php
require 'configration.php';
session_start();

if (!isset($_SESSION['id_admin'])) {
    header("location: login.php");
    exit();
}

//  where id = 1 (Data Sciense)
$sql =mysqli_query($conn, "SELECT * from courses where data_id = 1");
//  where id = 2 (Programin)
$sql2 =mysqli_query($conn, "SELECT * from courses where data_id = 2");
//  where id = 2 (Programin)
$sql3 =mysqli_query($conn, "SELECT * from courses where data_id = 3");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .courses{
            width: 80%;
            margin-top: 2%;
            margin-left: 10%;
            display: grid;
            grid-template-columns: repeat(3,1fr);
        }
        .course{
            display: grid;
            grid-template-columns: repeat(2,1fr);
        }
        .courses input{
            height: 20px;
            width: 20px;
        }
        form .title{
            width: 80%;
            margin-left: 10%:
        }
        .title h1{
            color: rgb(62, 70, 139);
        }

    </style>
</head>
<body>
<header id="home">
        <div class="logo">
            <h1><a href="home.html"><span>E</span>ducation</a></h1>
        </div>
</header>  
    <form action="" method="POST">
        <div class="title">
             <h1>welcome in the insert of quizes page</h1>
             <h2>Chose your the course plz</h2>
        </div>
      <div class="courses">
        
            <div class="course">
                
            <?php
            if ($sql->num_rows > 0) {
            while ($row = $sql->fetch_assoc()) {
            ?>
            <label for="course_1"><?php echo $row["coursse_name"]; ?></label>
            <input type="radio" id="course_1" name="course_1" value="<?php echo $row['course_id']; ?>" class="option" onclick="getButtonValue(this)">
            <?php  } }?>
            </div>
            <div class="course">
                <?php
                if ($sql2->num_rows > 0) {
                while ($row = $sql2->fetch_assoc()) {
                ?>
                 <label for="course_1"><?php echo $row["coursse_name"]; ?></label>
            <input type="radio" id="course_1" name="course_1" value="<?php echo $row['course_id']; ?>" class="option" onclick="getButtonValue(this)">
            <?php  } }?>
            </div>
            <div class="course">
                <?php
                if ($sql3->num_rows > 0) {
                while ($row = $sql3->fetch_assoc()) {
                ?>
                <label for="course_1"><?php echo $row["coursse_name"]; ?></label>
            <input type="radio" id="course_1" name="course_1" value="<?php echo $row['course_id']; ?>" class="option" onclick="getButtonValue(this)">
            <?php  } }?>
            </div>
      </div>
      <script>
         var selectedValue1 = 0 ;
        document.addEventListener("DOMContentLoaded", function() {
    var radioButtons = document.querySelectorAll('input[type="radio"][name="course_1"]');

    radioButtons.forEach(function(button) {
        button.addEventListener("change", function() {
             selectedValue1 = document.querySelector('input[type="radio"][name="course_1"]:checked').value;
             document.cookie = "selectedValue1 ="+ selectedValue1 ;
        });
    });
});


    </script>

    <?php 
    $selectedValue1 = $_COOKIE['selectedValue1'] ;?>
   
   <div class="container mt-5">

   <div class="form-group">
            <label for="qustion">option of the qustion</label>
            <input type="text" class="form-control" name="option" required>
        </div>

        <div class="form-group">
            <label for="qustion">Question</label>
            <input type="text" class="form-control" name="qustion" required>
        </div>

        <div class="form-group">
            <label for="answer1">Answer 1</label>
            <input type="text" class="form-control" name="answer1" required>
        </div>

        <div class="form-group">
            <label for="answer2">Answer 2</label>
            <input type="text" class="form-control" name="answer2" required>
        </div>

        <div class="form-group">
            <label for="answer3">Answer 3</label>
            <input type="text" class="form-control" name="answer3" required>
        </div>

        <div class="form-group">
            
            <div class="custom-control custom-radio">
                <input type="radio" id="1" name="1" class="custom-control-input" value="1" required>
                <label class="custom-control-label" for="1">the answer number 1 is the correct answer</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="2" name="1" class="custom-control-input" value="2" required>
                <label class="custom-control-label" for="2">the answer number 2 is the correct answer</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="3" name="1" class="custom-control-input" value="3" required>
                <label class="custom-control-label" for="3">the answer number 3 is the correct answer</label>
            </div>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

    
</div>
</form>
<hr><br>
<script>
         var selectedValue = 0 ;
        document.addEventListener("DOMContentLoaded", function() {
    var radioButtons = document.querySelectorAll('input[type="radio"][name="1"]');

    radioButtons.forEach(function(button) {
        button.addEventListener("change", function() {
             selectedValue = document.querySelector('input[type="radio"][name="1"]:checked').value;
             document.cookie = "selectedValue ="+ selectedValue ;
        });
    });
});


    </script>
<?php 

$correct_nu = $correct_nu2 =$correct_nu3 = 0;
$selectedValue = $_COOKIE['selectedValue'] ;
if ($selectedValue == 1){
    $correct_nu = 1;
}else if ($selectedValue == 2){
    $correct_nu2 = 1;
}else if ($selectedValue == 3){
    $correct_nu3 = 1;
}

if(isset($_POST["submit"])){
    $option_ = $_POST['option'];
    $q=$_POST['qustion'];
    $a1=$_POST['answer1'];
    $a2=$_POST['answer2'];
    $a3=$_POST['answer3'];
   
    $sql = "INSERT INTO quiz (question, answer1, answer2 ,answer3 ,correct_nu ,correct_nu2 ,correct_nu3,course , option_) VALUES (?,?, ?, ? ,?, ? ,? ,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssiiiis", $q, $a1, $a2 ,$a3,$correct_nu,$correct_nu2,$correct_nu3,$selectedValue1,$option_);

    if ($stmt->execute()) {
        echo "<script>alert('Uploaded successfully.');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
    

    $stmt->close();
}

?>
   
    
        
</body>
</html>