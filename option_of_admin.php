<?php
require 'configration.php';
session_start();

if (!isset($_SESSION['id_admin'])) {
    header("location: login.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Admin Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        header {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
            margin-bottom: 20px;
        }

        .logo a {
            text-decoration: none;
            color: #ffffff;
        }

        .title {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
            margin-bottom: 20px;
        }

        .insert {
            text-align: center;
            margin-bottom: 30px;
        }

        .insert p {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .btn-custom {
            margin: 5px;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1><a href="home.html"><span>E</span>ducation</a></h1>
            </div>
        </div>
    </header>

    <div class="title">
        <div class="container">
            <h1>Welcome to the Admin Page, <?php echo $_SESSION['user']; ?></h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
        <div class="col-md-6">
    <div class="insert">
        <p>For opening pages of the web:</p>
        <a href="index.php" class="btn btn-custom" style="background-color: #555555; color:white;" target="_blank">Open the home page</a>
        <a href="admin.php" class="btn btn-custom" style="background-color: #555555;  color:white;" target="_blank">Update the home page</a>
        <a href="info.php" class="btn btn-custom" style="background-color: #555555;  color:white;" target="_blank">Open the page of courses</a>
        <a href="report_page.php" class="btn btn-custom" style="background-color: #555555;  color:white;" target="_blank">Open the report page</a>
    </div>
</div>

            <div class="col-md-6">
    <div class="insert">
        <p>For update items:</p>
        <a href="update_course.php" class="btn btn-success btn-custom" target="_blank">Update Course name</a>
        <a href="update_introdation.php" class="btn btn-success btn-custom" target="_blank">Update the Information of the Introduction</a>
        <a href="update_item_into_course.php" class="btn btn-success btn-custom" target="_blank">Update Item into Course</a>
        <a href="update_type_of_course.php" class="btn btn-success btn-custom" target="_blank">Update the name of course type</a>
    </div>
</div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="insert">
                    <p>For inserting new items:</p>
                    <a href="insert_course.php" class="btn btn-primary btn-custom" target="_blank">Insert Course</a>
                    <a href="insert_introduction.php" class="btn btn-primary btn-custom" target="_blank">Insert Introduction</a>
                    <a href="insert_item_in_course.php" class="btn btn-primary btn-custom" target="_blank">Insert New Item into Course</a>
                    <a href="insert_into.php" class="btn btn-primary btn-custom" target="_blank">Insert Information into Item of Course</a>
                    <a href="insert_quistion.php" class="btn btn-primary btn-custom" target="_blank">Insert Question into Course</a>
                    <a href="video.php" class="btn btn-primary btn-custom" target="_blank">Insert Video into Course</a>
                    <a href="upload_book.php" class="btn btn-primary btn-custom" target="_blank">Insert Book into Course</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="insert">
                    <p>For delete items:</p>
                    <a href="delete_course.php" class="btn btn-danger btn-custom" target="_blank">Delete Course</a>
                    <a href="delete_introduction.php" class="btn btn-danger btn-custom" target="_blank">Delete Introduction</a>
                    <a href="delete_item_course.php" class="btn btn-danger btn-custom" target="_blank">Delete Item from Course</a>
                    <a href="delete_quize.php" class="btn btn-danger btn-custom" target="_blank">Delete Question from Course</a>
                    <a href="delete_video.php" class="btn btn-danger btn-custom" target="_blank">Delete Video from Course</a>
                    <a href="delete_pdf.php" class="btn btn-danger btn-custom" target="_blank">Delete Book from Course</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.min.js"></script>
</body>

</html>
