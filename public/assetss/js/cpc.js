
    $(document).ready(function () {

		$('.showTable').hide();
		$('body').on('change', '#year', function () {
			if (this.value == "CHOIX ANNﾃ右") {
				$('.showTable').hide();
			} else {
			$('.showTable').show();
			}
		});

		
        $('#cpc').DataTable({
			order: [[6, 'asc']],
			lengthMenu: [
				[15, 25, 50, -1],
				[15, 25, 50, 'All'],
			],
				scrollCollapse: true,
				paging: false,
        });

      		$('#Organisme').on('change', function () {
				var organisme_id = $(this).val();
				$.ajax({
					url: "/DataTableCpcQuery",
					method: 'POST',
					data: {organisme_id: organisme_id},
          			success: function (result) {
						if ( $.fn.DataTable.isDataTable('#cpc') ) {
							$('#cpc').DataTable().destroy();
							}
							$("#balancecpc").html(result);
							$('#cpc').DataTable({
								order: [[6, 'asc']],
								scrollCollapse: true,
								paging: false,
								lengthMenu: [
									[150, 25, 50, 100],
									[150, 25, 50, 'All'],
								  ],
							})
					}
				});
			});

			$('#Pdossier').on('change', function () {
				var dossier_id = $(this).val();
				$.ajax({
					url: "/DataTableCpcQuery",
					method: 'POST',
					data: {dossier_id: dossier_id},
					success: function (result) {
						if ( $.fn.DataTable.isDataTable('#cpc') ) {
							$('#cpc').DataTable().destroy();
							}
							$("#balancecpc").html(result);
							$('#cpc').DataTable({
								order: [[6, 'asc']],
								scrollCollapse: true,
								paging: false,
								lengthMenu: [
									[150, 25, 50, 100],
									[150, 25, 50, 'All'],
								],
							});	
					}
				});
			});

			$('#sousDossier').on('change', function () {
				var sous_dossier_id = $(this).val();
				$.ajax({
					url: "/DataTableCpcQuery",
					method: 'POST',
					data: {sous_dossier_id: sous_dossier_id},
					success: function (result) {
						if ( $.fn.DataTable.isDataTable('#cpc') ) {
							$('#cpc').DataTable().destroy();
							}
							$("#balancecpc").html(result);
							$('#cpc').DataTable({
								order: [[6, 'asc']],
								scrollCollapse: true,
								paging: false,
								lengthMenu: [
									[150, 25, 50, 100],
									[150, 25, 50, 'All'],
								  ],
							});	
					}
				});
			});

			$('body').on('click', '#cpc tr', function () {
				var poste = $(this).find('#postecpc').html();
				var organisme_id =  $('#Organisme').val();
				var dossier_id =  $('#Pdossier').val();
				var sous_Dossier = $('#sousDossier').val();
				$.ajax({
					url: '/TableTopCpcTout',
					method: 'POST',
					data: {
						poste: poste,
						organisme_id: organisme_id,
						dossier_id: dossier_id,
						sous_Dossier: sous_Dossier,
					},
					success: function (result) {

						if(result.length === 156){
							
							$("#balanceTablecpc").empty().html(result);

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
									"timeOut": "1000",
									"extendedTimeOut": "1000",
									"showEasing": "swing",
									"hideEasing": "linear",
									"showMethod": "fadeIn",
									"hideMethod": "fadeOut"
								}
								Command: toastr["error"]("n'a pas de résultat", "Warning")
							}
							else{
								$("#balanceTablecpc").empty().html(result);
							}
					},
				});
			});

				$('body').on('click', '#cpc tr', function () {
					var compte = $(this).find('#compte').html();
					$.ajax({
						url: "/TableButtonCpcTout",
						method: 'POST',
						data: {compte: compte},
					});
				});

			$('body').on('click', '#cpc tr', function () {
				var poste = $(this).find('#postecpc').html();
				var compte = $(this).find('#compte').html();
				var organisme_id =  $('#Organisme').val();
				var dossier_id =  $('#Pdossier').val();
				var sous_Dossier = $('#sousDossier').val();
				$.ajax({
					url: '/TableButtonCpcTout',
					method: 'POST',
					data: {
						poste: poste,
						compte: compte,
						organisme_id: organisme_id,
						dossier_id: dossier_id,
						sous_Dossier: sous_Dossier,
						
					},
					success: function (result) {
						$("#balanceTablecpc1").empty().html(result);
					},
				});
			});
    });
