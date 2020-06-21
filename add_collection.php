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
$id = $_POST['coll_id'];
$name = $_POST['coll_name'];
$owner = $_POST['coll_owner'];
$sql = "INSERT INTO collection values ($id, '$name', $owner);";


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
                    <th class="cell100 column1">coll_id</th>
                    <th class="cell100 column2">coll_name</th>
                    <th class="cell100 column3">coll_owner</th>
                  </tr>
                </thead>
              </table>
            </div>
<?php
$sql = "SELECT * FROM collection where coll_id = $owner;";

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
                    <td class="cell100 column1"><?php echo $row['coll_id']?></td>
                    <td class="cell100 column2"><?php echo $row['coll_name']?></td>
                    <td class="cell100 column3"><?php echo $row['coll_owner']?></td>
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
			<form class="contact100-form validate-form" action="menu.html" method="post">
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							<span>
								Back to Menu?
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
$conn->close();
?>  
<?php
} else {
?>
    <div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="add_collection.html" method="post">
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
?>  