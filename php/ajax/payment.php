<?php
/**
 * Created by PhpStorm.
 * User: small-project
 * Date: 10/04/2018
 * Time: 14.09
 */
require '../../config/api.php';
$config = new Admin();

if($_GET['type'] == 'kasOut')
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
        echo "Kas_out Berhasil masuk ke database!";
    }else{
        echo "Failed";
    }

//    $f = array($a, $b, $c, $d);
//    print_r($f);
}
if($_GET['type'] == 'delKasOut')
{
    $a = $_POST['admin'];
    $b = $_POST['keterangan'];

    $stmt = $config->delRecord('kas_outs', 'id', $b);
    if($stmt){
        echo 'Record Pengeluaran Berhasil di Hapus!';
    }else{
        echo 'Failed!';
    }
}

if($_GET['type'] == 'reportKasOut')
{
    $a = $_POST['admin'];

    $tanggal = $config->getDate('Y-m-d H:m:s');

    $sql = "SELECT SUM(total) as total FROM kas_outs WHERE DATE(created_at) = CURDATE()";
    $total = $config->runQuery($sql);
    $total->execute();
    if($total->rowCount() < 0){
        $info = $total->fetch(PDO::FETCH_LAZY);

        $total = $info['total'];

        $stmt = $config->runQuery("UPDATE kas_outs SET status = '1' WHERE DATE(created_at) = CURDATE() ");
        $stmt->execute();
        if($stmt){
            $query = "INSERT INTO kas_outs (nama, total, ket, created_at, admin_id, status) VALUES (:a, :b, :c, :d, :e, :f)";
            $input = $config->runQuery($query);
            $input->execute(array(
                ':a'    => 'report',
                ':b'    => $total,
                ':c'    => 'report',
                ':d'    => $tanggal,
                ':e'    => $a,
                ':f'    => '0'
            ));
            if($input){
                echo 'Report Berhasil di Input!';
            }else{
                echo 'Failed';
            }
        }else{
            echo 'Failed!';
        }
    }else{
        echo 'Belum Ada Record!';
    }

}