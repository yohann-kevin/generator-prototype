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
?>

<h1><?= $welcome ?> <?= $info['pseudo']?></h1>
<?php foreach ($passwords as $password): ?>
<h2><?= $password['password'] ?></h2>
<?php endforeach ; ?>

<?php
include_once 'layouts/footer.php';
?>