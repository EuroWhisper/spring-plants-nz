<?php

class Validator {
    static public function validateEmail($email) {
        //$regex = "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/";
        return filter_var($email, FILTER_VALIDATE_EMAIL);

    }

    static public function validatePhone($phone, $max) {
        $phoneNumLength = strlen($phone);
        return ($phoneNumLength <= $max);
    }

    static public function validateStringLength($string, $max) {
        $stringLength = strlen($string);
        return ($stringLength <= $max);
    }

    static public function validateName($name) {
        return preg_match("^[\p{L}-\s]*$", $name);
    }

    static public function validateTextField($textField, $min, $max) {
        $textFieldLength = strlen($textField);

        return ($textFieldLength >= $min && $textFieldLength <= $max);
    }

    static public function validateFileSize($file, $limit) {
        return (filesize($file) <= $limit);
    }

    /**
     * Validates a ReCaptcha v2 captcha.
     */
    static public function validateCaptcha($secret, $response) {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => $secret,
            'response' => $response
        );
        $options = array(
            'http' => array (
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success=json_decode($verify);
        
        return ($captcha_success->success==true);
        
    }
}
?>