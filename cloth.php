<?php
// Assuming you have a MySQL database connection established
$servername = "localhost";
$username = "root";
$password = "";
$port = 3307;
$database = "foodwastage"; // Replace with your actual database name

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $clothType = $_POST["clothtype"];
    $descriptions = $_POST["password"];
    $quantity = $_POST["quantity"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $pincode = $_POST["pincode"];
    $contactNo = $_POST["contactno"];
    $username=$_POST["username"];
    
    // Handle the uploaded image
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
    } else {
        // If no image is uploaded, you can set a default image or handle the case differently
        $imageData = null;
    }
    
    // Prepare the SQL statement to insert the form data into the database
    // Assuming you have a "cloth_details" table with appropriate columns in your database
    $sql = "INSERT INTO clothdetails (clothtype, description, quantity, address, city, state, pincode, contactno, images, name)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisssisss", $clothType, $descriptions, $quantity, $address, $city, $state, $pincode, $contactNo, $imageData, $username);
    $stmt->execute();
    $stmt->close();

    // Display a success message or redirect to a success page
    echo '<script>alert("Cloth details updated.........!");
    window.location.href = "dondashboard.html";</script>';
}

// Close the database connection
$conn->close();
?>
