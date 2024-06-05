<?php
require 'configration.php';
session_start();

if (!isset($_SESSION['id_admin'])) {
    header("location: login.php");
    exit();
}

$sql =mysqli_query($conn, "SELECT * from type_ ");

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
             <h1>welcome in the page of update the name of course type</h1>
             <h2>Chose your the course plz</h2>
        </div>
      <div class="courses">
        
            <div class="course">
                
            <?php
if ($sql->num_rows > 0) {
    while ($row = $sql->fetch_assoc()) {
?>
    <label for="course_1"><?php echo $row["type_name"]; ?></label>
    <input type="radio" id="course_1" name="course_1" value="<?php echo $row['id_type']; ?>" class="option">
<?php
    }
}
?>
</div>
</div>
<div class="container mt-5">
    <form action="" method="post"> <!-- Move the form opening tag here -->
        <button type="submit" name="submit" class="btn btn-primary">open</button>
    </form>
</div>

<?php
// Initialize $title before the if statement
if (isset($_POST["submit"])) {
    $id = $_POST["course_1"];
    echo $id;

    // Use a prepared statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT * FROM type_ WHERE id_type = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result4 = $stmt->get_result();

    // Fetch the data from the result object
    if ($row = mysqli_fetch_assoc($result4)) {
        $title = $row['type_name'];
    }

    // Close the statement
    $stmt->close();

    echo $title;

?>

<div class="update">
    <form action="" method="post" enctype="multipart/form-data">
        <textarea id="title-input" name="title2" rows="1" class="form-control mb-2"><?php echo $title; ?></textarea>
        <!-- Your hidden input field -->
        <input type="text" name="id" id="hiddenId" hidden>
        <hr><hr><hr>

        <script>
            // Set the value of the hidden input field based on PHP variable $id
            document.getElementById('hiddenId').value = '<?php echo $id; ?>';
        </script>

        <center><button class="btn btn-primary" name="submit2">Update Text</button></center>
        <hr><hr><hr>
    </form>

    </div>
    <?php
}

if (isset($_POST["submit2"])) {
    $t = $_POST['title2'];
    $id = $_POST['id'];
    $sql = "UPDATE type_ SET type_name = ? WHERE id_type = ?";
    $stmt = $conn->prepare($sql);
    
    // Use "si" for string and integer placeholders
    $stmt->bind_param("si", $t, $id);

    if ($stmt->execute()) {
        echo "Text updated successfully";
    } else {
        echo "Error updating text: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

?>

</body>
</html>
