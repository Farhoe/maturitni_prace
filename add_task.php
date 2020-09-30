<?php require_once "header.php";?>


<?php 
$title = filter_input(INPUT_POST, 'title');
$description = filter_input(INPUT_POST, 'description');
$datetime_from = filter_input(INPUT_POST, 'datetime_from');
$datetime_to = filter_input(INPUT_POST, 'datetime_to');
$message  = 'Stránka byla načtena klasickým způsobem';

if(isset($submit)) {
    $message = 'Stránka byla načtěna s odeslaným formulářem.';
    $result = Model::TaskModel($title, $description, $datetime_from, $datetime_to);
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
    <form action="submit_task.php" method="post">
    <label for="text">Název:</label>
    <input type="text" name="title" placeholder="vystavit fakturu"> <br>
    <label for="text">Popis:</label>
    <input type="text" name="description" placeholder="co nejdriv vystavit fakturu za objednavku"> <br>
    <label for="datetime-local">Zadáno:</label>
    <input type="datetime-local" name="given" placeholder="1980-08-26"> <br>
    <label for="datetime-local">Deadline:</label>
    <input type="datetime-local" name="deadline" placeholder="1980-08-30"> <br>
    <input type="submit" name="submit" value="Uložit task" > 
    </form>
    
</body>
</html>