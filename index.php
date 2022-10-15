<?php 
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    header("Location: dashboard.php");
    die();
}

// Include the connect.php for login
include './inc/process/connect.php';

// Check if there is a post request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the form is login
    if (!isset($_POST['login']) || $_POST['login'] !== 'Inloggen') $error = 'Foutief formulier verstuurd.';

    // Check if email is an email
    if (!isset($_POST['login_email']) || empty($_POST['login_email']) || !filter_var($_POST['login_email'], FILTER_VALIDATE_EMAIL)) $error_email = 'Geen valide e-mail adres ingevoerd.';
    
    $_POST['login_password'] = preg_replace('/\s+/', '', $_POST['login_password']);
    // Check if there is an password
    if (!isset($_POST['login_password']) || empty($_POST['login_password'])) $error_password = 'Geen wachtwoord ingevoerd.';
    
    try {
    $stmt = $conn->prepare("SELECT * FROM gebruikers WHERE Email=:email");

    // bind the parameters
    $stmt->bindValue(":email", $_POST['login_email']);

    $stmt->execute();
        
    if ($stmt->rowCount() > 0) { 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          if (password_verify($_POST['login_password'], $row['Wachtwoord'])) {
            $_SESSION['loggedin'] = true;
            header("Location: dashboard.php");
            die();
          } else {
            $error_password = "Wachtwoord is incorrect.";
          }
        }
    } else {
        $error_email = "Er is geen account gevonden met dit email-adres.";
    }
    
  } catch(PDOException $e) {
    echo $error = "Er ging iets fout bij het ophalen van de gebruikers.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leden administratie</title>

    <link rel="stylesheet" href="./inc/libraries/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="./assets/css/main.min.css">
</head>
<body>
    <header>
        <section>
          <h1>Leden-Administratie Paneel</h1>
        </section>
    </header>
    <main class="login">
        <section id="login">
            <form id="login" method="post">
                <h2>Inloggen</h2>
                <label for="login_email">
                    E-mail <?php if (isset($error_email)) echo '<span class="error">' . $error_email . '</span>'; ?>
                </label>
                <input type="login_email" name="login_email" id="login_email" placeholder="voorbeeld@google.com" required>
                <label for="login_password">
                    Wachtwoord <?php if (isset($error_password)) echo '<span class="error">' . $error_password . '</span>'; ?>
                </label>
                <input type="password" name="login_password" id="login_password" required placeholder="&bullet;&bullet;&bullet;&bullet;&bullet;&bullet;">
                <input type="submit" value="Inloggen" name="login" id="login_submit">
            </form>
        </section>
    </main>
    <footer class="text-center">
        <h5>&copy; 2022 - 2023 Leden Administratie Paneel</h5>
    </footer>
</body>
</html>
