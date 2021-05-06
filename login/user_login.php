<?php require_once '../vendor/autoload.php';

$submit = filter_input(INPUT_POST, 'submit');
$logout = filter_input(INPUT_POST, 'logout');
    if(isset($submit)) {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $authenticate = UserModel::authenticate($email, $password);
    if($authenticate == true) {
        header("Location: ../index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přihlášení</title>
    <link rel="stylesheet" href="css/style.css">
</head> 
<body>

<?php

if (isset($_SESSION['loggedEmail'])) {
    ?>

<p> Přihlášen jako: <?= $_SESSION['loggedEmail']?> </p>
<p> Role: <?= UserModel::getRole() ?> </p>

<?php }

else {
    ?>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Přihlašení </h2>

    <!-- Login Form -->
    <form action="user_login.php" method="post">
      <input type="email" id="login" class="fadeIn second input-text" name="email" placeholder="E-mail">
      <input type="password" id="password" class="fadeIn third input-text" name="password" placeholder="Heslo">
      <input type="submit" class="fadeIn fourth" name="submit" value="Přihlásit">
    </form>

    <!-- Remind Passowrd -->
<div id="formFooter">
       <?php 


    if(isset($submit) && !$authenticate) { ?>

        <p>Špatné údaje. Zkuste to znovu</p>

 <?php } ?>
    </div>
  </div>
</div>



<?php
} ?>

<?php 

if(isset($submit) && !$authenticate) { ?>

    <p>Špatné údaje. Zkuste to znovu</p>

<?php } ?>

</body>
</html>