<?php
require 'configration.php';
session_start();


$flag2 = 0;
$show = 0;

// Fetch type names
$stmt = mysqli_prepare($conn, "SELECT type_name FROM type_");
if ($stmt) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $typeName);
    $typeNames = array();
    while (mysqli_stmt_fetch($stmt)) {
        $typeNames[] = $typeName;
    }
    mysqli_stmt_close($stmt);
}

// Fetch courses
$stmt = $conn->prepare("SELECT * FROM courses ");
if ($stmt === false) {
    die("Error in preparing statement: " . $conn->error);
}
$stmt->execute();
$sql = $stmt->get_result();
$stmt->close();

$title = "Hello, their!";
$description = "Welcome to our E-Learning platform. We are excited to have you here on your educational journey. Explore a world of knowledge and opportunities. Happy learning!";

$title2 = "";

if (isset($_POST["course_1"])) {
    $flag2 = 1;
    $title = "";
    $t = $_POST["course_1"];
    $_SESSION['current_course'] = $t;

    // Fetch introduction text
    $result4 = mysqli_query($conn, "SELECT * FROM introdaction where course = $t");
    if ($row = mysqli_fetch_assoc($result4)) {
        $title = $row['Title'];
        $description = $row['introdaction'];
        $path = $row['pic'];
    }

    // Fetch related data
    $pdf = "SELECT * FROM pdf WHERE  course = $t";
    $result_pdf = $conn->query($pdf);

    $video = "SELECT * FROM mytable WHERE  course = $t"; 
    $result_video = $conn->query($video);

    $info = "SELECT * FROM info_table WHERE  course = $t";
    $result_info = $conn->query($info);

    $quiz = "SELECT * FROM quiz WHERE  course = $t";
    $result_quiz = $conn->query($quiz);
}

// Initialize an empty array
$myArray = array();

if (isset($_POST["info"])) {
    $flag2 = 0;
    $title = "";
    $flag = 0 ;


    $t = $_SESSION["current_course"];
    $y = $_POST["info"];
    $_SESSION['info'] = $y;

    // Fetch info data
    $result_info = mysqli_query($conn, "SELECT * FROM info_table WHERE course = $t AND item_id = $y ORDER BY id ASC");
    while ($row = mysqli_fetch_assoc($result_info)) {
        $tempArray = array();
        $tempArray[] = $row['option_'];
        $tempArray[] = htmlspecialchars_decode($row['info']);
        $tempArray[] = $row['pic'];
        $myArray[] = $tempArray;
    }
}



function fetchText($conn, $id) {
    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT text_item FROM texts WHERE id = ?");
    $stmt->bind_param("i", $id); // Assuming $id is an integer. Use "s" if it's a string.
    $stmt->execute();

    $text_item = null ;
    $stmt->bind_result($text_item);

    // Fetch the result
    if ($stmt->fetch()) {
        return $text_item;
    } else {
        return 'No text at this page yet.';
    }

}


$home = fetchText($conn, 1);
$About = fetchText($conn, 2);

