<?php include_once "header.php";?>

<?php

  $idTask = filter_input(INPUT_GET, 'id_task');
  $task = TaskModel::getTask($idTask);
  $roleName = UserModel::getRole();
  if(in_array($roleName, ['Admin', 'submitter', 'implementer'])) {
?>

<h1>Popis úkolu: <?= $task->title; ?></h1>
    <p>Popisek úkolu: <?= $task->description; ?></p>
    <p>Úkol zadán v: <?= $task->datetime_from; ?></p>
    <p>Úkol vypracovat do: <?= $task->datetime_to; ?></p>
    <p>Název a ID tasklistu: <?= $task->title; ?>, <?= $task->id_tasklist; ?></p>

      
<?php  } ?>