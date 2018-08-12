<?php include ROOT. '/views/layouts/header.php';?>
<?php include ROOT.'/views/layouts/menu.php';?>
    <div id="wrapper">
        <div id="articles">
            <?php foreach ($newsList as $newsItem):?>
            <article>
                <h2><?php echo $newsItem['title'];?></h2>
                <img src="<?php echo News::getImage($newsItem['news_id']); ?>" alt="Image" title="Image" />
                <p><?php echo $newsItem['short_content']; ?></p>
                    <hr>
                    <div id="data"><?php echo $newsItem['Data_create']; ?> <?php echo $newsItem['author']; ?></div>
                <a href='/news/<?php echo $newsItem['news_id'] ;?>' title="View article">Read more</a>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php include ROOT.'/views/layouts/footer.php';?>
