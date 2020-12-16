<?php require_once '../vendor/autoload.php';

session_start();
$submit = filter_input(INPUT_POST, 'submit');
$logout = filter_input(INPUT_POST, 'logout');
    if(isset($logout)) {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $authenticate = UserModel::authenticate($email, $password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přihlášení</title>
</head>
<body>
<?php 
if(isset($_SESSION['loggedEmail'])){
?>
<p>Úspěšně přihlášen k účtu <?= $_SESSION['loggedEmail'];?>!</p>
<?php } else { ?>

<h1>Příhlášení</h1>
<h1>Přihlašovací formulář</h1>
    <form action="user_login.php" method="post">
        <label for="email">Přihlašovací email:</label>
            <input type="email" name="email">
        <label for="password">Heslo:</label>
            <input type="password" name="password">
        <input type="submit" name="submit" value="Odeslat">
    </form>
<?php }

if(isset($submit) && !$authenticate) { ?>

<p>Špatné údaje. Zkuste to znovu</p>

<?php } ?>

</body>
</html>