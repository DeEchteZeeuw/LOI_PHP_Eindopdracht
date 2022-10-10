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

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Righteous&family=Sarabun&display=swap');

        :root {
          /* General variables */
          --top-bottom-height: 50px;
          --grid-gap: 0px;

          /* Main  fonts*/
          --font-righteous: 'Righteous', cursive;
          --font-sarabun: 'Sarabun', sans-serif;

          /* Colors */
          --body-background: #fcfcfc;
          --body-color: #fff;
          --content-color: #000;
        }

        /* Global classes fonts */
        h1, h2, h3, h4, h5, h6 {
          font-family: var(--font-righteous);
        }

        p, a {
          font-family: var(--font-sarabun);
          margin-top: 0;
          margin-bottom: .5rem;
        }
        
        /* Global classes text styling */
        .text-start {
          text-align: start;
        }

        .text-center {
          text-align: center;
        }

        .text-end {
          text-align: end;
        }

        body {
            display: grid;
            grid-template-columns: auto auto auto auto auto auto auto auto auto auto auto auto;
            gap: var(--grid-gap);
            margin: 0;
            background: var(--body-background);
            color: var(--body-color);
        }

        header {
            grid-column: 1/13;
            height: var(--top-bottom-height);
            background: #212121;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        header h1:hover {
            cursor: default;
        }

        header h1::selection {
            color: none;
            background: none;
        }

        main {
            grid-column: 1/13;
            display: grid;
            grid-template-columns: auto auto auto auto auto auto;
            gap: 10px;
            height: calc(100vh - var(--top-bottom-height) * 2 - var(--grid-gap) * 2);
            min-height: 300px;
        }

        main nav {
            grid-column: 1/1;
            background: #333333;
        }

        main nav ul {
          list-style-type: none;
          padding: 0;
          margin: 0;
        }

        main nav a {
          text-decoration: none;
          color: unset;
          display: block;
          padding: 1rem;
          position: relative;
        }

        main nav a:hover::after {
          content: '';
          position: absolute;
          left: 0;
          top: 0;
          height: 100%;
          width: 5px;
          background: red;
        }

        main section {
            grid-column: 2/13;
            color: var(--content-color);
            overflow-y: auto;
            padding: 1rem;
        }

        /* Buttons */
        button {
            padding: .5rem 1rem;
            border-radius: 5px;
            text-transform: uppercase;
            font-weight: 700;

            transition: all .5s ease;
        }

        button.primary {
            border-color: #6363a8;
            background-color: #8080d9;
            color: white;
        }

        button.primary:hover {
            border-color: #47477c;
            background-color: #6969b4;
        }

        button.good {
            border-color: #54b354;
            background-color: #6ae56a;
            color: white;
        }

        button.good:hover {
            border-color: #387838;
            background-color: #50af50;
            color: white;
        }

        button.watchout {
            border-color: #d1b200;
            background-color: #ffd700;
            color: white;
        }

        button.watchout:hover {
            border-color: #a38a00;
            background-color: #b59a00;
            color: white;
        }

        button:hover {
            cursor: pointer;
            transition: all .5s ease;
        }

        footer {
            background: #212121;
            grid-column: 1/13;
            height: var(--top-bottom-height);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        footer h5:hover {
            cursor: default;
        }

        footer h5::selection {
            color: none;
            background: none;
        }

        /* CSS login */
        main.login {
            display: grid;
            grid-template-columns: auto;
            gap: 10px;
        }

        main.login section {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        main.login section#login {
            grid-column: 1/2;
            background: #333333;
        }

        form#login {
            color: white;
            width: 20vw;
        }

        form#login label {
            display: block;
            font-family: var(--font-sarabun);
            font-weight: 300;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 3px;
        }

        input {
            display: block;
            border: unset;
            border-radius: 5px;
            background: linear-gradient(45deg, #f1f1f1, #E8F0FE);
            border: none !important;
            box-shadow: none !important;
            color: #1a1a1a;
            line-height: 1.33333333;
            width: 100%;
            padding: 0.1875rem 0.3125rem;
            margin: 0 6px 16px 0;
            min-height: 40px;
            max-height: none;
            width: -webkit-fill-available;
        }

        .error {
            color: #de2727;
        }
    </style>

    <link rel="stylesheet" href="./inc/libraries/fontawesome/css/all.min.css">
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
