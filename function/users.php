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