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
    <link rel="stylesheet" href="../assets/style/login.css">
    <title>To do List</title>
</head>

<body>
    <div class="wrapper">

        <div class="content">
            <h1>Ma To Do List</h1>
            <p>Bienvenue sur Ma To Do List !<br>
                L'outil pratique pour organiser votre quotidien. <br><br>
                Pour accéder à votre tableau de bord et commencer à créer vos listes de tâches, veuillez vous connecter ou vous inscrire en utilisant le formulaire.</p>
        </div>

        <div class="container">
            <form action="../controllers/login.php" method="post">
                <h2>Connexion</h2>
                <!-- Username -->
                <label for="new_email"></label>
                <input type="text" id="new_email" name="new_email" placeholder="Adresse Email" required>
                <!-- Password -->
                <div class="password-wrapper">
                    <label for="password"></label>
                    <input type="password" id="password" name="password" placeholder="Mot de passe" required>
                    <i class="far fa-eye" id="togglePassword"></i>
                </div>
                <!-- Message d'erreur -->
                <div class="error-message">
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        session_destroy();
                    }
                    ?>
                </div>

                <!-- Connexion -->
                <input type="submit" value="Se connecter">
                <p>Vous n'avez pas encore de compte ? <a href="./register.php">Inscrivez-vous maintenant</a>.</p>
            </form>
            <div class="social-login">
                <p>Ou connectez-vous avec :</p>
                <div class="social-buttons">
                    <a href="#" class="button button-google">Google</a>
                    <a href="#" class="button button-facebook">Facebook</a>
                </div>
            </div>
        </div>

    </div>
    <script src="../controllers/script.js"></script>
</body>

</html>