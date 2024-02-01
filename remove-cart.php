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
if(isset($_GET['cart'])) {
    for ($i=0; $i < count($_SESSION['cart']); $i++) { 
        $item2 = $_SESSION['cart'][$i];
        $item = unserialize($item2);
        if($item instanceof cartItem) {
            if($item->id == intval($_GET['cart'])) {
                array_splice($_SESSION['cart'], $i, 1);
            }
        }
    }
}
?>