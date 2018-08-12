<?php
class AdminCommentsController extends AdminBase
{
    public function actionDelete($comment_id)
    {
        self::checkAdmin();


        if(isset($_POST['submit']))
        {

            Comments::deleteCommentById($comment_id);

            header("Location: /news/");


        }

        require_once (ROOT.'/views/admin_comments/delete.php');
        return true;
    }

    public function actionUpdate($comment_id)
    {
        self::checkAdmin();

        $comment=Comments::getCommentItemByID($comment_id);

        if(isset($_POST['submit'])) {
            $options['comment']=$_POST['comment'];

            Comments::updateCommentById($comment_id,$options);

            header("Location: /news/");
        }

        require_once (ROOT.'/views/admin_comments/update.php');
        return true;
    }
}