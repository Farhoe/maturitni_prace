<?php
    use Illuminate\Database\Capsule\Manager as DB;

class TaskModel extends Model
{

    public static function getAllTasks()
    {

        $tasks = DB::select("SELECT * FROM tasks");

        return $tasks;
    }


    public static function addTask($title, $description, $datetime_from, $datetime_to, $id_tasklist)
    {
                $inserted = DB::insert(
                    "INSERT INTO tasks 
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
                                         '$id_tasklist');"
                );
                  return $inserted;
                
    } 

    public static function getTaskByTasklist($idTask)
    {
        $tasks = DB::select("SELECT * FROM tasks WHERE id_tasklist = $idTask");
        return $tasks;

    }

    public static function getTask($idTask) 
    {
        $task = DB::select("SELECT * FROM tasks WHERE id_task = $idTask");
        return $task[0];
    }

    public static function getTasksByTasklistId($idTasklist)

    {
        $tasks =DB ::select("SELECT * FROM tasks WHERE id_tasklist = $idTasklist");

        return $tasks;
    }

    public static function getTaskLists()
    {
        $tasklists = DB::select("SELECT * FROM tasklists WHERE id_tasklist = $idTasklist");
        return $tasklists;
    }

    public static function getTasklist($idTasklist)
    {
        $tasklist = DB::select("SELECT * FROM tasklists WHERE id_tasklist = $idTasklist");
        return $tasklist[0];
    }
    

}
