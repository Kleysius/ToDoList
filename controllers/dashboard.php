<?php
session_start();
// Récupérer la valeur saisie dans le champ "Tâche"
$new_task = $_POST['task'];
// Vérifier si le champ "Tâche" n'est pas vide
if (!empty($new_task)) {
  $arrayTask = json_decode(file_get_contents('../task.json'));

  // Créer un tableau contenant les informations de la nouvelle tâche
  $task = array(
    'userId' => $_SESSION['userId'],
    'name' => $new_task,
    'created_at' => date('Y-m-d'),
    'status' => 'À faire'
  );
  array_push($arrayTask, $task);
  file_put_contents('../task.json', json_encode($arrayTask));
}

header('location:../pages/dashboard.php');
