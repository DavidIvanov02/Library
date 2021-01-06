<?php
require_once ("core/init.php");
include ("template/header.php");
include ("template/navbar.php");

if(isset($_GET['search']))
{
    $search = $_GET['search'];
    $book_author = $db->getAuthorsSearch($search);
}


?>


<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Търсене на книга:</h3>
        </div>
    </div>

    <hr>

    <?php
    if(!empty($book_author))
    {
        foreach($book_author AS $book)
        { ?>
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <h4>Автор на книгата: <b><?php echo $book['book_author']; ?></b> </h4>
                    <hr>
                </div>


                <div class="col-md-12 text-center">
                    <a class="btn btn-primary" href="<?php echo Base_url();?>view/?id=<?php echo $book['book_id']; ?>">Към книгата</a>
                </div>
            </div>
        <?php }
    }

    else
    {
        echo'<h4 class="text-center" style="color:#ff0000">Няма намерени автори с това име!</h4>';
    }

    ?>




</div>

<br>

<?php
include ("template/js.php");
include ("template/footer.php");
?>
