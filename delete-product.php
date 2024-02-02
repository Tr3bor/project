<?php 
include 'header.php';
$sql = "DELETE FROM products WHERE ID=". $_GET['product_ID'] ."";

if ($db->query($sql) === TRUE) {
   header('Location: view-product');
} else {
    echo "Error updating record: " . $conn->error;
}

?>