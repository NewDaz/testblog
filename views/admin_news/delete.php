<?php include ROOT. '/views/layouts/header_admin.php';?>

    <div id="wrapper">
        <div id="articles">
           <p>Удалить новость<?php echo $id; ?></p>
            <br>
            <p>Вы действительно хотите удалить эту новость?</p>
            <form method="post">
                <input type="submit" name="submit" value="Удалить">
            </form>
        </div>
    </div>


    </div>


<?php include ROOT.'/views/layouts/footer_admin.php';?>