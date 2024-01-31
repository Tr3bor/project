<?php 
include 'dbConfig.php';
?>
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://kit.fontawesome.com/546105334b.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
    
    <title>Superunknown</title>
</head>
<body>
    <header class="header">
        <div class="header__container container">
            <div class="header-left"><a href="index.php">SuperUnkown</a></div>
            <div class="header-right bold">
                <a href="about-us.php" >About us</a>
                <a href="info.php">Info</a>
                <?php if($_SESSION["username"]){?>
                <a href="new-product.php" class="header-right-special">Your Products</a>
                <?php }else{ ?>
                <a href="login.php" class="header-right-special">Login</a>
                <?php } ?>
            </div>
        </div>
    </header>