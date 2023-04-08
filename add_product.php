<?php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $supplier_id = $_POST['supplier_id'];

    $stmt = $conn->prepare('INSERT INTO products (name, description, price, quantity, supplier_id) VALUES (?, ?, ?, ?, ?)');
    $stmt->bind_param('ssdii', $name, $description, $price, $quantity, $supplier_id);

    if ($stmt->execute()) {
        echo 'New product added successfully';
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h2>Add Product</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Name:</label><br>
        <input type="text" name="name"><br>

        <label>Description:</label><br>
        <textarea name="description"></textarea><br>

        <label>Price:</label><br>
        <input type="text" name="price"><br>

        <label>Quantity:</label><br>
        <input type="text" name="quantity"><br>

        <label>Supplier:</label><br>
        <select name="supplier_id">
            <option value="">Select supplier</option>
            <?php
            $sql = "SELECT * FROM suppliers";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                }
            }
            ?>
        </select><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
