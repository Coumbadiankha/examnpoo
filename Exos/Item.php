<?php

class Item{
   
    private $Name;
    private $Price;
    private $Weight;
    private $date;

    public function __construct(
        $name,
        $price,
        $weight,
        $date)
    {
        $this->Name = $name;

        $this->Price = $price;

        $this->Weight = $weight;
        
        $this->Date = $date;
    }
    public function getName(){
        return $this->Name;
    }
    public function getPrice(){
        return $this->Price;    
    }
    public function getWeight(){
        return $this->Weight;
    }
    public function getDate(){
        return $this->Date;
    }
    public function toString(){
        return $this->getName().": ".$this->getPrice(). " €, avec un poids de : ".$this->getWeight(). " grammes et une DLC : ".$this->getDate();
    }
}


