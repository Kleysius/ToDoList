<?php
session_start();
$userName = $_SESSION['userName'];
$array_task = json_decode(file_get_contents("../task.json"));
$task_filter = array_filter($array_task, function ($task) {
    return $task->userId == $_SESSION['userId'];
})

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/dashboard.css">
    <title>Tableau de bord</title>
</head>

<body>
    <header>
        <h1>Bienvenue sur ton tableau de bord <?php echo $userName ?></h1>
    </header>
    <main>
        <div class="add_task">
            <h2>Ajouter une tâche</h2>
            <form action="../controllers/dashboard.php" method="post">
                <label for="task">Tâche : </label>
                <input type="text" id="task" name="task" placeholder="Entrez une nouvelle tâche...">
                <input type="submit" value="Ajouter">
            </form>
        </div>
        <div class="tabl">
            <h2>Liste des tâches</h2>
            <table>
                <thead>
                    <tr>
                        <th>Tâche</th>
                        <th>Date de création</th>
                        <th>Statut</th>
                        <th>Actions</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($task_filter as $task) {
                    ?>
                        <tr>
                            <td><?php echo $task->name; ?></td>
                            <td><?php echo $task->created_at; ?></td>
                            <td><?php echo $task->status; ?></td>
                            <td>
                                <div class="edit">
                                    <form action="../controllers/edit.php" method="post">
                                        <input type="hidden" name="task_name" value="<?php echo $task->name ?>">
                                        <label for="new_task_name">Renommer :</label>
                                        <input type="text" id="new_task_name" name="new_task_name" value="<?php echo $task->name ?>">
                                        <label for="task_status">Modifier le statut :</label>
                                        <select id="task_status" name="task_status">
                                            <option value="En cours" <?php if ($task->status === "En cours") echo "selected"; ?>>En cours</option>
                                            <option value="Terminée" <?php if ($task->status === "Terminée") echo "selected"; ?>>Terminée</option>
                                        </select>
                                        <input type="submit" value="Modifier">
                                    </form>
                                </div>
                            </td>
                            <td>
                                <div class="delete">
                                    <?php
                                    echo ('<a href="../controllers/delete.php?name=' . $task->name . '">Supprimer</a>');
                                    ?>
                                </div>
                            </td>
                        </tr>
                    <?php

                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>