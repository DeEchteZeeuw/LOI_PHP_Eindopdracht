<?php
class FamilyMember {
    public $ID; // FamilyMember ID (int)
    public $name; // FamilyMember name (string)
    public $family; // FamilyMember family (int)
    public $birthdate; // FamilyMember birthday (string)
    public $memberType; // FamilyMember memberType (int)
    
    public function __construct($ID, $name, $family, $birthdate, $memberType) {
        $this->ID = $ID;
        $this->name = $name;
        $this->family = $family;
        $this->birthdate = $birthdate;
        $this->memberType = $memberType;
    }

    // Calculate age by the birthday and current date difference
    public function age() {
        $birthDate = date('d-m-Y', strtotime($this->birthdate));

        $currentDate = date("d-m-Y");

        $age = date_diff(date_create($birthDate), date_create($currentDate));

        return  $age->format("%y");
    }
}
?>
