<?php require_once "vendor" . DIRECTORY_SEPARATOR . "autoload.php";?>
<?php require_once "header.php";?>


      <h1 class="h3 mb-2 text-gray-800">Tabulka uživatelů</h1>
      <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
            <table class="table border">
            <thead>
            <tr>
                <th>ID</th>
                <th>Křestní jméno</th>
                <th>Příjmení</th>
                <th>Email</th>
                <th>Heslo</th>
                <th>Město</th>
                <th>Adresa</th>
                <th>Role</th>
              </tr>
            </thead>
            <tbody>  
                <?php 
                  try {
                      $users = UserModel::getUsers();
                  } catch (\Throwable $th) {
                      echo "Nemožný select z USERS!" . "<br>";
                      $users = array();
                  }           
                ?>
            <?php  foreach ($users as $user) {
                ?> <tr>
                <td><?php echo $user->id_user;?></td>
                <td><?php echo $user->firstname;?></td>
                <td><?php echo $user->lastname;?></td>
                <td><?php echo $user->email;?></td>
                <td><?php echo $user->password;?></td>
                <td><?php echo $user->city;?></td>
                <td><?php echo $user->address;?></td>
                <td><?php echo $user->id_role;?></td>
                <?php
                      } ?>     
              </tr>            
            </tbody>
          </table>
          <form action="add_user.php">
            <input class="btn btn-primary" type="submit" value="Přidat další do USERS.">
          </form>
      </div>
      </div>
      </div>
<?php require_once "footer.php";?>