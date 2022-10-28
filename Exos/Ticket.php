<?php
require_once("Item.php");

class Ticket{ 

    /** * @var array * */

    private $listeCourse;

    public function __construct(){
        $this->$listeCourse = array();
    }
}
