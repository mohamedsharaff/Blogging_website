<?php

function isSpam($message) {
    
    $bannedWords = ['damn', 'shit', 'fuck', 'bitch', 'asshole', 'bastard', 'slut', 'dick', 'nigger', 'chink', 'terrorist', 'nazi', 'hitler','porn', 'sex', 'nude', 'xxx', 'adult', 'hot girls', 'escort', 'hooker',    'viagra', 'casino', 'betting', 'loan', 'credit card', 'click here','buy now', 'free money', 'make money fast', 'act now', 'guaranteed', 'risk-free','cheap meds', 'online pharmacy', 'lose weight fast', 'work from home', 'winner','f***' , '*'];

   

    // Check for banned words
    foreach ($bannedWords as $word) {
        if (stripos($message, $word) !== false) {
            return true;
        }
    }

   
}





?>

