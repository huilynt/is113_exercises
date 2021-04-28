<?php

class Product {

    private $id;    // type: int
    private $name;  // type: str
    private $price; // type: double
    private $stock; // associative array where the 
                   // key is the product's size (e.g. 'S', 'M', 'L')
                   // value is the quantity available for purchase(type: int)

    function __construct($id, $name, $price, $stock) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function getID() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getStock() {
        return $this->stock;
    }
    
    public function setStock($stock){
        $this->stock = $stock;
    }

    public function hasStock() {
        foreach( $this->stock as $size=>$quantity ) {
            if ($quantity > 0) {
                return true;
            }
        }
        return false;
    }

    public function hasStockBySize($pSize) {
        foreach( $this->stock as $size=>$quantity ) {
            if( $pSize == $size ) {
                if ($quantity > 0) {
                    return true;
                }
            }
        }
        return false;
    }
}
?>
