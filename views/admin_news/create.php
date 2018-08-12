<?php include ROOT. '/views/layouts/header_admin.php';?>

    <div id="wrapper">
        <div id="articles">
                <?php if ($result): ?>
                <p>News Add </p>
                </br>
                </br>
                <?php else: ?>
                <?php if (isset($errors)&& is_array($errors)): ?>
                <ul>
                     <?php foreach ($errors as $error): ?>
                     <li>- <?php echo $error; ?></li>
                        <?php endforeach; ?>
                        </ul>
             <?php endif; ?>
            <form action="#" method="post" enctype="multipart/form-data">
            <label for="title"> Title</label>
            <input type="text" name="title" value="">
            <label for="image">Image</label>
            <input type="file" name="image" placeholder="" value="">
            <label for="content"> Content</label>
            <input type="text" name="content" value="">
            <label for="short_content"> Short content</label>
            <input type="text" name="short_content" value="">
            <label for="author"> Author</label>
            <input type="text" name="author" value="">
            <br>
            <input type="submit" name="submit" value="Create">
            </form>
                <?php endif; ?>
        </div>
    </div>


    </div>


<?php include ROOT.'/views/layouts/footer_admin.php';?>