<?php

// veritabanı bağlantısı için config dosyasını dahil ediyoruz
require_once('config.php');

// formdan gelen verileri kontrol ediyoruz
if (isset($_POST['submit'])) {
    // ürün adı, açıklama, fiyat, stok adedi ve tedarikçi bilgilerini alıyoruz
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $supplier_name = $_POST['supplier_name'];

    // ürün bilgilerini güncelliyoruz
    $update_query = "UPDATE products SET product_name='$product_name', product_desc='$product_desc', product_price='$product_price', product_quantity='$product_quantity', supplier_name='$supplier_name' WHERE id=" . $_GET['id'];

    // güncelleme işlemini gerçekleştiriyoruz
    if (mysqli_query($conn, $update_query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    // eğer form gönderilmediyse, önceden kaydedilmiş olan ürün bilgilerini veritabanından getiriyoruz
    $id = $_GET['id'];
    $select_query = "SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($conn, $select_query);
    $product = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>

<body>

    <h1>Edit Product</h1>

    <form method="post">
        <label for="product_name">Name:</label><br>
        <input type="text" id="product_name" name="product_name" value="<?php echo $product['product_name']; ?>"><br>

        <label for="product_desc">Description:</label><br>
        <textarea id="product_desc" name="product_desc"><?php echo $product['product_desc']; ?></textarea><br>

        <label for="product_price">Price:</label><br>
        <input type="text" id="product_price" name="product_price" value="<?php echo $product['product_price']; ?>"><br>

        <label for="product_quantity">Quantity:</label><br>
        <input type="text" id="product_quantity" name="product_quantity" value="<?php echo $product['product_quantity']; ?>"><br>

        <label for="supplier_name">Supplier:</label><br>
        <input type="text" id="supplier_name" name="supplier_name" value="<?php echo $product['supplier_name']; ?>"><br>

        <br>
        <input type="submit" name="submit" value="Save Changes">
    </form>

</body>

</html>
