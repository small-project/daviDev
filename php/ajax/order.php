<?php
/**
 * Created by PhpStorm.
 * User: small-project
 * Date: 01/04/2018
 * Time: 20.00
 */

require '../../config/api.php';
$config = new Admin();

if($_GET['type'] == 'generate'){
    $type = $_POST['type'];
    if($type == '1'){
        $field = 'id_trx';
        $table = 'detail_trxs';
        $kode = 'BD_CP';

        $new_code = $config->CodeOrder();

    }else{
        $field = 'id_trx';
        $table = 'detail_trxs';
        $kode = 'BD_PR';

        $new_code = $config->CodeOrder();
    }
    $tanggal = $config->getDate('Y-m-d H:m:s');

    $sql = 'INSERT INTO detail_trxs (id_trx, types, created_date) VALUES (:a, :b, :c)';

    $stmt = $config->runQuery($sql);
    $stmt->execute(array(
        ':a'    => $new_code,
        ':b'    => $type,
        ':c'    => $tanggal
    ));

    if($stmt)
    {
        echo $new_code;
    }


}