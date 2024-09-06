<?php
include 'phpcon.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get data for a specific plan (you can adjust the query)
$sql = "SELECT p_id, name, price, benefits_1 FROM membership WHERE p_id = 'P001'";  // Replace table name and conditions as needed
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the data as an associative array
    $row = $result->fetch_assoc();
    echo json_encode($row);
   
} else {
    echo "No data found";
}

$conn->close();
?>
