<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/style/register.css">
    <title>Inscription</title>
</head>

<body>
    <form action="../controllers/register.php" method="post">
        <h2>Inscription</h2>
        <!-- Username -->
        <label for="new_username"></label>
        <input type="text" id="new_username" name="new_username" placeholder="Nom d'utilisateur" required>
        <!-- Email -->
        <label for="new_email"></label>
        <input type="email" id="new_email" name="new_email" placeholder="Adresse email" required>
        <!-- Password -->
        <label for="password"><i>Doit contenir au minimum 8 caractères, une lettre majuscule et minuscule et un caractère spécial</i></label>
        <div class="password-wrapper">
            <input type="password" id="password" name="password" minlength="8" placeholder="Mot de passe" required>
            <i class="far fa-eye" id="togglePassword"></i>
        </div>
        <!-- Confirm password -->
        <label for="confirm_password"></label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmer le mot de passe" required>

        <div class="error-message">
            <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                session_destroy();
            }
            ?>
        </div>
        <!-- Inscription -->
        <input type="submit" value="S'inscrire">

        <div class="social-login">
            <p>Ou identifiez-vous avec :</p>
            <div class="social-buttons">
                <a href="#" class="button button-google">Google</a>
                <a href="#" class="button button-facebook">Facebook</a>
            </div>

        </div>
    </form>

    <script src="../controllers/script.js"></script>
</body>

</html>