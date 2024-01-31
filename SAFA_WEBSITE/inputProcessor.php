<?php

// Input Processing Class for User Forms
class InputProcessor {

    // Function to check length of a string
    public static function check_string(string $type, string $text, int $minLength, int $maxLength){
        if (empty($text)){ // If string empty, return valid is false and error code.
            return array("valid"=>false,"text"=>$type." is empty.");
        }
        if (strlen($text) < $minLength){ // If string less than minimum length, return valid is false and error code.
            return array("valid"=>false,"text"=>$type." must not be less than ".$minLength." characters.");
        }
        if (strlen($text) > $maxLength){ // If string more than maximum length, return valid is false and error code.
            return array("valid"=>false,"text"=>$type." must not be more than ".$maxLength." characters.");
        }
        // If string passes checks, return string with valid is true
        return array("valid"=>true,"text"=>$text);
    }

    // Function to process numbers to make sure no other characters are in string
    public static function process_number(string $type, string $text, int $minLength, int $maxLength){
        // Minimum and maximum length checks
        $checkStringArray = InputProcessor::check_string($type,$text,$minLength,$maxLength);
        if ($checkStringArray["valid"] == false) {
            return $checkStringArray;
        }
        // Check if string is completely numeric, if not return invalid
        if (!is_numeric($checkStringArray["text"])){
            return array("valid"=>false,"text"=>$type." is invalid.");
        }
        // Return verified string if passed checks
        return $checkStringArray;
    }

    // Function to only allow letters and numbers with option for spaces in a string
    public static function process_alphanumeric_string(string $type, string $text, int $minLength, int $maxLength, bool $AllowSpaces){
        // Minimum and maximum length checks
        $checkStringArray = InputProcessor::check_string($type,$text,$minLength,$maxLength);
        if ($checkStringArray["valid"] == false) {
            return $checkStringArray;
        }
        // Check if string is allowed spaces
        if ($AllowSpaces === true){
            // If string allows spaces, a preg_match pattern must be used to check for only alphanumerics and spaces
            if (preg_match("/[^A-Za-z0-9 ]/", $checkStringArray["text"])){
                return array("valid"=>false,"text"=>$type." is invalid.");
            }
        }else{
            // If string does not allow spaces, a simple alphanumeric check can be performed
            if (!ctype_alnum($checkStringArray["text"])){
                return array("valid"=>false,"text"=>$type." is invalid.");
            }
        }
        // Return verified string if passed checks
        return $checkStringArray;
    }

    // Function to only allow emails with alphanumerics and @ symbols
    public static function process_email(string $text, int $minLength, int $maxLength){
        // Minimum and maximum length checks
        $checkStringArray = InputProcessor::check_string("Email",$text,3,30);
        if ($checkStringArray["valid"] == false) {
            return $checkStringArray;
        }
        $checkStringArray["text"] = filter_var($checkStringArray["text"], FILTER_SANITIZE_EMAIL);
        if (!filter_var($checkStringArray["text"], FILTER_VALIDATE_EMAIL)){
            return array("valid"=>false,"text"=>"Email is invalid.");
        }
        // Return verified string if passed checks
        return $checkStringArray;
    }

    // Function to process URLs against a regex validation pattern
    public static function process_url(string $text, int $minLength, int $maxLength){
        // Minimum and maximum length checks
        $checkStringArray = InputProcessor::check_string("Image URL",$text,$minLength,$maxLength);
        if ($checkStringArray["valid"] == false) {
            return $checkStringArray;
        }
        // A regex pattern must be applied to search for any possible SQL injection or XSS characters such as quotes or brackets
        $url_validation_regex = "/^https?:\\/\\/(?:www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b(?:[-a-zA-Z0-9()@:%_\\+.~#?&\\/=]*)$/";
        if (!preg_match($url_validation_regex, $text)){
            return array("valid"=>false,"text"=>"Image URL is invalid.");
        }
        // Return verified string if passed checks
        return $checkStringArray;
    }

}

?>
