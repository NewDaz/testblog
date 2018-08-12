<?php

Class Comments
{

    public static function getCommentItemByID($comment_id)
    {
        $comment_id = intval($comment_id);

        if ($comment_id) {
            $db = Db::getConnection();
            $result = $db->query('SELECT * FROM comments WHERE comment_id='.$comment_id);

            /*$result->setFetchMode(PDO::FETCH_NUM);*/
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $commentItem = $result->fetch();
            return $commentItem;
        }

    }

    public static function getCommentsListById($news_id) {

        $news_id = intval($news_id);

        $db = Db::getConnection();
        $commentsList = array();
        $result = $db->query('SELECT * FROM comments INNER JOIN users USING(user_id) WHERE news_id='.$news_id);
        $i = 0;
        while($row = $result->fetch()) {

            $commentsList[$i]['comment'] = $row['comment'];
            $commentsList[$i]['comment_id'] = $row['comment_id'];
            $commentsList[$i]['Data_create'] = $row['Data_create'];
            $commentsList[$i]['name']=$row['name'];
            $i++;
        }

        return $commentsList;

    }

    public static function createComment($options)
    {
        $db=Db::getConnection();

        $sql='INSERT INTO comments (user_id,news_id,comment) VALUES (:user_id,:news_id,:comment)';

        $result=$db->prepare($sql);
        $result->bindParam(':comment',$options['comment'],PDO::PARAM_STR);
        $result->bindParam(':user_id',$options['user_id'],PDO::PARAM_INT);
        $result->bindParam(':news_id',$options['news_id'],PDO::PARAM_INT);

        return $result->execute();


    }

    public static function deleteCommentById($comment_id)
    {
        $db=Db::getConnection();

        $sql='DELETE FROM comments WHERE comment_id=:comment_id';

        $result=$db->prepare($sql);
        $result->bindParam(':comment_id',$comment_id,PDO::PARAM_INT);

        return $result->execute();
    }

    public static function updateCommentById($comment_id,$options)
    {
        $db=Db::getConnection();

        $sql="UPDATE comments SET  comment=:comment WHERE comment_id=:comment_id";

        $result=$db->prepare($sql);
        $result->bindParam(':comment',$options['comment'],PDO::PARAM_STR);
        $result->bindParam(':comment_id',$comment_id,PDO::PARAM_INT);

        return $result->execute();

    }
}