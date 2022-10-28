<?php

require_once("Item.php");
require_once("FreshItem.php");
require_once("Ticket.php");

class Payable {

    /** * @var long */

    private $Taxes;
    
    private $Item;

    public function __construct($item){
        $this->Item=$item;
        switch(get_class($item)){
            case "Ticket":$this->Taxes=25;
                break;
            case "Item":$this->Taxes=10;
                break;
            case "FreshItem":$this->Taxes= 10-0.1*intdiv($item->getWeight(),1000);
                break;
        }
    }


    public function label(){
        switch(get_class($this->Item)){
            case "Ticket":
                return $this->Item->getRef();
                break;
            case "Item":
                return $this->Item->getName();
                break;
            case "FreshItem":
                return $this->Item->getName();
                break;
        }
        return $this->Item->getName();
    }


    public function cost(){
        return $this->Item->getPrice();
    }


    public function getTaxes(){
        return $this->Taxes;
    }


    public function taxesRatePerTenThousand(){
        return $this->Item->getPrice()*((100+(float)$this->Taxes)/100);
    }


    public function toString(){
        return " Le label est : ".$this->label().", le prix HT est : ".($this->cost()/100)." €, le prix TCC est : ".($this->taxesRatePerTenThousand()/100)." €";
    }
}