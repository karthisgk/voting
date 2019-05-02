<?php
session_start();
error_reporting(0);
//index page is first load when type the url...
require 'config/config.php'; //is the config file
function __autoload($class) //auto_load function simplifies incliusion of class file in php.
{
    //want to use more class with in one file we can use autoload funtion.
    require LIBS.$class.'.php';
}

$ob =  new Starter(); //starter can manage the url
