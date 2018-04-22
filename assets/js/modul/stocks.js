function formStock() {
    $('#formStokcs').removeClass('hidden');
    $('#listStok').addClass('hidden');
}

function addBelanja() {
    $('#form-belanja').removeClass('hidden');
    $('#listbelanja').addClass('hidden');
}

function editStock(id) {

    $.ajax({
        url: '../php/ajax/productions.php?type=editStocks',
        method: 'post',
        data: { idStock: id },

        success: function(msg) {

            for (var i = 0; i < msg.length; i++) {
                //console.log(msg[i].nama_barang);
                $('#idStock').val(msg[i].id);
                $('#nameStock').val(msg[i].nama_barang);
                $('#specStock').val(msg[i].spec);
                $('#qtyStock').val(msg[i].qty);
                $('#satuanStock').val(msg[i].satuan);
                $('#hargaStock').val(msg[i].harga);
                $('#ketStock').val(msg[i].ket);
            }
            $('#formStokcs').removeClass('hidden');
            $('#listStok').addClass('hidden');
        }
    })


}

function delStock(id, admin) {
    if (!confirm('Are you sure want to delete this?')) {
        return false;
    } else {
        $.ajax({
            url: '../php/ajax/productions.php?type=delStock',
            method: 'post',
            data: { admin: admin, keterangan: id },

            success: function(msg) {
                location.reload();
                alert(msg);
            }
        })
    }
}

function delBelanja(id, adm) {
    if (!confirm('Are you sure want to delete this?')) {
        return false;
    } else {
        $.ajax({
            url: '../php/ajax/productions.php?type=delBelanja',
            method: 'post',
            data: { admin: adm, keterangan: id },

            success: function(msg) {
                location.reload();
                alert(msg);
            }
        })
    }
}

$(document).ready(function() {
    $('#tableStok').DataTable();
    $('#tableBelanja').DataTable();

    $('#stock-form').on('submit', function(e) {
        e.preventDefault();

        var ID = $('#idStock').val();
        var admin = $('#adminStock').val();
        var nama = $('#nameStock').val();
        var spec = $('#specStock option:selected').val();
        var qty = $('#qtyStock').val();
        var satuan = $('#satuanStock option:selected').val();
        var harga = $('#hargaStock').val();
        var ket = $('#ketStock').val();
        var tipe = '';
        if (ID === '') {
            tipe = 'addStocks';
        } else {
            tipe = 'updateStocks';
        }
        //alert(tipe);
        //alert(admin + nama + spec + qty + satuan + harga + ket);
        $.ajax({
            url: '../php/ajax/productions.php?type=' + tipe,
            method: 'post',
            data: { idStocks: ID, admin: admin, title: nama, spesifikasi: spec, quantity: qty, satuan: satuan, harga: harga, keterangan: ket },

            success: function(msg) {
                location.reload();
                alert(msg);
            }
        })
    });

    $('#belanja-form').on('submit', function(e) {
        e.preventDefault();

        var admin = $('#adminBelanja').val();
        var title = $('#nameBelanja').val();
        var total = $('#biayaBelanja').val();
        var ket = $('#ketBelanja').val();

        //alert(admin + title + total + ket);

        $.ajax({
            url: '../php/ajax/productions.php?type=addBelanja',
            method: 'post',
            data: { admin: admin, title: title, biaya: total, keterangan: ket },

            success: function(msg) {
                location.reload();
                alert(msg);
            }
        })
    });
})