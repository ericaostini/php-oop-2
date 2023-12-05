<?php
class Product
{
    protected float $price;
    private int $discount = 0;
    protected int $quantity;

    public function __construct($_price, $_quantity)
    {
        $this->price = $_price;
        $this->quantity = $_quantity;
    }
    public function setDiscount($title)
    {
        if ($title == "Babylon A.D.") {
            return $this->discount = 20;
        } else {
            return $this->discount;
        }
    }
}



?>