<html>
<?php include 'header.php';
      include 'dashboard.php';
?>

<div class="addProduct">
    
<form class="container" action="upload" method="post" enctype="multipart/form-data">
<?php echo $_SESSION['status']; 
        $_SESSION['status'] = "";
?>
    <div class="addProduct--general">
    <h2>Title:</h2>
    <input type="text" name="title">
    <h2>Description:</h2>
    <textarea type="text" name="description"></textarea>
    <h2>Price:</h2>
    <input type="number" step="0.1" name="price">
    <label for="custom-file-upload" class="custom-file-upload"><h2>Select Image:</h2></label>
    <input id="custom-file-upload" type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</div>

   

</form>
</div>
</body>
</html>