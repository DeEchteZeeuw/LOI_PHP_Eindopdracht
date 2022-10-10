<?php
class MemberType {
    public $ID; // MemberType ID (int)
    public $description; // MemberType description (string)
    
    public function __construct($ID, $description) {
        $this->ID = $ID;
        $this->description = $description;
    }
}
?>
