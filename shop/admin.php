<?php 
session_start();
if($_SESSION['username'] == "admin") {
	$conn = mysqli_connect("localhost", "admin","admin", "ecommerce");
	$sql = "SELECT * FROM products";
	$sql2 = "SELECT * FROM users";
	$query = mysqli_query($conn, $sql);
	$query2 = mysqli_query($conn, $sql2);
	if ($query && $query2) {
		echo "Getting information from database...";
	} else {
		die ('SQL Error: ' . mysqli_error($conn));
	}
} 
else {
	header("location: index.php");
}

?>



<!DOCTYPE html>
<html>
<head>
	<title> Admin Page </title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	
	<div class = "header">
		<h1>Admin Page</h1>
		<h3>Product table</h3>
	</div> <br>

	<table  class="data-table">
		<caption class="title">Product</caption>
		<thead>
			<tr>
				<th>Product id</th>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Date</th>
				<th>Condition</th>
			</tr>
		</thead>
		
		<tbody>
			<?php 
			$no 	= 1;
			$total 	= 0;
			while ($row = mysqli_fetch_array($query)) {
			// $amount  = $row['amount'] == 0 ? '' : number_format($row['amount']);
				echo '<tr>
				<td>'.$row['id'].'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['description'].'</td>
				<td>'.$row['unit_price'].'</td>
				<td>'. date('F d, Y', strtotime($row['created_at'])) . '</td>
				<td>'.$row['condition'].'</td>
				</tr>';

			}
			?>
		</tbody>
	</table>

	<form method="POST" action="changeProduct.php">
		<table>
			<td>
				<input type="submit" name="Add_button" value=" Add product"></td>
			</tr>

			<td>
				<input type="submit" name="Update_button" value=" Update product"></td>
			</tr>

			<td>
				<input type="submit" name="Delete_button" value=" Delete product"></td>
			</tr>
			<br>

			
		</table>
		<br>
		<br>

		<table  class="data-table">
			<caption class="title">Users</caption>
			<thead>
				<tr>
					<th>User Id</th>
					<th>User Name</th>
					<th>Email</th>
				</tr>
			</thead>

			<tbody>
				<?php 
				$no 	= 1;
				$total 	= 0;
				while ($row = mysqli_fetch_array($query2)) {
			// $amount  = $row['amount'] == 0 ? '' : number_format($row['amount']);
					echo '<tr>
					<td>'.$row['id'].'</td>
					<td>'.$row['full_name'].'</td>
					<td>'.$row['email'].'</td>
					</tr>';
					
				}
				?>
			</tbody>
		</table>
	</form>

	<form method="POST" action="changeUser.php">
		<table>
			<td>
				<input type="submit" name="Add_button" value=" Add User"></td>
			</tr>

			<td>
				<input type="submit" name="Update_button" value=" Update User"></td>
			</tr>

			<td>
				<input type="submit" name="Delete_button" value=" Delete User"></td>
			</tr>
		</table>

	</form>


	
	</html>

	<?php 
	?>