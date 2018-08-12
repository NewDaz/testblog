<?php include ROOT. '/views/layouts/header.php';?>
<?php include ROOT.'/views/layouts/menu.php';?>

    <div id="wrapper">
        <div id="articles">
+
                <form action="#" method="post" >
                <table width="1000px">
                    <tr>
                    <th>Sign In</th>
                    </tr>
                    <tr>
                        <td><a href="/user/register/">Don’t have an account? Join now</a></td>
                    </tr>
                    <tr><td><input type="email"  id="email" name="email" placeholder="adress@example.com" value=""/></td></tr>
                    <tr>
                        <td><span id="message"><?php if(isset($errors['email'])) {echo $errors['email'];} else {}?></span></td>
                    </tr>
                    <tr><td><input type="password" id="password" name="password" placeholder="Enter password" value="" /></td></tr>
                    <tr>
                        <td><span id="message"><?php if(isset($errors['password'])) {echo $errors['password'];} else {}?></span></td>
                    </tr>

                    <tr><td><input type="submit" value="Enter" id="send" name="submit"/></td></tr>
                    <tr>
                        <td><span id="message"><?php if(isset($errors['details'])) {echo $errors['details'];} else {}?></span></td>
                    </tr>
                </table>

            </form>
        </div>
    </div>


    </div>


<?php include ROOT.'/views/layouts/footer.php';?>