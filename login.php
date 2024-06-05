<?php
require 'configration.php';
session_start();

// check if user is logged in
$error = "";

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate reCAPTCHA
    $recaptcha_secret = "6Ld8tKIpAAAAAAX1mr45TEvQdc3LVoQG_d8PodVW";
    $recaptcha_response = $_POST["g-recaptcha-response"];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => $recaptcha_secret,
        'response' => $recaptcha_response
    );
    $options = array(
        'http' => array (
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success = json_decode($verify);

    if ($captcha_success->success) {
        // reCAPTCHA validation passed, proceed with login logic

        $check = $conn->prepare("SELECT * FROM account WHERE email = ? AND password = ?");
        $check->bind_param("ss", $email, $password);
        $check->execute();
        $result = $check->get_result();
        $row = $result->fetch_assoc();

        $check2 = $conn->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
        $check2->bind_param("ss", $email, $password);
        $check2->execute();
        $result2 = $check2->get_result();
        $row = $result2->fetch_assoc();

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['user'] = $row['user'];
            header("location:info.php");
        } elseif (mysqli_num_rows($result2) > 0) {
            $_SESSION['id_admin'] = $row['id_admin'];
            $_SESSION['user'] = $row['user'];
            header("location:option_of_admin.php");
        } else {
            $error = "You have an error in the email or password";
            echo "<script> alert('$error'); </script>";
        }
    } else {
        // reCAPTCHA validation failed
        $error = "Please complete the reCAPTCHA validation.";
        echo "<script> alert('$error'); </script>";
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
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #f8f9fa;
        }

        #login {
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
    <!-- Add reCAPTCHA script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <section id="login">

        <div class="element">
            <center>
                <h1><a href="home.html"><span>E</span>ducation</a></h1>
            </center>
            <form method="POST" action="">
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
                <!-- Add reCAPTCHA widget -->
                <div class="g-recaptcha" data-sitekey="6Ld8tKIpAAAAAIHeoocN4uALAWLKcCJDlXonwITt"></div>
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
            </form>
            <a href="singup.php">Singup</a>
        </div>
    </section>
    <!-- Add Bootstrap JS and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
