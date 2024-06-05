<?php 
require 'configration.php';
session_start();
if ( !isset($_SESSION['id_admin']) &&  !isset($_SESSION['id'])){
    header("location: login.php");
    exit();
}
$id = $_GET['t'];
$i = 0;
$stmt = $conn->prepare("SELECT * FROM info_table  where stage = ? and course = ? ");
if ($stmt === false) {
    die("Error in preparing statement: " . $conn->error);
}

$stmt->bind_param("ii", $i ,$id);

$stmt->execute();
$sql = $stmt->get_result();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }

        body {
            background-color: hsl(206, 92%, 94%);
        }

        .home-img {
            box-shadow: 0 0 10px 1px #ffcc00;
        }

        .img {
            width: 35px;
        }

        .icon {
            width: 35px;
            margin-top: 0;
        }

        .icon1 {
            width: 45px;
        }

        .footer {
            color: white;
            background-color: rgba(0, 0, 0, 0.911);
        }

        .links {
            width: 300px;
            padding-top: 50px;
            margin-left: auto;
            margin-right: auto;
        }

        .links h2 {
            font-size: 20px;
        }

        .sub-links {
            width: 200px;
            height: 200px;
        }

        .sub-links a {
            font-size: 15px;
            font-weight: 700;
            color: rgba(110, 109, 109, 0.979);
            text-decoration: none;
        }

        .sub-links a:hover {
            color: #fff;
        }

        .social-menu {
            padding: 5px;
            padding-top: 50px;
        }

        .social-menu ul {
            margin-left: auto;
            margin-right: auto;
            padding: 15px;
            display: flex;

        }

        .social-menu ul li {
            list-style: none;
            margin: 0 auto;
        }

        .social-menu ul li .fab {
            font-size: 30px;
            line-height: 50px;
            transition: .3px;
            color: #000;
        }

        .social-menu ul li .fab:hover {
            color: #fff;
        }

        .social-menu ul li a {
            position: relative;
            display: block;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #fff;
            text-align: center;
            transition: .6s;
            box-shadow: 0 0 5px 4px rgba(95, 94, 94, 0.767);
        }

        .social-menu ul li a:hover {
            transform: translate(0, -10%);
        }

        .social-menu ul li:nth-child(1) a:hover {
            background-color: rgba(0, 0, 0, 0.829);
        }

        .social-menu ul li:nth-child(2) a:hover {
            background-color: #0077b5;
        }

        .social-menu ul li:nth-child(3) a:hover {
            background-color: #e4405f;
        }

        .social-menu ul li:nth-child(4) a:hover {
            background-color: #002E6E;
        }

        .top-btn {
            color: black;
            position: fixed;
            bottom: 10px;
            right: 10px;
            padding: 2px;
            border-radius: 50%;
            width: 40px;
            font-weight: bold;
            text-decoration: none;
            font-size: 30px;
            text-align: center;
        }

        .top-btn:hover {
            box-shadow: 0 0 10px 3px gray;
            cursor: pointer;
            color: #000;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/cf8e2afea6.js" crossorigin="anonymous"></script>
    <title>Learn Simply</title>
</head>

<body>
    <div class=" d-flex justify-content-around m-5 row " id="nav">

    <?php  while ($row = mysqli_fetch_assoc($sql)) { 
        $type = $row['option_'];
        ?>
        <div class=" home-img p-4  rounded bg-white" style="width: 35rem ; margin: 1rem;">
            <h3 class="card-title"><?php echo $row['option_'] ; ?></h3>
          
            <a href="quiz.php?type=<?php echo urlencode($type); ?>&t=<?php echo urlencode($id); ?>" class="btn btn-warning ms-2" >Testing your self</a>
        </div>

        


     


    

  <?php } ?>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>