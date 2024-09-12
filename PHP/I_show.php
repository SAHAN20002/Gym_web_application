
<?php
include 'phpcon.php';
 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT Instructor_Id, Name, price, description,In_photo FROM instructor_show";   
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;  
    }
    echo json_encode($data);
   
} else {
    echo json_encode([]);
}





$conn->close();
?>
