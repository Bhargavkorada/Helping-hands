<?php
include('database.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ... (previous PHP code)
    function sanitizeInput($input) {
        global $mysqli;
        return $mysqli->real_escape_string($input);
    }
    // Retrieve data from the form
    $location = sanitizeInput($_POST["location"]);
    $timings = sanitizeInput($_POST["timings"]);
    $description = sanitizeInput($_POST["description"]);
    $number = sanitizeInput($_POST["number"]);

    // Handle file upload
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
        $photoData = file_get_contents($_FILES["photo"]["tmp_name"]);
        $photoData = $mysqli->real_escape_string($photoData);
        $filename = sanitizeInput($_FILES["photo"]["name"]);
    }

    // Insert data into the database
    $sql = "INSERT INTO activity (location, timings, description, photo, filename,number) VALUES ('$location', '$timings', '$description', '$photoData', '$filename', '$number')";

    // ... (continue with the previous PHP code)
    if ($mysqli->query($sql) === TRUE) {
        header("Location: index.php?registration=success");
    exit();
        
    } else {
        header("Location: index.php?error=duplicate_email");
    exit();
    }

}
?>
