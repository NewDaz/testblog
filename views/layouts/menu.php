<div class="clear"><br /></div>
<center>
    <div id="menu">Sections <hr /></div>
    <div id="menuHrefs">
        <a href="/news/">News</a>
        <?php if(User::isGuest()): ?>
        <a href="/user/login/">Enter</a>
        <a href="/user/register/">Registration</a>
        <?php else: ?>
        <a href="/user/logout/">Log out</a>
        <a href="/room/index/">Account</a>
        <?php endif; ?>
    </div>
</center>
