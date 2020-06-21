<!DOCTYPE html>
<html lang="en">
<head>
  <title>Restaurant</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/css2/util.css">
  <link rel="stylesheet" type="text/css" href="css/css2/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="css/css3/util.css">
  <link rel="stylesheet" type="text/css" href="css/css3/main.css">
</head>
<body>
  <div class="limiter">
      <div class="container-table100">
        <div class="wrap-table100">
          <div class="table100 ver1 m-b-110">
              <table data-vertable="ver1">
                <thead>
                  <tr class="row100 head">
<!--                     <th class="column100 column1" data-column="column1"></th> -->
                    <th class="column100 column1" data-column="column1">rest_id</th>
                    <th class="column100 column2" data-column="column2">rest_tel</th>
                    <th class="column100 column3" data-column="column3">rest_add</th>
                    <th class="column100 column4" data-column="column4">rest_name</th>
                    <th class="column100 column5" data-column="column5">rest_type</th>
                    <th class="column100 column6" data-column="column6">rest_takeout</th>
                    <th class="column100 column7" data-column="column7">rest_delivery</th>
                  </tr>
                </thead>
<?php
require_once('db_setup.php');
$sql = "USE sxue3_1";
if ($conn->query($sql) === TRUE) {
   // echo "using Database tbiswas2_company";
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:
$id = $_POST['rest_id'];
$sql = "SELECT * FROM restaurant where rest_id = $id;";

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
                    <td class="column100 column1" data-column="column1"><?php echo $row['rest_id']?></td>
                    <td class="column100 column2" data-column="column2"><?php echo $row['rest_tel']?></td>
                    <td class="column100 column3" data-column="column3"><?php echo $row['rest_add']?></td>
                    <td class="column100 column4" data-column="column4"><?php echo $row['rest_name']?></td>
                    <td class="column100 column5" data-column="column5"><?php echo $row['rest_type']?></td>
                    <td class="column100 column6" data-column="column6"><?php echo $row['rest_takeout']?></td>
                    <td class="column100 column7" data-column="column7"><?php echo $row['rest_delivery']?></td>
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
                <tbody>
<?php
$sql = "SELECT * FROM review where rest_id = $id;";

#$sql = "SELECT * FROM Students where Username like 'amai2';";
$result = $conn->query($sql);

if($result->num_rows > 0){
 
//$stmt = $conn->prepare("Select * from Students Where Username like ?");
//$stmt->bind_param("s", $username);
//$result = $stmt->execute();
//$result = $conn->query($sql);
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
}else {
echo "Item not found";
}
$conn->close();
?>  
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
  <div class="container-contact100">
    <div class="wrap-contact100">
      <form class="contact100-form validate-form" action="del_rest.html" method="post">
        <div class="container-contact100-form-btn">
          <div class="wrap-contact100-form-btn">
            <div class="contact100-form-bgbtn"></div>
            <button class="contact100-form-btn">
              <span>
                Delete Restaurant ID
                <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
              </span>
            </button>
          </div>
        </div>
      </form>
      <form class="contact100-form validate-form" action="menu.html" method="post">
        <div class="container-contact100-form-btn">
          <div class="wrap-contact100-form-btn">
            <div class="contact100-form-bgbtn"></div>
            <button class="contact100-form-btn">
              <span>
                Back to menu
                <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
              </span>
            </button>
          </div>
        </div>
      </form>
      </div>
  </div>



  <div id="dropDownSelect1"></div>

<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
  <script>
    $(".selection-2").select2({
      minimumResultsForSearch: 20,
      dropdownParent: $('#dropDownSelect1')
    });
  </script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/js/main.js"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->  
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->

  <script src="js/js2/main.js"></script>

</body>
</html>