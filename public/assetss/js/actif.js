
  $(document).ready(function () {
    
        $('.showTable').hide();
        $('body').on('change', '#year', function () {
          if (this.value == "CHOIX ANNﾃ右") {
            $('.showTable').hide();
          } else {
          $('.showTable').show();
          }
        });

        $('#actif').DataTable({
          order: [[6, 'asc']],
          fixedHeader: false,
          lengthMenu: [
            [150, 25, 50, 100],
            [150, 25, 50, 'All'],
          ],
					scrollCollapse: true,
					paging: false,
        });


        $('#Organisme').on('change', function () {
          var organisme_id = $(this).val();
          $.ajax({
            url: "/DataTableActifQuery",
            method: 'POST',
            data: {organisme_id: organisme_id},
                  success: function (result) 
                  {
                    if ( $.fn.DataTable.isDataTable('#actif') ) {
                      $('#actif').DataTable().destroy();
                      }
                      $("#balanceactif").html(result);
                      $('#actif').DataTable({order: [[6, 'asc']],
                      lengthMenu: [
                        [150, 25, 50, 100],
                        [150, 25, 50, 'All'],
                      ],
                      scrollCollapse: true,
                      paging: false,
                    })
                  }
          });
        });

        $('#Pdossier').on('change', function () {
          var dossier_id = $(this).val();
          $.ajax({
            url: "/DataTableActifQuery",
            method: 'POST',
            data: {dossier_id: dossier_id},
            success: function (result) 
            {
              if ( $.fn.DataTable.isDataTable('#actif') ) {
                $('#actif').DataTable().destroy();
                }
                $("#balanceactif").html(result);
                $('#actif').DataTable({
                  order: [[6, 'asc']],
                  lengthMenu: [
                    [150, 25, 50, 100],
                    [150, 25, 50, 'All'],
                  ],
                  scrollCollapse: true,
									paging: false,
                });	
            }
          });
        });

        $('#sousDossier').on('change', function () {
          var sous_dossier_id = $(this).val();
          $.ajax({
            url: "/DataTableActifQuery",
            method: 'POST',
            data: {sous_dossier_id: sous_dossier_id},
            success: function (result) 
            {
              if ( $.fn.DataTable.isDataTable('#actif') ) {
                $('#actif').DataTable().destroy();
                }
                $("#balanceactif").html(result);
                $('#actif').DataTable({
                  order: [[6, 'asc']],
                  lengthMenu: [
                    [150, 25, 50, 100],
                    [150, 25, 50, 'All'],
                  ],
                  scrollCollapse: true,
									paging: false,
                });	
            }
          });
        });

        $('body').on('click', '#actif tr', function () {
          var poste = $(this).find('#posteactif').html();
          var organisme_id =  $('#Organisme').val();
          var dossier_id =  $('#Pdossier').val();
          var sous_Dossier = $('#sousDossier').val();
          $.ajax({
            url: '/TableTopActifTout',
            method: 'POST',
            data: 
            {
              poste: poste,
              organisme_id: organisme_id,
              dossier_id: dossier_id,
              sous_Dossier: sous_Dossier,
            },
            success: function (result) 
            {
              if(result.length === 156){
                
                  $("#balanceTableactif").empty().html(result);
    
                      toastr.options = {
      
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                      }
                      Command: toastr["error"]("Poste has no part", "Warning")
                  }

                else{$("#balanceTableactif").empty().html(result);}
            },
          });
        });

      $('body').on('click', '#actif tr', function () {

          var compte = $(this).find('#compte').html();
          var organisme_id =  $('#Organisme').val();
          var dossier_id =  $('#Pdossier').val();
          var sous_Dossier = $('#sousDossier').val();

        $.ajax({
            url: '/TableButtonActifTout',
            method: 'POST',
            data:{
              compte: compte,
              organisme_id: organisme_id,
              dossier_id: dossier_id,
              sous_Dossier: sous_Dossier,
            },
            success: function (result){$("#balanceTableactif1").empty().html(result);},
        });
      });

  });

  // poste n'a pas de vente