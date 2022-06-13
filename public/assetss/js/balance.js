$(document).ready(function(){

        $('.showTable').hide();
        $('body').on('change', '#year', function () {
            if (this.value == "CHOIX ANNÉE") {
                $('.showTable').hide();
            } else {
            $('.showTable').show();
            }
        });

    $('#home1').hide();

        $('#profile1').show();
        $('#settings1').hide();

    $('#btnhome1').on('click', function () {
        
        $('#home1').show();

        $('#profile1').hide();
        $('#settings1').hide();
    });

    $('#btnprofile1').on('click', function () {
        
        $('#profile1').show();

        $('#home1').hide();
        $('#settings1').hide();
    });

    $('#btnsettings1').on('click', function () {
        
        $('#settings1').show();

        $('#profile1').hide();
        $('#home1').hide();
    });
    

    $('#Organisme').on('change', function () {
        var organisme_id = $(this).val();
        $.ajax({
            url: "/balance",
            method: 'POST',
            data: {organisme_id: organisme_id},
        });
    });
    
    $('#Pdossier').on('change', function () {
        var dossier_id = $(this).val();
        var organisme_id =  $('#Organisme').val();
        $.ajax({
            url: "/balance",
            method: 'POST',
            data: {	dossier_id: dossier_id,
                    organisme_id: organisme_id},
        });
    });

    $('#sousDossier').on('change', function () {
        var organisme_id =  $('#Organisme').val();
        var dossier_id =  $('#Pdossier').val();
        var sous_Dossier = $(this).val();
        $.ajax({
            url: "/balance",
            method: 'POST',
            data:
            {
                sous_Dossier: sous_Dossier,
                dossier_id: dossier_id,
                organisme_id: organisme_id
            },
        });
    }); 
    $('#Organisme').on('change', function () {
        var organisme_id = $(this).val();
        $.ajax({
            url: "/select",
            method: 'POST',
            data: {organisme_id: organisme_id},
            success: function (result) {
                $("#Pdossier").empty().html(result)
            }
        });
    });

    $('#Pdossier').on('change', function () {
        var dossier_id = $(this).val();
        $.ajax({
            url: "/select",
            method: 'POST',
            data: {dossier_id: dossier_id},
            success: function (result) {
                $("#sousDossier").empty().html(result)
            }
        });
    });

});