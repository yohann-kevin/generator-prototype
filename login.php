<?php 
require_once 'function/db.php';
include_once 'layouts/head.php';
include_once 'layouts/header.php';
include_once 'function/users.php';
$db = db();
if(!empty($_POST)){
    $error = login();
}
?>

<section>
    <form method="post" action="">
        <?php if(isset($error)) : ?>
        <span><?= $error ?></span>
        <?php endif ?>
        <label>Votre pseudo : </label>
        <input type="text" name="pseudo" value="<?php if(isset($_POST['Pseudo']))echo $_POST['Pseudo'] ?>">
        
        <label>Votre mot de passe : </label>
        <input type="password" name="password">

        <button type="submit">Se connecter</button>
        <button type="reset">Annuler</button>
    </form>
</section>

<?php  
include_once 'layouts/footer.php';
?>