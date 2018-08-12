<?php

class AdminNewsController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        //Получаем список новостей

        $newsList=array();
        $newsList=News::getNewsListAdmin();

        //Подключаем вид

        require_once(ROOT.'/views/admin_news/index.php');
        return true;
    }

    public function actionDelete($news_id)
    {
        self::checkAdmin();

        //Обработка формы
        if(isset($_POST['submit']))
        {
            //Если форма отправленна удалить новость
            News::deleteNewsById($news_id);
            //Перенаправляем пользователя на страницу управления новостями
            header("Location: /admin/news");
        }

        require_once (ROOT.'/views/admin_news/delete.php');
        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();

        $result=false;

        if(isset($_POST['submit']))
        {
            $options['title']=$_POST['title'];
            $options['content']=$_POST['content'];
            $options['short_content']=$_POST['short_content'];
            $options['author']=$_POST['author'];

            $errors=false;

            if(!isset($options['title']) || empty($options['title'])) {
                $errors[]='Enter Title';
            }
            if(!isset($options['content']) || empty($options['content'])) {
                $errors[]='Enter content';
            }
            if(!isset($options['short_content']) || empty($options['short_content'])) {
                $errors[]='Enter short content';
            }
            if(!isset($options['author']) || empty($options['author'])) {
                $errors[]='Enter author';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую новость
                $news_id = News::createNews($options);

                // Если новость добавленна
                if ($news_id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/images/{$news_id}.jpg");
                    }
                };


                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/news");
            }

        }

        require_once (ROOT.'/views/admin_news/create.php');
        return true;
    }

    public function actionUpdate($news_id)
    {
        self::checkAdmin();

        // Получаем данные о конкретной новости
        $news=News::getNewsItemByID($news_id);

        if(isset($_POST['submit'])) {
            $options['title']=$_POST['title'];
            $options['content']=$_POST['content'];
            $options['short_content']=$_POST['short_content'];
            $options['author']=$_POST['author'];

            //Сохраняем изменения
            if (News::updateNewsById($news_id, $options)) {


                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/images/{$news_id}.jpg");
                }
            }
            header("Location: /admin/news");
        }

        require_once (ROOT.'/views/admin_news/update.php');
        return true;
    }
}