<?php
require 'configration.php';
session_start();

if (!isset($_SESSION['id_admin'])) {
    header("location: login.php");
    exit();
}

$sql = "SELECT * FROM pdf";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <div>
            <h1><?php echo $row['title']; ?></h1>
            <a href="<?php echo $row["pdf_data"]; ?>" target='_blank'>
                <img src="imag/<?php echo $row["img"]; ?>" alt="Image not found">
            </a>
        </div>
        <?php
    }
}
?>

</body>
</html>
