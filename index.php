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
// Include the database configuration file
include 'dbConfig.php';

// Get images from the database
$query = $db->query("SELECT * FROM products ORDER BY uploaded_on DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
        $title = $row["Title"];
        $description = $row["Descript"];
        $price = $row["Price"];
?>
    <div class="index-products-product">
            <div class="index-products-product-left">
                <a href="product1.html"><img src="<?php echo $imageURL; ?>"></a>
            </div>
            <div class="index-products-product-right">
                <a href="product1.html"><?php echo $title; ?></a>
            </div>
        </div>
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>

    </div>
    </section>
</body>
</html>