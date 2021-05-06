<?php require_once "header.php";?>
<?php 
  $roleName = UserModel::getRole();
  if (in_array($roleName, ['Admin'])) {
      ?>

    <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Role</h1>
      <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
            <table class="table border">
            <thead>
            <tr>
                <th>ID role</th>
                <th>Název role</th>
                <th>Popis</th>
              </tr>
            </thead>
            <tbody>  
                <?php
                try {
                    $roles = RoleModel::getRole();
                } catch (\Throwable $th) {
                    echo "Nelze provést SELECT z ROLES." . "<br>";
                    $roles = array();
                } ?>
            <?php  foreach ($roles as $role) {
                    ?> <tr>
                <td><?php echo $role->id_role; ?></td>
                <td><?php echo $role->name; ?></td>
                <td><?php echo $role->description; ?></td>
                <?php
                } ?>     
              </tr>            
            </tbody>
          </table>
          <form action="add_role.php">
            <input class="btn btn-primary" type="submit" value="Přidat další do ROLI.">
          </form>
      </div>
      </div>
      </div>
      
      <?php
  } else {
    echo "Nemáte dostatečná práva.";
  } ?>
<?php require_once "footer.php";?>
