<?php 
$charge = $config->ProductsJoin('delivery_charges.id, delivery_charges.price, delivery_charges.created_at, delivery_charges.updated_at, villages.name as kelurahan, users.name', 'delivery_charges',
'INNER JOIN villages ON villages.id = delivery_charges.id_kelurahan INNER JOIN users ON users.id = delivery_charges.admin_id',
 "ORDER BY delivery_charges.created_at DESC");

 $provinsi = $config->Products('id, name', 'provinces');

?>

<div class="card" <?=$access['read']?>>
    <div class="card-header">
        Delivery Charge
    </div>
    <div class="card-body">
        <div id="formDelivCharge">
            <div class="card border-dark mb-3">
                <div class="card-header bg-transparent border-dark">Form Tambah delivery charge</div>
                <div class="card-body">
                    <form id="delivCharge-form" method="post" data-parsley-validate="" autocomplete="off">
                        <div class="form-group">
                            <select class="form-control" name="ProvinsiCorporate" id="ProvinsiCorporate" required>
                                <option value="">:: provinsi ::</option>
                                <?php while ($row = $provinsi->fetch(PDO::FETCH_LAZY)){ ?>
                                <option value="<?=$row->id?>"><?=$row->name?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="KotaCorporate" id="KotaCorporate" required>
                                <option value="">:: kota ::</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="kecamatanCorporate" id="kecamatanCorporate" required>
                                <option value="">:: kecamatan ::</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="kelurahanCorporate" id="kelurahanCorporate" required>
                                <option value="">:: kelurahan ::</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="<?=$admin['id']?>" id="adminCharge">
                            <input type="text"
                                data-parsley-minLength="3" data-parsley-maxLength="255" data-parsley-type="number"
                                class="form-control" placeholder="delivery charge" id="priceCharge" required>
                        </div>
                       
                        <button type="submit" class="btn btn-sm btn-block btn-primary">submit pemasukan</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="listDelivCharge">
                            <p>
                                <button class="btn btn-sm btn-primary addDeliveryCharge" <?=$access['create']?> type="button"><span class="fa fa-fw fa-plus"></span> delivery charge</button>
                            </p>
            <table id="tableDelivCharge" class="table table-hover <?=$device['device']=='MOBILE' ? 'table-responsive' : ''?> table-condensed table-hover">
            <thead class="thead-light">
                <tr style="text-transform: lowercase;">
                    <th scope="col">nama kelurahan</th>
                    <th scope="col">delivery charge</th>
                    <th scope="col">created_at</th>
                    <th scope="col">updated_at</th>
                    <th scope="col">created_by</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($rows = $charge->fetch(PDO::FETCH_LAZY)){ ?>
                <tr>
                    <td><?=$rows['kelurahan']?></td>
                    <td style='text-align: right;'><?=number_format($rows['price'], 0, ',', '.')?></td>
                    <td><?=$rows['created_at']?></td>
                    <td><?=$rows['updated_at']?></td>
                    <td><?=$rows['name']?></td>
                    <td>
                        <button <?=$access['delete']?> class="btn btn-sm btn-danger deleteCharge" data-admin="<?=$admin['id']?>" data-id="<?=$rows['id']?>">delete</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>