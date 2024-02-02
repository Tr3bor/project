<html>
<?php include 'header.php';
      
?>

<div class="viewProduct container">
<h2>Cart:</h2>
<?php
if(!empty($_SESSION['cart'])) {
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
?>
<div id="containerid<?php echo $ID;?>">
   <div class="viewProduct--box">
        <div class="image">
            <img src="<?php echo $imageURL; ?>">
            <h2><a href="product1?product_ID=<?php echo $ID; ?>"><?php echo $title; ?></a></h2>
        </div>
        <div class="info">
            <h2><?php echo $price*$item->amount. "€" ?></h2>  
            <h2><i class="fa-regular"></i>#: <?php echo $item->amount; ?></h2>
            <h2 hx-post="remove-cart?cart=<?php echo $ID;?>"
                    hx-trigger="click"
                    hx-target="#containerid<?php echo $ID;?>"
                    hx-swap="outerHTML"><a href="#"
                   
                ><i class="fa-solid fa-trash"></i></a>  </h2>
        </div>
    </div>
    <hr>
</div>
<?php }
}else{ ?>
    <p>No products found...</p>
<?php } }
} else {
    echo '<p>Your cart is empty...</p>';
}
?>

</div>


</body>
</html>