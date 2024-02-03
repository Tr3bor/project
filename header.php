<?php 
include 'dbConfig.php';
class cartItem {
    public $id ='';
    public $amount = 0;

    public function set_id($v) {
        $this->id = $v;
    }

    public function increment() {
        $this->amount = $amount + 1;
    }
}
?>
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://kit.fontawesome.com/546105334b.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://unpkg.com/htmx.org@1.9.10" integrity="sha384-D1Kt99CQMDuVetoL1lrYwg5t+9QdHe7NLX/SoJYkXDFfX37iInKRy5xLSi8nO7UC" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="js/header.js"></script>
    <title>Superunknown</title>
</head>
<body>
    <header class="header">
        <div class="header__container container">
            <div class="header-left"><a href="index">SuperUnkown</a></div>
            
            <div id="nav-icon1">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="header-right bold">
                <a href="about-us" >About us</a>
                <a href="cart">Cart</a>
                <?php if($_SESSION["username"]){ ?>
                    <?php if($_SESSION['isadmin']){?>
                <a href="new-product" class="header-right-special">Your Products</a>
                <?php } ?>
                <a href="logout">Log Out</a>
                <?php }else{ ?>
                <a href="login" class="header-right-special">Login</a>
                <?php } ?>
            </div>
        </div>
    </header>

    <div class="header-m">
    <div class="header bold">
                <a href="about-us" >About us</a>
                <a href="cart">Cart</a>
                <?php if($_SESSION["username"]){?>
                <a href="new-product" class="header-right-special">Your Products</a>
                <a href="logout">Log Out</a>
                <?php }else{ ?>
                <a href="login" class="header-right-special">Login</a>
                <?php } ?>
            </div>
    </div>