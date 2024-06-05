<?php
require 'configration.php';
session_start();

$id = $_GET['a'];

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
$developer = fetchText($conn, 3);
$contact = fetchText($conn, 4);
$about2 = fetchText($conn, $id);
$Services =fetchText($conn,19);



if(isset($_POST['arabic'])) {

    function fetchText2($conn, $id) {
        $stmt = $conn->prepare("SELECT arabic FROM texts WHERE id = ?");
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

    $home = fetchText2($conn, 1);
    $About = fetchText2($conn, 2);
    $developer = fetchText2($conn, 3);
    $contact = fetchText2($conn, 4);
   
    $about2 = fetchText2($conn, $id);
    
	$Services =fetchText2($conn,19);
	



}

function fetchpic($conn, $id) {
  $result = mysqli_query($conn, "SELECT pic FROM pic_of_home WHERE id = $id");

  if ($row = mysqli_fetch_assoc($result)) {
      return $row['pic'];
  } else {
      return 'No text at this page yet.';
  }
}

$path2 = fetchpic($conn,15);




?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Comaptible" content="IE=edge">
	<title>Web based E-Learning System</title>
	<meta name="desciption" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style1.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="css/drop.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="css/head.css?v=<?php echo time(); ?>">

	<script type="text/javascript" src="script.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

	<style>
		.head-container .quote video{
			width: 300px; 
			height: 300px;
	}
   nav ul a , .dropbtn{
	font-size: larger;
   }
   .brand:hover , .nav-link:hover{
color: white ;
   }
   .navbar{
	background-color: blue;
   }
   .space{
	display: none;
   }

   @media (max-width: 1100px) {
              #about_section p{
				font-size: smaller;
			  }
            }

			@media (max-width: 600px) {
				.space{
	display: block;
   }
              .quote {
			width: 50%;
			  }
			  .quote p{
			font-size: larger;
			  }
            }
			.head-container {
				margin-top: 100px;
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	justify-content: space-around;
}

.side-text {
	width: 75%;
	margin-left: 12.5%;
}

@media (max-width: 900px) {
	.head-container .quote video{
		width: 100%;
		height: 100%;
	}
	.head-container .quote p ,.head-container .quote h5{
		font-size: 10px;
	}
				
				.about-content .side-text {
					width: 80%;
					margin-right: 5%;
					
				}
            }
	
	</style>
	
</head>

<body>
	

<header id="header">
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="width: 100%;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="imag/online-tutorials.png" alt="" style="width: 50px;hight: 50px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php" ><?php echo $home ; ?></a>
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
              
					
                <ul class="navbar-nav ms-auto">
				<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            language 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
					
										<form action="" method="Post">
                                                    <button id="course_" name="arabic">
                                                      
                                                      Arabic 
                                                    </button>
													<button id="course_" name="">
                                                      
                                                      English 
                                                    </button>
                                                
                                        </form>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                  
                </ul>
            </div>
        </div>
    </nav>


	</header>



	<!-- ABOUT -->
	<div class="diffSection" id="about_section" >
		<center>
			<p style="font-size: 50px; padding: 100px" class="_title">     <?php echo $Services; ?></p>
		</center>
		<div class="about-content">
			<div class="side-image">
                   <img  class="sideImage"  src="imag/<?php echo $path2 ?>" alt="">
			</div>
			<div class="side-text">
				<h2>  <?php echo $Services; ?></h2>
				<p>     <?php echo $about2; ?></p>
			</div>
		</div>
	</div>



	<hr><hr>

	    <script>// Changing the style of scroll bar
			// window.onscroll = function() {myFunction()};
					
			// function myFunction() {
			// 	var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
			// 	var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
			// 	var scrolled = (winScroll / height) * 100;
			// 	document.getElementById("myBar").style.width = scrolled + "%"; 
			// }

			function scrollAppear() {
				var introText = document.querySelector('.side-text');
				var sideImage = document.querySelector('.sideImage');
				var introPosition = introText.getBoundingClientRect().top;
				var imagePosition = sideImage.getBoundingClientRect().top;
				
				var screenPosition = window.innerHeight / 1.2;
			
				if(introPosition < screenPosition) {
				introText.classList.add('side-text-appear');
				}
				if(imagePosition < screenPosition) {
				sideImage.classList.add('sideImage-appear');
				}
			}
			
			window.addEventListener('scroll', scrollAppear);
			
			// For switching between navigation menus in mobile mode
			var i = 2;
			function switchTAB() {
				var x = document.getElementById("list-switch");
				if(i%2 == 0) {
					document.getElementById("list-switch").style= "display: grid; height: 50vh; margin-left: 5%;";
					document.getElementById("search-switch").style= "display: block; margin-left: 5%;";
				}else {
					document.getElementById("list-switch").style= "display: none;";
					document.getElementById("search-switch").style= "display: none;";
				}
				i++;
			}
			
			

			
			function startquiz() {
				document.getElementById('title').style = 'display: none;'; 
			
				document.getElementById('panel').style = 'display: inline-flex;'; 
				document.getElementById('left').style = 'display: block;'; 
				document.getElementById('right').style = 'display: block;'; 
			}
			function searchdisplay() {
				document.getElementById('searchpanel').style.display="block";
			}
			
			function display(n) {
				var img1 = document.getElementById('img1');
				var img2 = document.getElementById('img2');
				var img3 = document.getElementById('img3');
				var img4 = document.getElementById('img4');
				var s1 = document.getElementById('s1');
				var s2 = document.getElementById('s2');
				var s3 = document.getElementById('s3');
				var s4 = document.getElementById('s4');
			
				img1.style = 'display: none;';
				img2.style = 'display: none;';
				img3.style = 'display: none;';
				img4.style = 'display: none;';
				s1.style = 'background: #DF2771; color: #FFF;';
				s2.style = 'background: #DF2771; color: #FFF;';
				s3.style = 'background: #DF2771; color: #FFF;';
				s4.style = 'background: #DF2771; color: #FFF;';
			
				if(n==1) {
				img1.style = 'display: block;';
				s1.style = 'background: #E5E8EF; color: #DF2771;';
				}
				if(n==2) {
				img2.style = 'display: block;';
				s2.style = 'background: #E5E8EF; color: #DF2771;';
				}
				if(n==3) {
				img3.style = 'display: block;';
				s3.style = 'background: #E5E8EF; color: #DF2771;';
				}
				if(n==4) {
				img4.style = 'display: block;';
				s4.style = 'background: #E5E8EF; color: #DF2771;';
				} 
			}
			
			
			function sideMenu(side) {
				var menu = document.getElementById('side-menu');
				if(side==0) {
				menu.style = 'transform: translateX(0vh); position:fixed;';
				}
				else {
				menu.style = 'transform: translateX(-100%);';
				}
				side++;
			}

        </script>

</body>

</html>