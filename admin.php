<?php
require 'configration.php';
session_start();

if (!isset($_SESSION['id_admin'])) {
    header("location: login.php");
    exit();
}

$x = "text_item" ;
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
	$developer5 =fetchText($conn, 31);

if(isset($_POST['arabic'])) {
$x = "arabic";
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
    $home1 = fetchText2($conn, 5);
    $home2 = fetchText2($conn, 6);
    $about1 = fetchText2($conn, 7);
    $about2 = fetchText2($conn, 8);
    $developer1 = fetchText2($conn, 9);
    $developer2 = fetchText2($conn, 10);
    $developer3 = fetchText2($conn, 11);
    $developer4 = fetchText2($conn, 12);
	$Services =fetchText2($conn,19);
	$Services1 =fetchText2($conn, 23);
	$Services2 =fetchText2($conn, 24);
	$Services3 =fetchText2($conn, 25);
	$Services4 =fetchText2($conn, 26);
	$Services5 =fetchText2($conn, 27);
	$Services7 =fetchText2($conn, 29);
	$Services8 =fetchText2($conn, 30);
	$developer5 =fetchText2($conn, 31);



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

$path10 = fetchpic($conn,10);
$path11 = fetchpic($conn,11);
$path12 = fetchpic($conn,12);
$path13 = fetchpic($conn,13);

if(isset($_POST['submit1'])) {
    if(isset($_POST['language'])) {
        $x = $_POST['language'];
    }
    $title = $_POST['title'];
    $paragraph1 = $_POST['paragraph1'];
    $paragraph2 = $_POST['paragraph2'];

    // Check if a new image has been uploaded
   
    if(isset($path1)) {
        $update_query = "UPDATE texts SET $x = '$title' WHERE id = 1"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE texts SET $x = '$paragraph1' WHERE id = 5"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE texts SET $x = '$paragraph2' WHERE id = 6"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE pic_of_home SET pic = '$path1' WHERE id = 1"; 
        $result = mysqli_query($conn, $update_query);
    } else {
        $update_query = "UPDATE texts SET $x = '$title' WHERE id = 1"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE texts SET $x = '$paragraph1' WHERE id = 5"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE texts SET $x = '$paragraph2' WHERE id = 6";
        $result = mysqli_query($conn, $update_query); 
    }

    $result = mysqli_query($conn, $update_query);

    if($result) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating data: " . mysqli_error($conn);
    }
}

if(isset($_POST['submit2'])) {
    if(isset($_POST['language'])) {
        $x = $_POST['language'];
    }
    $title = $_POST['title'];
    $paragraph1 = $_POST['paragraph1'];
    $paragraph2 = $_POST['paragraph2'];

    // Check if a new image has been uploaded
   
    if(isset($path1)) {
        $update_query = "UPDATE texts SET $x = '$title' WHERE id = 2"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE texts SET $x = '$paragraph1' WHERE id = 7"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE texts SET $x = '$paragraph2' WHERE id = 8"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE pic_of_home SET pic = '$path1' WHERE id = 2"; 
        $result = mysqli_query($conn, $update_query);
    } else {
        $update_query = "UPDATE texts SET $x = '$title' WHERE id = 2"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE texts SET $x = '$paragraph1' WHERE id = 7"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE texts SET $x = '$paragraph2' WHERE id = 8";
        $result = mysqli_query($conn, $update_query); 
    }

    $result = mysqli_query($conn, $update_query);

    if($result) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating data: " . mysqli_error($conn);
    }
}


