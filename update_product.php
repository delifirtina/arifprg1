<?php
// veritabanı bağlantısı
include "config.php";

// form verilerini al
$id = $_POST["id"];
$name = $_POST["name"];
$description = $_POST["description"];
$price = $_POST["price"];
$quantity = $_POST["quantity"];
$supplier_id = $_POST["supplier_id"];

// güncelleme sorgusunu hazırla ve çalıştır
$sql = "UPDATE products SET name='$name', description='$description', price=$price, quantity=$quantity, supplier_id=$supplier_id WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Ürün başarıyla güncellendi";
} else {
    echo "Hata oluştu: " . $conn->error;
}

$conn->close();
?>
