<?php

function register(){
    global $db;

    extract($_POST);

    $validation = true;

    $errors = [];

    if(empty($pseudo) || empty($email) || empty($password) || empty($passwordConf)){
        $validation = false;
        $errors[] = 'Tous les champs sont obligatoires !!!'; 
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $validation = false;
        $errors[] = 'Adresse Email non valide !!!';
    }

    if($passwordConf != $password){
        $validation = false;
        $errors[] = 'le mot de passe de confirmation est incorrect !!!';
    }

    // if(pseudoCheck($pseudo)){
    //     $validation = false;
    //     $errors[] = 'Ce pseudo est déjà pris !';
    // }

    if($validation){
        $register = $db->prepare('INSERT INTO users(pseudo, email, password) VALUES (:pseudo, :email, :password)');
        $register->execute([
            'pseudo' => htmlentities($pseudo),
            'email' => htmlentities($email),
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
        
    unset($_POST['pseudo']);
    unset($_POST['email']);
    }
    return $errors;   
}

function login(){
    global $db;

    extract($_POST);

    $error = 'Les identifiants ne correspondent pas à nos enregistrements !';

    $login = $db->prepare('SELECT id, password FROM users WHERE pseudo = ?');

    $login->execute([$pseudo]);

    $login = $login->fetch();

    if(password_verify($password, $login['password'])){
        $_SESSION['user'] = $login['id'];
        header('Location: account.php');
    }else{
        return $error;
    }
}

function logout(){
    unset($_SESSION['user']);
    session_destroy();
    header('Location: index.php');
}

function information(){
    global $db;

    $information = $db->prepare('SELECT email, pseudo FROM users WHERE id = ?');
    $information->execute([$_SESSION['user']]);
    $information = $information->fetch();

    return $information;
}

function addPassword() {
    global $db;

    extract($_POST);
    $validation = true;

    $errors = "";

    if (empty($password)) {
        $validation = false;
        $errors = "Une erreur c'est produite !";
    }

    if (verifyNumPass() == 5) {
        $validation = false;
        $errors = "Vous avez déjà atteint le nombre maximal de mot de passe !";
    }

    if ($validation) {
        $registerPassword = $db->prepare('INSERT INTO  password(password, users_id) VALUES (:password, :users_id)');
        $registerPassword->execute([
            'password' => htmlentities($password),
            'users_id' => $_SESSION['user']
        ]);
        header('Location: account.php');
    }
    

    return $errors;
}

function getPassword() {
    global $db;

    $pass = $db->prepare('SELECT password.password FROM password INNER JOIN users ON password.users_id = users.id AND password.users_id = ?');
    $pass->execute([$_SESSION['user']]);
    $pass = $pass->fetchAll();

    return $pass;
}

function verifyNumPass() {
    global $db;

    $pass = $db->prepare('SELECT password.password FROM password INNER JOIN users ON password.users_id = users.id AND password.users_id = ?');
    $pass->execute([$_SESSION['user']]);
    $pass = $pass->fetchAll();
    $numPass = sizeof($pass);

    return $numPass;
}