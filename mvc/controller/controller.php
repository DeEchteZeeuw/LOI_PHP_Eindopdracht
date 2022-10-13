<?php
include_once("./mvc/model/Model.php");

class Controller {
    public $model;

    public function __construct() {
        $this->model = new Model();
    }

    // Dashboard functions
    public function listDashboard() {
        $families = $this->model->getFamiliesList();

        foreach($families as $family) {
            $family->members = $this->model->getFamilyMembers($family->ID);

            $family->open_contribution = 0;
            $family->payed_contribution = 0;
            $family->total_contribution = 0;

            foreach($family->members as $member) {
                $member->memberType = $this->model->getMemberType($member->memberType);
                $member->contributions = $this->model->getContributions($member->ID);

                foreach($member->contributions as $contribution) {
                    $contribution->bookyear = $this->model->getBookYear($contribution->bookyear);
                }
            }

            // echo '<pre>';
            // echo var_dump($family);
            // echo '</pre>';
        }

        include './mvc/view/dashboardlist.php';
    }

    // BookYear Functions

    public function listBookYears() {
        $BookYears = $this->model->getBookYearsList();

        include './mvc/view/bookyearlist.php';
    }
    
    public function addBookYearForm() {
        include './inc/process/connect.php';

        // See if a form was sent with method POST and if the required fields were filled in.
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST) && isset($_POST['bookyear_submit']) && isset($_POST['bookyear_year']) && isset($_POST['bookyear_submit']) && isset($_POST['bookyear_price'])) {

            if (!is_numeric($_POST['bookyear_year'])) {
               $error_year = 'Het jaar is geen valide nummer.';
            } else {
                if ($_POST['bookyear_year'] < 1900 || $_POST['bookyear_year'] > intval(date("Y"))) {
                    $error_year = 'Het ingevoerde jaar moet tussen 1900 en '.date("Y").' zijn';
                }
            }
            
            if (!is_numeric($_POST['bookyear_price'])) {
                $error_price = 'Het ingevoerde bedrag voor het boekjaar is geen valide nummer.';   
            } else {
                if ($_POST['bookyear_price'] < 0) {
                    $error_price = 'Het ingevoerde bedrag mag niet negatief zijn.';
                }   
            }
            
            if (!isset($error_year) && !isset($error_price)) {
                $this->model->addBookYear($_POST['bookyear_year'], $_POST['bookyear_price']);
            }
        }

        // See if the conn variable is declared and if it has a value. 
        if (isset($conn) && $conn) {
            include './mvc/view/addBookYearForm.php';
        } else {
            // There is no database connection. Show a text that this is so.
            echo 'Je kunt het toevoeg formulier niet bekijken, zolang er geen database verbinding is.';
        }
    }
    
    public function editBookYearForm() {
        include './inc/process/connect.php';
        include_once('./mvc/model/BookYear.php');

        if (isset($_POST) && isset($_POST['bookyear_edit']) && isset($_POST['bookyear_id'])) {
            if (isset($_GET) && isset($_GET['id'])) {
                if ($_GET['id'] != $_POST['bookyear_id']) {
                    echo 'Het ID komt niet overeen met meegegeven ID';
                    return;
                }
            }

            if (!is_numeric($_POST['bookyear_price'])) {
                $error_price = 'Het ingevoerde bedrag voor het boekjaar is geen valide nummer.';   
            } else {
                if ($_POST['bookyear_price'] < 0) {
                    $error_price = 'Het ingevoerde bedrag mag niet negatief zijn.';
                }   
            }

            $this->model->editBookYear(new BookYear($_POST['bookyear_id'], $_POST['bookyear_year'], $_POST['bookyear_price']));
        }

        if (isset($_GET) && isset($_GET['id'])) {
            $bookyear = $this->model->getBookYear($_GET['id']);
            include './mvc/view/editBookYearForm.php';
        } else {
            echo 'Geen boekjaar opgevraagd';
        }
        
    }
    
    public function deleteBookYearForm() {
        include './inc/process/connect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST) && isset($_POST['bookyear_delete']) && isset($_POST['bookyear_id'])) {
            if (isset($_GET) && isset($_GET['id'])) {
                if ($_GET['id'] != $_POST['bookyear_id']) {
                    echo 'Het ID komt niet overeen met meegegeven ID';
                    return;
                }
            }
            
            $this->model->deleteBookYear($_POST['bookyear_id']);
        }

        // See if the conn variable is declared and if it has a value. 
        if (isset($conn) && $conn) {
            include './mvc/view/deleteBookYearForm.php';
        } else {
            // There is no database connection. Show a text that this is so.
            echo 'Je kunt het verwijder formulier niet bekijken, zolang er geen database verbinding is.';
        }
    }

    // Families Functions
    public function listFamilies() {
        $Families = $this->model->getFamiliesList();

        include './mvc/view/familieslist.php';
    }
    
    public function addFamilyForm() {
        include './inc/process/connect.php';

        // See if a form was sent with method POST and if the required fields were filled in.
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST) && isset($_POST['family_submit']) && isset($_POST['family_name']) && isset($_POST['family_address'])) {

            if (empty($_POST['family_name'])) {
                $error_name = 'De ingevoerde familie naam is leeg';
            }

            if (empty($_POST['family_address'])) {
                $error_address = 'De ingevoerde adres is leeg';
            }

            if (!isset($error_name) && !isset($error_address)) {
                $this->model->addFamily($_POST['family_name'], $_POST['family_address']);
            }
        }

        // See if the conn variable is declared and if it has a value. 
        if (isset($conn) && $conn) {
            include './mvc/view/addFamiliesForm.php';
        } else {
            // There is no database connection. Show a text that this is so.
            echo 'Je kunt het toevoeg formulier niet bekijken, zolang er geen database verbinding is.';
        }
    }
    
    public function editFamilyForm() {
        include './inc/process/connect.php';
        include_once('./mvc/model/Family.php');

        if (isset($_POST) && isset($_POST['family_edit']) && isset($_POST['family_id'])) {
            if (isset($_GET) && isset($_GET['id'])) {
                if ($_GET['id'] != $_POST['family_id']) {
                    echo 'Het ID komt niet overeen met meegegeven ID';
                    return;
                }
            }

            if (empty($_POST['family_name'])) {
                $error_name = 'De ingevoerde familie naam is leeg';
            }

            if (empty($_POST['family_address'])) {
                $error_address = 'De ingevoerde adres is leeg';
            }

            if (!isset($error_name) && !isset($error_address)) {
                $this->model->editFamily(new Family($_POST['family_id'], $_POST['family_name'], $_POST['family_address']));
            }
        }

        if (isset($_GET) && isset($_GET['id'])) {
            $family = $this->model->getFamily($_GET['id']);
            include './mvc/view/editFamilyForm.php';
        } else {
            echo 'Geen familie opgevraagd';
        }
        
    }
    
    public function deleteFamilyForm() {
        include './inc/process/connect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST) && isset($_POST['family_delete']) && isset($_POST['family_id'])) {
            if (isset($_GET) && isset($_GET['id'])) {
                if ($_GET['id'] != $_POST['family_id']) {
                    echo 'Het ID komt niet overeen met meegegeven ID';
                    return;
                }
            }
            
            $this->model->deleteFamily($_POST['family_id']);
        }

        // See if the conn variable is declared and if it has a value. 
        if (isset($conn) && $conn) {
            include './mvc/view/deleteFamilyForm.php';
        } else {
            // There is no database connection. Show a text that this is so.
            echo 'Je kunt het verwijder formulier niet bekijken, zolang er geen database verbinding is.';
        }
    }

    // Family Member Functions
    public function listFamilyMembers() {
        $FamilyMembers = $this->model->getFamilyMembersList();

        include './mvc/view/familymemberslist.php';
    }
    
    public function addFamilyMemberForm() {
        include './inc/process/connect.php';
        // See if a form was sent with method POST and if the required fields were filled in.
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST) && isset($_POST['familymember_submit']) && isset($_POST['familymember_name']) && isset($_POST['familymember_family']) && isset($_POST['familymember_birthdate']) && isset($_POST['familymember_membertype'])) {
            if (empty($_POST['familymember_name'])) {
                $error_name = 'De ingevoerde naam is leeg';
            }

            if (empty($_POST['familymember_family'])) {
                $error_family = 'De ingevoerde familie is niet valide';
            }

            if (empty($_POST['familymember_birthdate'])) {
                $error_birthdate = 'De ingevoerde geboortedatum is incorrect';
            }

            if (empty($_POST['familymember_membertype'])) {
                $error_membertype = 'De ingevoerde lidmaatschap is niet valide';
            }

            if (!isset($error_name) && !isset($error_family) && !isset($error_birthdate) && !isset($error_membertype)) {
                $this->model->addFamilyMember($_POST['familymember_name'], intval($_POST['familymember_family']), $_POST['familymember_birthdate'], intval($_POST['familymember_membertype']));
            }
        }

        // See if the conn variable is declared and if it has a value. 
        if (isset($conn) && $conn) {
            $families = $this->model->getFamiliesList();
            $membertypes = $this->model->getMemberTypesList();

            include './mvc/view/addFamilyMemberForm.php';
        } else {
            // There is no database connection. Show a text that this is so.
            echo 'Je kunt het toevoeg formulier niet bekijken, zolang er geen database verbinding is.';
        }
    }
    
    public function editFamilyMemberForm() {
        include './inc/process/connect.php';
        include_once('./mvc/model/FamilyMember.php');

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST) && isset($_POST['familymember_edit']) && isset($_POST['familymember_id']) && isset($_POST['familymember_name']) && isset($_POST['familymember_family']) && isset($_POST['familymember_birthdate']) && isset($_POST['familymember_membertype'])) {
            if (isset($_GET) && isset($_GET['id'])) {
                if ($_GET['id'] != $_POST['familymember_id']) {
                    echo 'Het ID komt niet overeen met meegegeven ID';
                    return;
                }
            }

            if (empty($_POST['familymember_name'])) {
                $error_name = 'De ingevoerde naam is leeg';
            }

            if (empty($_POST['familymember_family'])) {
                $error_family = 'De ingevoerde familie is niet valide';
            }

            if (empty($_POST['familymember_birthdate'])) {
                $error_birthdate = 'De ingevoerde geboortedatum is incorrect';
            }

            if (empty($_POST['familymember_membertype'])) {
                $error_membertype = 'De ingevoerde lidmaatschap is niet valide';
            }

            if (!isset($error_name) && !isset($error_family) && !isset($error_birthdate) && !isset($error_membertype)) {
                $this->model->editFamilyMember(new FamilyMember($_POST['familymember_id'], $_POST['familymember_name'], intval($_POST['familymember_family']), $_POST['familymember_birthdate'], intval($_POST['familymember_membertype'])));
            }
        }

        if (isset($_GET) && isset($_GET['id'])) {
            $families = $this->model->getFamiliesList();
            $membertypes = $this->model->getMemberTypesList();

            $familyMember = $this->model->getFamilyMember($_GET['id']);

            include './mvc/view/editFamilyMemberForm.php';
        } else {
            echo 'Geen familie lid opgevraagd';
        }
        
    }
    
    public function deleteFamilyMemberForm() {
        include './inc/process/connect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST) && isset($_POST['familymember_delete']) && isset($_POST['familymember_id'])) {
            if (isset($_GET) && isset($_GET['id'])) {
                if ($_GET['id'] != $_POST['familymember_id']) {
                    echo 'Het ID komt niet overeen met meegegeven ID';
                    return;
                }
            }
            
            $this->model->deleteFamilyMember($_POST['familymember_id']);
        }

        // See if the conn variable is declared and if it has a value. 
        if (isset($conn) && $conn) {
            include './mvc/view/deleteFamilyMemberForm.php';
        } else {
            // There is no database connection. Show a text that this is so.
            echo 'Je kunt het verwijder formulier niet bekijken, zolang er geen database verbinding is.';
        }
    }
    
    // Contributions Functions
    public function listContributions() {
        $Contributions = $this->model->getContributionsList();

        include './mvc/view/contributionslist.php';
    }
    
    public function addContributionForm() {
        include './inc/process/connect.php';
        // See if a form was sent with method POST and if the required fields were filled in.
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST) && isset($_POST['contribution_submit']) && isset($_POST['contribution_member']) && isset($_POST['contribution_payed']) && isset($_POST['contribution_bookyear'])) {
            if (empty($_POST['contribution_member'])) {
                $error_member = 'De ingevoerde lid is leeg';
            }

            if (empty($_POST['contribution_payed'])) {
                $error_payed = 'De ingevoerde betaalde bedrag is leeg';
            }

            if (empty($_POST['contribution_bookyear'])) {
                $error_bookyear = 'De ingevoerde boekjaar is leeg';
            }

            if (!isset($error_member) && !isset($error_payed) && !isset($error_bookyear)) {
                $this->model->addContribution($_POST['contribution_member'], floatval($_POST['contribution_payed']), $_POST['contribution_bookyear']);
            }
        }

        // See if the conn variable is declared and if it has a value. 
        if (isset($conn) && $conn) {
            $members = $this->model->getFamilyMembersList();
            $bookyears = $this->model->getBookYearsList();

            include './mvc/view/addContributionForm.php';
        } else {
            // There is no database connection. Show a text that this is so.
            echo 'Je kunt het toevoeg formulier niet bekijken, zolang er geen database verbinding is.';
        }
    }
    
    public function editContributionForm() {
        include './inc/process/connect.php';
        include_once('./mvc/model/Contribution.php');

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST) && isset($_POST['contribution_edit']) && isset($_POST['contribution_id']) && isset($_POST['contribution_member']) && isset($_POST['contribution_payed']) && isset($_POST['contribution_bookyear'])) {
            if (isset($_GET) && isset($_GET['id'])) {
                if ($_GET['id'] != $_POST['contribution_id']) {
                    echo 'Het ID komt niet overeen met meegegeven ID';
                    return;
                }
            }

            if (empty($_POST['contribution_member'])) {
                $error_member = 'De ingevoerde lid is leeg';
            }

            if (empty($_POST['contribution_payed'])) {
                $error_payed = 'De ingevoerde betaalde bedrag is leeg';
            }

            if (empty($_POST['contribution_bookyear'])) {
                $error_bookyear = 'De ingevoerde boekjaar is leeg';
            }

            if (!isset($error_member) && !isset($error_payed) && !isset($error_bookyear)) {
                $this->model->editContribution(new Contribution($_POST['contribution_id'], $_POST['contribution_member'], floatval($_POST['contribution_payed']), $_POST['contribution_bookyear']));
            }
        }

        if (isset($_GET) && isset($_GET['id'])) {
            $members = $this->model->getFamilyMembersList();
            $bookyears = $this->model->getBookYearsList();

            $contribution = $this->model->getContribution($_GET['id']);

            include './mvc/view/editContributionForm.php';
        } else {
            echo 'Geen contributie opgevraagd';
        }
        
    }
    
    public function deleteContributionForm() {
        include './inc/process/connect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST) && isset($_POST['contribution_delete']) && isset($_POST['contribution_id'])) {
            if (isset($_GET) && isset($_GET['id'])) {
                if ($_GET['id'] != $_POST['contribution_id']) {
                    echo 'Het ID komt niet overeen met meegegeven ID';
                    return;
                }
            }
            
            $this->model->deleteContribution($_POST['contribution_id']);
        }

        // See if the conn variable is declared and if it has a value. 
        if (isset($conn) && $conn) {
            include './mvc/view/deleteContributionForm.php';
        } else {
            // There is no database connection. Show a text that this is so.
            echo 'Je kunt het verwijder formulier niet bekijken, zolang er geen database verbinding is.';
        }
    }

    // MemberType Functions
    public function listMemberTypes() {
        $MemberTypes = $this->model->getMemberTypesList();

        include './mvc/view/membertypeslist.php';
    }
    
    public function addMemberTypeForm() {
        include './inc/process/connect.php';
        // See if a form was sent with method POST and if the required fields were filled in.
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST) && isset($_POST['membertype_submit']) && isset($_POST['membertype_name']) && isset($_POST['membertype_procentage']) && isset($_POST['membertype_description'])) {
            if (empty($_POST['membertype_name'])) {
                $error_name = 'De ingevoerde naam is leeg';
            }

            if (empty($_POST['membertype_procentage'])) {
                $error_procentage = 'De ingevoerde percentage is leeg';
            }

            if (empty($_POST['membertype_description'])) {
                $error_description = 'De ingevoerde beschrijving is leeg';
            }

            if (!isset($error_name) && !isset($error_procentage) && !isset($error_description)) {
                $this->model->addMemberType($_POST['membertype_name'], floatval($_POST['membertype_procentage']), $_POST['membertype_description']);
            }
        }

        // See if the conn variable is declared and if it has a value. 
        if (isset($conn) && $conn) {
            include './mvc/view/addMemberTypeForm.php';
        } else {
            // There is no database connection. Show a text that this is so.
            echo 'Je kunt het toevoeg formulier niet bekijken, zolang er geen database verbinding is.';
        }
    }
    
    public function editMemberTypeForm() {
        include './inc/process/connect.php';
        include_once('./mvc/model/MemberType.php');

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST) && isset($_POST['membertype_edit']) && isset($_POST['membertype_id']) && isset($_POST['membertype_name']) && isset($_POST['membertype_procentage']) && isset($_POST['membertype_description'])) {
            if (isset($_GET) && isset($_GET['id'])) {
                if ($_GET['id'] != $_POST['membertype_id']) {
                    echo 'Het ID komt niet overeen met meegegeven ID';
                    return;
                }
            }

            if (empty($_POST['membertype_name'])) {
                $error_name = 'De ingevoerde naam is leeg';
            }

            if (empty($_POST['membertype_procentage'])) {
                $error_procentage = 'De ingevoerde percentage is leeg';
            }

            if (empty($_POST['membertype_description'])) {
                $error_description = 'De ingevoerde beschrijving is leeg';
            }

            if (!isset($error_name) && !isset($error_procentage) && !isset($error_description)) {
                $this->model->editMemberType(new MemberType($_POST['membertype_id'], $_POST['membertype_name'], floatval($_POST['membertype_procentage']), $_POST['membertype_description']));
            }
        }

        if (isset($_GET) && isset($_GET['id'])) {
            $memberType = $this->model->getMemberType($_GET['id']);
            include './mvc/view/editMemberTypeForm.php';
        } else {
            echo 'Geen abonnement opgevraagd';
        }
        
    }
    
    public function deleteMemberTypeForm() {
        include './inc/process/connect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST) && isset($_POST['membertype_delete']) && isset($_POST['membertype_id'])) {
            if (isset($_GET) && isset($_GET['id'])) {
                if ($_GET['id'] != $_POST['membertype_id']) {
                    echo 'Het ID komt niet overeen met meegegeven ID';
                    return;
                }
            }
            
            $this->model->deleteMemberType($_POST['membertype_id']);
        }

        // See if the conn variable is declared and if it has a value. 
        if (isset($conn) && $conn) {
            include './mvc/view/deleteMemberTypeForm.php';
        } else {
            // There is no database connection. Show a text that this is so.
            echo 'Je kunt het verwijder formulier niet bekijken, zolang er geen database verbinding is.';
        }
    }
}