$contact = fetchText($conn, 4);
$Services =fetchText($conn, 19);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .collapsed {
            display: none;
        }
        .formatted-text {
    white-space: pre-wrap;
}

        
       
    </style>
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>" >
    <link rel="stylesheet" href="css/header.css?v=<?php echo time(); ?>" >


    
    <style>
        
                .video{
                
                margin-top: 5%;
                width: 90%;
                margin-left: 5%;
                margin-right: 5%;
                display: grid;
                grid-template-columns: repeat(3,1fr);
                }

                .item{
                margin-right: 20%;
                }

              

             
                 .Education{
                    background-color: rgb(62, 70, 139);
                    color: #ddd;

                 }
                .book{
                    height: 460px;
                margin-top: 5%;
                width: 90%;
                margin-left: 5%;
                margin-right: 5%;
                display: grid;
                grid-template-columns: repeat(3,1fr);
                }

                .book img {
                margin-top: 5%;
                width: 80%;
                }

             
                .container {
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                .book .Education_book{
                    font-size: small;
                }
                h1 {
                font-size: 2.5rem;
                margin-top: 20px;
                }
                p {
                font-size: 1.25rem;
                }
                .hidden {
                display: none;
                }
                .page{
                    display: grid;
                    grid-template-columns: 10% 90%;
                }
                list_intro{
                    background-color: rgb(105, 109, 112);
                    }
                    list_intro button{
                        background-color: rgb(61, 135, 192);
                        border-radius: 0px;
                        width:100%;
                    }   

                    h1 {
        text-align: center;
        margin-top: 20px;
        margin-bottom: 10px;
    }
    
    .video,
    .Quiz {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin-bottom: 30px;
    }

    .item,
    .book a,
    .question-container {
        margin: 10px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .item video{
        width: 100%;
        height: auto;
        max-height: 200px;
    }

    .book img{
        width: 60%;
        height: 70%;
    }

    .btn {
        margin-top: 10px;
    }

    .result {
        margin-top: 20px;
    }
    .hide{
        display: none;
    }
    .pic_body{
        width: 400px;
        height: 400px;
    }
    @media (max-width: 900px) {
                .logo {
                 width: 150px;
                 height:110px;
                 margin-right: 2%;
                }}
    @media (max-width: 1050px) {
                .video{
                    margin-left: 10%;
                    grid-template-columns: repeat(2,1fr);
                }
                
                }
                @media (max-width: 850px) {
                .book{
                  display: grid;
                  grid-template-columns: repeat(2,1fr);
                  height: 660px;
                }
                
                }

                @media (max-width: 720px) {
                .menu1-Courses1 .tx button{
                  font-size: small;
                  width: 80px;
                  margin-left: 70px;
                }
                .tx{
                    width: 20px;
                }
               
                
            }
            @media (max-width: 690px) {
                .video{
                    
                    grid-template-columns: repeat(1,1fr);

                }
                video{
                    width: 100%;
                }
                .Education{
                    font-size: large;
                }
    
             
                }
                @media (max-width: 500px) {
                .book .Education_book{
                    font-size: smaller;
                }

                }
            @media (max-width: 600px) {
                .book{
                
                    grid-template-columns: repeat(2,1fr);
                }
                .text-center .pic_body {
                    width: 100%;
                    height: 100%;
                }
                .mt-5 .pic_body2{
                    width: 80%;
                    height: 80%;
                }
                .mt-5 .formatted-text,.mt-5 .text-center{
                    font-size: small;
                }
                

                }
            @media (max-width: 420px) {
                .menu1-Courses1 .tx button{
                
                  margin-left: 40px;
                }
              
               }
            @media (max-width: 400px) {
                .book{
                  display: grid;
                  grid-template-columns: repeat(1,1fr);
                  height: 960px;
                  margin-left: 10%;
                }
                .book .Education_book{
                    font-size: x-small;
                }
                 
                
                }
            @media (max-width: 355px) {
                .menu1-Courses1 .tx button{
                    width: 60px;
                  height: 20px;
                  font-size: 8px;
                }
               
                
            }
              .list_intro button{
                font-size: small;
            }
            @media (max-width: 450px) {
                .list_intro button{
                font-size: 6px;
            }
                
            }

            .menu1-Courses1{
              
                margin-top: 8%;
            }
            .mb-3{
          text-align: left;
              font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }
           
            nav ul a , .dropbtn{
	font-size: larger;
   }
   .brand:hover , .nav-link:hover{
color: white ;
   }

   .dropdown-menu{
    background-color: transparent;
   }

   .dropdown-menu button{
    background-color: #ddd;
    color: black;
   }
   
            
    </style>

    <style>

    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="imag/online-tutorials.png" alt="" style="width: 50px;hight: 50px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><?php echo $home ; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#about_section"><?php echo $About ; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#services_section"><?php echo $Services ; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#contactus_section"><?php echo $contact ; ?></a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto" style="margin-right: 10%;">
				<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Courses 
                        </a>
                        <ul  class="dropdown-menu" aria-labelledby="navbarDropdown" >
								<form action="info.php" method="Post">
						<?php
                                            if ($sql->num_rows > 0) {
                                                $x = 1;
                                                // Output the data
                                                while ($row = $sql->fetch_assoc()) {
                                                    ?>
													
                                                    <button id="course_<?php echo $x; ?>" name="course_1"
                                                            value="<?php echo $row['course_id']; ?>"
                                                            class="dropdown-item option"
                                                            onclick="getButtonValue(this)">
                                                        <?php echo $row["coursse_name"]; ?>
                                                    </button>
                                                    <?php
                                                    $x++;
                                                }
                                            }
                                            ?>
                                        </form>
                        </ul>
                    </li>
                   
            </div>
        </div>
    </nav>

    </header>
    <?php if($flag2 > 0){ ?>
<div class="page">
<list_intro class="list_intro">
   
    <button id="tutorialButton">Tutorial</button>
    <form action="" method="POST">
        <input type="hidden" name="current_course" value="<?php echo $t; ?>">
       
        <?php
      
        if ($result_info->num_rows > 0) {
            while ($row = $result_info->fetch_assoc()) {
                if ($row['stage'] == 0) {
        ?>
                    <button class="infoButton" name="info" value="<?php echo $row['item_id']; ?>" style="display: none;"><?php echo $row['option_']; ?></button>
        <?php
                
            }
        }
        ?>
    </form>
    <a href="quiz_option.php?t=<?php echo urlencode($t); ?>"><button>Test</button></a>
<?php } ?>
</list_intro>
<?php } ?>
<script>
    document.getElementById('tutorialButton').addEventListener('click', function() {
        var buttons = document.querySelectorAll('.infoButton');
        buttons.forEach(function(button) {
            button.style.display = 'inline-block';
        });
        document.getElementById('tutorialButton').style.display = 'none';
        document.getElementById('testButton').style.display = 'none';
    });
</script>


        <div class="introduction ">
 
   
        <?php if ($title != "") { ?>
            <div class="container mt-5">
            <h1 class="text-center"><?php echo $title; ?></h1>
            
            <p class="text-center">
              
                <?php echo $description;
                ?>  <center><img src="imag/65a0f93c599c3.jpg" alt="" class="pic_body" style="width:50% ; height:50% ;"></center>
                 </p>
                </div>
                <?php
              
    } ?>
           
                
                <div class="container mt-5">
        <?php
            for ($x = 1; $x <count($myArray); $x++) { ?>
              
                    <p class="formatted-text">
                        <?php echo isset($myArray[$x][1]) ? $myArray[$x][1] : ''; ?>
                        <br>

        <img src="imag/<?php echo $myArray[$x][2]; ?>" alt="Image not found" class="pic_body" style="width:50% ; height:50% ;">
   

                        </p>
               
            <?php
            }
        
        ?>
         </div>
    </div>
</div>
<div class=""></div>
<?php if ($title != "" && $flag2 !=0){?>
    <center>
<h1 class="Education">For Education by Video</h1>
<div class="video">
    <?php
    if ($result_video->num_rows > 0) {
        while ($row = $result_video->fetch_assoc()) {
    ?>
            <div class="item">
                <video controls muted loop style="width: 100%;">
                    <source src="videos/<?php echo $row["video"]; ?>">
                </video>
                <h3><?php echo $row['title']; ?></h3>
            </div>
    <?php
        }
    }
    ?>
    
</div>
<hr>
<br>
<hr>
<h1 class="Education">For Education by References</h1>
<div class="book">
    <?php
    if ($result_pdf->num_rows > 0) {
        while ($row = $result_pdf->fetch_assoc()) {
    ?>
            <a href="<?php echo $row["pdf_data"]; ?>" target='_blank' class="item">
                <img src="imag/<?php echo $row["img"]; ?>"  alt="Image not found">
                <h3 class="Education_book"><?php echo $row['title']; ?></h3>
            </a>
    <?php
        }
    }
    ?>
</div>

<br>
<br>
<hr>
<br>
<br>

</center>

    
    

<?php } else { ?>

<div class="footer-basic" id="footer-basic">
    <footer>
        <div class="social">
            <a href="#"><i class="icon ion-social-instagram"><img src="img/meduim/icons8-facebook-48.png"
                        alt=""></i></a>
            <a href="#"><i class="icon ion-social-snapchat"><img src="img/meduim/icons8-instagram-48.png"
                        alt=""></i></a>
            <a href="#"><i class="icon ion-social-twitter"><img src="img/meduim/icons8-whatsapp-48.png" alt=""></i></a>
            <a href="#"><i class="icon ion-social-facebook"><img src="img/meduim/icons8-youtube-48.png" alt=""></i></a>
        </div>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="indx.php">Home</a></li>
            <li class="list-inline-item"><a href="#developer">develop</a></li>
            <li class="list-inline-item"><a href="#about">About</a></li>
            <li class="list-inline-item"><a href="#contact">Contact</a></li>
        </ul>
        <p class="copyright">ALiSafaa © 2024</p>
    </footer>

</div>
<?php } ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

</body>

</html>