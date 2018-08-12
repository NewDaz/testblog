<?php

class UserController
{
    public function actionRegister()
    {
        $email='';
        $name='';
        $password='';
        $confirm='';
        $result=false;

        if(isset($_POST['submit'])){
            $email=$_POST['email'];
            $name=$_POST['name'];
            $password=$_POST['password'];
            $confirm=$_POST['confirm'];

            $errors=false;
            if(!User::checkName($name)) {
                $errors['name']='Invalid user name';

            }

            if(!User::checkEmail($email)) {
                $errors['email']='Invalid email';
            }


            if(!User::checkPassword($password)) {
                $errors['password']='Invalid password';
            }

            if(User::checkEmailExists($email)){
                $errors['emailExists']='This email is already in use';
            }
            if($password!=$confirm)
            {
                $errors['confirm']='Passwords do not match';
            }

            if($errors==false){
                $result=User::register($name,$email,$password);
            }
        }


        require_once(ROOT . '/views/user/register.php');
        return true;
    }


    public function actionLogin()
    {
        $email='';
        $password='';

        if(isset($_POST['submit'])) {
            $email=$_POST['email'];
            $password=$_POST['password'];
            $password=md5($password);


            $errors=false;

            //Валидация полей
            if(!User::checkEmail($email))
            {
                $errors['email']='Invalid email';
            }
            if(!User::checkPassword($password))
            {
                $errors['password']='Invalid password';
            }

            //Проверка существует ли пользователь
            $userId=User::checkUserData($email,$password);

            if($userId == false) {
                //Если данные не правильные
                $errors['details']='Incorrect login details for the website';
            }
            else
            {
                //Если данные правильные, запоминаем пользователя(сессия)

                User::auth($userId);

                //Перенаправляем пользователя в закрытую часть - кабинет

                header("Location: /room/");
            }

        }

        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {

        unset($_SESSION["user"]);
        header("Location: /");
    }
}