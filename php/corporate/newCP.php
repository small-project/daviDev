<?php

$bidang = $config->Products('id, category', 'bidang_usahas');
$provinsi = $config->Products('id, name', 'provinces');


?>
<div class="row justify-content-center" <?=$access['create']?>>
    <div class="col-12 col-sm-8 col-lg-6">

        <div id="messageCorporate" class="alert alert-dismissible fade show" role="alert">
            <div id="isiPesan"></div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="card text-white bg-danger mb-3">
            <div class="card-header">
                Profile Corporate
            </div>
            <div class="card-body">

                <form  method="post" id="newCorporate" data-parsley-validate="" autocomplete="off">
                    <div class="form-group">
                        <label for="usernameAdmin">Nama Corporate</label>
                        <input type="text" name="nameCorporate" id="nameCorporate" class="form-control" data-parsley-minLength="3" required>
                    </div>
                    <div class="form-group">
                        <label for="usernameAdmin">Bidang Usaha</label>
                        <select class="form-control" name="bidangCorporate" id="bidangCorporate" required>
                            <option value="">:: select ::</option>
                            <?php while ($row = $bidang->fetch(PDO::FETCH_LAZY)){ ?>
                            <option value="<?=$row['id']?>"><?=$row['category']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="usernameAdmin">Nomor Telp</label>
                        <input type="text" name="telpCorporate"
                               data-parsley-minLength="5"
                               data-parsley-type="number" id="telpCorporate" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="usernameAdmin">Handphone</label>
                        <input type="text" name="hpCorporate"
                               data-parsley-minLength="5"
                               data-parsley-type="number" id="hpCorporate" placeholder="hp contact person" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="usernameAdmin">Nomor Fax</label>
                        <input type="text" name="faxCorporate"
                               data-parsley-minLength="5"
                               data-parsley-type="number" id="faxCorporate" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="usernameAdmin">Alamat Email</label>
                        <input type="text" name="emailCorporate"
                               data-parsley-minLength="5"
                               data-parsley-type="email" id="emailCorporate" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="usernameAdmin">Alamat Website</label>
                        <input type="text" name="webCorporate"
                               data-parsley-minLength="5"
                               data-parsley-type="url" id="webCorporate" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="usernameAdmin">Contact Person</label>
                        <input type="text" data-parsley-minLength="5" name="cpCorporate" id="cpCorporate" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="usernameAdmin">Provinsi</label>
                        <select class="form-control" name="ProvinsiCorporate" id="ProvinsiCorporate" required>
                            <option value="">:: provinsi ::</option>
                            <?php while ($row = $provinsi->fetch(PDO::FETCH_LAZY)){ ?>
                            <option value="<?=$row->id?>"><?=$row->name?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="usernameAdmin">Kota</label>
                        <select class="form-control" name="KotaCorporate" id="KotaCorporate" required>
                            <option value="">:: kota ::</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="usernameAdmin">Kecamatan</label>
                        <select class="form-control" name="kecamatanCorporate" id="kecamatanCorporate" required>
                            <option value="">:: Kecamatan ::</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="usernameAdmin">Kelurahan</label>
                        <select class="form-control" name="kelurahanCorporate" id="kelurahanCorporate" required>
                            <option value="">:: Kecamatan ::</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="usernameAdmin">Alamat</label>
                        <textarea style="text-transform: capitalize;" data-parsley-minLength="5" name="alamatCorporate" id="alamatCorporate" class="form-control" cols="5" required></textarea>
                    </div>



                    <div class="form-group">
                        <label for="usernameAdmin">Kode Pos</label>
                        <input type="text" name="posCorporate" data-parsley-minLength="4"
                               data-parsley-type="number" id="posCorporate" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-block btn-outline-light" >submit</button>

                </form>
            </div>
        </div>
    </div>
</div>