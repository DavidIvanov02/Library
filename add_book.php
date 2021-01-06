<?php
    include ("core/init.php");
    include ("template/header.php");
    include ("template/navbar.php");

    if(!isset($userRow['username']))
    {
        header("Location: http://localhost/library/home/");
        exit();
    }

    $book_name = "";
    $book_shortDesc = "";
    $book_longDesc = "";
    $book_author = "";
    $book_genre = "";
    $book_recipient = "";
    $book_recipient_address = "";
    $book_recipient_birthdate = "";
    $book_recipient_phone = "";
    $book_presence = "";
    $book_count = "";
    $book_period_devoted = "";
    $book_period = "";

    $error = false;

    $book_nameError = "";
    $book_shortDescError = "";
    $book_longDescError = "";
    $book_authorError = "";
    $book_genreError = "";
    $book_recipientError = "";
    $book_recipient_addressError = "";
    $book_recipient_birthdateError = "";
    $book_recipient_phoneError = "";
    $book_presenceError = "";
    $book_countError = "";
    $book_period_devotedError = "";
    $book_periodError = "";

    if(isset($_POST['add']))
    {
        $book_name = trim( $_POST[ 'book_name' ] );
        $book_name = strip_tags( $book_name );
        $book_name = htmlspecialchars( $book_name );

        $book_shortDesc = trim( $_POST[ 'book_shortDesc' ] );
        $book_shortDesc = strip_tags( $book_shortDesc );
        $book_shortDesc = htmlspecialchars( $book_shortDesc );

        $book_longDesc = trim( $_POST[ 'book_longDesc' ] );
        $book_longDesc = strip_tags( $book_longDesc );
        $book_longDesc = htmlspecialchars( $book_longDesc );

        $book_author = trim( $_POST[ 'book_author' ] );
        $book_author = strip_tags( $book_author );
        $book_author = htmlspecialchars( $book_author );

        $book_genre = trim( $_POST[ 'book_genre' ] );
        $book_genre = strip_tags( $book_genre );
        $book_genre = htmlspecialchars( $book_genre );

        $book_recipient = trim( $_POST[ 'book_recipient' ] );
        $book_recipient = strip_tags( $book_recipient );
        $book_recipient = htmlspecialchars( $book_recipient );

        $book_recipient_address = trim( $_POST[ 'book_recipient_address' ] );
        $book_recipient_address = strip_tags( $book_recipient_address );
        $book_recipient_address = htmlspecialchars( $book_recipient_address );

        $book_recipient_birthdate = trim( $_POST[ 'book_recipient_birthdate' ] );
        $book_recipient_birthdate = strip_tags( $book_recipient_birthdate );
        $book_recipient_birthdate = htmlspecialchars( $book_recipient_birthdate );

        $book_recipient_phone = trim( $_POST[ 'book_recipient_phone' ] );
        $book_recipient_phone = strip_tags( $book_recipient_phone );
        $book_recipient_phone = htmlspecialchars( $book_recipient_phone );

        $book_presence = trim( $_POST[ 'book_presence' ] );
        $book_presence = strip_tags( $book_presence );
        $book_presence = htmlspecialchars( $book_presence );

        $book_count = trim( $_POST[ 'book_count' ] );
        $book_count = strip_tags( $book_count );
        $book_count = htmlspecialchars( $book_count );

        $book_period_devoted = trim( $_POST[ 'book_period_devoted' ] );
        $book_period_devoted = strip_tags( $book_period_devoted );
        $book_period_devoted = htmlspecialchars( $book_period_devoted );

        $book_period = trim( $_POST[ 'book_period' ] );
        $book_period = strip_tags( $book_period );
        $book_period = htmlspecialchars( $book_period );


        if(empty($book_name))
        {
            $error = true;
            $book_nameError = '<div style="color: #B0E0E6">Въведи име на книгата!</div>';
        }

        if(empty($book_shortDesc))
        {
            $error = true;
            $book_shortDescError = '<div style="color: #B0E0E6">Въведи кратко описание на книгата!</div>';
        }

        if(empty($book_longDesc))
        {
            $error = true;
            $book_longDescError = '<div style="color: #B0E0E6">Въведи дълго описание на книгата!</div>';
        }

        if(empty($book_author))
        {
            $error = true;
            $book_authorError = '<div style="color: #B0E0E6">Въведи автор на книгата!</div>';
        }

        if(empty($book_genre))
        {
            $error = true;
            $book_genreError = '<div style="color: #B0E0E6">Въведи жанр на книгата!</div>';
        }

        if(empty($book_recipient))
        {
            $error = true;
            $book_recipientError = '<div style="color: #B0E0E6">Въведи получател на книгата!</div>';
        }

        if(empty($book_recipient_address))
        {
            $error = true;
            $book_recipient_addressError = '<div style="color: #B0E0E6">Въведи адрес на получателя!</div>';
        }

        if(empty($book_recipient_birthdate))
        {
            $error = true;
            $book_recipient_birthdateError = '<div style="color: #B0E0E6">Въведи рождена дата на получателя!</div>';
        }

        if(empty($book_recipient_phone))
        {
            $error = true;
            $book_recipient_phoneError = '<div style="color: #B0E0E6">Въведи телефон на получателя!</div>';
        }

        if(empty($book_presence))
        {
            $error = true;
            $book_presenceError = '<div style="color: #B0E0E6">Въведи наличност на книгата!</div>';
        }

        if(empty($book_count))
        {
            $error = true;
            $book_countError = '<div style="color: #B0E0E6">Въведи бройки на книгата!</div>';
        }

        if(empty($book_period_devoted))
        {
            $error = true;
            $book_period_devotedError = '<div style="color: #B0E0E6">Въведи период за даване на книгата!</div>';
        }

        if(empty($book_period))
        {
            $error = true;
            $book_periodError = '<div style="color: #B0E0E6">Въведи период за връщане на книгата!</div>';
        }

        if(!$error)
        {
            $add_book = $db->insertBook($book_name, $book_shortDesc, $book_longDesc, $book_author, $book_genre, $book_recipient, $book_recipient_address, $book_recipient_birthdate, $book_recipient_phone, $book_presence, $book_count, $book_period_devoted, $book_period);

            if($add_book != false)
            {
                $errTyp = "success";
                $errMSG = '<div style="color: seagreen">Успешно добавихте книга!</div>';

                $book_name = "";
                $book_shortDesc = "";
                $book_longDesc = "";
                $book_author = "";
                $book_genre = "";
                $book_recipient = "";
                $book_recipient_address = "";
                $book_recipient_birthdate = "";
                $book_recipient_phone = "";
                $book_presence = "";
                $book_count = "";
                $book_period_devoted = "";
                $book_period = "";
            }
        }

        else
        {
            $errTyp = "danger";
            $errMSG = '<div style="color: #B0E0E6">Въвели сте грешни данни, моля опитайте отново!</div>';
        }
    }

