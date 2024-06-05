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
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="title">
             <h1>welcome in the insert of book page</h1>
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
    <h2>Upload your book</h2>


        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" name="img" accept="image/*" required>
        </div>

        <div class="form-group">
            <label for="pdf">PDF:</label>
            <input type="file" class="form-control-file" name="pdf" accept=".pdf" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Upload</button>

    
</div>
    </form>

    <?php if (isset($_POST["submit"])) {
    $title = $_POST['title'];


    // Check if the image file is uploaded
    if ($_FILES["img"]["error"] === 4) {
        echo "<script> alert('The image does not exist');</script>";
      } else {
        $fileName = $_FILES["img"]["name"];
        $fileSize = $_FILES["img"]["size"];
        $tmpName = $_FILES["img"]["tmp_name"];
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
    
        if (!in_array($imageExtension, $validImageExtension)) {
          echo "<script> alert('Invalid image extension');</script>";
        } elseif ($fileSize > 1000000) {
          echo "<script> alert('The image size is too large');</script>";
        } else {
          $newImageName = uniqid() . '.' . $imageExtension;
          move_uploaded_file($tmpName, 'imag/' . $newImageName);
        }

        if (isset($_FILES["pdf"]) && $_FILES["pdf"]["error"] == UPLOAD_ERR_OK) {
            $pdfName = $_FILES["pdf"]["name"];
            $pdfTmp = $_FILES["pdf"]["tmp_name"];
    
            // Choose a directory to store PDF files
            $pdfDirectory = 'pdfs/';
            $newPdfName = uniqid() . '_' . $pdfName;
            $pdfPath = $pdfDirectory . $newPdfName;
    
            move_uploaded_file($pdfTmp, $pdfPath);
    
            // Insert data into the database
            $sql = "INSERT INTO pdf (title, img, pdf_data,course) VALUES (?, ?, ?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $title, $newImageName, $pdfPath,$selectedValue1);
    
            if ($stmt->execute()) {
                echo "Image and PDF uploaded successfully.";
            } else {
                echo "Error: " . $stmt->error;
            }
    
            $stmt->close();
        } else {
            echo "Error: PDF file not uploaded.";
        }
    
        $conn->close();
    }
}
    ?>

</body>
</html>
