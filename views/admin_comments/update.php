<?php include ROOT. '/views/layouts/header_admin.php';?>

    <div id="wrapper">
        <div id="articles">
            <form action="#" method="post" enctype="multipart/form-data">

                <label for="content">Comment</label>
                <input type="text" name="comment" value="<?php echo $comment['comment']; ?>">
                <input type="submit" name="submit" value="Edit">
            </form>
        </div>
    </div>


    </div>


<?php include ROOT.'/views/layouts/footer_admin.php';?>