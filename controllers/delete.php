<?php
session_start();

if (isset($_GET['name'])) {
// Récupérer l'identifiant de la tâche à supprimer
$taskId = $_GET['name'];
// Récupérer le tableau de tâches à partir du fichier JSON
$arrayTask = json_decode(file_get_contents('../task.json'), true);
// Parcourir le tableau de tâches pour trouver la tâche à supprimer
foreach ($arrayTask as $key => $task) {
  if ($task['name'] == $taskId) {
    unset($arrayTask[$key]);
  }
}
$arrayTask = array_values($arrayTask);
}
// Recoder le tableau PHP en JSON et l'enregistrer dans le fichier JSON
file_put_contents('../task.json', json_encode($arrayTask));

header('location:../pages/dashboard.php');
