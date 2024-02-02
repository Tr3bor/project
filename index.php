<html>
<?php include 'header.php'; ?>

    <section class="hero">

    <div class="hero-container container">
        <div class="hero-left">
            <div class="hero-left-title bold">Online Shopping</div>
            <div class="hero-left-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum quis maiores praesentium. Libero, debitis?</div>
            <div class="hero-left-button bold">Button name</div>
        </div>
        <div class="hero-right">
            <img src="https://cdn.dribbble.com/users/4626561/screenshots/12233454/media/ac27f201d558b0cbe41513f97146a80e.png">
        </div>
    </div>

    </section>

    <section class="index-products">

    <div class="index-products-container container">

    <?php
$query = $db->query("SELECT * FROM products ORDER BY uploaded_on DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
        $title = $row["Title"];
        $description = $row["Descript"];
        $price = $row["Price"];
        $ID = $row["ID"]
?>
    <div class="index-products-product">
    <a href="product1?product_ID=<?php echo $ID; ?>">
            <div class="index-products-product-left">
                <img src="<?php echo $imageURL; ?>">
            </div>
            <div class="index-products-product-right">
                <h4><?php echo $title; ?></h4>
                <p id="description"><?php echo $description; ?></p>
                <p id="price"><?php echo $price . "€";?></p>
                <span>View Product</span>
            </div>
    </a>
        </div>
<?php }
}else{ ?>
    <p>No Products found...</p>
<?php } ?>

    </div>
    </section>
</body>
</html>