<?php 
session_start();
require_once 'function/db.php';
include_once 'layouts/head.php';
include_once 'layouts/header.php';
include_once 'function/users.php';
include_once 'function/various.php';
$db = db();
$info = information();
$welcome = welcome();
$passwords = getPassword();
$num = verifyNumPass();
?>

<h1><?= $welcome ?> <?= $info['pseudo']?></h1>
<?= $num ?>
<?php foreach ($passwords as $password): ?>
<div style="margin:15px;padding:15px;">
    <h2><?= $password['password'] ?></h2>
    <a href="deletePass.php?id=<?= $password['id'] ?>">
        <img src="public/image/delete.png" alt="trash icon">
    </a>
</div>
<?php endforeach ; ?>

<?php
include_once 'layouts/footer.php';
?>