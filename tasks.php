<?php require_once "vendor" . DIRECTORY_SEPARATOR . "autoload.php";?>
<?php require_once "header.php";?>

      <h1 class="h3 mb-2 text-gray-800">Tabulka tasků</h1>
      <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
<?php
$tasks = TaskModel::getAllTasks();

?>

<table class="table">
    <thead>
        <th>ID</th>
        <th>Název</th>
        <th>Popis</th>
        <th>Začátek</th>
        <th>Konec</th>
        <th>ID tasku</th>
    </thead>

    <tbody>
    
            <?php  foreach ($tasks as $task) {
    ?> <tr>
                <td><?php echo $task->id_task; ?></td>
                <td><?php echo $task->title; ?></td>
                <td><?php echo $task->description; ?></td>
                <td><?php echo $task->datetime_from; ?></td>
                <td><?php echo $task->datetime_to; ?></td>
                <td><?php echo $task->id_tasklist; ?></td>
                <?php
} ?>     
              </tr>  
    </tbody>
</table>
    <form action="add_task.php">
                  <input class="btn btn-primary" type="submit" value="Přidat do TASKS.">
                </form>
                        
