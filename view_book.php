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

?>
<div class="container" style="margin-top:30px;">

    <?php if($book): ?>

    <div class="row justify-content-center">
        <div class="col-md-12" align="center">
            <h3>Система за преглеждане на книга</h3>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12 text-center">
            <h4>Цялостна информация за книгата:</h4>
        </div>
    </div>

    <div class="row justify-content-center" align="center">
        <table class="table table-bordered" id="default-table">
            <tr>
                <th>Идентификационен номер (#): </th>
                <td><?php echo $book['book_id'];?></td>
            </tr>

            <tr>
                <th>Име на книгата: </th>
                <td><?php echo $book['book_name'];?></td>
            </tr>

            <tr>
                <th>Дълго описание на книгата: </th>
                <td><?php echo $book['book_longDesc'];?></td>
            </tr>

            <tr>
                <th>Автор на книгата: </th>
                <td><?php echo $book['book_author'];?></td>
            </tr>

            <tr>

                <th>Жанр на книгата: </th>
                <td><?php echo $book['book_genre'];?></td>
            </tr>

            <tr>
                <th>Получател на книгата: </th>
                <td><a id="default" href="<?php echo Base_url();?>book_recipient.php/?id=<?php echo $book['book_id']; ?>"><?php echo $book['book_recipient'];?></a></td>
            </tr>

            <tr>
                <th>Наличност на книгата: </th>
                <td><?php echo $book['book_presence'];?></td>
            </tr>

            <tr>
                <th>Бройки на книгата: </th>
                <td><?php echo $book['book_count'];?></td>
            </tr>

            <tr>
                <th>Период за даване на книгата: </th>
                <td><?php echo $book['book_period_devoted'];?></td>
            </tr>

            <tr>
                <th>Период за връщане на книгата: </th>
                <td><?php echo $book['book_period'];?></td>
            </tr>

        </table>
    </div>

    <?php else: ?>
        <h4 align="center">Не е открита книгата, която потърсихте.</h4>
    <?php endif; ?>
</div>

<br>

<?php
    include ("template/js.php");
    include ("template/footer.php");
?>
