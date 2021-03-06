<!DOCTYPE html>
<html lang="en">
<head>
	<title>User</title>
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
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1">
					<div class="table100-firstcol">
						<table>
							<thead>
      							<tr class="row100 head">
         							<th class="cell100 column1">user_id</th>
      							</tr>
      						</thead>
<?php
while($row = $result->fetch_assoc())
{
?>
							</tbody>
								<tr class="row100 body">
									<td class ="cell100 column1"><?php echo $row['user_id']?></td>
								</tr>
							</tbody>
<?php
}
?>
						</table>
					</div>
					<div class="wrap-table100-nextcols js-pscroll">
						<div class="table100-nextcols">
							<table>
								<thread>
									<tr class="row100 head">
										<th class="cell100 column2">user_name</th>
										<th class="cell100 column3">user_tel</th>
										<th class="cell100 column5">user_add</th>
										<th class="cell100 column6">user_email</th>
									</tr>
								</thread>
<?php
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
while($row = $result->fetch_assoc())
{
?>
								</tbody>
		  							<tr class="row100 body">
	          							<td class="cell100 column2"><?php echo $row['user_name']?></td>
	          							<td class="cell100 column3"><?php echo $row['user_tel']?></td>
	          							<td class="cell100 column4"><?php echo $row['user_add']?></td>
	          							<td class="cell100 column5"><?php echo $row['user_email']?></td>
	      							</tr>
	      						</tbody>
<?php
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