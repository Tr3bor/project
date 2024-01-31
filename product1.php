<html>
<?php include 'header.php'; ?>

    <section class="product">
    <?php
    $p_id = $_GET['product_ID'];


  
    
$query = $db->query("SELECT * FROM products WHERE ID = '". $p_id ."'");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
        $title = $row["Title"];
        $description = $row["Descript"];
        $price = $row["Price"];
        $views = $row["Views"];

        if($row["User"] != $_SESSION["username"]){
        $sql = "UPDATE products SET Views = Views + 1 WHERE ID = " . $p_id ."";

        if ($db->query($sql) === TRUE) {
            echo "";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
?>

    <div class="product-container container">
        <div class="product-left">
            <img src="<?php echo $imageURL; ?>">
            
        </div>
        <div class="product-right">
            <div class="product-right-title bold"><?php echo $title; ?></div>
            <div class="product-right-content"><?php echo htmlspecialchars($description); ?><br> <?php echo $price . "€" ?> <br><i class="fa-regular fa-eye"></i> <?php if($views != 0){ echo $views - 1; }else{echo 0;} ?></div>
            <div class="product-right-buttons">
                <div class="product-right-buttons-button bold">Buy it now</div>
                <div class="product-right-buttons-button-cart bold"><i class="fa-solid fa-cart-shopping"></i></div>
            </div> 
        </div>
    </div>
    <?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>
    </section>

</body>
</html>