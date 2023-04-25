<?php
session_start();

// Vérifie si il existe bien des infos dans le formulaire
if (!empty($_POST)) {
    $userName = htmlspecialchars($_POST['new_username']);
    $email = htmlspecialchars($_POST['new_email']);
    $password = htmlspecialchars($_POST['password']);
    $confirmPassword = htmlspecialchars($_POST['confirm_password']);
}

$email = $_POST['new_email'];
$password = $_POST['password']; // Le mot de passe à valider
$confirmPassword = $_POST['confirm_password']; // Le mot de passe de confirmation

// Vérifie si les deux mots de passe sont identiques
if ($password !== $confirmPassword) {
    $_SESSION['error'] = 'Les mots de passe ne sont pas identiques.';
    header('Location:../pages/register.php');
} else {
    $regexEmail = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";
    $regexPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-\=[\]{};':\"\\|,.<>\/?]).{8,}$/";

    if (preg_match($regexEmail, $email) && preg_match($regexPassword, $password)) {
        if (!empty($userName) && !empty($email) && !empty($password) && !empty($confirmPassword)) {
            $arrayUser = json_decode(file_get_contents('../user.json'));
            unset ($_POST['confirm_password']);
            $user = $_POST;
            $user['id'] = uniqid();
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $user['password'] = $hash;
            array_push($arrayUser, $user);
            file_put_contents('../user.json', json_encode($arrayUser));
            header('location:../pages/login.php');
        } else {
            $_SESSION['error'] = 'Tous les champs doivent être remplis';
            header('location:../pages/register.php');
        }
    } else {
        if (!preg_match($regexEmail, $email)) {
            $_SESSION['error'] = "L'adresse email n'est pas valide.";
        } else {
            $_SESSION['error'] = 'Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule, un chiffre et un caractère spécial.';
        }
        header('Location:../pages/register.php');
    }
}
