<?php
// Include the database connection file
include('database.php');

// Initialize isLoggedIn variable
$isLoggedIn = false;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input from the login form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user data from the database
    $sql = "SELECT id, Firstname, Lastname,password FROM registration WHERE email = '$email'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Start a session and store user information
            session_start();
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['firstname'] = $row['Firstname'];
            $_SESSION['lastname'] = $row['Lastname'];
            
            // Set isLoggedIn to true
            $isLoggedIn = true;
        } else {
            // Display an error message if the password is incorrect
            echo "Invalid password";
        }
    } else {
        // Display an error message if the email is not found
        echo "Email not found";
    }

    $result->free_result();
    $mysqli->close();
}
?>
