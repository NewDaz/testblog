<?php include ROOT. '/views/layouts/header.php';?>
<?php include ROOT.'/views/layouts/menu.php';?>

    <div id="wrapper">
        <div id="articles">
                <?php if ($result): ?>
                    <div class="message"><h1>You registered </h1></div>
                </br>
                    </br>
            <?php else: ?>

                <form action="#" method="post" >
                    <table width="1000px">
                <tr>
                    <th>Register</th>
                </tr>
                        <tr>
                            <td><a href="/user/login/">“Already registered? Sign in.”</a></td>
                        </tr>
                <tr>
                    <td><input type="email"  id="email" name="email" placeholder="adress@example.com" value="<?php echo $email;?>"/></td>
                </tr>
                    <tr>
                        <td><span id="message"><?php if(isset($errors['email'])) {echo $errors['email'];} else {}?></span></td>
                    </tr>
                <tr>
                    <td><input type="text"  id="name" name="name" placeholder="Enter your name" value="<?php echo $name;?>" /></td>
                </tr>
                    <tr>
                        <td><span id="message"><?php if(isset($errors['name'])) {echo $errors['name'];} else {}?></span></td>
                    </tr>
                <tr>
                    <td><input type="password" id="password" name="password" placeholder="Enter your password" value="<?php echo $password;?>" /></td>
                </tr>
                    <tr>
                        <td><span id="message"><?php if(isset($errors['password'])) {echo $errors['password'];} else {}?></span></td>
                    </tr>
                <tr>
                    <td><input type="password" id="confirm" name="confirm" placeholder="Enter your password" value="<?php echo $confirm;?>" /></td>
                </tr>
                    <tr>
                        <td><span id="message"><?php if(isset($errors['confirm'])) {echo $errors['confirm'];} else {}?></span></td>
                    </tr>
                <tr>
                    <td>
                        <input type="submit" value="Register" id="send" name="submit"/>
                    </td>
                </tr>
                    </table>
                </form>


            <?php endif; ?>
        </div>
    </div>
    </div>

    </div>


<?php include ROOT.'/views/layouts/footer.php';?>