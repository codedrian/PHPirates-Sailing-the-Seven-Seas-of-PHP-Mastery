<?php
class Character {
    protected $name;
    protected $health;
    protected $stamina;
    protected $mana;

    public function __construct($name)
    {
        $this->name = $name;
        $this->health = 100;
        $this->stamina = 100;
        $this->mana = 100;
    }
    public function walk()
    {
        $this->stamina--;
        return $this;
    }
    public function run()
    {
        $this->stamina -= 3;
        return $this;
    }
    public function showStats()
    {
        echo "Name: " . $this->name ."\n";
        echo "Health: " . $this->health . "\n";
        echo "Stamina: " . $this->stamina . "\n";
        echo "Mana: " . $this->mana . "\n";
        echo "\n";
        return $this;
    }
}
class Shaman extends Character
{
    public function __construct($name)
    {
        parent::__construct($name);
        $this->health = 150;
    }
    public function heal()
    {
        $this->health += 5;
        $this->stamina += 5;
        $this->mana += 5;
        return $this;
    }
}
class Swordsman extends Character
{
    public function __construct($name) {
        parent::__construct($name);
        $this->health = 170;
    }
    public function slash()
    {
        $this->mana -= 10;
        return $this;
    }
    public function showStats() {
        echo "I am powerful" . "\n";
        parent::showStats();
    }
}

$character = new Character("Blueprint");
$shaman = new Shaman("Jerome");
$swordsman = new Swordsman("Adrian");
$shaman->showStats();
$swordsman->slash()->showStats();
