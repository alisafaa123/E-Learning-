<?php
require 'configration.php';

$error = "";

if (isset($_POST["submit"])) {
    $Username = $_POST["Username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform additional validation and sanitation as needed

    $check = $conn->prepare("INSERT INTO account (user, email, password) VALUES (?, ?, ?)");
    $check->bind_param("sss", $Username, $email, $password);

    if ($check->execute()) {
        // Successfully registered, you can redirect to login page or perform any other action
        header("location: info.php");
        exit();
    } else {
        $error = "Registration failed. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="width=device-width" />
    <title>balah.iq</title>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add Google Sign-In library -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #f8f9fa;
        }

        #signup {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .element {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h6 {
            color: darkred;
            margin-top: 10px;
        }

        span {
            color: #f8f9fa;
            background-color: blue;
        }
    </style>
</head>

<body>
    <section id="signup">
        <div class="element">
            <center> <h1><a href="home.html"><span>E</span>ducation</a></h1></center>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="exampleFormControlInput1">User name</label>
                    <input type="text" name="Username" class="form-control" id="exampleFormControlInput1"
                        placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput2">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleFormControlInput2"
                        placeholder="Password">
                    <h6><?php echo $error; ?></h6>
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Signup</button>
            </form>
            <a href="login.php">Login</a>
        </div>
    </section>
    <!-- Add Bootstrap JS and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
