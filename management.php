<?php
/**
 * Created by PhpStorm.
 * User: small-project
 * Date: 01/04/2018
 * Time: 10.07
 */

require 'config/config.php';

$totalUser = $config->CountTables('id', 'users');
include 'php/header.php';

$listAdmin = $config->ProductsJoin('users.id, users.name, users.email, users.jabatan, users.role_id, users.status, users.created_at, levels.levels, roles.roles', 'users',
    'INNER JOIN levels ON levels.id = users.jabatan INNER JOIN roles ON roles.id = users.role_id', 'ORDER BY users.created_at DESC');

//list jabatan
$jabatan = $config->Products('id, levels', 'levels');
$roles = $config->Products('id, roles', 'roles');
$menus = $config->Products('id, menu, links', 'menus');

$pages_dir = 'php/management/';
if(!empty($_GET['p'])){
    $pages = scandir($pages_dir, 0);
    unset($pages[0], $pages[1]);

    $p = $_GET['p'];
    if(in_array($p.'.php', $pages)){
        include($pages_dir.'/'.$p.'.php');
    } else {
        include('404.php');
    }
} else {
    include($pages_dir.'/index.php');
}


include 'php/footer.php';
