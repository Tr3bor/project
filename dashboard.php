<?php if(!$_SESSION['username'] || !$_SESSION['isadmin']){
    header('Location: index');
}
?>

<div class="dashboard">
    <a href="new-product"><i class="fa-solid fa-cube"></i>Add new product</a>
    <a href="view-product"><i class="fa-solid fa-circle-info"></i>View active products</a>
</div>