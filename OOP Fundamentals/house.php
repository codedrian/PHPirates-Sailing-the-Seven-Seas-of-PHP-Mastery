<?php
class House
{
    private $location;
    private $price;
    private $lot;
    private $type;
    private $discount;

    public function __construct($location, $price, $lot, $type) {
        $this->location = $location;
        $this->price = $price;
        $this->lot = $lot;
        $this->type = $type;
        //NOTE: to set the discount accourding to house type
        if ($this->type == "Pre-selling") {
            $this->discount = 0.20;
        } else {
            $this->discount = 0.05;
        }
    }
    public function getDiscountedPrice() {
        $total = $this->price - ($this->price * $this->discount);
        return $total;
    }

    public function showAll() {
        echo "Location: {$this->location}";
        echo"\n";
        echo"Price: {$this->price}";
        echo "\n";
        echo"Lot: {$this->lot}";
        echo "\n";
        echo"Type: {$this->type}";
        echo "\n";
        echo"Discount: {$this->discount}";
        echo "\n";
        echo"Total: {$this->getDiscountedPrice()}";
    }
}
$house1 = new House("Panama City", 1000000, "100 sqm", "Ready for Occupancy");
$house1->showAll();
?>
