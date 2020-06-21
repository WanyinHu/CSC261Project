<?php
require_once('db_setup.php');
$sql = "USE sxue3_1";
if ($conn->query($sql) === TRUE) {
   // echo "using Database create";
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:
$id = $_POST['rest_id'];
$tel = $_POST['rest_tel'];
$add = $_POST['rest_add'];
$name = $_POST['rest_name'];
$type = $_POST['rest_type'];
$takeout = $_POST['rest_takeout'];
$delivery = $_POST['rest_delivery'];
$sql = "INSERT INTO restaurant values ($id, $tel, '$add', '$name', $type, $takeout, $delivery)";


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