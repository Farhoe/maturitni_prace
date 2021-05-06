<?php include_once "header.php"; ?>
<?php 
$idTasklist = filter_input(INPUT_GET, 'id_tasklist');
$tasks = TaskModel::getTasksByTasklistId($idTasklist);
$tasklist = TaskModel::getTasklist($idTasklist);
$roleName = UserModel::getRole();
if(in_array($roleName, ['Admin', 'Zadavatel', 'Zaměstnanec'])) {
?>


    <h1 class="h3 mb-2 text-gray-800">Seznam úkolů: <?php echo $tasklist->name; ?> </h1>
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table border">
              <thead>
              <tr>
                  <th>ID Tásku</th>
                  <th>Název</th>
                  <th>Popisek</th>
                  <th>Vytvořeno:</th>
                  <th>Deadline:</th>
                  <th>ID TaskList</th>
                </tr>
              </thead>
              <tbody> 
              <?php foreach ($tasks as $task) { ?>
              <tr>
                  <td><?php echo $task->id_task;?></td>
                  <td><a href="taskInfo.php?id_task=<?= $task->id_task ?>">
                  <?php echo $task->title;?></a></td>
                  <td><?php echo $task->description;?></td>
                  <td><?php echo $task->datetime_from;?></td>
                  <td><?php echo $task->datetime_to;?></td>
                  <td><?php echo $task->id_tasklist;?></td>  

              </tr>    
              <?php } ?>        
              </tbody>
            </table>
            <form action="add_task.php">
              <input class="btn btn-primary" type="submit" value="Přidat další.">
            </form>
          </div>
        </div>
      </div>
  
      <?php } else {
         header("location:index.php");
      } ?>
<?php require_once "footer.php";?>