?>

<div class="container" style="margin-top: 50px;">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 align="center">Система за добавяне на книга</h3>
        </div>
    </div>

    <hr>

    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-2">
            <form method="POST" action="<?php echo Base_url();?>add/">

                <?php if(isset($errMSG)): ?>
                    <p class="youplay-input">
                    <p class="youplay-input-<?php echo ($errTyp == " success ") ? "success " : $errTyp; ?>">
                        <?php echo $errMSG; ?>
                    </p>
                    </p>
                <?php endif; ?>

                <div class="form-group">
                    <input type="text" class="form-control" name="book_name" id="book_name" placeholder="Име на книгата...">
                    <?php echo $book_nameError; ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="book_shortDesc" id="book_shortDesc" placeholder="Кратко описание на книгата...">
                    <?php echo $book_shortDescError; ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="book_longDesc" id="book_longDesc" placeholder="Дълго описание на книгата...">
                    <?php echo $book_longDescError; ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="book_author" id="book_author" placeholder="Автор на книгата...">
                    <?php echo $book_authorError; ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="book_genre" id="book_genre" placeholder="Жанр на книгата...">
                    <?php echo $book_genreError; ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="book_recipient" id="book_recipient" placeholder="Получател на книгата...">
                    <?php echo $book_recipientError; ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="book_recipient_address" id="book_recipient_address" placeholder="Адрес на получателя...">
                    <?php echo $book_recipient_addressError; ?>
                </div>

                <div class="form-group">
                    <input type="date" class="form-control" name="book_recipient_birthdate" id="book_recipient_birthdate" placeholder="Рождена дата на получателя...">
                    <?php echo $book_recipient_birthdateError; ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="book_recipient_phone" id="book_recipient_phone" placeholder="Телефон на получателя...">
                    <?php echo $book_recipient_phoneError; ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="book_presence" id="book_presence" placeholder="Наличност на книгата...">
                    <?php echo $book_presenceError; ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="book_count" id="book_count" placeholder="Бройки на книгата...">
                    <?php echo $book_countError; ?>
                </div>

                <div class="form-group">
                    <input type="date" class="form-control" name="book_period_devoted" id="book_period_devoted">
                    <?php echo $book_period_devotedError; ?>
                </div>

                <div class="form-group">
                    <input type="date" class="form-control" name="book_period" id="book_period">
                    <?php echo $book_periodError; ?>
                </div>

                <div class="form-group" align="center">
                    <button type="submit" name="add" id="add" class="btn btn-success">Добави</button>
                </div>

            </form>
        </div>
    </div>

</div>

<br>
<br>

<?php
    include ("template/js.php");
    include ("template/footer.php");
?>
