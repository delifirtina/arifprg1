<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
</head>
<body>
	<h1>Add Product</h1>
	<form action="add_product.php" method="POST">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required><br><br>

		<label for="description">Description:</label>
		<textarea id="description" name="description"></textarea><br><br>

		<label for="price">Price:</label>
		<input type="number" id="price" name="price" step="0.01" required><br><br>

		<label for="quantity">Quantity:</label>
		<input type="number" id="quantity" name="quantity" required><br><br>

		<label for="unit">Unit:</label>
		<input type="text" id="unit" name="unit"><br><br>

		<label for="supplier_id">Supplier:</label>
		<select id="supplier_id" name="supplier_id">
			<option value="" disabled selected>Select a supplier</option>
			<!-- PHP code to get list of suppliers from the database -->
			<?php
			require_once('db_connect.php');

			$sql = "SELECT * FROM suppliers";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
				}
			} else {
				echo "<option disabled>No suppliers found</option>";
			}

			$conn->close();
			?>
		</select><br><br>

		<input type="submit" value="Add Product">
	</form>
</body>
</html>
