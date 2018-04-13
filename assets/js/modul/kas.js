$(document).ready(function () {
    $('#tableKasOut').DataTable();
    $('#kasMasuk').DataTable();
    var formOutKas  = $('#form-kasKeluar').hide();
    var listOutKas  = $('#listKasKeluar').show();
    var formInKas   = $('#form-kasIn').hide();
    var listInKas   = $('#listKasIn').hide();
    var monitoringKas = $('#monitoringKasIn').show();

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

    $('#reportKasOutAdmin').on('submit', function (e) {
        e.preventDefault();

        var admin = $('#reportOutAdminID').val();
        var user  = $('#reportOutAdmin option:selected').val();

        var url = $('#reportOutURL').val();

        var link = url + 'php/ajax/pdfKasOut.php?user='+user+'&admin='+admin;
        //window.open(url, '_blank');



        if(!confirm('Are you sure want to report this?')){
                    return false;
                }else{

                    $.ajax({
                        url     : '../php/ajax/payment.php?type=reportKasOut',
                        method  : 'post',
                        data    : { admin: admin, users: user },

                        success : function (msg) {
                            if(msg == '0'){
                                alert('Failed');
                            }else if(msg == '1'){
                                window.open(link, '', 'window settings');
                                alert('Berhasil report data!');

                            }else{
                                alert('Record belum ada!');
                            }
                            location.reload();
                        }
                    });

                }
    });

    // listOutKas.on('click', '.reportKasOut', function () {
    //     var admin  = $(this).data('admin');
    //
    //     if(!confirm('Are you sure want to report this?')){
    //         return false;
    //     }else{
    //         $.ajax({
    //             url     : '../php/ajax/payment.php?type=reportKasOut',
    //             method  : 'post',
    //             data    : { admin: admin },
    //
    //             success : function (msg) {
    //                 location.reload();
    //                 alert(msg);
    //             }
    //         })
    //     }
    // })

    $('#listPemasukanKas').on('click', '.addInKas', function () {
        monitoringKas.hide();
        formInKas.show();
    });

    monitoringKas.on('click', '.showListKasIn', function () {
        listInKas.show();
    });

    $('#kasIn-form').on('submit', function (e) {
        e.preventDefault();

        var adm     = $('#adminIn').val();
        var nama    = $('#nameIn').val();
        var total   = $('#biayaIn').val();
        var ket     = $('#ketIn').val();

        $.ajax({
            url     : '../php/ajax/payment.php?type=addKasIn',
            method  : 'post',
            data    : { admin: adm, title: nama, total: total, keterangan: ket },

            success : function (msg) {
                alert(msg);
                location.reload();
            }
        });
    });
})