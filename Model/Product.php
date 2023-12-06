<?php
class Product
{
    protected float $price;
    private int $discount = 0;
    protected int $quantity;
    private float $discount_price = 0;

    public function __construct($_price, $_quantity)
    {
        $this->price = $_price;
        $this->quantity = $_quantity;
    }
    public function setDiscount($vote)
    {
        // if ($vote < 1 || $vote > 11) {
        //     throw new Exception("Your vote is out of range");
        // } else {
        //     if ($vote <= 5) {
        //         return $this->discount = 30;
        //     } else if ($vote <= 8) {
        //         return $this->discount = 15;
        //     } else {
        //         return $this->discount;
        //     }
        // }
        if ($vote <= 5) {
            return $this->discount = 30;
        } else if ($vote <= 8) {
            return $this->discount = 15;
        } else {
            return $this->discount;
        }
    }
    public function getDiscount($discount)
    {
        $substract = ($this->price * $discount) / 100;
        $this->discount_price = $this->price - $substract;
        return $this->discount_price;
    }
}
?>