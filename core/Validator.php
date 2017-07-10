<?php

class Validator
{
    public static function isMail($entry){
        if (!filter_var($entry, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
    public static function isURL($entry){
        if (filter_var($entry, FILTER_VALIDATE_URL)) {
            return true;
        }
        return false;
    }
}