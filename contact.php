<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$message=$_POST['message'];

$conn = new mysqli('localhost', 'root', '', 'foodwastage', '3307');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
            
            $stmt = $conn->prepare("INSERT INTO contact (Firstname,Lastname,email,message) VALUES (?, ?, ?,?)");
            $stmt->bind_param("ssss", $firstName,$lastName,$email,$message);
            $stmt->execute();
            echo'<script>alert("Message submitted.........!");
            window.location.href = "index.html";
            </script>';
        
        }
    

?>