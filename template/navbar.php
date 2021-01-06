<?php if(isset($userRow['username'])) {?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"  style="background-color: #000000 !important;color: ghostwhite;">
        <a class="navbar-brand" style="color: #4da3ff;" href="<?php echo Base_url();?>home/">Начало</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo Base_url();?>find_book/">Търси книга</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo Base_url();?>find_author/">Търси автор</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo Base_url();?>find_recipient/">Търси получател</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo Base_url();?>logout/">Изход</a>
                </li>
            </ul>
        </div>
    </nav>
<?php } ?>

<?php if(!isset($userRow['username'])) {?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #000000 !important;color: ghostwhite;">
    <a class="navbar-brand" style="color: #4da3ff;" href="<?php echo Base_url();?>home/">Начало</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo Base_url();?>login/">Вход</a>
            </li>
        </ul>
    </div>
</nav>
<?php } ?>

