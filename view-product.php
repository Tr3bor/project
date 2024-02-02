<html>
<?php include 'header.php';
      include 'dashboard.php';
?>

<div class="viewProduct container">

<?php
$query = $db->query("SELECT * FROM products WHERE User = '". $_SESSION['username'] ."'");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
        $title = $row["Title"];
        $description = $row["Descript"];
        $price = $row["Price"];
        $ID = $row["ID"];
        $views = $row["Views"];
?>
   <div class="viewProduct--box">
        <div class="image">
            <img src="<?php echo $imageURL; ?>">
            <h2><a href="product1?product_ID=<?php echo $ID; ?>"><?php echo $title; ?></a></h2>
        </div>
        <div class="info">
            <h2><?php echo $price . "€" ?></h2>  
            <h2><i class="fa-regular fa-eye"></i> <?php echo $views; ?></h2>
            <h2><a href="delete-product?product_ID=<?php echo $ID; ?>"><i class="fa-solid fa-trash"></i></a>  </h2>
        </div>
   </div>
        <hr>
<?php }
}else{ ?>
    <p>No products found...</p>
<?php } ?>

</div>


</body>
</html>