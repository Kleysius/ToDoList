<?php
session_start();

// Récupère les données envoyées par le formulaire
$task_name = $_POST['task_name'];
$new_task_name = $_POST['new_task_name'];
$task_status = $_POST['task_status'];

// Charge le fichier JSON de la liste des tâches
$tasks = json_decode(file_get_contents("../task.json"), true);

// Trouve la tâche à modifier
foreach ($tasks as &$task) {
    if ($task['name'] === $task_name && $task['userId'] === $_SESSION['userId']) {
        // Effectue les modifications
        $task['name'] = $new_task_name;
        $task['status'] = $task_status;

    }
}

// Enregistre les modifications dans le fichier JSON
file_put_contents("../task.json", json_encode($tasks));

// Redirige l'utilisateur vers la page de la liste des tâches
header("Location: ../pages/dashboard.php");
