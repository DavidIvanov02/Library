<?php
    include ("core/init.php");
    include ("template/header.php");
    include ("template/navbar.php");

    $per_page = 10;

    $current_page = 1;

    if(isset($_GET['page'])){
        if(is_numeric($_GET['page'])){
            $current_page = (int) $_GET['page'];
        }}

    $starting_point = ($current_page - 1) * $per_page;

    $books = $db->getAllBooksLimited($starting_point, $per_page);

    $overall = $db->getCount();
    $number_pages = ceil($overall/$per_page);

?>

<div class="container" style="margin-top: 30px;">


            <div class="row">
                <div class="col-md-6 text-left mt-1">
                    <h3>Книги</h3>
                </div>

                <?php if(isset($userRow['username'])) :?>
                    <div class="col-md-6 text-right" style="margin-top: 3px;">
                        <a class="btn btn-success" href="<?php echo Base_url();?>add/">Добави</a>
                    </div>
                <?php endif; ?>
            </div>

            <br>

            <?php if($books): ?>
                <?php foreach($books as $book): ?>

                    <table class="table table-bordered" id="main-table">
                        <tr>
                            <th>#</th>
                            <th>Име</th>
                            <th>Описание</th>
                            <th>Автор</th>
                            <th>Жанр</th>
                            <th>Получател</th>
                            <th>Наличност</th>
                            <th>Бройки</th>
                            <th>Период</th>

                            <?php if(!isset($userRow['username'])): ?>
                                <th>Още</th>
                            <?php endif; ?>

                            <?php if(isset($userRow['username'])): ?>
                                <th>Опции</th>
                            <?php endif; ?>

                        </tr>

                        <tr>
                            <td><?php echo $book['book_id'];?></td>
                            <td><?php echo $book['book_name'];?></td>
                            <td><?php echo $book['book_shortDesc'];?></td>
                            <td><?php echo $book['book_author'];?></td>
                            <td><?php echo $book['book_genre'];?></td>
                            <td><a id="default" href="<?php echo Base_url();?>book_recipient.php/?id=<?php echo $book['book_id']; ?>"><?php echo $book['book_recipient'];?></a></td>
                            <td><?php echo $book['book_presence'];?></td>
                            <td><?php echo $book['book_count'];?></td>
                            <td><?php echo $book['book_period_devoted'];?><hr><?php echo $book['book_period'];?></td>

                            <?php if(!isset($userRow['username'])): ?>
                                <td><a class="btn btn-sm btn-secondary" href="<?php echo Base_url();?>view/?id=<?php echo $book['book_id']; ?>">Прочети</a></td>
                            <?php endif; ?>

                            <?php if(isset($userRow['username'])): ?>
                                <td>
                                    <a class="btn btn-sm btn-secondary" href="<?php echo Base_url();?>view/?id=<?php echo $book['book_id']; ?>">Прочети</a><br><br>
                                    <a class="btn btn-sm btn-primary" href="<?php echo Base_url();?>edit/?id=<?php echo $book['book_id']; ?>">Редактирай</a><br><br>
                                    <a class="btn btn-sm btn-danger" href="<?php echo Base_url();?>delete/?id=<?php echo $book['book_id']; ?>">Изтрии</a>
                                </td>
                            <?php endif; ?>

                        </tr>

                    </table>

                <?php endforeach; ?>

            <?php else: ?>
                <div class="row">
                    <div class="col-md-12" style="background: #343a40 !important; color: #FFFFFF;border: 1px solid #333">
                        <h4 align="center">Няма намерени книги!</h4>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php if($current_page > 1): ?>
                                <li class="page-item"><a class="page-link" href="<?php echo Base_url();?>home?page=<?php echo $current_page-1; ?>">Предишна</a></li>
                            <?php endif; ?>

                            <?php for ($x = 1; $x <= $number_pages; $x++): ?>
                                <li class="page-item <?php echo $x==$current_page ? 'active' : '' ?>"><a class="page-link" href="<?php echo Base_url();?>home?page=<?php echo $x ?>"><?php echo $x ?></a></li>
                            <?php endfor; ?>
                            <?php if($current_page < $number_pages): ?>
                                <li class="page-item"><a class="page-link" href="<?php echo Base_url();?>home?page=<?php echo $current_page+1; ?>">Следваща</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>

<br>

<?php
    include ("template/js.php");
    include ("template/footer.php");
?>
