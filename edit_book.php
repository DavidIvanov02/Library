<?php
    include ("core/init.php");

    if(!isset($userRow['username']))
    {
        header("Location: http://localhost/library/home/");
        exit();
    }

    include ("template/header.php");
    include ("template/navbar.php");

    $id = 1;
    if(isset($_GET['id'])){
        if(is_numeric($_GET['id'])){
            $id = (int) $_GET['id'];
        }}

    $book = $db->getBook($id);

    $error = false;

    $book_id = $book['book_id'];
    $book_name = $book['book_name'];
    $book_shortDesc = $book['book_shortDesc'];
    $book_longDesc = $book['book_longDesc'];
    $book_author = $book['book_author'];
    $book_genre = $book['book_genre'];
    $book_recipient = $book['book_recipient'];
    $book_recipient_address = $book['book_recipient_address'];
    $book_recipient_birthdate = $book['book_recipient_birthdate'];
    $book_recipient_mobile = $book['book_recipient_mobile'];
    $book_presence = $book['book_presence'];
    $book_count = $book['book_count'];
    $book_period_devoted = $book['book_period_devoted'];
    $book_period  = $book['book_period'];

    $book_nameError = "";
    $book_shortDescError = "";
    $book_longDescError = "";
    $book_authorError = "";
    $book_genreError = "";
    $book_recipientError = "";
    $book_recipient_addressError = "";
    $book_recipient_birthdateError = "";
    $book_recipient_mobileError = "";
    $book_presenceError = "";
    $book_countError = "";
    $book_period_devotedError = "";
    $book_periodError = "";

    if(isset($_POST['edit']))
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

        $book_recipient_mobile = trim( $_POST[ 'book_recipient_mobile' ] );
        $book_recipient_mobile = strip_tags( $book_recipient_mobile );
        $book_recipient_mobile = htmlspecialchars( $book_recipient_mobile );

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
            $book_nameError = '<div style="color: #B0E0E6">Въведи ново име на книгата!</div>';;
        }

        if(empty($book_shortDesc))
        {
            $error = true;
            $book_shortDescError = '<div style="color: #B0E0E6">Въведи ново кратко описание на книгата!</div>';
        }

        if(empty($book_longDesc))
        {
            $error = true;
            $book_longDescError = '<div style="color: #B0E0E6">Въведи ново дълго описание на книгата!</div>';
        }

        if(empty($book_author))
        {
            $error = true;
            $book_authorError = '<div style="color: #B0E0E6">Въведи нов автор на книгата!</div>';
        }

        if(empty($book_genre))
        {
            $error = true;
            $book_genreError = '<div style="color: #B0E0E6">Въведи нов жанр на книгата!</div>';
        }

        if(empty($book_recipient))
        {
            $error = true;
            $book_recipientError = '<div style="color: #B0E0E6">Въведи нов получател на книгата!</div>';
        }

        if(empty($book_recipient_address))
        {
            $error = true;
            $book_recipient_addressError = '<div style="color: #B0E0E6">Въведи нов адрес на получателя!</div>';
        }

        if(empty($book_recipient_birthdate))
        {
            $error = true;
            $book_recipient_birthdateError = '<div style="color: #B0E0E6">Въведи нова рождена дата на получателя!</div>';
        }

        if(empty($book_recipient_mobile))
        {
            $error = true;
            $book_recipient_mobileError = '<div style="color: #B0E0E6">Въведи нов телефон на получателя!</div>';
        }

        if(empty($book_presence))
        {
            $error = true;
            $book_presenceError = '<div style="color: #B0E0E6">Въведи нова наличност на книгата!</div>';
        }

        if(empty($book_count))
        {
            $error = true;
            $book_countError = '<div style="color: #B0E0E6">Въведи нови бройки на книгата!</div>';
        }

        if(empty($book_period_devoted))
        {
            $error = true;
            $book_period_devotedError = '<div style="color: #B0E0E6">Въведи нов период за даване книгата!</div>';
        }

        if(empty($book_period))
        {
            $error = true;
            $book_periodError = '<div style="color: #B0E0E6">Въведи нов период за връщане на книгата!</div>';
        }


        if(!$error)
        {
            $update = $db->updateBook($book_id, $book_name, $book_shortDesc, $book_longDesc, $book_author, $book_genre, $book_recipient, $book_recipient_address, $book_recipient_birthdate, $book_recipient_mobile, $book_presence, $book_count, $book_period_devoted, $book_period);
            if($update != false)
            {
                $errTyp = "success";
                $errMSG = '<div style="color: seagreen">Успешно редактирахте книгата!</div>';
            }

            else
            {
                $errTyp = "danger";
                $errMSG = '<div style="color: #B0E0E6">Нещо се обърка, моля опитайте отново!</div>';
            }
        }
    }
?>

<div class="container" style="margin-top: 30px;">

    <div class="row justify-content-center">
        <div class="col-md-12" align="center">
            <h3>Система за редактиране на книга</h3>
        </div>
    </div>

    <hr>

    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-2">
                <form method="POST">

                    <?php if(isset($errMSG)): ?>
                        <p class="youplay-input"type="text" >
                        <p class="youplay-input-type="text" <?php echo ($errTyp == " success ") ? "success " : $errTyp; ?>">
                            <?php echo $errMSG; ?>
                        </p>
                        </p>
                    <?php endif; ?>

                    <div class="form-group">
                        <input type="text" class="form-control" name="book_name" placeholder="Ново име на книгата...">
                        <?php echo $book_nameError; ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="book_shortDesc" placeholder="Ново кратко описание на книгата...">
                        <?php echo $book_shortDescError; ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="book_longDesc" placeholder="Ново дълго описание на книгата...">
                        <?php echo $book_longDescError; ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="book_author" placeholder="Нов автор на книгата...">
                        <?php echo $book_authorError; ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="book_genre" placeholder="Нов жанр на книгата...">
                        <?php echo $book_genreError; ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="book_recipient" placeholder="Нов получател на книгата...">
                        <?php echo $book_recipientError; ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="book_recipient_address" placeholder="Нов адрес на получателя...">
                        <?php echo $book_recipient_addressError; ?>
                    </div>

                    <div class="form-group">
                        <input type="date" class="form-control" name="book_recipient_birthdate">
                        <?php echo $book_recipient_birthdateError; ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="book_recipient_mobile" placeholder="Нов телефон на получателя...">
                        <?php echo $book_recipient_mobileError; ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="book_presence" placeholder="Нова наличност на книгата...">
                        <?php echo $book_presenceError; ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="book_count" placeholder="Нови бройки на книгата...">
                        <?php echo $book_countError; ?>
                    </div>

                    <div class="form-group">
                        <input class="form-control" name="book_period_devoted" type="date">
                        <?php echo $book_period_devotedError; ?>
                    </div>

                    <div class="form-group">
                        <input class="form-control" name="book_period" type="date">
                        <?php echo $book_periodError; ?>
                    </div>

                    <div class="form-group" align="center">
                        <button class="btn btn-primary" name="edit" id="edit">Редактирай книгата</button>
                    </div>
                </form>
            </div>
    </div>
</div>

<?php
    include ("template/js.php");
    include ("template/footer.php");
?>