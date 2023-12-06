<?php
class Product {
    protected float $price;
    private int $discount = 0;
    protected int $quantity;
    private float $discount_price = 0;

    public function __construct($_price, $_quantity) {
        $this->price = $_price;
        $this->quantity = $_quantity;
    }
    public function setDiscount($vote) {
        if($vote <= 5) {
            return $this->discount = 30;
        } else if($vote <= 8) {
            return $this->discount = 15;
        } else {
            return $this->discount;
        }
    }
    public function getDiscount($discount) {
        if($discount <= 0) {
            throw new Exception("Discont cannot be negative or 0");
        } else{

            $substract = ($this->price * $discount) / 100;
            $this->discount_price = $this->price - $substract;
            return $this->discount_price;
        }
    }
}
?>