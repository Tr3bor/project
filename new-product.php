<html>
<?php include 'header.php' ?>
<div class="dashboard">
    <a href="#"><i class="fa-solid fa-cube"></i>Add new product</a>
    <a href="#"><i class="fa-solid fa-circle-info"></i>View active products</a>
    <a href="#"><i class="fa-solid fa-trash"></i>Delete active products</a>
    <a href="#"><i class="fa-solid fa-chart-simple"></i>View product sales</a>
</div>
<div class="container">
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
    Title:
    <input type="text" name="title">
    Description:
    <textarea type="text" name="description"></textarea>
    Price:
    <input type="number" name="price">
    <input type="submit" name="submit" value="Upload">

</form>
</div>
</body>
</html>