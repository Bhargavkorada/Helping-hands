<?php
include('database.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ... (previous PHP code)
    echo "Dat stored successfully!";
    function sanitizeInput($input) {
        global $mysqli;
        return $mysqli->real_escape_string($input);
    }
    // Retrieve data from the form
    $location = sanitizeInput($_POST["location"]);
    $number = sanitizeInput($_POST["number"]);
    $description = sanitizeInput($_POST["description"]);

  

    // Insert data into the database
    $sqli = "INSERT INTO problem (location, number, description) VALUES ('$location', '$number', '$description')";

    // ... (continue with the previous PHP code)
    if ($mysqli->query($sqli) === TRUE) {
            header("Location: problem.php?registration1=success");
        exit();
    } else {
        echo "Error storing data: " . $mysqli->error;
    }
  
}
?>
