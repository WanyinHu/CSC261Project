<!DOCTYPE html>
<html lang="en">
<head>
  <title>Review</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images2/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor2/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts2/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor2/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor2/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor2/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css2/util.css">
  <link rel="stylesheet" type="text/css" href="css2/main.css">
<!--===============================================================================================-->
</head>
<body>
  <div class="limiter">
      <div class="container-table100">
        <div class="wrap-table100">
          <div class="table100 ver2 m-b-110">
              <table data-vertable="ver2">
                <thead>
                  <tr class="row100 head">
<!--                     <th class="column100 column1" data-column="column1"></th> -->
                    <th class="column100 column1" data-column="column1">review_id</th>
                    <th class="column100 column2" data-column="column2">rest_id</th>
                    <th class="column100 column3" data-column="column3">rate</th>
                    <th class="column100 column4" data-column="column4">user_id</th>
                    <th class="column100 column5" data-column="column5">content</th>
                    <th class="column100 column6" data-column="column6">review_date</th>
                  </tr>
                </thead>
<?php
require_once('db_setup.php');
$sql = "USE whu12_1";
if ($conn->query($sql) === TRUE) {
   // echo "using Database tbiswas2_company";
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:
$id = $_POST['id'];
$sql = "SELECT * FROM review where review_id = $id;";

#$sql = "SELECT * FROM Students where Username like 'amai2';";
$result = $conn->query($sql);

if($result->num_rows > 0){
 
//$stmt = $conn->prepare("Select * from Students Where Username like ?");
//$stmt->bind_param("s", $username);
//$result = $stmt->execute();
//$result = $conn->query($sql);
?>
              <tbody>
<?php
while($row = $result->fetch_assoc()){
?>
                <tr class="row100 ">
                    <td class="column100 column1" data-column="column1"><?php echo $row['review_id']?></td>
                    <td class="column100 column2" data-column="column2"><?php echo $row['rest_id']?></td>
                    <td class="column100 column3" data-column="column3"><?php echo $row['rate']?></td>
                    <td class="column100 column4" data-column="column4"><?php echo $row['user_id']?></td>
                    <td class="column100 column5" data-column="column5"><?php echo $row['content']?></td>
                    <td class="column100 column6" data-column="column6"><?php echo $row['review_date']?></td>
                </tr>            
<?php
}
}
else {
echo "Item not found";
}
?>
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
<?php
$conn->close();
?>  
<!--===============================================================================================-->  
  <script src="vendor2/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor2/bootstrap/js/popper.js"></script>
  <script src="vendor2/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor2/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="js2/main.js"></script>

</body>
</html>