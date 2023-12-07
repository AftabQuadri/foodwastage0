<?php
$conn = new mysqli('localhost', 'root', '', 'foodwastage', '3307');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    function decryptPassword($hashedPassword, $enteredPassword) {
        // Use the password_verify function to compare the entered password with the hashed password
        $decryptedPassword = password_verify($enteredPassword, $hashedPassword);
        
        // Return true if the decrypted password matches, otherwise false
        return $decryptedPassword;
    }
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the entered username and password from the form
        $username = $_POST["email"];
        $password = $_POST["password"];
    
        // Retrieve the hashed password from the database based on the entered username
        // Assuming you have a "users" table with columns "username" and "password" in your database
        $sql = "SELECT password FROM receiver WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();
        $stmt->close();
    
        // Decrypt the hashed password and verify it with the entered password
        if ($hashedPassword && decryptPassword($hashedPassword, $password)) {
            // Passwords match, login successful
            // Redirect to the dashboard or desired page
            header("Location: index.html");
            exit();
        } else {
            // Passwords do not match, login failed
            // Display an error message or redirect to an error page
            echo "Invalid username or password.";
        }
    }
}
// Assuming you have a MySQL database connection established

// Function to decrypt the hashed password using bcrypt

?>
