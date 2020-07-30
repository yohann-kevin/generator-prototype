<?php
require_once 'function/db.php';
include_once 'function/users.php';
$db = db();
deletePass();

header('Location: account.php');