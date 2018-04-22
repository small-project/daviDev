<?php
$id = $_GET['id'];
$stmt = $config->runQuery("SELECT corporates.id, corporates.nama, corporates.telp, corporates.handphone, corporates.fax, corporates.email, corporates.website, corporates.cp, corporates.alamat, corporates.kelurahan, 
corporates.kecamatan, corporates.kodepos, corporates.created_at, bidang_usahas.category, states.lokasi_nama FROM corporates
INNER JOIN bidang_usahas ON bidang_usahas.id = corporates.bidang
INNER JOIN states ON states.lokasi_ID = corporates.provinsi WHERE corporates.id = :a");
$stmt->execute(array(':a' => $id));
$info = $stmt->fetch(PDO::FETCH_LAZY);
?>
<div class="row justify-content-center" id="newAdmin" <?=$access['read']?>>
    <div class="col-12 col-sm-8 col-lg-6">
        <div class="card text-white bg-success mb-3">
            <div class="card-header">
                Profile Corporate
            </div>
            <div class="card-body">
                <form action="" data-parsley-validate="" method="post" autocomplete="off">
                    <div class="form-group" >
                        <label for="usernameAdmin">Nama Corporate</label>
                        <input style="text-transform: capitalize;" type="text" class="form-control" value="<?=$info['nama']?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="usernameAdmin">Bidang Usaha</label>
                        <input style="text-transform: capitalize;" type="text" class="form-control" value="<?=$info['category']?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="usernameAdmin">Nomor Telp</label>
                        <input style="text-transform: capitalize;" type="text" class="form-control" value="<?=$info['telp']?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="usernameAdmin">Handphone</label>
                        <input style="text-transform: capitalize;" type="text" class="form-control" value="<?=$info['handphone']?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="usernameAdmin">Nomor Fax</label>
                        <input style="text-transform: capitalize;" type="text" class="form-control" value="<?=$info['fax']?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="usernameAdmin">Alamat Email</label>
                        <input style="text-transform: capitalize;" type="text" class="form-control" value="<?=$info['email']?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="usernameAdmin">Alamat Website</label>
                        <input style="text-transform: capitalize;" type="text" class="form-control" value="<?=$info['website']?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="usernameAdmin">Contact Person</label>
                        <input style="text-transform: capitalize;" type="text" class="form-control" value="<?=$info['cp']?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="usernameAdmin">Alamat</label>
                        <textarea style="text-transform: capitalize;"class="form-control" cols="5" readonly><?=$info['nama']?> </textarea>
                    </div>
                    <div class="form-group" >
                        <label for="usernameAdmin">Kelurahan</label>
                        <input style="text-transform: capitalize;" type="text" class="form-control" value="<?=$info['kelurahan']?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="usernameAdmin">Kecamatan</label>
                        <input style="text-transform: capitalize;" type="text" class="form-control" value="<?=$info['kecamatan']?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="usernameAdmin">Provinsi</label>
                        <input style="text-transform: capitalize;" type="text" class="form-control" value="<?=$info['lokasi_nama']?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="usernameAdmin">Kode Pos</label>
                        <input style="text-transform: capitalize;" type="text" class="form-control" value="<?=$info['kodepos']?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="usernameAdmin">Bergabung Sejak</label>
                        <input style="text-transform: capitalize;" type="text" class="form-control" value="<?=date('d M Y H:m:s', strtotime($info->created_at))?>" readonly>
                    </div>
                    <button type="submit" class="btn btn-block btn-outline-dark" <?=$access['update']?>>Edit Profile</button>

                </form>
            </div>
        </div>
    </div>
</div>