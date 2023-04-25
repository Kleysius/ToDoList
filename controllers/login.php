<?php

session_start();

if (!empty($_POST)) {
    $arrayUser = json_decode(file_get_contents("../user.json"));

    $userFilter = array_filter($arrayUser, function ($user) {
        return $user->new_email == $_POST['new_email'];
    });

    $userFilter = array_values($userFilter);

    if (!empty($userFilter)) {
        if (password_verify($_POST['password'], $userFilter[0]->password)) {
            $_SESSION['userId'] = $userFilter[0]->id;
            $_SESSION['userName'] = $userFilter[0]->new_username;
            header('location:../pages/dashboard.php');
            die;
        } else {
            $_SESSION['error'] = 'Mot de passe incorrect';
        }
        header('location:../pages/login.php');
    }
}
