$(document).ready(function () {

    var formOutKas = $('#form-kasKeluar').hide();
    var listOutKas = $('#listKasKeluar').show();

    $('#listPengeluaranKas').on('click', '.addOutKas', function () {
        formOutKas.show();
        listOutKas.hide();
    });

    formOutKas.on('submit', function (e) {
        e.preventDefault();

        var admin = $('#adminOut').val();
        var title = $('#nameOut').val();
        var total = $('#biayaOut').val();
        var ket = $('#ketOut').val();

        //alert(admin + title + total + ket);

        $.ajax({
            url     : '../php/ajax/payment.php?type=kasOut',
            method  : 'post',
            data    : { admin: admin, title: title, biaya: total, keterangan: ket},
            
            success : function (msg) {
                location.reload();
                alert(msg);
            }
        })
    });

    listOutKas.on('click', '.delKasOut', function () {
        var id  = $(this).data('id');
        var adm = $(this).data('admin');

        //alert('id: '+id + 'admin: '+adm);
        if(!confirm('Are you sure want to delete this?')){
            return false;
        }else{
            $.ajax({
                url     : '../php/ajax/payment.php?type=delKasOut',
                method  : 'post',
                data    : { admin: adm, keterangan: id},

                success : function (msg) {
                    location.reload();
                    alert(msg);
                }
            })
        }
    });

    listOutKas.on('click', '.reportKasOut', function () {
        var admin  = $(this).data('admin');

        if(!confirm('Are you sure want to report this?')){
            return false;
        }else{
            $.ajax({
                url     : '../php/ajax/payment.php?type=reportKasOut',
                method  : 'post',
                data    : { admin: admin },

                success : function (msg) {
                    location.reload();
                    alert(msg);
                }
            })
        }
    })
})