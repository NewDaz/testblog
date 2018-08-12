<?php include ROOT. '/views/layouts/header_admin.php';?>

    <div id="wrapper">
        <div id="articles">
            <p>Delete comment <?php echo $comment_id; ?></p>
            <br>
            <p>Do you want to delete this comment?</p>
            <form method="post">
                <input type="submit" name="submit" value="Delete">
            </form>
        </div>
    </div>


    </div>


<?php include ROOT.'/views/layouts/footer_admin.php';?>