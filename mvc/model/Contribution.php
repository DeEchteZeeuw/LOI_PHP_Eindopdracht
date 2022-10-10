<?php
class Contribution {
    public $ID; // Contribution ID (int)
    public $age; // Contribution age (int)
    public $memberType; // Contribution memberType (int)
    public $amount; // Contribution amount (float)
    
    public function __construct($ID, $name, $memberType, $amount) {
        $this->ID = $ID;
        $this->name = $name;
        $this->memberType = $memberType;
        $this->amount = $amount;
    }
}
?>
