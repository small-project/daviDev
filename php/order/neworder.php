<?php if(isset($_GET['trx'])){ echo $_GET['trx']; ?>

<?php }else{ ?>
    <div class="row justify-content-center" <?=$access['create']?>>
        <div class="col-12 col-sm-8 col-lg-4">
            <div class="card border-primary mb-3">
                <div class="card-body text-primary">
                    <form class="form-inline" method="post" data-parsley-validate="" id="generateOrder" autocomplete="off">
                        <label class="my-1 mr-2" for="typeOrder">Type Order</label>
                        <select class="custom-select my-1 mr-sm-2" data-parsley-message="Choose one of them" name="typeOrder"  id="typeOrder" required="">
                            <option value="">Choose...</option>
                            <option value="1">Corporate</option>
                            <option value="2">Personal</option>
                        </select>

                        <button type="submit" class="btn btn-primary btn-block my-1">submit <i class="fa fa-fw fa-barcode"> </i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


