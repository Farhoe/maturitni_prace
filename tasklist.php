<?php require_once "header.php";?>
<?php 
  $roleName = UserModel::getRole();
  if(in_array($roleName, ['Admin', 'Zadavatel', 'Zaměstnanec'])) {
?>

      <h1 class="h3 mb-2 text-gray-800">Tabulka kategorií úkolů</h1>
      <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
            <table class="table border">
            <thead>
            <tr>
                <th>ID</th>
                <th>Název</th>
                <th>Popis</th>
              </tr>
            </thead>
            <tbody>  
                <?php 
                try {
                    $tasklists = TasklistModel::getTasklists();
                } catch (\Throwable $th) {
                    echo "Nepovedl se SELECT ze seznamů!" . "<br>";
                    $tasklists = array();
                    var_dump($th);
                }           
                ?>
            <?php  foreach ($tasklists as $tasklist) {
               
                ?> <tr>
                <td><?php echo $tasklist->id_tasklist;?></td>
                <td><a href="tasklistinfo.php?id_tasklist=<?= $tasklist->id_tasklist ?>">
                <?php echo $tasklist->name;?></a></td>
                <td><?php echo $tasklist->description;?></td>
                <?php
            } ?>     
              </tr>            
            </tbody>
          </table>
          <?php  $roleName = UserModel::getRole();
                    if ($roleName == 'admin') {?>
          <form action="add_tasklist.php">
            <input class="btn btn-primary" type="submit" value="Přidat další.">
          </form>
                 <?php } ?>
      </div>
      </div>
      </div>
      <?php }?>
<?php require_once "footer.php";?>