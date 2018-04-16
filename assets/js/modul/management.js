function formPrevillage() {
    $('#form-previllage').show();
    $('#listPrevillages').hide();
}

function delPrevillage(id, admin, user) {
    var id = id;
    var aId = admin;
    var idUser = user;

    $.ajax({
        url: '../php/ajax/management.php?type=delPrevillages',
        method: 'post',
        data: { data: id, adminI: aId, user: idUser },

        success: function(msg) {
            location.reload();
            alert(msg);
        }
    })
}
$(document).ready(function() {

    var formAdmin = $('#form-admin').hide();
    var listAdmin = $('#listAdmin').show();
    var listMenu = $('#listMenu').show();
    var detailMenu = $('#detailMenu').hide();
    var formSubmenu = $('#form-submenu').hide();
    var formPrevillage = $('#form-previllage').hide();

    listAdmin.on('click', '.addAdmin', function() {
        listAdmin.hide();
        formAdmin.show();
    });

    $('#admin-form').on('submit', function(e) {
        e.preventDefault();

        var admin = $('#adminID').val();
        var nama = $('#nameAdmin').val();
        var email = $('#emailAdmin').val();
        var pass = $('#passwordAdmin').val();
        var level = $('#levelAdmin option:selected').val();
        var role = $('#roleAdmin option:selected').val();

        //alert(nama + email + level + role);

        $.ajax({
            url: '../php/ajax/management.php?type=addAdmin',
            method: 'post',
            data: { nama: nama, email: email, pass: pass, levels: level, roles: role, adm: admin },

            success: function(msg) {
                location.reload();
                alert(msg);
            }
        })
    });

    listMenu.on('click', '.subMenu', function() {
        var idMenu = $(this).data('id');
        var title = $(this).data('name');

        $('#detailMenu').hide().load('../php/ajax/submenu.php?id=' + idMenu + '&title=' + title).fadeIn(700);
    });

    detailMenu.on('click', '.addSubmenu', function() {
        var id = $(this).data('id');
        var title = $(this).data('title');


        listMenu.hide();
        detailMenu.hide();
        $('#menuID').val(id);
        $('#titleSubmenu').innerHTML = +title;
        formSubmenu.show();
    });

    $('#form-submenu').on('submit', function(e) {
        e.preventDefault();

        var adm = $('#adminSub').val();
        var menu = $('#menuID').val();
        var submenu = $('#nameSub').val()
        var link = $('#linkSub').val();

        $.ajax({
            url: '../php/ajax/management.php?type=addSubmenu',
            method: 'post',
            data: { admin: adm, menu: menu, submenu: submenu, link: link },

            success: function(msg) {
                alert(msg);
                $('#nameSub').val("");
                $('#linkSub').val("");
                formSubmenu.hide();
                listMenu.show();
                detailMenu.hide();
            }
        })
    });

    $('#listMenuPrev').on('change', function(e) {
        e.preventDefault();
        var id = $(this).find("option:selected");
        var value = id.val();
        var text = id.text();

        $.ajax({
            url: '../php/ajax/management.php?type=menu',
            type: 'post',
            data: 'id=' + value,

            success: function(msg) {
                console.log(msg);
                $('#listSubmenuPrev').empty();

                $.each(msg, function(index, value) {
                    $('#listSubmenuPrev').append('<option value="' + value.id + '">' + value.submenu + '</option>');
                })
            }
        });
    });

    $('#form-previllage').on('submit', function(e) {
        e.preventDefault();

        var adm = $('#adminPrevillage').val();
        var menu = $('#listMenuPrev option:selected').val();
        var sub = $('#listSubmenuPrev option:selected').val();
        var user = $('#userPrevillage').val();

        var previllage = [];
        $('.previllageUser:checked').each(function() {
            previllage.push($(this).val());
        });

        $.ajax({
            url: '../php/ajax/management.php?type=addPrevillagUser',
            method: 'post',
            data: { admin: adm, menu: menu, submenu: sub, previllage: previllage, users: user },

            success: function(msg) {
                location.reload();
                alert(msg);
            }
        })

    });

    $('#listPrevillages').on('click', '.updatePrevillages', function() {
        var id = $(this).data('id');
        $('#idUpdatePrevillage').val(id);
    });

    $('#form-updatePrevillage').on('submit', function(e) {
        e.preventDefault();

        var adm = $('#adminUpdatePrevillage').val();
        var id = $('#idUpdatePrevillage').val();

        var previllage = [];
        $('.updatePrevillage:checked').each(function() {
            previllage.push($(this).val());
        });

        $.ajax({
            url: '../php/ajax/management.php?type=updatePrevillageUser',
            method: 'post',
            data: { admin: adm, id: id, previllage: previllage },

            success: function(msg) {
                location.reload();
                alert(msg);
            }
        })
    });

    detailMenu.on('click', '.delSubMenu', function() {
        var id = $(this).data('id');
        var admid = $(this).data('admin');

        $.ajax({
            url: '../php/ajax/management.php?type=deleteSubmenu',
            method: 'post',
            data: { admin: admid, id: id },

            success: function(msg) {
                location.reload();
                alert(msg);
            }
        });
    });

})