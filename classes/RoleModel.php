<?php
     use Illuminate\Database\Capsule\Manager as DB;

        class RoleModel extends Model
        {
            public static function getRole()
            {
                $roles=DB::select("SELECT *
                                   FROM roles");

                return $roles;
            }

            public static function addRole($name, $description)
            {
                $inserted = DB::insert("INSERT INTO roles 
                                    (name,
                                    description,)
                                     VALUES(
                                    '$name',
                                    '$description');");
        
                return $inserted;
            }
        }
?> 