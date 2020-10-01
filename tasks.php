<?php 
require_once "vendor/autoload.php";  
require_once "header.php";
require_once "tasklist.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tásky</title>
</head>
<body>
<?php
$tasks = TaskModel::getAll();

?>

<table class="table">
    <thead>
        <th>ID</th>
        <th>Název</th>
        <th>Popis</th>
        <th>Začátek</th>
        <th>Konec</th>
    </thead>

    <tbody>
    
            <?php  foreach ($tasks as $task) {
                ?> <tr>
                <td><?php echo $task->id_task;?></td>
                <td><?php echo $task->title;?></td>
                <td><?php echo $task->description;?></td>
                <td><?php echo $task->datetime_from;?></td>
                <td><?php echo $task->datetime_to;?></td>
                <td><?php echo $task->id_tasklist;?></td>
                <?php
                      } ?>     
              </tr>  
    </tbody>
</table>
    <form action="add_task.php">
                  <input type="submit" value="Přidat do TASKS.">
                </form>
                        
</body>
</html>