<html>
<?php include 'header.php' ?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
    Title:
    <input type="text" name="title">
    Description:
    <input type="text" name="description">
    Price:
    <input type="number" name="price">
    <input type="submit" name="submit" value="Upload">

</form>
</body>
</html>