if(isset($_POST['submit3'])) {
    if(isset($_POST['language'])) {
        $x = $_POST['language'];
    }
    $title = $_POST['title'];
    $paragraph1 = $_POST['paragraph1'];
    $developer1 = $_POST['developer1'];
    $developer2 = $_POST['developer2'];
    $namedeveloper1 = $_POST['namedeveloper1'];
    $namedeveloper2 = $_POST['namedeveloper2'];
    



    

    // Check if a new image has been uploaded
   
    if(isset($path3)) {
        $update_query = "UPDATE texts SET $x = '$title' WHERE id = 3"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE texts SET $x = '$paragraph1' WHERE id = 31"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE texts SET $x = '$developer1' WHERE id = 9"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE texts SET $x = '$developer2' WHERE id = 10"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE texts SET $x = '$namedeveloper1' WHERE id = 11"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE texts SET $x = '$namedeveloper2' WHERE id = 12"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE pic_of_home SET pic = '$path3' WHERE id = 3"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE pic_of_home SET pic = '$path4' WHERE id = 4"; 
        $result = mysqli_query($conn, $update_query);
    } else {
        $update_query = "UPDATE texts SET $x = '$title' WHERE id = 3"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE texts SET $x = '$paragraph1' WHERE id = 31"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE texts SET $x = '$developer1' WHERE id = 9"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE texts SET $x = '$developer2' WHERE id = 10"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE texts SET $x = '$namedeveloper1' WHERE id = 11"; 
        $result = mysqli_query($conn, $update_query);
        $update_query = "UPDATE texts SET $x = '$namedeveloper2' WHERE id = 12"; 
        $result = mysqli_query($conn, $update_query);
    }

    $result = mysqli_query($conn, $update_query);

    if($result) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating data: " . mysqli_error($conn);
    }
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        section {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1, h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"],
        textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <section>
        <h1>Welcome to Admin Panel</h1>
        <h3>You can update your home page:</h3>
          <form action="" method="post">
          <button type="submit" name="arabic">Arabic</button>
          <button type="submit" name="English">English</button>
          </form>
          
        <form action="" method="post"  class="first" enctype="multipart/form-data">
            <h3>the language</h3>
            <center>
            <label for="">Arabic</label>
            <input type="checkbox" name="language" value="arabic">
            <label for="">English</label>
            <input type="checkbox" name="language" value="text_item">
            </center>

            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?php echo $home ; ?>">

            <label for="paragraph1">Paragraph 1:</label>
            <textarea name="paragraph1" id="paragraph1" cols="30" rows="6"><?php echo $home1 ; ?></textarea>

            <label for="paragraph2">Paragraph 2:</label>
            <textarea name="paragraph2" id="paragraph2" cols="30" rows="6"><?php echo $home2 ; ?></textarea>

            <label for="image1">Image 1:</label>
            <input type="file" name="image1" id="image1" value="">
            <img src="imag/<?php echo $path1 ; ?>" alt="Image 1">

          

            <button type="submit" name="submit1">Upload</button>
        </form>
    </section>

    <section>
      <h1>about</h1>
          
        <form action="" method="post"  class="first" enctype="multipart/form-data">
            <h3>the language</h3>
            <center>
            <label for="">Arabic</label>
            <input type="checkbox" name="language" value="arabic">
            <label for="">English</label>
            <input type="checkbox" name="language" value="text_item">
            </center>

            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?php echo $About ; ?>">

            <label for="paragraph1">Paragraph 1:</label>
            <textarea name="paragraph1" id="paragraph1" cols="30" rows="6"><?php echo $about1 ; ?></textarea>

            <label for="paragraph2">Paragraph 2:</label>
            <textarea name="paragraph2" id="paragraph2" cols="30" rows="6"><?php echo $about2 ; ?></textarea>

            <label for="image1">Image 1:</label>
            <input type="file" name="image1" id="image1" value="">
            <img src="imag/<?php echo $path2 ; ?>" alt="Image 1">

          

            <button type="submit" name="submit2">Upload</button>
        </form>
    </section>

    <section>
      <h1>developer</h1>
          
        <form action="" method="post"  class="first" enctype="multipart/form-data">
            <h3>the language</h3>
            <center>
            <label for="">Arabic</label>
            <input type="checkbox" name="language" value="arabic">
            <label for="">English</label>
            <input type="checkbox" name="language" value="text_item">
            </center>

            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?php echo $developer ; ?>">

            <label for="paragraph1">Paragraph 1:</label>
            <textarea name="paragraph1" id="paragraph1" cols="30" rows="6"><?php echo $developer5 ; ?></textarea>

            <label for="developer1">developer1:</label>
            <input type="text" name="developer1" id="developer1" value="<?php echo $developer1 ; ?>">
            <label for="namedeveloper1"> name developer1:</label>
            <input type="text" name="namedeveloper1" id="namedeveloper1" value="<?php echo $developer2 ; ?>">
            <label for="image1">Image 1:</label>
            <input type="file" name="image1" id="image1" value="">
            <img src="imag/<?php echo $path3 ; ?>" alt="Image 1">

            <label for="developer2">developer2:</label>
            <input type="text" name="developer2" id="developer2" value="<?php echo $developer3 ; ?>">
            <label for="title"> name developer2:</label>
            <input type="namedeveloper2" name="namedeveloper2" id="namedeveloper2" value="<?php echo $developer4 ; ?>">
            <label for="image2">Image 2:</label>
            <input type="file" name="image2" id="image2" value="">
            <img src="imag/<?php echo $path4 ; ?>" alt="Image 1">

           

          

            <button type="submit" name="submit3">Upload</button>
        </form>
    </section>
</body>
</html>
