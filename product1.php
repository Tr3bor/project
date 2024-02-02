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

    $isincart = false;
    $num=0;
    for ($i=0; $i < count($_SESSION['cart']); $i++) { 
        $item2 = $_SESSION['cart'][$i];
        $item = unserialize($item2);
        if($item instanceof cartItem) {
            if($item->id == $_GET['product_ID']) {
                $isincart = true;
                $num = $item->amount;
            }
        }
    }
?>
<?php 

?>
    <div class="product-container container">
        <div class="product-left">
            <img src="<?php echo $imageURL; ?>">
            <!-- i shtoj ne scss-->
            <style>
                #lblCartCount {
                    font-size: 12px;
                    background: #5f19f5;
                    color: #fff;
                    padding: 0 5px;
                    vertical-align: top;
                    margin-left: -10px;
                }
                .badge {
                    padding-left: 9px;
                    padding-right: 9px;
                    -webkit-border-radius: 9px;
                    -moz-border-radius: 9px;
                    border-radius: 9px;
                }
            </style>
        </div>
        <div class="product-right">
            <div class="product-right-title bold"><?php echo $title; ?></div>
            <div class="product-right-content"><?php echo htmlspecialchars($description); ?><br> <?php echo $price . "€" ?> <br><i class="fa-regular fa-eye"></i> <?php if($views != 0){ echo $views - 1; }else{echo 0;} ?></div>
            <div class="product-right-buttons">
                <a href="checkout?id=<?php echo $_GET['product_ID']?>" style="text-decoration:none;">
                    <div class="product-right-buttons-button bold">Buy it now</div>
                </a>
                <div class="product-right-buttons-button-cart bold" 
                    hx-post="add-cart?cart=<?php echo $_GET['product_ID'];?>"
                    hx-trigger="click"
                    hx-target="this"
                    hx-swap="outerHTML">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <?php if($isincart):?>
                    <span class="badge badge-warning" id="lblCartCount"> <?php echo $num; ?> </span>
                    <?php endif;?>
                </div>
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