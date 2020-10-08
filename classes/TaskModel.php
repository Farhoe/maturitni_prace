<?php
use Illuminate\Database\Capsule\Manager as DB;

class TaskModel extends Model{

    public static function getAll(){

        $tasks = DB::select("SELECT * FROM tasks");

        return $tasks;
    }


public static function addTask($title, $description, $datetime_from, $datetime_to, $id_tasklist) {
                $inserted = DB::insert("INSERT INTO tasks 
                                    (title,
                                    description,
                                    datetime_from,
                                    datetime_to,
                                    id_tasklist)
                                     VALUES(
                                         '$title',
                                         '$description',
                                         '$datetime_from',
                                         '$datetime_to',
                                         '$id_tasklist');");
            vad_dump($datetime_from, $datetime_to);

                  return $inserted;
                
            } 

 }
