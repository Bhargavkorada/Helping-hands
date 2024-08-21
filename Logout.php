<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['isLoggedIn'])) {
    // If logged in, destroy the session
    session_destroy();

    // Redirect the user to the home page or wherever you want after logout
    
} else {
    // If not logged in, you can handle it accordingly (optional)
    echo "User is not logged in.";
}
?>
