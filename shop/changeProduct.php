<?php
 session_start();
    if($_SESSION['username'] == "admin") {
 	$conn = mysqli_connect("localhost", "admin","admin", "ecommerce");
if ($conn) {
	// echo "Querying product......";
} else {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Change product status</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<style type="text/css">
		*{
			background-color: white;
		}
	</style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</head>

<body>
	<h2>Add Product</h2>
	<form method="POST" action="changeProduct.php">

		<table>
			<tr>
				<td>Product name:</td>
				<td><input type="text" name="newProduct" class="textInput"></td>
			</tr>

			<tr>
				<td>Product price:</td>
				<td><input type="text" name="newPrice" class="textInput"></td>
			</tr>

			<tr>
				<td>Product description: </td>
				<td><input type="text" name="newDescription" class="textInput"></td>
			</tr>

			<tr>
				<td>Product image name: </td>
				<td><input type="text" name="newLink" class="textInput"></td>
			</tr>

			<tr>
				<td>Product condition: (in stock/out of stock) </td>
				<td><input type="text" name="newCondition" class="textInput"></td>
			</tr>

			<tr>
				<td>Product ID type: </td>
				<td><input type="number" name="newIDType" min = "1" max = "4" class="textInput"></td>
			</tr>

			<tr>
				<td>Product guaranteed_id: </td>
				<td><input type="number" name="newIDGuaranteed" min = "1" max = "2" class="textInput"></td>
			</tr>

		</table>

		<h2>Update Product</h2>
		<h3>Input the product ID or Product Name(*)</h3>

		<table>
			<tr>
				<td>Existing product name:</td>
				<td><input type="text" name="existingProduct1" class="textInput"></td>
			</tr>

			<tr>
				<td>Existing product ID:</td>
				<td><input type="text" name="existingProductID1" class="textInput"></td>
			</tr>

			<tr>
				<td>New product name:</td>
				<td><input type="text" name="newProduct1" class="textInput"></td>
			</tr>

			<tr>
				<td>New product price:</td>
				<td><input type="text" name="newPrice1" class="textInput"></td>
			</tr>

			<tr>
				<td>New product description: </td>
				<td><input type="text" name="newDescription1" class="textInput"></td>
			</tr>

			<tr>
				<td>New product image name (include .jpg): </td>
				<td><input type="text" name="newLink1" class="textInput"></td>
			</tr>

			<tr>
				<td>New product condition: </td>
				<td><input type="text" name="newCondition1" class="textInput"></td>
			</tr>

			<tr>
				<td>New product ID type: </td>
				<td><input type="number" name="newIDType1" min = "1" max = "4" class="textInput"></td>
			</tr>

			<tr>
				<td>New product guaranteed_ID: </td>
				<td><input type="number" name="newIDGuaranteed1" min = "1" max = "2" class="textInput"></td>
			</tr>



		</table>

		<h2>Delete Product</h2>
		<h3>Input the product ID or Product Name(*)</h3>
		<table>
			<tr>
				<td>Product name:</td>
				<td><input type="text" name="existingProduct" class="textInput"></td>
			</tr>

			<tr>
				<td>Product ID:</td>
				<td><input type="text" name="productID" class="textInput"></td>
			</tr>

		</table>
		<br>
		<br>
		<table>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit_button" value="Submit" class="btn btn-danger"></td>
			</tr>
		</table>
	</form>

	<?php 

	if (isset($_POST['Submit_button'])) {
	//Add Product:
		$newProductName = mysqli_real_escape_string($conn, $_POST['newProduct']);
		$newProductPrice = mysqli_real_escape_string($conn, $_POST['newPrice']);
		$newProductDescription = mysqli_real_escape_string($conn, $_POST['newDescription']);
		$newProductLink = mysqli_real_escape_string($conn, $_POST['newLink']);
		$newProductCondition = mysqli_real_escape_string($conn, $_POST['newCondition']);
		$newIDType = mysqli_real_escape_string($conn, $_POST['newIDType']);
		$newIDGuaranteed = mysqli_real_escape_string($conn, $_POST['newIDGuaranteed']);
		if (strlen($newProductName)>0) {
			$sqlA = "INSERT INTO products(name, unit_price, description, image, `condition`, id_type, id_guaranteed) VALUES ('$newProductName', '$newProductPrice', '$newProductDescription', '$newProductLink', '$newProductCondition', $newIDType, $newIDGuaranteed)";
			$AddRs = mysqli_query($conn, $sqlA);
			if ($AddRs) {
					echo "SUCCESS!";
				}
		}

		

	//Update Product:
		$existingProductName1 = mysqli_real_escape_string($conn, $_POST['existingProduct1']);
		$existingProductID1 = mysqli_real_escape_string($conn, $_POST['existingProductID1']);
		$newProductName1 = mysqli_real_escape_string($conn, $_POST['newProduct1']);
		$newProductPrice1 = mysqli_real_escape_string($conn, $_POST['newPrice1']);
		$newProductDescription1 = mysqli_real_escape_string($conn, $_POST['newDescription1']);
		$newProductLink1 = mysqli_real_escape_string($conn, $_POST['newLink1']);
		$newProductCondition1 = mysqli_real_escape_string($conn, $_POST['newCondition1']);
		$newIDType1 = mysqli_real_escape_string($conn, $_POST['newIDType1']);
		$newIDGuaranteed1 = mysqli_real_escape_string($conn, $_POST['newIDGuaranteed1']);


		if (strlen($existingProductName1==0)) {
			$sqlU = "UPDATE `products` SET name = '$newProductName1', unit_price = '$newProductPrice1', description = '$newProductDescription1', image = '$newProductLink1', `condition` = '$newProductCondition1', id_type = '$newIDType1', id_guaranteed = '$newIDGuaranteed1' WHERE id = '$existingProductID1'";
			$UpdateRs = mysqli_query($conn, $sqlU);
			// if ($UpdateRs) {
			// 		echo "SUCCESS!";
			// 	}
		} else {
			$sqlU = "UPDATE `products` SET name = '$newProductName1', unit_price = '$newProductPrice1', description = '$newProductDescription1', image = '$newProductLink1', `condition` = '$newProductCondition1', id_type = '$newIDType1', id_guaranteed = '$newIDGuaranteed1' WHERE name = '$existingProductName1' OR id = '$existingProductID1'";
			$UpdateRs = mysqli_query($conn, $sqlU);
			if ($UpdateRs) {
					echo "SUCCESS!";
				}
		}

		

	// Delete Product:
		$existingProduct = mysqli_real_escape_string($conn, $_POST['existingProduct']);
		$existingProductID = mysqli_real_escape_string($conn, $_POST['productID']);
		
		if (strlen($existingProduct)>>0) {
			$sqlD = "DELETE FROM products WHERE name = '$existingProduct'";
			$DeleteRs = mysqli_query($conn, $sqlD); 
			if ($DeleteRs) {
					echo "SUCCESS!";
				}
		}

		if (strlen($existingProduct)===0) {
			$sqlD = "DELETE * FROM products WHERE id = '$existingProductID'";
			$DeleteRs = mysqli_query($conn, $sqlD);
			if ($DeleteRs) {
					echo "SUCCESS!";
				}
		} 

		if ($existingProductID>0) {
			$sqlD = "DELETE FROM products WHERE name = '$existingProduct' OR id = '$existingProductID'";
		$DeleteRs = mysqli_query($conn, $sqlD);
		if ($DeleteRs) {
					echo "SUCCESS!";
				}
		}
		
	}
	?>
</body>
</html>

<?php 
 }
  else {
  	header("location: index.php");
  }
 ?>