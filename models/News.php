<?php


class News
{

	/** Returns single news items with specified id
	* @rapam integer &id
	*/

	public static function getNewsItemByID($news_id)
	{
		$news_id = intval($news_id);

		if ($news_id) {
			$db = Db::getConnection();
			$result = $db->query('SELECT * FROM news WHERE news_id=' . $news_id);

			/*$result->setFetchMode(PDO::FETCH_NUM);*/
			$result->setFetchMode(PDO::FETCH_ASSOC);

			$newsItem = $result->fetch();
			return $newsItem;
		}

	}

	/**
	* Returns an array of news items
	*/
    public static function getNewsList() {

        $db = Db::getConnection();
        $newsList = array();

        $result = $db->query('SELECT * FROM news ORDER BY Data_create DESC');

        $i = 0;
        while($row = $result->fetch()) {
            $newsList[$i]['news_id'] = $row['news_id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['Data_create'] = $row['Data_create'];
            $newsList[$i]['author'] = $row['author'];
            $i++;
        }

        return $newsList;

    }

    public static function getNewsListAdmin() {

        $db = Db::getConnection();
        $newsList = array();

        $result = $db->query('SELECT * FROM news ORDER BY Data_create DESC');

        $i = 0;
        while($row = $result->fetch()) {
            $newsList[$i]['news_id'] = $row['news_id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['author'] = $row['author'];

            $i++;
        }

        return $newsList;

    }

    public static function deleteNewsById($news_id)
    {
        $db=Db::getConnection();

        $sql='DELETE FROM news WHERE news_id=:news_id';

        $result=$db->prepare($sql);
        $result->bindParam(':news_id',$news_id,PDO::PARAM_INT);

        return $result->execute();
    }

    public static function createNews($options)
    {
        $db=Db::getConnection();

        $sql='INSERT INTO news (title,content,short_content,author) VALUES (:title,:content,:short_content,:author)';

        $result=$db->prepare($sql);
        $result->bindParam(':title',$options['title'],PDO::PARAM_STR);
        $result->bindParam(':content',$options['content'],PDO::PARAM_STR);
        $result->bindParam(':short_content',$options['short_content'],PDO::PARAM_STR);
        $result->bindParam(':author',$options['author'],PDO::PARAM_STR);

        if($result->execute()) {
            //Если запрос выполнен успешно возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function updateNewsById($news_id,$options)
    {
        $db=Db::getConnection();

        $sql="UPDATE news SET title=:title, content=:content,short_content=:short_content,author=:author WHERE news_id=:news_id";

        $result=$db->prepare($sql);
        $result->bindParam(':title',$options['title'],PDO::PARAM_STR);
        $result->bindParam(':content',$options['content'],PDO::PARAM_STR);
        $result->bindParam(':short_content',$options['short_content'],PDO::PARAM_STR);
        $result->bindParam(':author',$options['author'],PDO::PARAM_STR);
        $result->bindParam(':news_id',$news_id,PDO::PARAM_INT);

        return $result->execute();

    }

    public static function getImage($news_id)
    {
        //Название изображения пустышки
        $noImage='no-image.jpg';

        //Путь к папке с картинками
        $path='/template/images/';

        //Путь к изображению новости
        $pathToNewsImage=$path.$news_id.'.jpg';

        if(file_exists($_SERVER['DOCUMENT_ROOT'].$pathToNewsImage))
        {
            //Если изображение для товара существует
            //Возвращает изображение товара
            return $pathToNewsImage;
        }

        //Возвращаем путь изображения-пустышки
        return $path.$noImage;
    }





}