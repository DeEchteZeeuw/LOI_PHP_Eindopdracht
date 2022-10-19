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

    // Get price for user by age
    public function agePrice($age) {
        
        if ($age < 8) {
            return ($this->price / 100) * 50;
        } else if ($age >= 8 && $age <= 12) {
            return ($this->price / 100) * 60;
        } else if ($age >= 13 && $age <= 17) {
            return ($this->price / 100) * 75;
        } else if ($age >= 18 && $age <= 50) {
            return ($this->price / 100) * 100;
        } else if ($age >= 18 && $age <= 50) {
            return ($this->price / 100) * 55;
        } else {
            return $this->price;
        }
    }
}
?>
