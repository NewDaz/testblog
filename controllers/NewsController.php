<?php

class NewsController {

	public function actionIndex()
	{
		
		$newsList = array();
		$newsList = News::getNewsList();

		require_once(ROOT . '/views/news/index.php');

		return true;
	}

	public function actionView($news_id)
	{

		if ($news_id) {
			$newsItem = News::getNewsItemByID($news_id);
            $newsList = array();
            $commentsList=array();
            $commentsList=Comments::getCommentsListById($news_id);
            $result=false;

            if(isset($_POST['submit']))
            {
                $options['comment']=$_POST['comment'];
                $options['user_id']=$_SESSION['user'];
                $options['news_id']=$news_id;
                $errors=false;

                if(!isset($options['comment']) || empty($options['comment'])) {
                    $errors[]='Заполните поля';
                }

                if ($errors == false) {
                    $result=Comments::createComment($options);
                    header("Location: $news_id");

                }

            }
	        require_once(ROOT . '/views/news/view.php');
		}

		return true;

	}



}

