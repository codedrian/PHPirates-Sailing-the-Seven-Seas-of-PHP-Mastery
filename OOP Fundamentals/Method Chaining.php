<?php
class Item
{
    private $name;
    private $price;
    private $stock;
    private $sold;

    public function __construct($name, $price, $stock)
    {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->sold = 0;
    }
    public function logDetails()
    {
        echo "Item name: {$this->name}";
        echo "\n";
        echo "Price: {$this->price}";
        echo "\n";
        echo "Stock: {$this->stock}";
        echo "\n";
        echo "Sale: {$this->sold}";
    }
    public function buy()
    {
        if ($this->stock > 0) {
            echo "Buying";
            echo "\t";
            $this->sold++;
            $this->stock--;
        } else {
            echo "OUT OF STOCK";
            echo "\n";
        }
        return $this;
    }
    public function return()
    {
        if ($this->sold > 0) {
            echo "Returning";
            echo "\t";
            $this->sold--;

            if ($this->stock == "OUT OF STOCK") {
                $this->stock = 1;
            } else {
                $this->stock++;
            }
        } else {
            echo "You can't return the product";
        }
        return $this;
    }
}
//NOTE: Buy three times, return once
$item1 = new Item("Ball pen", 10, 50);
$item1->buy()->return()->return()->logDetails();
