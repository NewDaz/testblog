<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <link href="/template/css/main2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="/template/images/internet.png" rel="short icon" type="image/x-icon"/>
    <title>My site</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
<div id="page-wrap">
    <header>
        <a href="/"><img src="/template/images/logo.png" alt="Main" title="Main" /></a>
        <?php if(User::isGuest()): ?>
        <span class="right"> <span class="contact"><a href="/user/login/" title="login">Enter</a></span></span>
        <span class="right"> <span class="contact"><a href="/user/register/" title="Registration">Registration</a></span></span>
        <?php else: ?>
        <span class="right"> <span class="contact"><a href="/room/index/" title="Room">Account</a></span></span>
        <span class="right"> <span class="contact"><a href="/user/logout/" title="logout">Log out</a></span></span>
        <?php endif; ?>
    </header>
