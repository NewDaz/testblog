<?php include ROOT. '/views/layouts/header.php';?>
<?php include ROOT.'/views/layouts/menu.php';?>

    <div id="wrapper">
        <div id="articles">
            <div align="center">
                <?php if ($result): ?>
                    <p>Data edited </p>
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
            </div>
            <h1> Data editing</h1>
            <form action="#" method="post" >
                <label for="name">Enter your name</label>
                <input type="text"  id="name" name="name" placeholder="Enter your name" value="<?php echo $name;?>" />
                <label for="password">Enter your password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" value="<?php echo $password;?>" />
                <input type="submit" value="Save" id="send" name="submit"/>
            </form>
            <?php endif; ?>
        </div>
    </div>
    </div>

    </div>


<?php include ROOT.'/views/layouts/footer.php';?>