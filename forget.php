<?php

$conn = new mysqli('localhost', 'root', '', 'foodwastage', '3307');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    function hashPassword($password) {
        // Use the password_hash function to generate a secure hash of the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Return the hashed password
        return $hashedPassword;
    }
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the entered username and new password from the form
        $username = $_POST["email"];
        $newPassword = $_POST["password"];
    
        // Hash the new password
        $hashedPassword = hashPassword($newPassword);
    
        // Update the password in the database for the specified username
        // Assuming you have a "users" table with columns "username" and "password" in your database
        $sql = "UPDATE donor SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashedPassword, $username);
        $stmt->execute();
        $stmt->close();
    
        // Display a success message or redirect to a success page
        echo'<script>alert("Password updated.......!");
        window.location.href = "donorsignup.html";
        </script>';
    }
}
// Assuming you have a MySQL database connection established

// Function to hash the password using bcrypt

?>

