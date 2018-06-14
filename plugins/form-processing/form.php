<?php

abstract class Form {
    
    public static $privateCaptchaKey = '6LedE1gUAAAAANzQUO0yeKNUfo1rgXIIvMkfcEsS';
    public static $to = 'ralphjuden@gmail.com';
    
    abstract public function processForm();
    
    abstract public function validateData();

    abstract public function sendEmail();
}

?>