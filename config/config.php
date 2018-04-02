<?php
/**
 * Created by PhpStorm.
 * User: small-project
 * Date: 01/04/2018
 * Time: 13.10
 */
define('URL', 'http://localhost/bungdav/');
define('CORPORATE', 'http://localhost/bungdav/corporate/');
require 'api.php';

//read url
$url = "$_SERVER[REQUEST_URI]";
$url = explode('/', $url);

$menu = $url[2]; //menu
if (isset($url[3])){
    $root = explode('&', $url[3]);
    if($root == true){
        $root = explode('=', $root[0]);
        $footer = $root[1];
    }else{
        $footer = $url[1];
    }
}else{
    $footer = "";
}
//
$config = new Admin();

$device = $config->systemInfo();
