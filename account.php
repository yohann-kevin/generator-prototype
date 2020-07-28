<?php 
session_start();
require_once 'function/db.php';
include_once 'layouts/head.php';
include_once 'layouts/header.php';
include_once 'function/users.php';
$db = db();
?>



<?php  
include_once 'layouts/footer.php';
?>