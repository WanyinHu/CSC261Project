<?php
require_once('db_setup.php');
$sql = "USE whu12_1";
if ($conn->query($sql) === TRUE) {
   // echo "using Database create";
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:
$id = $_POST['type_id'];
$type = $_POST['type'];
$sql = "INSERT INTO type values ($id, '$type')";


#$sql = "SELECT * FROM Students where Username like 'amai2';";
$result = $conn->query($sql);

if ($result === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} 
//$stmt = $conn->prepare("Select * from Students Where Username like ?");
//$stmt->bind_param("s", $username);
//$result = $stmt->execute();
//$result = $conn->query($sql);
?>

<?php
$conn->close();
?>  