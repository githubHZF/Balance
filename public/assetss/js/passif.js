//
  	$(document).ready(function () {
		
		$('.showTable').hide();
		$('body').on('change', '#year', function () {
			if (this.value == "CHOIX ANNﾃ右") {
				$('.showTable').hide();
			} else {
			$('.showTable').show();
			}
		});
		  
			$('#passif').DataTable({
				order: [[3, 'asc']],
				lengthMenu: [
					[150, 25, 50, 100],
					[150, 25, 50, 'All'],
				],
				fixedHeader: {
					header: true,
					footer: true
				},
					scrollCollapse: true,
					paging: false,
			});

			$('#Organisme').on('change', function () {
				var organisme_id = $(this).val();
				$.ajax({
					url: "/DataTableQuery",
					method: 'POST',
					data: {organisme_id: organisme_id},
					success: function (result) {
						$('.lds-hourglass').hide();
						if ( $.fn.DataTable.isDataTable('#passif') ) {
							$('#passif').DataTable().destroy();
							}
							$("#soldesYears").html(result);
							$('#passif').DataTable({
								order: [[3, 'asc']],
								lengthMenu: [
									[150, 25, 50, 100],
									[150, 25, 50, 'All'],
								],
								fixedHeader: {
									header: true,
									footer: true
								},
									scrollCollapse: true,
									paging: false,
							});	
					}
				});
			});

			$('#Pdossier').on('change', function () {
				var dossier_id = $(this).val();
				$.ajax({
					url: "/DataTableQuery",
					method: 'POST',
					data: {dossier_id: dossier_id},
					success: function (result) {
						
						if ( $.fn.DataTable.isDataTable('#passif') ) {
							$('#passif').DataTable().destroy();
							}
							$("#soldesYears").html(result);
							$('#passif').DataTable({
								order: [[3, 'asc']],
								lengthMenu: [
									[150, 25, 50, 100],
									[150, 25, 50, 'All'],
								],
								fixedHeader: {
									header: true,
									footer: true
								},
									scrollCollapse: true,
									paging: false,
							});	
					}
				});
			});

			$('#sousDossier').on('change', function () {
				var sous_Dossier = $(this).val();
				$.ajax({
					url: "/DataTableQuery",
					method: 'POST',
					data: {sous_Dossier: sous_Dossier},
					success: function (result) {
						if ( $.fn.DataTable.isDataTable('#passif') ) {
							$('#passif').DataTable().destroy();
							}
							$("#soldesYears").html(result);
							$('#passif').DataTable({
								order: [[3, 'asc']],
								lengthMenu: [
									[150, 25, 50, 100],
									[150, 25, 50, 'All'],
								],
								fixedHeader: {
									header: true,
									footer: true
								},
									scrollCollapse: true,
									paging: false,
							});	
					}
				});
			});

			
	
			$('#year').on('change', function () {
				var year = $(this).val();
				$.ajax({
					url: "/passif",
					method: 'POST',
					data: {year: year},
				});
			});

			$('body').on('click', '#passif tr', function () {
				var poste = $(this).find('#postepassif').html();
				var organisme_id =  $('#Organisme').val();
				var dossier_id   =  $('#Pdossier').val();
				var sous_Dossier = $('#sousDossier').val();
				var year = $('#year').val();
				$.ajax({
					url: '/TableTopTout',
					method: 'POST',
					data: {
						poste: poste,
						organisme_id: organisme_id,
						dossier_id: dossier_id,
						sous_Dossier: sous_Dossier,
						year: year,
					},
					success: function (result) 
					{
						
						if(result.length === 146){

							$("#balanceTop").empty().html(result);

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
						else{$("#balanceTop").empty().html(result);}
					},
				});
			});

			$('body').on('click', '#passif tr', function () {
				var poste = $(this).find('#postepassif').html();
				var organisme_id =  $('#Organisme').val();
				var dossier_id =  $('#Pdossier').val();
				var sous_Dossier = $('#sousDossier').val();
				var year = $('#year').val();
				$.ajax({
					url: '/TableButtonTout',
					method: 'POST',
					data: {
						poste: poste,
						organisme_id: organisme_id,
						dossier_id: dossier_id,
						sous_Dossier: sous_Dossier,
						year: year,
					},
					success: function (result) {
						$("#balanceButton").empty().html(result);
					},
				});
			});
	});