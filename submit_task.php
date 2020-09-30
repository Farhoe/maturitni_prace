<?php 
require_once "vendor/autoload.php";
use Illuminate\Database\Capsule\Manager as DB;
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Odeslání</title>
</head>
<body><?php 
              $title = filter_input(INPUT_POST, 'title');
              $description = filter_input(INPUT_POST, 'description');
              $datetime_from = filter_input(INPUT_POST, 'datetime_from');
              $datetime_to = filter_input(INPUT_POST, 'datetime_to');
                
    try {
        $inserted = DB::insert("INSERT INTO tasks 
                            (title,
                             description,
                             datetime_from,
                             datetime_to,
                             )
                             VALUES(
                                 '$title',
                                 '$description',
                                 '$datetime_from',
                                 '$datetime_to' 
                                 );");

    if ($inserted == true) {
        echo "Úspěšně přidáno do databáze!";
    }
        }   catch (\Throwable $th) {;
            echo "Chyba. Zkuste to později." . "<br>";
            $users = array();
        }
?>