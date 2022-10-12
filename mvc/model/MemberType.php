<?php
class MemberType {
    public $ID; // MemberType ID (int)
    public $name; // MemberType name (string)
    public $procentage; // MemberType procentage (float)
    public $description; // MemberType description (string)
    
    public function __construct($ID, $name, $procentage, $description) {
        $this->ID = $ID;
        $this->name = $name;
        $this->procentage = $procentage;
        $this->description = $description;
    }
}
?>
