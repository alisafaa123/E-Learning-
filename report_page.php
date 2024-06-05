<?php 
require 'configration.php';
session_start();

if (!isset($_SESSION['id_admin'])) {
    header("location: login.php");
    exit();
}

// SQL SELECT statement with prepared statements
$sql = "SELECT * FROM report ";
$stmt = $conn->prepare($sql);

// Execute the statement
$stmt->execute();

// Get the result set
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Report Details</h2>
        <?php while ($row = $result->fetch_assoc()) {?>
        <label for="firstName">First Name:</label>
        <p id="firstName"><?php echo $row['fname']; ?></p>

        <label for="lastName">Last Name:</label>
        <p id="lastName"><?php echo $row['lname']; ?></p>

        <label for="email">Email:</label>
        <p id="email"><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></p>

      

        <label for="description">Description:</label>
        <p id="description"><?php echo $row['description']; ?></p>
        <hr>
        <?php } ?>
      
    </div>
</body>

</html>
