<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images1/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/css1/util.css">
  <link rel="stylesheet" type="text/css" href="css/css1/main.css">
<!--===============================================================================================-->
</head>
<body>
  <div class="limiter">
      <div class="container-table100">
        <div class="wrap-table100">
          <div class="table100 ver5 m-b-110">
            <div class="table100-head">
              <table>
                <thead>
                  <tr class="row100 head">
                    <th class="cell100 column1">user_id</th>
                    <th class="cell100 column2">rate</th>
                    <th class="cell100 column3">restaurant</th>
                    <th class="cell100 column4">date</th>
                    <th class="cell100 column5">review</th>
                  </tr>
                </thead>
              </table>
            </div>
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
$sql = "SELECT user_id,rate,rest_name,content,review_date FROM review INNER JOIN restaurant ON review.rest_id = restaurant.rest_id WHERE user_id = $id;";

#$sql = "SELECT * FROM Students where Username like 'amai2';";
$result = $conn->query($sql);

if($result->num_rows > 0){
 
//$stmt = $conn->prepare("Select * from Students Where Username like ?");
//$stmt->bind_param("s", $username);
//$result = $stmt->execute();
//$result = $conn->query($sql);
?>
          <div class="table100-body js-pscroll">
            <table>
              <tbody>
<?php
while($row = $result->fetch_assoc()){
?>
                <tr class="row100 body">
                    <td class="cell100 column1"><?php echo $row['user_id']?></td>
                    <td class="cell100 column2"><?php echo $row['rate']?></td>
                    <td class="cell100 column3"><?php echo $row['rest_name']?></td>
                    <td class="cell100 column4"><?php echo $row['review_date']?></td>
                    <td class="cell100 column5"><?php echo $row['content']?></td>
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
  </div>
<?php
$conn->close();
?>  
<!--===============================================================================================-->  
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script>
    $('.js-pscroll').each(function(){
      var ps = new PerfectScrollbar(this);

      $(window).on('resize', function(){
        ps.update();
      })
    });
      
    
  </script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>
</body>
</html>
