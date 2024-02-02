<html>
<?php include 'header.php';
      
?>

<div class="viewProduct container">
<?php if(!empty($_SESSION['cart']) || isset($_GET['id'])): ?>
<h2>Thank you for shopping at Superunknown!</h2>
<h2>Your items:</h2>
<?php
endif;
$sum = 0;
if(!empty($_SESSION['cart']) && !isset($_GET['id'])) {
for ($i=0; $i < count($_SESSION['cart']); $i++) { 
    $item2 = $_SESSION['cart'][$i];
    $item = unserialize($item2);

    $query = $db->query("SELECT * FROM products WHERE ID = '". $item->id ."'");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
        $title = $row["Title"];
        $description = $row["Descript"];
        $price = $row["Price"];
        $ID = $row["ID"];
        $views = $row["Views"];
        $user = $row["User"];
        $sales = $row["Sales"];
        $addsales = $sales + $item->amount;
        $query2 = $db->query("
        UPDATE products
        SET Sales = ".$addsales."
        WHERE ID = ".$ID.";"
    );
?>

<div id="containerid<?php echo $ID;?>">
   <div class="viewProduct--box">
        <div class="image">
            <img src="<?php echo $imageURL; ?>">
            <h2><?php echo $title; ?></h2>
        </div>
        <div class="info">
            <h2><?php $sum +=$price*$item->amount;echo $price*$item->amount. "€" ?></h2>  
            <h2><i class="fa-regular"></i>#: <?php echo $item->amount; ?></h2>
            
        </div>
    </div>
    <hr>
    
</div>
<?php }
}else{ ?>
    <p>No products found...</p>
<?php } }
}
else if(isset($_GET['id'])) {

$query = $db->query("SELECT * FROM products WHERE ID = '". $_GET['id'] ."'");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
        $title = $row["Title"];
        $description = $row["Descript"];
        $price = $row["Price"];
        $ID = $row["ID"];
        $views = $row["Views"];
        $user = $row["User"];
        $sales = $row["Sales"];
        $addsales = $sales + 1;
        $query2 = $db->query("
        UPDATE products
        SET Sales = ".$addsales."
        WHERE ID = ".$ID.";"
    );
?>

<div id="containerid<?php echo $ID;?>">
   <div class="viewProduct--box">
        <div class="image">
            <img src="<?php echo $imageURL; ?>">
            <h2><?php echo $title; ?></h2>
        </div>
        <div class="info">
            <h2><?php $sum +=$price;echo $price. "€"; ?></h2>  
            <h2><i class="fa-regular"></i>#: 1</h2>
            
        </div>
    </div>
    <hr>
    
</div>
<?php }
}else{ ?>
    <p>No products found...</p>
<?php }
}
else {
    echo '<p>Your cart is empty...</p>';
}

$_SESSION['cart'] = [];
?>
<div class="checkout-div">
        <div class="checkout-div-container">
            <p style="padding:0.9375rem;">Total: <span style="font-weight: 700;"><?php echo $sum; ?>€</span></p>
        </div>
    </div>
</div>


</body>
</html>