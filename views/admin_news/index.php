<?php include ROOT. '/views/layouts/header_admin.php';?>

    <div id="wrapper">
        <div id="articles">
            <p>Admin panel</p>
            <br>
            <a href="/admin/news/create">Add news</a>
            <br>
            <h4>News List</h4>

            <table border="1" width="1000">
                <tr>
                    <th>ID news</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Short content</th>
                    <th>Author</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($newsList as $news):  ?>
                    <tr>
                        <td><?php echo $news['news_id']; ?></td>
                        <td><?php echo $news['title']; ?></td>
                        <td><?php echo $news['content']; ?></td>
                        <td><?php echo $news['short_content']; ?></td>
                        <td><?php echo $news['author']; ?></td>
                        <td><a href="/admin/news/delete/<?php echo $news['news_id']?>">DELETE</a></td>
                        <td><a href="/admin/news/update/<?php echo $news['news_id']?>">UPDATE</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>


    </div>


<?php include ROOT.'/views/layouts/footer_admin.php';?>