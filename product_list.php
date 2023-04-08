<!DOCTYPE html>
<html>
<head>
	<title>Product List</title>
</head>
<body>
	<h1>Product List</h1>
	<a href="add_product.php">Add Product</a>
	<table>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Supplier</th>
			<th>Actions</th>
		</tr>
		<?php
			include 'config.php';
			$sql = "SELECT products.id, products.name, products.description, products.price, products.quantity, suppliers.name as supplier_name FROM products JOIN suppliers ON products.supplier_id = suppliers.id ORDER BY products.id DESC";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["name"] . "</td>";
					echo "<td>" . $row["description"] . "</td>";
					echo "<td>" . $row["price"] . "</td>";
					echo "<td>" . $row["quantity"] . "</td>";
					echo "<td>" . $row["supplier_name"] . "</td>";
					echo "<td><a href='edit_product.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete_product.php?id=" . $row["id"] . "'>Delete</a></td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan='6'>No products found</td></tr>";
			}
			$conn->close();
		?>
	</table>
</body>
</html>
