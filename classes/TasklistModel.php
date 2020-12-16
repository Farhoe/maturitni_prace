<?php 
    use Illuminate\Database\Capsule\Manager as DB;

class TasklistModel extends Model
{
    public static function getTasklists()
    {
        $tasklists=DB::select(
            "SELECT *
                                   FROM tasklists"
        );  
        return $tasklists;
    }
    public static function addTasklist($name, $description)
    {
           
        $inserted = DB::insert(
            "INSERT INTO tasklists
                                    (name,
                                    description,
                                    created_at)
                                     VALUES(
                                    '$name',
                                    '$description',
                                    NOW());"
        );
        
          return $inserted;
                
    }
}
?>
