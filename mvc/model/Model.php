<?php
include_once("./mvc/model/BookYear.php");
include_once("./mvc/model/Family.php");
include_once("./mvc/model/FamilyMember.php");

class Model {

    // BookYear Functions
    public function getBookYearsList() {
        include 'inc/process/connect.php';

        $bookyears = array();

        try {
            $stmt = $conn->prepare("SELECT * FROM boekjaar");
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $bookyears[] = new BookYear($row['ID'], $row['Jaar'], $row['Bedrag']);
            }
        } catch(PDOException $e) {
            echo "Foutmelding: " . $e->getMessage();
        }
        return $bookyears;
    } 

    // This function allows us to retrieve a single product from the database by its ID.
    public function getBookYear($number) {
        // We add the connect.php for connecting to the database.
        include 'inc/process/connect.php';

        try {
            // Create a select statement that associates an ID through a WHERE clause. This is ID is the article number.
            $stmt = $conn->prepare("SELECT * FROM boekjaar WHERE ID = :id");
           
            // Link the item number to the key ID.
            $stmt->execute([
                'id' => $number
            ]);

            // set the resulting array to associative and loop through the results
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                return new BookYear($row['ID'], $row['Jaar'], $row['Bedrag']);
            }
        } catch(PDOException $e) {
            // Show the error message if there is one.
            echo "Foutmelding: " . $e->getMessage();
            return null;
        }
    }
    
    public function addBookYear($year, $price) {
        include 'inc/process/connect.php';

        try {
            $statement = $conn->prepare('INSERT INTO boekjaar (Jaar, Bedrag)
            VALUES (:jaar, :bedrag)');

            $statement->execute([
                'jaar' => $year,
                'bedrag' => floatval($price),
            ]);

            echo "Succesvol boekjaar toegevoegd";
        } catch(PDOException $e) {
            echo 'Er ging iets fout!';
            echo $e->getMessage();
        }
    }

    public function editBookYear($bookyear) {
        // We add the connect.php for connecting to the database.
        include 'inc/process/connect.php';

        try {
            // Create an update statement using the ID and the other fields you have with an Article.
            $statement = $conn->prepare('UPDATE boekjaar SET Jaar = :year, Bedrag = :price WHERE ID = :id');

            // Associate the variables with the keys that are requested.
            $statement->execute([
                'id' => $bookyear->ID,
                'year' => $bookyear->year,
                'price' => $bookyear->price,
            ]);

            echo "Succesvol boekjaar aangepast";
        } catch(PDOException $e) {
            // Display an error message if things have gone wrong.
            echo 'Er ging iets fout!';
            echo $e->getMessage();
        }
    }

    public function deleteBookYear($number) {
        // We add the connect.php for connecting to the database.
        include 'inc/process/connect.php';

        try {
            // We create a delete statement linked by the item number and the ID provided.
            $statement = $conn->prepare('DELETE FROM boekjaar WHERE ID = :id');

            // Link the item number to the ID.
            $statement->execute([
                'id' => $number,
            ]);

            echo "Succesvol boekjaar verwijderd";
        } catch(PDOException $e) {
            // Show an error message if there is one.
            echo 'Er ging iets fout!';
            echo $e->getMessage();
        }
    }

    // Families Functions
    public function getFamiliesList() {
        include 'inc/process/connect.php';

        $families = array();

        try {
            $stmt = $conn->prepare("SELECT * FROM familie");
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $families[] = new Family($row['ID'], $row['Naam'], $row['Adres']);
            }
        } catch(PDOException $e) {
            echo "Foutmelding: " . $e->getMessage();
        }
        return $families;
    } 

    // This function allows us to retrieve a single product from the database by its ID.
    public function getFamily($number) {
        // We add the connect.php for connecting to the database.
        include 'inc/process/connect.php';

        try {
            // Create a select statement that associates an ID through a WHERE clause. This is ID is the article number.
            $stmt = $conn->prepare("SELECT * FROM familie WHERE ID = :id");
           
            // Link the item number to the key ID.
            $stmt->execute([
                'id' => $number
            ]);

            // set the resulting array to associative and loop through the results
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                return new Family($row['ID'], $row['Naam'], $row['Adres']);
            }
        } catch(PDOException $e) {
            // Show the error message if there is one.
            echo "Foutmelding: " . $e->getMessage();
            return null;
        }
    }
    
    public function addFamily($name, $address) {
        include 'inc/process/connect.php';

        try {
            $statement = $conn->prepare('INSERT INTO familie (Naam, Adres)
            VALUES (:name, :address)');

            $statement->execute([
                'name' => $name,
                'address' => $address,
            ]);

            echo "Succesvol familie toegevoegd";
        } catch(PDOException $e) {
            echo 'Er ging iets fout!';
            echo $e->getMessage();
        }
    }

    public function editFamily($family) {
        // We add the connect.php for connecting to the database.
        include 'inc/process/connect.php';

        try {
            // Create an update statement using the ID and the other fields you have with an Article.
            $statement = $conn->prepare('UPDATE familie SET Naam = :name, Adres = :address WHERE ID = :id');

            // Associate the variables with the keys that are requested.
            $statement->execute([
                'id' => $family->ID,
                'name' => $family->name,
                'address' => $family->address,
            ]);

            echo "Succesvol familie aangepast";
        } catch(PDOException $e) {
            // Display an error message if things have gone wrong.
            echo 'Er ging iets fout!';
            echo $e->getMessage();
        }
    }

    public function deleteFamily($number) {
        // We add the connect.php for connecting to the database.
        include 'inc/process/connect.php';

        try {
            // We create a delete statement linked by the item number and the ID provided.
            $statement = $conn->prepare('DELETE FROM familie WHERE ID = :id');

            // Link the item number to the ID.
            $statement->execute([
                'id' => $number,
            ]);

            echo "Succesvol familie verwijderd";
        } catch(PDOException $e) {
            // Show an error message if there is one.
            echo 'Er ging iets fout!';
            echo $e->getMessage();
        }
    }

    // Family member Functions
    public function getFamilyMembersList() {
        include 'inc/process/connect.php';

        $familyMembers = array();

        try {
            $stmt = $conn->prepare("SELECT * FROM familielid");
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $familyMembers[] = new FamilyMember($row['ID'], $row['Naam'], $row['Familie'], $row['Geboortedatum'], $row['SoortLid']);
            }
        } catch(PDOException $e) {
            echo "Foutmelding: " . $e->getMessage();
        }
        return $familyMembers;
    } 

    // This function allows us to retrieve a single product from the database by its ID.
    public function getFamilyMember($number) {
        // We add the connect.php for connecting to the database.
        include 'inc/process/connect.php';

        try {
            // Create a select statement that associates an ID through a WHERE clause. This is ID is the article number.
            $stmt = $conn->prepare("SELECT * FROM familielid WHERE ID = :id");
           
            // Link the item number to the key ID.
            $stmt->execute([
                'id' => $number
            ]);

            // set the resulting array to associative and loop through the results
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                return new FamilyMember($row['ID'], $row['Naam'], $row['Familie'], $row['Geboortedatum'], $row['SoortLid']);
            }
        } catch(PDOException $e) {
            // Show the error message if there is one.
            echo "Foutmelding: " . $e->getMessage();
            return null;
        }
    }
    
    public function addFamilyMember($name, $family, $birthdate, $memberType) {
        include 'inc/process/connect.php';

        try {
            $statement = $conn->prepare('INSERT INTO familielid (Naam, Familie, Geboortedatum, SoortLid)
            VALUES (:name, :family, :birthdate, :memberType)');

            $statement->execute([
                'name' => $name,
                'family' => intval($family),
                'birthdate' => $birthdate,
                'memberType' => intval($memberType)
            ]);

            echo "Succesvol familie lid toegevoegd";
        } catch(PDOException $e) {
            echo 'Er ging iets fout!';
            echo $e->getMessage();
        }
    }

    public function editFamilyMember($familyMember) {
        // We add the connect.php for connecting to the database.
        include 'inc/process/connect.php';

        try {
            // Create an update statement using the ID and the other fields you have with an Article.
            $statement = $conn->prepare('UPDATE familielid SET Naam = :name, Familie = :family, Geboortedatum = :birthdate, SoortLid = :memberType WHERE ID = :id');

            // Associate the variables with the keys that are requested.
            $statement->execute([
                'id' => $familyMember->ID,
                'name' => $familyMember->name,
                'family' => $familyMember->family,
                'birthdate' => $familyMember->birthdate,
                'memberType' => $familyMember->memberType
            ]);

            echo "Succesvol familie lid aangepast";
        } catch(PDOException $e) {
            // Display an error message if things have gone wrong.
            echo 'Er ging iets fout!';
            echo $e->getMessage();
        }
    }

    public function deleteFamilyMember($number) {
        // We add the connect.php for connecting to the database.
        include 'inc/process/connect.php';

        try {
            // We create a delete statement linked by the item number and the ID provided.
            $statement = $conn->prepare('DELETE FROM familielid WHERE ID = :id');

            // Link the item number to the ID.
            $statement->execute([
                'id' => $number,
            ]);

            echo "Succesvol familie lid verwijderd";
        } catch(PDOException $e) {
            // Show an error message if there is one.
            echo 'Er ging iets fout!';
            echo $e->getMessage();
        }
    }
}
?>
