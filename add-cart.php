<?php 
session_start();
class cartItem {
    public $id ='';
    public $amount = 0;

    public function set_id($v) {
        $this->id = $v;
    }

    public function increment() {
        $this->amount++;
    }
}
    $incart = false;
    $testitem = new cartItem();
    $numValue = 0;
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [serialize($testitem)];
    } else {       
        for ($i=0; $i < count($_SESSION['cart']); $i++) { 
            $item2 = $_SESSION['cart'][$i];
            $item = unserialize($item2);
            if($item instanceof cartItem) {
                if($item->id == intval($_GET['cart'])) {
                    $item->increment();
                    $numValue = $item->amount;
                    $incart = true;
                    $_SESSION['cart'][$i] = serialize($item);
                }
            }
        }
    }
    if(!$incart) {
        $newitem = new cartItem();
        $newitem->set_id($_GET['cart']);
        $newitem->increment();
        $numValue = $newitem->amount;
        array_push($_SESSION['cart'], serialize($newitem));
    }
?>
<?php 
echo '<div class="product-right-buttons-button-cart bold" hx-post="add-cart.php?cart='.$_GET['cart'].'"
           hx-trigger="click"
           hx-target="this"
           hx-swap="outerHTML"><i class="fa-solid fa-cart-shopping"></i> <span class="badge badge-warning" id="lblCartCount">'.$numValue.'</span></div>';