<?php
// Assuming you have a MySQL database connection established
$conn = new mysqli('localhost', 'root', '', 'foodwastage', '3307');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
            
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the form data
        $foodItems = $_POST["fooditems"];
        $descriptions = $_POST["Descriptions"];
        $quantity = $_POST["quantity"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $pincode = $_POST["pincode"];
        $contactNo = $_POST["contactno"];
        $username=$_POST["username"];
        
       
        // Handle the uploaded image
if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    $imageType = $_FILES["image"]["type"];
    
    // Check if the image type is allowed
    $allowedTypes = array("image/jpeg", "image/png", "image/gif");
    if (in_array($imageType, $allowedTypes)) {
        $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
    } else {
        // Handle the case when the image type is not allowed
        echo "Error: Only JPEG, PNG, and GIF images are allowed.";
        exit();
    }
} else {
    // If no image is uploaded, you can set a default image or handle the case differently
    $defaultImage = "Images/abc.jpg";
    $imageData = file_get_contents($defaultImage);
}

        
        // Prepare the SQL statement to insert the form data into the database
        // Assuming you have a "food_details" table with appropriate columns in your database
        $sql = "INSERT INTO fooddetails (food_items, descriptions, address, city, state, pincode, contact,quantity, images, name)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssiisss", $foodItems, $descriptions, $address, $city, $state, $pincode, $contactNo, $quantity, $imageData ,$username);
        $stmt->execute();
        $stmt->close();
    
        // Display a success message or redirect to a success page
        echo '<script>alert("Food updated.........!");
        window.location.href = "dondashboard.php";</script>';
    }
}
// Check if the form is submitted

?>
