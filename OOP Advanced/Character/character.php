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
        echo $this->name ."\n";
        echo $this->health . "\n";
        echo $this->stamina . "\n";
        echo $this->health . "\n";
        return $this;
    }
}
$character = new Character("Character");
$character->walk()->walk()->walk()->run()->run()->showStats();
