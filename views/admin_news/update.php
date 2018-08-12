<?php include ROOT. '/views/layouts/header_admin.php';?>

    <div id="wrapper">
        <div id="articles">
            <form action="#" method="post" enctype="multipart/form-data">
                <label for="title">Title</label>
                <input type="text" name="title" value="<?php echo $news['title']; ?>">
                <label for="image"> Image</label>
                <img src="<?php echo News::getImage($news['news_id']); ?>">
                <input type="file" name="image" placeholder="" value="<?php echo $news['id'];?>">
                <label for="content"> Content</label>
                <textarea name="content"><?php echo $news['content']; ?> </textarea>
                <label for="short_content"> Short content</label>
                <textarea name="short_content"><?php echo $news['short_content']; ?> </textarea>
                <label for="author">Author</label>
                <input type="text" name="author" value="<?php echo $news['author']; ?>">
                <br>
                <input type="submit" name="submit" value="Edit">
            </form>
        </div>
    </div>


    </div>


<?php include ROOT.'/views/layouts/footer_admin.php';?>