<?php
    include ("core/init.php");
    include ("template/header.php");
    include ("template/navbar.php");
?>

<div class="container" style="margin-top: 30px;">

    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Търсене на книга:</h3>
        </div>
    </div>

    <hr>

    <form method="GET" action="<?php echo Base_url();?>searched_book/">
        <input  type="text" name="search" placeholder="Търсене на книгата..."style="width:100%;color:#000;padding:10px;float:left;position:relative;padding-left:30px;">
        <button type="submit" style="background:none;border:none;"><i class="fa fa-search" style="font-size:20px;float:left;position:absolute;margin-top:-50px;color:#000;"></i></button>
    </form>

</div>

<?php
if(isset($_POST['search'])){
}
?>


<?php
    include ("template/js.php");
    include ("template/footer.php");
?>