<?php

class User
{


    public static function register($name, $email, $password)
    {
        $db = Db::getConnection();

        $password=md5($password);

        $role_id=1;

        $sql = 'INSERT INTO users (name, email, password,role_id) VALUES (:name, :email, :password,:role_id)';



        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':role_id',$role_id,PDO::PARAM_STR);

        return $result->execute();
    }

    public static function checkName($name)
    {
        if ( preg_match('%^[a-zA-Z][a-z0-9_-]{3,16}$%', $name)) {
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {

        if (preg_match('~^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}~', $password)) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;

    }

    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM users WHERE email= :email'; // :email это плейсхолдер
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR); //замена плейсхолдера на $email
        $result->execute();

        if ($result->fetchColumn()) { //проверка есть ли такие записи
            return true; //если есть
        }

        return false; //если нет
    }

    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE email= :email AND password= :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['user_id'];
        }
        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        //Если сессия есть, вернем идентифекатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location:/user/login");
    }

    public static function isGuest()
    {
        if(isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function getUserById($user_id)
    {
        if($user_id) {
            $db=Db::getConnection();
            $sql='SELECT * FROM users WHERE user_id=:user_id';

            $result=$db->prepare($sql);
            $result->bindParam(':user_id',$user_id,PDO::PARAM_INT);

            //Указываем, что хотим получить данные в виде массива

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

    public static function edit($user_id,$name,$password)
    {
        $db=Db::getConnection();

        $sql = 'UPDATE users SET name=:name,password=:password WHERE user_id=:user_id';

        $result= $db->prepare($sql);
        $result->bindParam(':user_id',$user_id,PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }





}