<?php
    $belanja = $config->ProductsJoin('kas_outs.id, kas_outs.nama, kas_outs.total, kas_outs.ket, kas_outs.created_at, kas_outs.status, users.name', 'kas_outs',
        'INNER JOIN users ON users.id = kas_outs.admin_id', "WHERE DATE(kas_outs.created_at)= CURDATE() AND kas_outs.status ='' ");
?>
<div id="listKas">
    <div class="row">
<!--        <div class="col-12 col-sm-4 col-lg-4" id="listPemasukanKas">-->
<!--            <div class="card">-->
<!--                <div class="card-header">-->
<!--                    List Pemasukan-->
<!--                </div>-->
<!--                <div class="card-body">-->
<!---->
<!--                    <div class="jumbotron">-->
<!--                        ASAP-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <div class="col-12 col-sm-12 col-lg-12" id="listPengeluaranBelanja">
            <div class="card">
                <div class="card-header">
                    List Belanja
                </div>
                <div class="card-body">
                    <div id="form-belanja" class="hidden">
                        <div class="card border-dark mb-3">
                            <div class="card-header bg-transparent border-dark">Form Tambah Belanja</div>
                            <div class="card-body">
                                <form id="belanja-form" method="post" data-parsley-validate="" autocomplete="off">
                                    <div class="form-group">
                                        <input type="hidden" value="<?=$admin['id']?>" id="adminBelanja">
                                        <input type="text"
                                               data-parsley-minLength="3" data-parsley-maxLength="36" data-parsley-message-maxLength="lebih"
                                               class="form-control" placeholder="nama pengeluaran" id="nameBelanja" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text"
                                               data-parsley-type="number"
                                               class="form-control" placeholder="total biaya" id="biayaBelanja" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="5" id="ketBelanja" required placeholder="keterangan pengeluaran"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-block btn-primary">submit belanjaan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="listbelanja">
                        <p>
                            <button <?=$access['create']?> class="btn btn-sm btn-primary" onclick="addBelanja()"  type="button"><span class="fa fa-fw fa-plus"></span> belanja</button>
                        </p>
                        <table id="tableBelanja" class="table table-bordered  <?=$device['device']=='MOBILE' ? 'table-responsive' : ''?> table-condensed table-hover" style="text-transform: capitalize;">
                            <thead class="thead-light">
                            <tr style="text-transform: lowercase;">
                                <th scope="col">#</th>
                                <th scope="col">Nama Pengeluaran</th>
                                <th scope="col">Total Biaya</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Admin id</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  $i = 1; while ($row = $belanja->fetch(PDO::FETCH_LAZY)){ ?>
                                <tr style="text-transform: lowercase;">
                                    <td width="5%"><?=$i++?></td>
                                    <td width="20%"><?=$row['nama']?></td>
                                    <td width="15%" style="text-align: l"><?=$config->formatPrice($row['total'])?></td>
                                    <td width="35%"><?=$row['ket']?></td>
                                    <td width="15%"><?=$row['name']?></td>
                                    <td width="15%"><i class="small"><?=$row['created_at']?></i></td>
                                    <td width="10%">
                                        <button <?=$access['delete']?> onclick="delBelanja(<?=$row['id']?>, <?=$admin['id']?>)" class="btn btn-sm btn-danger " style="text-transform: uppercase; font-size: 10px; font-weight: 500;" >delete</button>

                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>