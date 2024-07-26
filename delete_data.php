<?php
// Get the values from the POST request
$id_menu = $_POST['id_menu'];
$label = $_POST['label'];

// Database connection
$servername = "localhost"; 
$username = "username"; 
$password = "password"; 
$dbname = "Restoran"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Prepare and bind
$stmt = $conn->prepare("DELETE FROM menu WHERE id_menu = ? AND label = ?");
$stmt->bind_param("is", $id_menu, $label);

// Execute the query
if ($stmt->execute()) {
    // If deletion is successful
    echo "1";
} else {
    // If deletion fails
    echo "2";
}

// Close the statement and connection
$stmt->close();
$conn->close();

exit();
?>
