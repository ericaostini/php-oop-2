<?php
class Product {
    protected float $price;
    private int $discount = 0;
    protected int $quantity;

    public function __construct($_price, $_quantity) {
        $this->price = $_price;
        $this->quantity = $_quantity;
    }
    public function setDiscount($perc) {
        if($perc < 5 || $perc > 90) {
            throw new Exception("Discount out of range");
        } else {
            $this->discount = $perc;
        }
    }
    public function displayDiscount() {
        return $this->discount;
    }
    public function getDiscount($discount) {
        $substract = ($this->price * $discount) / 100;
        $discount_price = $this->price - $substract;
        return $discount_price;
    }
}
?>