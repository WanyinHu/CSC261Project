<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Review</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/css3/util.css">
	<link rel="stylesheet" type="text/css" href="css/css3/main.css">
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="css/css1/util.css">
    <link rel="stylesheet" type="text/css" href="css/css1/main.css">
</head>
<body>
<?php
require_once('db_setup.php');
$sql = "USE sxue3_1";
if ($conn->query($sql) === TRUE) {
   // echo "using Database create";
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:
$id = $_POST['review_id'];
$rest = $_POST['rest_id'];
$rate = $_POST['rate'];
$user = $_POST['user_id'];
$content = $_POST['content'];
$date = $_POST['review_date'];
$sql = "INSERT INTO review values($id, $rest, $rate, $user, '$content', $date)";
#$sql = "SELECT * FROM Students where Username like 'amai2';";
$result = $conn->query($sql);
if ($result === TRUE) {
?>
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
$sql = "SELECT user_id,rate,rest_name,content,review_date FROM review INNER JOIN restaurant ON review.rest_id = restaurant.rest_id WHERE user_id = $user;";
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
  <div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="add_collection.html" method="post">
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							<span>
								Add a collection?
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
} else {
?>
    <div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="add_review.html" method="post">
				<span class="contact100-form-title">
					Error
				</span>
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							<span>
								Try Again?
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php
}
$conn->close();
?>  




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

</body>
</html>