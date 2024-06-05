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

        .delete{
            width: 80%;
            margin-left: 10%;
            margin-top: 5%;
            display: grid;
            grid-template-columns: repeat(3,1fr);
        }

        .delete button{
          
            margin-top: 10%;
        }



    </style>
</head>
<body>
<header id="home">
        <div class="logo">
            <h1><a href="home.html"><span>E</span>ducation</a></h1>
        </div>
</header>  
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="title">
             <h1>welcome in the delete of quize from course page</h1>
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

    <?php  $selectedValue1 = $_COOKIE['selectedValue1'] ;?>
   
<div class="container mt-5">
    

    <button type="submit" name="submit" class="btn btn-primary">open</button>


  
</div>
</form>


<?php 

if (isset($_POST["submit"])) {
    echo "<h2>Choose an item to delete it</h2>";
    echo "<div class='delete'>";
    
    $result_info = mysqli_query($conn, "SELECT * FROM quiz WHERE course = $selectedValue1 ");

    // Loop through the results
    while ($row = mysqli_fetch_assoc($result_info)) {
        ?>
        <form method="POST" action="">
            <h1>"<?php echo $row['question']; ?></h1>
            <button type="submit2" name="submit2" value="<?php echo $row['id']; ?>" class="btn btn-primary">delete</button>
        </form>
        <?php
    }
    
    echo "</div>";
}

if (isset($_POST["submit2"])) {
  
    $id = $_POST["submit2"];
   
    
    $sql = "DELETE FROM quiz WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
}
?>

</div>



</body>
</html>
