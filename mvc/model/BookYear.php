<?php
class BookYear {
    public $ID; // BookYear ID (int)
    public $year; // BookYear year (string)
    public $price; // BookYear price (float)
    
    public function __construct($ID, $year, $price) {
        $this->ID = $ID;
        $this->year = $year;
        $this->price = $price;
    }
}
?>
