$(document).ready(function() {
    $('#tableKasOut').DataTable();
    $('#kasMasuk').DataTable();
    $('#tablePayKurir').DataTable();
    var listOutKas = $('#listKasKeluar').show();
    var listPayKurir = $('#listPayKurir').show();
    var listInKas = $('#listKasIn').hide();
    var monitoringKas = $('#monitoringKasIn').show();

    $('#listPengeluaranKas').on('click', '.addOutKas', function() {
        $('#form-kasKeluar').removeClass('hidden');
        listOutKas.hide();
    });

    $('#form-kasKeluar').on('submit', function(e) {
        e.preventDefault();

        var admin = $('#adminOut').val();
        var title = $('#nameOut').val();
        var total = $('#biayaOut').val();
        var ket = $('#ketOut').val();

        //alert(admin + title + total + ket);

        $.ajax({
            url: '../php/ajax/payment.php?type=kasOut',
            method: 'post',
            data: { admin: admin, title: title, biaya: total, keterangan: ket },

            success: function(msg) {
                location.reload();
                alert(msg);
            }
        })
    });

    listOutKas.on('click', '.delKasOut', function() {
        var id = $(this).data('id');
        var adm = $(this).data('admin');

        //alert('id: '+id + 'admin: '+adm);
        if (!confirm('Are you sure want to delete this?')) {
            return false;
        } else {
            $.ajax({
                url: '../php/ajax/payment.php?type=delKasOut',
                method: 'post',
                data: { admin: adm, keterangan: id },

                success: function(msg) {
                    location.reload();
                    alert(msg);
                }
            })
        }
    });

    $('#reportKasOutAdmin').on('submit', function(e) {
        e.preventDefault();

        var admin = $('#reportOutAdminID').val();
        var user = $('#reportOutAdmin option:selected').val();

        var url = $('#reportOutURL').val();

        var link = url + 'php/ajax/pdfKasOut.php?user=' + user + '&admin=' + admin;
        //window.open(url, '_blank');



        if (!confirm('Are you sure want to report this?')) {
            return false;
        } else {

            $.ajax({
                url: '../php/ajax/payment.php?type=reportKasOut',
                method: 'post',
                data: { admin: admin, users: user },

                success: function(msg) {
                    if (msg == '0') {
                        alert('Failed');
                    } else if (msg == '1') {
                        window.open(link, '', 'Report Pengeluaran Kas', 'width=400, height=600, screenX=100');
                        alert('Berhasil report data!');

                    } else {
                        alert('Record belum ada!');
                    }
                    location.reload();
                }
            });

        }
    });

    $('#listPemasukanKas').on('click', '.addInKas', function() {
        monitoringKas.hide();
        $('#form-kasIn').removeClass('hidden');
    });

    monitoringKas.on('click', '.showListKasIn', function() {
        listInKas.show();
    });

    $('#kasIn-form').on('submit', function(e) {
        e.preventDefault();

        var adm = $('#adminIn').val();
        var nama = $('#nameIn').val();
        var total = $('#biayaIn').val();
        var ket = $('#ketIn').val();

        $.ajax({
            url: '../php/ajax/payment.php?type=addKasIn',
            method: 'post',
            data: { admin: adm, title: nama, total: total, keterangan: ket },

            success: function(msg) {
                alert(msg);
                location.reload();
            }
        });
    });

    $('#payKurir-form').on('submit', function(e) {
        e.preventDefault();
        var adm = $('#adminPay').val();
        var kurir = $('#namaKurir option:selected').val();
        var kel = $('#kelurahanCharge option:selected').val();

        //alert(adm + kurir + kel);

        $.ajax({
            url: '../php/ajax/payment.php?type=addPayCharge',
            method: 'post',
            data: { admin: adm, namaKurir: kurir, kelurahan: kel },

            success: function(msg) {
                alert(msg);
                location.reload();
            }
        });
    });

    listPayKurir.on('click', '.addpayCharge', function() {
        listPayKurir.hide();
        $('#form-payKurir').removeClass('hidden');
    });

    listPayKurir.on('click', '.delPayCharge', function() {
        var adminI = $(this).data('admin');
        var id = $(this).data('id');

        // alert(adminI + id);
        if (!confirm('Are you sure want to report this?')) {
            return false;
        } else {

            $.ajax({
                url: '../php/ajax/payment.php?type=delPayCharge',
                method: 'post',
                data: { admin: adminI, id: id },

                success: function(msg) {
                    alert(msg);
                    location.reload();
                }
            });

        }

    });

    $('#reportPayCharge').on('submit', function(e) {
        e.preventDefault();
        var admin = $('#reportPayChargeAdminID').val();
        var url = $('#reportPayChargeURL').val();
        var kurir = $('#reportPayChargeAdmin option:selected').val();

        var link = url + 'php/ajax/pdfPayKurir.php?id=' + kurir + '&admin=' + admin;
        //window.open(url, '_blank');



        if (!confirm('Are you sure want to report this?')) {
            return false;
        } else {

            $.ajax({
                url: '../php/ajax/payment.php?type=reportPayCharge',
                method: 'post',
                data: { admin: admin, kurir: kurir },

                success: function(msg) {
                    if (msg == '0') {
                        alert('Failed');
                    } else if (msg == '1') {
                        window.open(link, '', 'Report Pembayaran Kurir', 'width=400, height=600, screenX=100');
                        alert('Berhasil report data!');

                    } else {
                        alert('Record belum ada!');
                    }

                    location.reload();
                }
            });

        }
    });
})