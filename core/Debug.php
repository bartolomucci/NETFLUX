<?php

namespace Core;

class Debug
{
    public static function dump($var){
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        die;
    }
}