<?php
use Illuminate\Database\Capsule\Manager as DB;

class UserModel extends Model
{
    public static function getUsers()
    {
        $users=DB::select("SELECT * FROM users");

        return $users;
    }

    const SALT = '$2a$09$anexamplestringforsalt$';


    public static function addUser($firstname, $lastname, $email, $password, $birth_date, $phone_number, $city, $address, $id_role)
    {
        $saltedPassword = crypt($password, self::SALT);
        $inserted = DB::insert(
            "INSERT INTO users 
                                    (firstname,
                                    lastname,
                                    email,
                                    password,
                                    birth_date,
                                    phone_number,
                                    city,
                                    address,
                                    id_role)
                                     VALUES(
                                         '$firstname',
                                         '$lastname',
                                         '$email',
                                         '$password',
                                         '$birth_date',
                                         '$phone_number',
                                         '$city',
                                         '$address',
                                         '$id_role');"
        );
        return $inserted;
    }
    public static function authenticate(string $email, string $password): bool
    {
        $saltedPassword = crypt($password, self::SALT);
        $authenticate = DB::select("SELECT * FROM users WHERE email LINE '$email' AND password '$password'");

        if ($authenticate !== false) {
            session_start();
            $_SESSION['loggedEmail'] = $email;
            return true;
        }
        return false;
    }

    public static function getRole()
    {
        $role=DB::select(
            "SELECT *
                        FROM roles"
        );
    }
}
