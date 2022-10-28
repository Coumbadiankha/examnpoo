<?php

require_once("Item.php");

class FreshItem extends Item{
    /** * @var date * */

    private $bestBeforeDate;

    public function __construct(
        $name,
        $price,
        $weight,
        $date)
    {
        parent::__construct(
            $name,
            $price,
            $weight,
            $date);

        $this->bestBeforeDate = date('YYYY-MM-DD',strtotime($date));
    }

    public function toString()
    {
        return "DLC : ".$this->bestBeforeDate." ".parent::getName().": ".parent::getPrice();
    }
}