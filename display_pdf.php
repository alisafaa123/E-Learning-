<?php
require 'configration.php';


if (!isset($_SESSION['id_admin'])) {
    header("location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM pdf WHERE id = $id";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pdfData = $row['pdf_data'];

        // Set the appropriate headers for PDF
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $row['title'] . '.pdf"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($pdfData));
       
        // Output the PDF data
        echo $pdfData;
        exit();
    } else {
        echo "PDF not found.";
    }
} else {
    echo "Invalid request.";
}


?>
