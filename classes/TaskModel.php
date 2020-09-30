<?php
use Illuminate\Database\Capsule\Manager as DB;

class TaskModel extends Model{

    public static function getAll(){

        $tasks = DB::select("SELECT * FROM tasks");

        return $tasks;
    }
}