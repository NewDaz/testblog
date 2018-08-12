<?php include ROOT. '/views/layouts/header.php';?>
<?php include ROOT.'/views/layouts/menu.php';?>

    <div id="wrapper">
        <div id="articles">
            <h2> User account</h2>
            <h3>Hello, <?php echo $user['name']; ?></h3>
            <div id="menu">
                <a href="/room/edit">Edit the data</a>
                <br>
                <?php
                $userId=$_SESSION['user'];
                $user=User::getUserById($userId);
                if($user['role_id']=='2')
                { ?>
                    <a href=<?php ROOT.""?>"/admin">   Admin panel</a>
                <?php   }else {}
                ?>

        </div>

        </div>
    </div>


    </div>


<?php include ROOT.'/views/layouts/footer.php';?>