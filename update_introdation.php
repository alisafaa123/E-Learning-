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
        .update {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        #multiline-input {
            width: 100%;
            margin-bottom: 10px;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
             <h1>welcome in the page of update introdaction</h1>
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
    $result4 = mysqli_query($conn, "SELECT * FROM introdaction WHERE course = $selectedValue1");

    // Fetch the data from the result object
    if ($row = mysqli_fetch_assoc($result4)) {
        $title = $row['Title'];
        $description = $row['introdaction'];
        $path = $row['pic'];
        $id = $row['id'];
        echo $id;
    }
    ?>
    <div class="update">
        <form action="" method="post" enctype="multipart/form-data">
            <textarea id="title-input" name="title2" rows="1" class="form-control mb-2"><?php echo $title; ?></textarea>
            <textarea id="description-input" name="description2" rows="4" class="form-control mb-4"><?php echo $description; ?></textarea>
            <hr><hr><hr>
            <center><button class="btn btn-primary" name="submit2">Update Text</button></center>
            <hr><hr><hr>
            <img name="pic" src="imag/<?php echo $path; ?>" alt="Image not found" class="img-fluid mb-4">
            <input type="file" name="image"> <!-- Add a name attribute for the file input -->
            <hr><hr><hr>
            <center><button class="btn btn-primary" name="submit3">Update Image</button></center>
        </form>
    </div>
    <?php
}

if (isset($_POST["submit2"])) {
    $t = $_POST["title2"];
    $d = $_POST["description2"];

    $sql = "UPDATE introdaction SET Title = ?, introdaction = ?  WHERE course = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $t, $d, $selectedValue1);

    if ($stmt->execute()) {
        echo "Text updated successfully";
    } else {
        echo "Error updating text: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

if (isset($_POST["submit3"])) {
    // Handle image update
    if ($_FILES['image']['error'] == 0) {
        $uploadedImage = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], 'imag/' . $uploadedImage);

        $sql = "UPDATE introdaction SET pic = ? WHERE course = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $uploadedImage, $selectedValue1);

        if ($stmt->execute()) {
            echo "Image updated successfully";
        } else {
            echo "Error updating image: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "No new image selected.";
    }
}
?>



</body>
</html>
