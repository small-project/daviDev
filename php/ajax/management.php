<?php
/**
 * Created by PhpStorm.
 * User: small-project
 * Date: 10/04/2018
 * Time: 20.23
 */

require '../../config/api.php';
$config = new Admin();


if($_GET['type'] == 'addAdmin') {
    $a = $_POST['nama'];
    $b = $_POST['email'];
    $c = $config->newPassword($_POST['pass']);
    $d = $_POST['levels'];
    $e = $_POST['roles'];
    $f = '1';
    $adm = $_POST['adm'];
    $tgl = $config->getDate('Y-m-d H:m:s');

    $sql    = "INSERT INTO users (name, email, password, jabatan, role_id, status, created_at) VALUES (:a, :b, :c, :d, :e, :f, :g)";
    $stmt   = $config->runQuery($sql);
    $stmt->execute(array(
        ':a'    => $a,
        ':b'    => $b,
        ':c'    => $c,
        ':d'    => $d,
        ':e'    => $e,
        ':f'    => $f,
        ':g'    => $tgl
    ));

    if($stmt){
        echo "Admin Berhasil masuk ke database!";
    }else{
        echo "Failed";
    }
}elseif($_GET['type'] == 'addSubmenu') {
    $a = $_POST['admin'];
    $b = $_POST['menu'];
    $c = $_POST['submenu'];
    $d = $_POST['link'];

    $sql = "INSERT INTO sub_menus (id_menu, submenu, link) VALUES  (:a, :b, :c)";
    $stmt = $config->runQuery($sql);
    $stmt->execute(array(
        ':a'    => $b,
        ':b'    => $c,
        ':c'    => $d
    ));

    if($stmt){
        echo 'Submenu Berhasil masuk ke Database!';
    }else{
        echo 'Failed';
    }
}elseif ($_GET['type'] == 'menu'){
    $id = $_POST['id'];

    $stmt = $config->runQuery('SELECT id, submenu FROM sub_menus WHERE id_menu = :id');
    $stmt->execute(array(':id' => $id));
    header('Content-Type: application/json');
    echo json_encode($stmt->fetchAll());

}elseif ($_GET['type'] == 'addPrevillagUser'){
    $f = $_POST['users'];
    $a = $_POST['admin'];
    $b = $_POST['menu'];
    $c = $_POST['submenu'];
    $d = array_sum($_POST['previllage']);
    $tgl = $config->getDate('Y-m-d H:m:s');

    //check menu for user
    $cari = $config->CountTables('id', 'previllages WHERE id_submenu = '. $c .' AND id_admin = '. $f);
    if($cari > 0){
        echo 'Sub-menu telah ada di Database untuk user ini!';
    }else{

        $sql = "INSERT INTO previllages (id_admin, id_submenu, weight, created_at, admin_id) VALUES (:a, :b, :c, :d, :e)";
        $stmt = $config->runQuery($sql);
        $stmt->execute(array(
            ':a'    => $f,
            ':b'    => $c,
            ':c'    => $d,
            ':d'    => $tgl,
            ':e'    => $a
        ));

        if($stmt){
            echo 'Previllages Berhasil masuk ke Database!';
        }else{
            echo 'Failed';
        }
    }

}elseif ($_GET['type'] == 'updatePrevillageUser'){
    $a  = $_POST['admin'];
    $b  = $_POST['id'];
    $c  = array_sum($_POST['previllage']);

    $sql = "UPDATE previllages SET weight = :c, admin_id = :a WHERE id = :b";
    $stmt = $config->runQuery($sql);
    $stmt->execute(array(
        ':c'    => $c,
        ':a'    => $a,
        ':b'    => $b
    ));

    if($stmt){
        echo 'Previllages Berhasil update!';
    }else{
        echo 'Failed';
    }
}