<?php

require 'configration.php';
session_start();

if (!isset($_SESSION['id_admin'])) {
    header("location: login.php");
    exit();
}

if(isset($_POST["submit"])){
    $course=$_POST['Course'];
   
    if(isset($_POST["1"]))
    $type = $_POST["1"];
    $sql = "INSERT INTO courses (coursse_name , data_id) VALUES (?, ?) ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $course, $type);

    if ($stmt->execute()) {
        echo " uploaded successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0%;
            padding: 0%;
        }
        .insertion_form{
            width: 90%;
            margin-top: 3%;
            margin-left: 5%;
        }
        .insertion_form h1{
            color: rgb(62, 70, 139);
        }
        .back_page{
            margin-left: 5%;
            background-color: rgb(62, 70, 139);
            width:5%;
            border-radius: 4%;
        }
        .back_page a{  
            color: aliceblue;
            background-color: rgb(62, 70, 139);
            text-decoration-line: none;
            margin-left: 5%;
        }

        .back_page a:hover , .back_page:hover {  
            color: rgb(62, 70, 139);
            background-color: aliceblue;
        }
        

        
    </style>
</head>
<body>
    <header id="home">
        <div class="logo">
            <h1><a href="home.html"><span>E</span>ducation</a></h1>
        </div>
    </header>  
    <div class="insertion_form">
        <h1>welcome in the insert of courses page</h1>
        <form action="" method="POST">
            <h2>Chose your type of the courses plz</h2>
            <br>
            <h3><input type="radio" name="1" value="1" id=""> <label for="1">data Science</label></h2>
            <h3><input type="radio" name="1" value="2" id=""> <label for="2">Programing</label></h2>
            <h3><input type="radio" name="1" value="3" id=""> <label for="3">front-end</label></h2>
            <h1> insert your course plz</h1>
            <input type="text" name="Course" required>
            <br><br>

            <button name="submit">Upload</button>
        </form>
    </div>
    <br>
    <hr>
    <br>
    
   
    
</body>
</html>