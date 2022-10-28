<?php

class Ticket{

    /** @var long */
    private $Price;

    /** @var String */
    private $Ref;

    public function __construct($price, $ref)
    {
        $this->Price=$price;
        $this->Ref=$ref;
    }

     /** @return  long */ 
     public function getPrice(){return $this->Price;}

    /** @return  String */ 
    public function getRef(){return $this->Ref;}
}