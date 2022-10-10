<?php
class Contribution {
    public $ID; // Contribution ID (int)
    public $member; // Contribution age (int)
    public $payed; // Contribution memberType (int)
    public $bookyear; // Contribution amount (float)
    
    public function __construct($ID, $member, $payed, $bookyear) {
        $this->ID = $ID;
        $this->member = $member;
        $this->payed = $payed;
        $this->bookyear = $bookyear;
    }
}
?>
