<?php require_once "header.php";?>
<?php require_once "classes/Model.php";?>

<?php 
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$birth_date = filter_input(INPUT_POST, 'birth_date');
$SQLbirth_date = date('Y-m-d', strtotime($birth_date));
var_dump($birth_date);
$phone_number = filter_input(INPUT_POST, 'phone_number');
$city = filter_input(INPUT_POST, 'city');
$address = filter_input(INPUT_POST, 'address');
$id_role = filter_input(INPUT_POST, 'id_role');
$submit = filter_input(INPUT_POST, 'submit');

$message  = 'Stránka byla načtena klasickým způsobem';

if(isset($submit)) {
    $message = 'Stránka byla načtěna s odeslaným formulářem.';
    $result = UserModel::addUser($firstname, $lastname, $email, $password, $birth_date, $phone_number, $city, $address, $id_role);
    if($result) {
        $message .= 'Task byl úspěšně přidán do databáze'; 
    }
    else {
        $message .= 'Nejde přidat složka do databáze';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Přidat uživatele</title>
</head>
<body>
  <h1>Přidání uživatele</h1>
    <form action="add_user.php" method="post">
    <label for="text">Jméno:</label>
    <input type="text" name="firstname" placeholder="Jan"> <br>
    <label for="text">Příjmení:</label>
    <input type="text" name="lastname" placeholder="Novák"> <br>
    <label for="email">Email:</label>
    <input type="email" name="email" placeholder="jan.novak@seznam.cz"> <br>
    <label for="password">Heslo:</label>
    <input type="password" name="password" placeholder="novak123"> <br>
    <label for="birth_date">Datum narození:</label>
    <input type="date" name="birth_date"> <br>
    <label for="phone_number">Telefonní číslo:</label>
    <input type="number" name="phone_number"> <br>
    <label for="city">Město:</label>
    <input type="text" name="city" placeholder="Děčín"> <br>
    <label for="address">Ulice:</label>
    <input type="text" name="address" placeholder="Ulice Křížová"> <br>
    <label for="role">Role:</label>
    <select name="id_role" id_role>
        <?php 
        $roles = RoleModel::getRole();

        foreach ($roles as $role) { ?>
            <option value="<?= $role->id_role?>"><?= $role->name?></option>
        <?php } ?>
    </select> <br>
    <input type="submit" name="submit" value="Uložit Uživatele" > 
    </form>
    
</body>
</html>
