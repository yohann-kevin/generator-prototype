<?php

function welcome() {
    date_default_timezone_set('Europe/Paris');
    $time = date('H');
    $welcome = '';
    if($time >= 6 && $time <= 18) {
        $welcome = 'Bonjour';
    } elseif($time >= 18 && $time <= 21) {
        $welcome =  'Bonsoir';
    } else {
        $welcome = 'On geek tard le soir ? ';
    } 
    return $welcome;
}