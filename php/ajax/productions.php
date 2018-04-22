<?php
/**
 * Created by PhpStorm.
 * User: small-project
 * Date: 01/04/2018
 * Time: 17.27
 */

require '../../config/api.php';
$config = new Admin();

if($_GET['type'] == 'addStocks')
{
    $g  = $_POST['admin'];
    $a  = $_POST['title'];
    $b  = $_POST['spesifikasi'];
    $c  = $_POST['quantity'];
    $d  = $_POST['satuan'];
    $e  = $_POST['harga'];
    $f  = $_POST['keterangan'];

    // $b = array($a, $b, $c, $d, $e, $f, $g, $tgl);
    // print_r($b);

    $sql = "INSERT INTO stocks (nama_barang, spec, qty, satuan, harga, ket, admin_id) VALUES (:a, :b, :c, :d, :e, :f, :g)";
    $stmt = $config->runQuery($sql);
    $stmt->execute(array(
        ':a'    => $a, 
        ':b'    => $b, 
        ':c'    => $c, 
        ':d'    => $d,
        ':e'    => $e,
        ':f'    => $f,
        ':g'    => $g
    ));

    if($stmt){
        echo $config->actionMsg('c', 'stocks');
    }else{
        echo 'Failed';
    }
}
if($_GET['type'] == 'updateStocks')
{
    $g  = $_POST['admin'];
    $h  = $_POST['idStocks'];
    $a  = $_POST['title'];
    $b  = $_POST['spesifikasi'];
    $c  = $_POST['quantity'];
    $d  = $_POST['satuan'];
    $e  = $_POST['harga'];
    $f  = $_POST['keterangan'];

    // $b = array($a, $b, $c, $d, $e, $f, $g, $tgl);
    // print_r($b);

    $sql = "UPDATE stocks SET nama_barang = :a, spec = :b, qty = :c, satuan = :d, harga = :e, ket = :f, admin_id = :g WHERE id = :h";
    $stmt = $config->runQuery($sql);
    $stmt->execute(array(
        ':a'    => $a, 
        ':b'    => $b, 
        ':c'    => $c, 
        ':d'    => $d,
        ':e'    => $e,
        ':f'    => $f,
        ':g'    => $g,
        ':h'    => $h
    ));

    if($stmt){
        echo $config->actionMsg('u', 'stocks');
    }else{
        echo 'Failed';
    }
}


if($_GET['type'] == 'editStocks'){
    $a = $_POST['idStock'];

    $stmt = $config->Products('id, nama_barang, spec, qty, satuan, harga, ket, created_at', 'stocks WHERE id = '. $a);
    header('Content-Type: application/json');
    echo json_encode($stmt->fetchAll());
}

if($_GET['type'] == 'addBelanja')
{

    $a = $_POST['admin'];
    $b = $_POST['title'];
    $c = $_POST['biaya'];
    $d = $_POST['keterangan'];
    $date = $config->getDate('Y-m-d H:m:s');

    $sql = "INSERT INTO kas_outs (nama, total, ket, created_at, admin_id) VALUES (:b, :c, :d, :dated, :a)";
    $stmt = $config->runQuery($sql);
    $stmt->execute(array(
        ':b'    => $b,
        ':c'    => $c,
        ':d'    => $d,
        ':dated'=> $date,
        ':a'    => $a
    ));
    if($stmt)
    {
        echo $config->actionMsg('c', 'kas_outs');
    }else{
        echo "Failed";
    }

//    $f = array($a, $b, $c, $d);
//    print_r($f);
}

if($_GET['type'] == 'delBelanja')
{
    $a = $_POST['admin'];
    $b = $_POST['keterangan'];

    $stmt = $config->delRecord('kas_outs', 'id', $b);
    if($stmt){
        echo $config->actionMsg('d', 'kas_outs');
    }else{
        echo 'Failed!';
    }
}

if($_GET['type'] == 'delStock')
{
    $a = $_POST['admin'];
    $b = $_POST['keterangan'];

    $stmt = $config->delRecord('stocks', 'id', $b);
    if($stmt){
        echo $config->actionMsg('d', 'stocks');
    }else{
        echo 'Failed!';
    }
}