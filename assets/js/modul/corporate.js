$(document).ready(function () {

    var message = $('#messageCorporate').hide();

    $('#newCorporate').on('submit', function (e) {
        e.preventDefault();

        var nama    = $('#nameCorporate').val();
        var bidang  = $('#bidangCorporate option:selected').val();
        var telp    = $('#telpCorporate').val();
        var hp    = $('#hpCorporate').val();
        var fax    = $('#faxCorporate').val();
        var email    = $('#emailCorporate').val();
        var web    = $('#webCorporate').val();
        var prov    = $('#ProvinsiCorporate option:selected').val();
        var kota    = $('#KotaCorporate option:selected').val();
        var kec    = $('#kecamatanCorporate option:selected').val();
        var kel    = $('#kelurahanCorporate option:selected').val();
        var addr    = $('#alamatCorporate').val();
        var pos    = $('#posCorporate').val();
        var cp = $('#cpCorporate').val();

        $.ajax({
            url  : '../php/ajax/corporate.php?type=new',
            type : 'post',
            data : 'nama='+nama+'&bidang='+bidang+'&telp='+telp+'&hp='+hp+'&fax='+fax+'&email='+email+'&web='+web+'&prov='+prov+'&kota='+kota+
            '&kec='+kec+'&kel='+kel+'&alamat='+addr+'&pos='+pos+'&cp='+cp,

            success: function (msg) {
                if(msg === '1'){
                    $(':input','#newCorporate')
                        .not(':button, :submit, :reset, :hidden')
                        .val('')
                        .removeAttr('checked')
                        .removeAttr('selected');
                    message.addClass('alert-success');
                    $('#isiPesan').append('<strong>Done!</strong> New Corporate Success input to Database.');
                    message.show();

                }else{
                    $(':input','#newCorporate')
                        .not(':button, :submit, :reset, :hidden')
                        .val('')
                        .removeAttr('checked')
                        .removeAttr('selected');
                    message.addClass('success');
                    message.addClass('alert-danger');
                    $('#isiPesan').append('<strong>OOops!</strong> Something wrong with this page.');
                    message.show();
                    console.log(msg);
                }

            }
        });
    });

    $('.alert').on('click','.close',function(){
        location.reload();
        $(this).closest('.alert').slideUp();

    });
})