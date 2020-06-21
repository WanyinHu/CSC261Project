<!DOCTYPE html>
<html lang="en">
<head>
	<title>Restaurant List</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
	<link rel="stylesheet" type="text/css" href="css/css/util.css">
	<link rel="stylesheet" type="text/css" href="css/css/main.css">
<!--===============================================================================================-->
</head>
<body>
<?php
require_once('db_setup.php');
$sql = "USE whu12_1";
if($conn->query($sql)==TRUE){
	echo "\nUsing Database whu12_1";
}else{
	echo "Error using database: ". $conn->error;
}
$sql = "SELECT * FROM rest_list";
$result = $conn->query($sql);

// echo "<table border ='1'>
// <tr>
// <th>coll_id</th>
// <th>coll_name</th>
// <th>coll_owner</th>
// </tr>";
if($result->num_rows > 0){
 
//$stmt = $conn->prepare("Select * from Students Where Username like ?");
//$stmt->bind_param("s", $username);
//$result = $stmt->execute();
//$result = $conn->query($sql);
?>
<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1">
					<div class="table100-nextcols">
						<table>
							<thead>
   <!-- <table class="table table-striped"> -->
      							<tr class="row100 head">
         							<th class="cell100 column7">coll_id</th>
         							<th class="cell100 column2">rest_id</th>
      							</tr>
      						</thead>
<?php
while($row=$result->fetch_assoc())
{
?>
<!-- echo "<tr>";
echo "<td>" . $row['coll_id'] . "</td>";
echo "<td>" . $row['coll_name'] . "</td>";
echo "<td>" . $row['coll_owner'] . "</td>";
echo "</tr>"; -->
							</tbody>
	  							<tr class="row100 body">
          							<td class="cell100 column7"><?php echo $row['coll_id']?></td>
          							<td class="cell100 column2"><?php echo $row['rest_id']?></td>
      							</tr>
      						</tbody>
<?php
}
}
else {
echo "Item not found";
}
?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


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

			$(this).on('ps-x-reach-start', function(){
				$(this).parent().find('.table100-firstcol').removeClass('shadow-table100-firstcol');
			});

			$(this).on('ps-scroll-x', function(){
				$(this).parent().find('.table100-firstcol').addClass('shadow-table100-firstcol');
			});

		});

		
		
		
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<?php
$conn->close();
?>  

</body>
</html>