<?php include ROOT. '/views/layouts/header.php';?>
<?php include ROOT.'/views/layouts/menu.php';?>

    <div id="wrapper">
        <div id="articles">
                <div id="about_us">
                    <p><h2><?php echo $newsItem['title'];?></h2> <img src="<?php echo News::getImage($newsItem['news_id']); ?>" alt="Image" title="Image" /><?php echo $newsItem['content'];?>
                    <hr>
                    <div id="data"><?php echo $newsItem['Data_create']; ?> <?php echo $newsItem['author']; ?></div>
                    </p>
                </div>
                <div id="add_comments">

                    <?php if(User::isGuest()): ?>
                    <? else: ?>
                        <?php if(isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li>- <?php echo $error; ?></li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif; ?>

                    <form  action="#" method="post">
                        </br>
                    <input type="text"  id="comment" name="comment" placeholder="My comment to the post" value=""/>
                        <input type="submit" value="Add Comment" name="submit">
                    </form>

                    <?php endif; ?>
                    <div id="comments">
                        <table >
                        <?php foreach ($commentsList as $commentsItem):?>
                            <tr><td>Comment: <?php echo $commentsItem['comment'];?></td>
                                <td><?php echo $commentsItem['Data_create']."  ".$commentsItem['name'] ?></td>
                                <?php
                                if(!User::isGuest())
                                {
                                $userId=$_SESSION['user'];
                                $user=User::getUserById($userId);
                                if($user['role_id']=='2')
                                    { ?>
                                       <td><a href="/admin/comments/update/<?php echo $commentsItem['comment_id']?>">EDIT</a>
                                <td><a href="/admin/comments/delete/<?php echo $commentsItem['comment_id']?>">DELETE</a></td>
                                 <?php   }else {} }
                                ?>
                            </tr>
                            <tr>
                                <td colspan="4"><hr></td>
                            </tr>
                        <?php endforeach; ?>
                        </table>
                    </div>
                </div>

        </div>
    </div>


    </div>


<?php include ROOT.'/views/layouts/footer.php';?>