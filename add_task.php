<?php require_once "header.php";?>



<?php 
$title = filter_input(INPUT_POST, 'title');
$description = filter_input(INPUT_POST, 'description');
$datetime_from = filter_input(INPUT_POST, 'datetime_from');
$SQLdatetime_from = date('Y-m-d H:i:s', strtotime($datetime_from)); 
$datetime_to = filter_input(INPUT_POST, 'datetime_to');
$SQLdatetime_to = date('Y-m-d H:i:s', strtotime($datetime_to));
$id_tasklist = filter_input(INPUT_POST, 'id_tasklist');
$submit = filter_input(INPUT_POST, 'submit');

$message  = 'Stránka byla načtena klasickým způsobem';

if(isset($submit)) {
    $message = 'Stránka byla načtěna s odeslaným formulářem.';
    $result = TaskModel::addTask($title, $description, $datetime_from, $datetime_to, $id_tasklist);
 if($result) {
     $message .= 'Task byl úspěšně přidán do databáze'; 
 }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Přidat task</title>
</head>
<body>
  <h1>Přidání Tasku</h1>
    <form action="add_task.php" method="post">
    <label for="text">Název:</label>
    <input type="text" name="title" placeholder="vystavit fakturu"> <br>
    <label for="text">Popis:</label>
    <input type="text" name="description" placeholder="co nejdriv vystavit fakturu za objednavku"> <br>
    <label for="datetime_for">Zadáno:</label>
    <input type="datetime-local" name="datetime_from" placeholder="1980-08-26 14:59:59"> <br>
    <label for="datetime_to">Deadline:</label>
    <input type="datetime-local" name="datetime_to" placeholder="1980-08-30 14:59:59"> <br>
    <input type="submit" name="submit" value="Uložit task" > 
    </form>
    
</body>
</html>