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
                <h3>Система за преглеждане на получател</h3>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Цялостна информация за получателя:</h4>
            </div>
        </div>

        <div class="row justify-content-center" align="center">
            <table class="table table-bordered" id="default-table">

                <tr>
                    <th>Име на получателят: </th>
                    <td><?php echo $book['book_recipient'];?></td>
                </tr>

                <tr>
                    <th>Адрес на получателят: </th>
                    <td><?php echo $book['book_recipient_address'];?></td>
                </tr>

                <tr>
                    <th>Рождена дата на получателят: </th>
                    <td><?php echo $book['book_recipient_birthdate'];?></td>
                </tr>

                <tr>
                    <th>Телефон на получателят: </th>
                    <td><?php echo $book['book_recipient_mobile'];?></td>
                </tr>
            </table>
        </div>

    <?php else: ?>
        <h4 align="center">Не е открит получателят, който потърсихте.</h4>
    <?php endif; ?>

</div>

<br>

<?php
include ("template/js.php");
include ("template/footer.php");
?>
