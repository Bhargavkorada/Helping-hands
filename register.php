<?php
// Include the database connection file
include('database.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input from the registration form
    $Firstname = $_POST['fname'];
    $Lastname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['newPassword'];
    $cpassword = $_POST['cPassword'];
    $phnum = $_POST['phno'];

    // Hash the password for secure storage
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    try {
        // Attempt to insert data into the database
        $sql = "INSERT INTO registration (Firstname, Lastname, password, cpassword, email, phnumber) VALUES ('$Firstname','$Lastname', '$hashedPassword','$cpassword', '$email','$phnum')";

        $mysqli->query($sql);
        
        // Redirect to home page with success message
        header("Location: home.php?registration=success");
        exit();
    } catch (mysqli_sql_exception $e) {
        // Duplicate entry error occurred
        header("Location: home.php?error=duplicate_email");
        exit();
    }

  
  
}
?>

