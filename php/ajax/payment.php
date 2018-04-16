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
    $b = $_POST['users'];

    $tanggal = $config->getDate('Y-m-d H:m:s');

    $sql = "SELECT SUM(total) as total FROM kas_outs WHERE DATE(created_at) = CURDATE() AND admin_id = :admin AND status = '' ";
    $total = $config->runQuery($sql);
    $total->execute(array(
        ':admin' => $b
    ));
    if($total->rowCount() > 0){
        $info = $total->fetch(PDO::FETCH_LAZY);

        $total = $info['total'];

        $stmt = $config->runQuery("UPDATE kas_outs SET status = '1' WHERE DATE(created_at) = CURDATE() AND admin_id = :admin AND status = '' ");
        $stmt->execute(array(
            ':admin' => $b
        ));
        if($stmt){
            $query = "INSERT INTO kas_outs (nama, total, ket, created_at, admin_id, status) VALUES (:a, :b, :c, :d, :e, :f)";
            $input = $config->runQuery($query);
            $input->execute(array(
                ':a'    => $b,
                ':b'    => $total,
                ':c'    => 'report',
                ':d'    => $tanggal,
                ':e'    => $a,
                ':f'    => '0'
            ));
            if($input){
                echo '1';
            }else{
                echo '0';
            }
        }else{
            echo '0';
        }
    }else{
        echo '2';
    }

}

if($_GET['type'] == 'addKasIn')
{
    $a = $_POST['admin'];
    $b = $_POST['title'];
    $c = $_POST['total'];
    $d = $_POST['keterangan'];
    $tgl = $config->getDate('Y-m-d H:m:s');

    $sql = "INSERT INTO kas_ins (title, total, ket, admin_id, created_at) VALUES (:b, :c, :d, :a, :tgl)";
    $stmt = $config->runQuery($sql);
    $stmt->execute(array(
        ':b'    => $b,
        ':c'    => $c,
        ':d'    => $d,
        ':a'    => $a,
        ':tgl'  => $tgl
    ));
    if($stmt){
        echo 'Tambah dana selesai di input!';
    }else{
        echo 'Failed!';
    }
}

if($_GET['type'] == 'addPayCharge')
{
    $a = $_POST['admin'];
    $b = $_POST['namaKurir'];
    $c = $_POST['kelurahan'];
    $tgl = $config->getDate('Y-m-d H:m:s');

    $sql = "INSERT INTO pay_kurirs (kurir_id, charge_id, created_at, admin_id) VALUES (:a, :b, :c, :d)";
    $stmt = $config->runQuery($sql);
    $stmt->execute(array(
        ':a'    => $b,
        ':b'    => $c,
        ':c'    => $tgl,
        ':d'    => $a
    ));
    if($stmt){
        echo $config->actionMsg('c', 'pay_kurirs');
    }else{
        echo 'Failed!';
    }
}

if($_GET['type'] == 'delPayCharge')
{
    $a = $_POST['admin'];
    $b = $_POST['id'];
    $tgl = $config->getDate('Y-m-d H:m:s');

    $stmt = $config->delRecord('pay_kurirs', 'id', $b);

    if($stmt){
        echo $config->actionMsg('d', 'pay_kurirs');
    }else{
        echo 'Failed!';
    }
}

if($_GET['type'] == 'reportPayCharge')
{
    $a = $_POST['admin'];
    $b = $_POST['kurir'];

    $tanggal = $config->getDate('Y-m-d H:m:s');

    $sql = "SELECT pay_kurirs.id, SUM(delivery_charges.price) as total FROM pay_kurirs
    INNER JOIN delivery_charges ON delivery_charges.id = pay_kurirs.charge_id
     WHERE pay_kurirs.kurir_id = :kurir AND pay_kurirs.status = '' ";
    $total = $config->runQuery($sql);
    $total->execute(array(
        ':kurir' => $b
    ));
    if($total->rowCount() > 0){
        $info = $total->fetch(PDO::FETCH_LAZY);

        $total = $info['total'];

        $stmt = $config->runQuery("UPDATE pay_kurirs SET status = '1', report_at = :report WHERE kurir_id = :kurir ");
        $stmt->execute(array(
            ':kurir' => $b,
            ':report'=> $tanggal
        ));
        if($stmt){
            $query = "INSERT INTO pay_kurirs (kurir_id, total, created_at, status, admin_id) VALUES (:a, :b, :c, :d, :e)";
            $input = $config->runQuery($query);
            $input->execute(array(
                ':a'    => $b,
                ':b'    => $total,
                ':c'    => $tanggal,
                ':d'    => '2',
                ':e'    => $a
            ));
            if($input){
                echo '1';
            }else{
                echo '0';
            }
        }else{
            echo '0';
        }
    }else{
        echo '2';
    }

}
