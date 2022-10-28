<?php
require_once("Item.php");

$generalid = 1;


class ShoppingCart{
   
    private $listPanier;
    private $id;
        
    public function __construct(){
        global $generalid;
        $this->listPanier = array();
        $this->id = $generalid++;  
    }


    public function addItem($item){
        if(empty($this->listPanier) && $item->getWeight() < 1000){
            $this->listPanier[]=$item;
        }else{
            if(($this->totalWeight() + $item->getWeight()) < 100000){
                $this->listPanier[]=$item;
            }}
    }
        

    public function removeItem($item){
        if(in_array($item,$this->listPanier))
        {
            if (($key = array_search($item, $this->listPanier)) !== false) {
                unset($this->listPanier[$key]);
            }
        }else{print("false");}
    }


    public function itemCount(){
        return count($this->listPanier, COUNT_RECURSIVE);
    }


    public function totalWeight(){
        $nb = 0;
        foreach ($this->listPanier as &$value) {
            $nb = $nb + $value->getWeight();
        }
        
        return($nb);
    }


    public function totalPrice(){
        $nb = 0;
        foreach ($this->listPanier as &$value) {
            $nb = $nb + $value->getPrice();
        }
        return($nb);
    }


    public function toString()
    {
        $ligne1= "id :".$this->id." et count item :".$this->itemCount();
        $ligne2= "";
        foreach ($this->listPanier as &$value) {
            $ligne2 = $ligne2."<p>".$value->toString()."</p>";
        }
        return (<<<HTML
        <html>
        <body><h4>$ligne1</h4>
        $ligne2
        </body>
        </html>
    HTML);
    }
}

$shoppingCart = new ShoppingCart();



$shoppingCart->addItem(new Item("Cornflakes", 500, 300, 2022-10-29));
$shoppingCart->addItem(new Item("Chaussures", 200, 500, 2022-10-30));
$shoppingCart->addItem(new Item("Veste", 1200, 900, 2022-10-31));


print($shoppingCart->toString());
