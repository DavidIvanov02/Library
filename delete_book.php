<?php
    include ("core/init.php");
    include ("template/header.php");
    include ("template/navbar.php");

    $id = 1;
    if(isset($_GET['id'])){
        if(is_numeric($_GET['id'])){
            $id = (int) $_GET['id'];
        }}

   $book = $db->getBook($id);

   $error = false;

   if(isset($_POST['delete']))
   {
       $book_id = $book['book_id'];

       if(!$error)
       {
           $delete = $db->deleteBook($book_id);

           if($delete != false)
           {
               $errTyp = "success";
               header("Location: http://localhost/library/home/");
           }

           else
           {
               $errTyp = "danger";
               header("Location: ");
           }
       }

   }
?>

<div class="container" style="margin-top: 30px;">

    <?php if($book): ?>

    <div class="row justify-content-center">
        <div class="col-md-12" align="center">
            <h3>Система за изтриване на книга</h3>
        </div>
    </div>

    <hr>

    <div class="row" align="center">
        <div class="col-md-12 text-center">
            <h6>Сигурни ли сте, че искате да изтриете тази книга?</h6>
            <br>
        </div>

        <div class="col-md-12">
            <table class="table table-dark table-hover table-bordered">
                <tr>
                    <th>#:</th>
                    <th>Име:</th>
                    <th>Автор:</th>
                </tr>

                <td> <?=$book['book_id'];?></td>
                <td><?=$book['book_name'];?></td>
                <td> <?=$book['book_author'];?></td>
            </table>
        </div>
    </div>

    <br>

    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <div class="form">
                <form method="POST" autocomplete="off">

                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="delete">Да</button>
                        <a class="btn btn-danger" href="<?php echo Base_url();?>home/">Не</a>
                    </div>


                </form>
            </div>
        </div>
    </div>

    <?php else : ?>
        <div class="row">
            <div class="col-md-12">
                <h4>Книгата, която потърсихте е преместена или изтрита!</h4>
                <a class="btn btn-success" href="<?php echo Base_url();?>home/">Към началната страница</a>
            </div>
        </div>
    <?php endif; ?>

</div>

<br>

<?php
    include ("template/js.php");
    include ("template/footer.php");
?>
