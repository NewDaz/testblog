<?php

//Абстрактный класс AdminBase содержит общую логику для контроллеров, которые используются в панели администратора

abstract class AdminBase

{
    public static function checkAdmin()
    {
        //Проверяем авторизован ли пользователь. Если нет, он будет переадриссован
        $userId=User::checkLogged();

        //Получаем информацию о текущем пользователе

        $user=User::getUserById($userId);

        //Если роль текущего пользователя ADMIN, пускаем его в админ панель

        if($user['role_id']=='2'){
            return true;
        }

        //Иначе завершаем работу с сообщением о закрытом доступе

        die('Access denied');

    }
}