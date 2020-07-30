<?php 
session_start();
require_once 'function/db.php';
include_once 'layouts/head.php';
include_once 'layouts/header.php';
include_once 'function/users.php';
$db = db();
if(!empty($_POST)){
    $error = addPassword();
}
?>
<section>
    <h1>Générateur</h1>
    <div style="width:100%;height:75px;"></div>
    <form method="post" action="">
        <!-- <div style="color:red;"></div>
        <div style="color:green;">ça marche !</div> -->

        <?php if(isset($error)) : ?>
        <span><?= $error ?></span>
        <?php endif ?>
        
        <p>Activé symbole : </p>
        <label class="switch">
            <input type="checkbox" id="checkSymbol">
            <span class="slider round"></span>
        </label><br />

        <!-- <button id="btnTest" onClick="generate()">Générer</button> -->
        <a id="btnTest" onClick="generate()">Générer</a>

        <div id="generator">
            <!-- <input name="password" type="text" id="inputTest" value="<?php //if(isset($_POST['password']))echo $_POST['password'] ?>"> -->
            <input type="password" name="password" id="inputTest">
        </div>
        
        <button type="submit">Enregistrer</button>
        <!-- <input type="text" id="generator"> -->
        <?php if(isset($_SESSION['user'])) : ?>
        
        <?php endif ; ?>
    </form>
</section>
<?php include_once 'layouts/footer.php' ?>