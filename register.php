<?php 
session_start();
require_once 'function/db.php';
include_once 'layouts/head.php';
include_once 'layouts/header.php';
include_once 'function/users.php';
$db = db();
if(!empty($_POST)){
    $errors = register();
}
?>
<section>
    <form method="post" action="">
        <?php
            if(isset($errors)) :
                if($errors):
            foreach($errors as $error) :
        ?>
        <span><?= $error ?></span>
        <?php endforeach; else : ?>
        <span>ça marche</span>
        <?php endif; endif ?>
        <label>Votre pseudo :</label>
        <input type="text" name="pseudo" value="<?php if(isset($_POST['pseudo']))echo $_POST['pseudo'] ?>">

        <label>Votre adresse Email :</label>
        <input type="email" name="email" value="<?php if(isset($_POST['email']))echo $_POST['email'] ?>">

        <label>Votre mot de passe :</label>
        <input type="password" name="password">

        <label>Confirmer le mot de passe</label>
        <input type="password" name="passwordConf">

        <button type="submit">Envoyer</button>
        <button type="reset">Annuler</button>
    </form>
</section>

<?php  
include_once 'layouts/footer.php';
?>