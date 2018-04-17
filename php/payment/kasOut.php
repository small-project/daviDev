<?php
    $outKas = $config->ProductsJoin('kas_outs.id, kas_outs.nama, kas_outs.total, kas_outs.ket, kas_outs.created_at, kas_outs.status, users.name', 'kas_outs',
        'INNER JOIN users ON users.id = kas_outs.admin_id', "WHERE kas_outs.status ='' ");
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
        <div class="col-12 col-sm-12 col-lg-12" id="listPengeluaranKas">
            <div class="card">
                <div class="card-header">
                    List Pengeluaran
                </div>
                <div class="card-body">
                    <div id="form-kasKeluar" class="hidden">
                        <div class="card border-dark mb-3">
                            <div class="card-header bg-transparent border-dark">Form Tambah Pengeluaran Kas</div>
                            <div class="card-body">
                                <form id="kasKeluar-form" method="post" data-parsley-validate="" autocomplete="off">
                                    <div class="form-group">
                                        <input type="hidden" value="<?=$admin['id']?>" id="adminOut">
                                        <input type="text"
                                               data-parsley-minLength="3" data-parsley-maxLength="36" data-parsley-message-maxLength="lebih"
                                               class="form-control" placeholder="nama pengeluaran" id="nameOut" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text"
                                               data-parsley-type="number"
                                               class="form-control" placeholder="total biaya" id="biayaOut" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="5" id="ketOut" required placeholder="keterangan pengeluaran"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-block btn-primary">submit pengeluaran</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="listKasKeluar">
                        <p>
                            <button class="btn btn-sm btn-primary addOutKas" <?=$access['create']?> type="button"><span class="fa fa-fw fa-plus"></span> pengeluaran</button>
                        </p>
                        <table id="tableKasOut" class="table table-bordered  <?=$device['device']=='MOBILE' ? 'table-responsive' : ''?> table-condensed table-hover" style="text-transform: capitalize;">
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
                            <?php  $i = 1; while ($row = $outKas->fetch(PDO::FETCH_LAZY)){ ?>
                                <tr style="text-transform: lowercase;">
                                    <td width="5%"><?=$i++?></td>
                                    <td width="20%"><?=$row['nama']?></td>
                                    <td width="15%" style="text-align: l"><?=$config->formatPrice($row['total'])?></td>
                                    <td width="35%"><?=$row['ket']?></td>
                                    <td width="15%"><?=$row['name']?></td>
                                    <td width="15%"><i class="small"><?=$row['created_at']?></i></td>
                                    <td width="10%">
<!--                                        <a href="--><?//=PAYMENT?><!--?p=koDetail&id=--><?//=$row['id']?><!--" --><?//=$access['read']?><!-->
<!--                                            <button class="btn btn-sm btn-primary" style="text-transform: uppercase; font-size: 10px; font-weight: 500;">details</button>-->
<!--                                        </a>-->
                                        <button class="btn btn-sm btn-danger delKasOut" style="text-transform: uppercase; font-size: 10px; font-weight: 500;"  <?=$access['delete']?> data-id="<?=$row['id']?>" data-admin="<?=$admin['id']?>" >delete</button>

                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <form <?=$access['update']?> action="" id="reportKasOutAdmin" data-parsley-validate="" autocomplete="off">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <input type="hidden" value="<?=$admin['id']?>" id="reportOutAdminID">
                                    <input type="hidden" value="<?=URL?>" id="reportOutURL">
                                    <select class="custom-select form-control-sm mr-sm-2" id="reportOutAdmin" required>
                                        <option value="">Choose...</option>
                                        <?php while ($cols = $listAdmin->fetch(PDO::FETCH_LAZY)){ ?>
                                        <option value="<?=$cols['id']?>"><?=$cols['name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-auto my-1">
                                    <button type="submit" class="btn btn-sm btn-success">report</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>