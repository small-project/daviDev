<?php 

    $stocks = $config->ProductsJoin('stocks.id, stocks.nama_barang, stocks.spec, stocks.qty, stocks.satuan, stocks.harga, stocks.ket, stocks.created_at, stocks.admin_id, users.name', 'stocks',
    'INNER JOIN users ON users.id = stocks.admin_id', 'ORDER BY stocks.created_at ASC');

?>
<div class="card" <?=$access['read']?>>
    <div class="card-header">
        List Stok Barang
    </div>
    <div class="card-body">
        <div id="formStokcs" class="hidden">
            <div class="card border-dark mb-3">
                <div class="card-header bg-transparent border-dark">Form Tambah Stok Barang</div>
                <div class="card-body">
                    <form id="stock-form" method="post" data-parsley-validate="" autocomplete="off">
                        <div class="form-group">
                            <input type="hidden" value="<?=$admin['id']?>" id="adminStock">
                            <input type="hidden" value="" id="idStock">
                            <input type="text"
                                   data-parsley-minLength="3" data-parsley-maxLength="36" data-parsley-message-maxLength="lebih"
                                   class="form-control" placeholder="nama barang" id="nameStock" required>
                        </div>
                        <div class="form-group">
                            <select name="specStock" id="specStock" class="form-control" required>
                                <option value="">:: spesifikasi ::</option>
                                <option value="1">bunga</option>
                                <option value="2">vas</option>
                                <option value="3">tisu</option>
                                <option value="4">oasis</option>
                                <option value="5">boneka</option>
                                <option value="6">coklat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text"
                                    data-parsley-maxLength="36" data-parsley-type="number" data-parsley-message-maxLength="lebih"
                                   class="form-control" placeholder="quantity" id="qtyStock" required>
                        </div>
                        <div class="form-group">
                            <select name="satuanStock" id="satuanStock" class="form-control" required>
                                <option value="">:: satuan ::</option>
                                <option value="1">tangkai</option>
                                <option value="2">ikat</option>
                                <option value="3">helai</option>
                                <option value="4">bungkus</option>
                                <option value="5">buah</option>
                                <option value="6">dus</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text"
                                   data-parsley-minLength="3" data-parsley-maxLength="36" data-parsley-type="number" data-parsley-message-maxLength="lebih"
                                   class="form-control" placeholder="harga barang per satuan" id="hargaStock" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" id="ketStock" required placeholder="keterangan barang"></textarea>
                        </div>
                        <button type="submit" class="btn btn-sm btn-block btn-primary">submit barang</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="listStok">
            <p>
                <button <?=$access['create']?> class="btn btn-sm btn-primary" onclick="formStock()"  type="button"><span class="fa fa-fw fa-plus"></span> stocks</button>
            </p>
            <table id="tableStok" class="table table-hover <?=$device['device']=='MOBILE' ? 'table-responsive' : ''?> table-condensed table-hover">
            <thead class="thead-light">
                <tr style="text-transform: lowercase;">
                    <th scope="col">nama barang</th>
                    <th scope="col">spesifikasi</th>
                    <th scope="col">qty</th>
                    <th scope="col">satuan</th>
                    <th scope="col">harga</th>
                    <th scope="col">total</th>
                    <th scope="col">keterangan</th>
                    <th scope="col">created at</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
            <?php while($rows = $stocks->fetch(PDO::FETCH_LAZY)){ 
                switch($rows['spec']){
                    case '1':
                        $spec = 'bunga';
                    break;
                    case '2':
                        $spec = 'vas';
                    break;
                    case '3':
                        $spec = 'tisu';
                    break;
                    case '4':
                        $spec = 'oasis';
                    break;
                    case '5':
                        $spec = 'boneka';
                    break;
                    case '6':
                        $spec = 'coklat';
                    break;
                    default:
                        $spec = "";
                    break;
                }
                switch($rows['satuan']){
                    case '1':
                        $satuan = 'tangkai';
                    break;
                    case '2':
                        $satuan = 'ikat';
                    break;
                    case '3':
                        $satuan = 'helai';
                    break;
                    case '4':
                        $satuan = 'bungkus';
                    break;
                    case '5':
                        $satuan = 'buah';
                    break;
                    case '5':
                        $satuan = 'dus';
                    break;
                    default:
                        $satuan = '';
                    break;
                }
                ?>
                <tr>
                    <td><?=$rows->nama_barang?></td>
                    <td><?=$spec?></td>
                    <td><?=$rows->qty?></td>
                    <td><?=$satuan?></td>
                    <td><?=$config->formatPrice($rows->harga)?></td>
                    <td><?=$config->formatPrice($rows->harga*$rows->qty)?></td>
                    <td><?=$rows->ket?></td>
                    <td style="font-size: 12px;"><?=$rows->created_at?> / <span class="badge badge-info"><?=$rows->name?></span></td>
                    <td>
                        <button <?=$access['update']?> class="btn btn-sm btn-warning" data-toggle="tooltip" title="edit stocks" onclick="editStock(<?=$rows['id']?>)"><span class="fa fa-fw fa-pencil-square-o"></span></button>
                        <button <?=$access['delete']?> class="btn btn-sm btn-danger" data-toggle="tooltip" title="delete stocks" onclick="delStock(<?=$rows['id']?>, <?=$admin['id']?>)"><span class="fa fa-fw fa-trash-o"></span></button>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>