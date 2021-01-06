<?php
include ("core/init.php");

if ( isset($_SESSION['user'])!="" )
{
    header("Location: http://localhost/library/home/");
    exit;
}

include ("template/header.php");
include ("template/navbar.php");
?>

<?php
$error = false;

$username = '';

$usernameError = '';
$passwordError = '';

if(isset($_POST['login']))
{

    $username = trim( $_POST[ 'username' ] );
    $username = strip_tags( $username );
    $username = htmlspecialchars( $username );

    $password = trim( $_POST[ 'password' ] );
    $password = strip_tags( $password );
    $password = htmlspecialchars( $password );

    if(empty($username))
    {
        $error = true;
        $usernameError = '<div style="color: red;">Въведи име!</div>';
    }

    if(empty($password))
    {
        $error = true;
        $passwordError = '<div style="color: red">Въведи парола!</div>';
    }

    if(!$error)
    {
        $password = hash('sha256',$password);
        $user = $db->getUser($username, $password);

        if($user != false)
        {
            $_SESSION['user'] = $user['id'];
            header("Location: http://localhost/library/home/");
        }

        else
        {
            $errMSG = '<div style="color: red">Въвели сте грешни данни, моля опитайте отново!</div>';
        }
    }
}
?>

<div class="containter">
    <div class="row justify-content-center">
    <div class="form">
        <form method="POST" action="<?php echo Base_url();?>login/" autocomplete="off">

            <br>
            <div class="title">
                <h3 align="center">Влез в администраторският профил</h3>
            </div>

            <?php if(isset($errMSG)): ?>
                <div class="youplay-input">
                    <div class="youplay-input-<?php echo ($errTyp == " success ") ? "success " : $errTyp; ?>">
                        <?php echo $errMSG; ?>
                    </div>
                </div>
            <?php endif; ?>


                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Име" value="<?php echo $username;?>">
                    <?php echo $usernameError;?>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Парола">
                    <?php echo $passwordError;?>
                </div>

                <div class="form-group" align="center">
                    <button type="submit" class="btn btn-primary" name="login">Влез</button>
                </div>

        </form>
    </div>
    </div>
</div>



<?php
include ("template/footer.php");
?>
