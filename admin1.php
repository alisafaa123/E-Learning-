<?php
require 'configration.php';
session_start();

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
$home1 = fetchText($conn, 5);
$home2 = fetchText($conn, 6);
$about1 = fetchText($conn, 7);
$about2 = fetchText($conn, 8);
$developer1 = fetchText($conn, 9);
$developer2 = fetchText($conn, 10);
$developer3 = fetchText($conn, 11);
$developer4 = fetchText($conn, 12);
$Services =fetchText($conn, 19);
	$Services1 =fetchText($conn, 23);
	$Services2 =fetchText($conn, 24);
	$Services3 =fetchText($conn, 25);
	$Services4 =fetchText($conn, 26);
	$Services5 =fetchText($conn, 27);
	$Services6 =fetchText($conn, 28);
	$Services7 =fetchText($conn, 29);
	$Services8 =fetchText($conn, 30);

if(isset($_POST['arabic'])) {

    function fetchText2($conn, $id) {
        $stmt = $conn->prepare("SELECT text_item FROM text_arabic WHERE id = ?");
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
    $home1 = fetchText2($conn, 5);
    $home2 = fetchText2($conn, 6);
    $about1 = fetchText2($conn, 7);
    $about2 = fetchText2($conn, 8);
    $developer1 = fetchText2($conn, 9);
    $developer2 = fetchText2($conn, 10);
    $developer3 = fetchText2($conn, 11);
    $developer4 = fetchText2($conn, 12);
	$Services =fetchText2($conn, 13);
	$Services1 =fetchText2($conn, 14);
	$Services2 =fetchText2($conn, 15);
	$Services3 =fetchText2($conn, 16);
	$Services4 =fetchText2($conn, 17);
	$Services5 =fetchText2($conn, 18);
	$Services6 =fetchText2($conn, 19);
	$Services7 =fetchText2($conn, 20);
	$Services8 =fetchText2($conn, 21);



}

function fetchpic($conn, $id) {
  $result = mysqli_query($conn, "SELECT pic FROM pic_of_home WHERE id = $id");

  if ($row = mysqli_fetch_assoc($result)) {
      return $row['pic'];
  } else {
      return 'No text at this page yet.';
  }
}

$path1 = fetchpic($conn,1);
$path2 = fetchpic($conn,2);
$path3 = fetchpic($conn,3);
$path4 = fetchpic($conn,4);
$path5 = fetchpic($conn,5);
$path6 = fetchpic($conn,6);
$path7 = fetchpic($conn,7);
$path8 = fetchpic($conn,8);
$path9 = fetchpic($conn,9);
$path10 = fetchpic($conn,10);
$path11 = fetchpic($conn,11);
$path12 = fetchpic($conn,12);
$path13 = fetchpic($conn,13);


if (isset($_POST["report"])) {
    $f = $_POST['first'];
    $s = $_POST['second'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $des = $_POST['desc'];
    $sql = "INSERT INTO report (fname, lname, email, title, description	) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("sssss", $f, $s, $email, $title, $des);

// Execute the statement
if ($stmt->execute()) {
    echo "New record inserted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Comaptible" content="IE=edge">
	<title>Web based E-Learning System</title>
	<meta name="desciption" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style1.css?v=<?php echo time(); ?>">
	<script type="text/javascript" src="script.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>

<body>
	<!-- Navigation Bar -->
	<header id="header">
		<nav>
			<div class="logo"><img src="imag/<?php echo $path13 ?>" alt=""></div>
			<ul>
			
		</nav>
		<div class="head-container">
			<div class="quote">
				<p>     <?php echo $home1; ?></p>
				<h5>     <?php echo $home2; ?></h5>
				
			</div>
			<div class="svg-image">
                <img src="imag/<?php echo $path1 ?>" alt="">
               
 			</div>
                <div class="up">
                    <label for="image-upload" >Upload Image:</label>
                    <input type="file" id="image-upload" name="image1" accept="image/*">
                </div>
		</div>
         <center>  <button>update</button></center>
       

	</header>





	<!-- ABOUT -->
	<div class="diffSection" id="about_section">
		<center>
			<p style="font-size: 50px; padding: 100px" class="_title">     <?php echo $About; ?></p>
		</center>
		<div class="about-content">
			<div class="side-image">
                   <img  class="sideImage"  src="imag/<?php echo $path2 ?>" alt="">
			</div>
			<div class="side-text">
				<h2>     <?php echo $about1; ?></h2>
				<p>     <?php echo $about2; ?></p>
			</div>
		</div>
	</div>




	<!-- TEAM -->
	<div class="diffSection" id="team_section">
		<center>
			<p style="font-size: 50px; padding-top: 100px; padding-bottom: 60px;" class="_title">We're the Creators</p>
		</center>
		<div class="totalcard">
			<div class="card">
				<center><img src="imag/<?php echo $path3 ?>" alt=""></center>
				<center>
					<div class="card-title">     <?php echo $developer1; ?></div>
					<div id="detail">
						<p>“<?php echo $developer2; ?>“</p>
						<div class="duty"></div>
						<a href="https://www.linkedin.com/in//" target="_blank"><button
								class="btn-roshan">Follow +</button></a>
					</div>
				</center>
			</div>
			<div class="card">
				<center><img src="imag/<?php echo $path4 ?>" alt=""></center>
				<center>
					<div class="card-title"><?php echo $developer3; ?></div>
					<div id="detail">
						<p>“<?php echo $developer4; ?>“</p>
						<div class="duty"></div>
						<a href="https://www.linkedin.com/in//" target="_blank"><button
								class="btn-akhil">Follow +</button></a>
					</div>
				</center>
			</div>
		</div>
	</div>


	<!-- SERVICES -->
	<div class="service-swipe">
		<div class="diffSection" id="services_section">
			<center>
				<p style="font-size: 50px; padding: 100px; padding-bottom: 40px; color: #fff;">Services</p>
			</center>
		</div>
		<a>
			<div class="s-card"><img src="imag/<?php echo $path12 ?>" alt="">
				<p><?php echo $Services1; ?></p>
			</div>
		</a>
		<a>
			<div class="s-card"><img src="imag/<?php echo $path6 ?>" alt="">
				<p><?php echo $Services2; ?></p>
			</div>
		</a>
		<a>
			<div class="s-card"><img src="imag/<?php echo $path7 ?>" alt="">
				<p><?php echo $Services3; ?></p>
			</div>
		</a>
		<a>
			<div class="s-card"><img src="imag/<?php echo $path8 ?>" alt="">
				<p><?php echo $Services4; ?></p>
			</div>
		</a>
		<a>
			<div class="s-card"><img src="imag/<?php echo $path9 ?>" alt="">
				<p><?php echo $Services5; ?></p>
			</div>
		</a>
		<a>
			<div class="s-card"><img src="imag/<?php echo $path10 ?>" alt="">
				<p><?php echo $Services6; ?></p>
			</div>
		</a>
		<a>
			<div class="s-card"><img src="imag/<?php echo $path11 ?>" alt="">
				<p><?php echo $Services7; ?></p>
			</div>
		</a>
		<a>
			<div class="s-card"><img src="imag/<?php echo $path12 ?>" alt="">
				<p><?php echo $Services8; ?></p>
			</div>
		</a>
	</div>


	<!-- CONTACT US -->
	<div class="diffSection" id="contactus_section">
		<center>
			<p style="font-size: 50px; padding: 100px" class="_title">Contact Us</p>
		</center>
		<div class="csec"></div>
		<div class="back-contact">
			<div class="cc">
				<form action="" method="post">
					<label>First Name <span class="imp">*</span></label><label style="margin-left: 185px">Last Name
						<span class="imp">*</span></label><br>
					<center>
						<input type="text" name="" style="margin-right: 10px; width: 175px" required="required"><input
							type="text" name="lname" style="width: 175px" required="required"><br>
					</center>
					<label>Email <span class="imp">*</span></label><br>
					<input type="email" name="mail" style="width: 100%" required="required"><br>
					<label>Message</label><br>
					<textarea name="addtional"></textarea><br>
					<button type="submit" id="csubmit">Send Message</button>
				</form>
			</div>
		</div>
	</div>

	<!-- FOOTER -->
	<footer>
		<div class="footer-container">

			<div class="left-col">
				<div class="logo"></div>
				<div class="social-media">
					<a href="#"><img src="img/meduim/icons8-facebook-48.png"></a>
					<a href="#"><img src="img/meduim/icons8-instagram-48.png"></a>
					<a href="#"><img src="img/meduim/icons8-twitter-48.png"></a>
					<a href="#"><img src="img/meduim/icons8-whatsapp-48.png"></a>
					<a href="#"><img src="img/meduim/icons8-youtube-48.png"></a>
				</div><br><br>
				<p class="rights-text">Copyright © 2024 Created By ali safaa.</p>
				<p>email: alisafaa.ve911@gmail.com</p>
			</div>


		</div>
	</footer>

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