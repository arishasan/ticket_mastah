<!-- BEGIN FORM VALIDATION RUTE-->
<script type="text/javascript">
	$(function(){

	    // $('#wizard_horizontal').steps({
	    //     headerTag: 'h2',
	    //     bodyTag: 'section',
	    //     transitionEffect: 'slideLeft',
	    //     onInit: function (event, currentIndex) {
	    //         setButtonWavesEffect(event);
	    //     },
	    //     onStepChanged: function (event, currentIndex, priorIndex) {
	    //         setButtonWavesEffect(event);
	    //     }
	    // });

	    // //Vertical form basic
	    // $('#wizard_vertical').steps({
	    //     headerTag: 'h2',
	    //     bodyTag: 'section',
	    //     transitionEffect: 'slideLeft',
	    //     stepsOrientation: 'vertical',
	    //     onInit: function (event, currentIndex) {
	    //         setButtonWavesEffect(event);
	    //     },
	    //     onStepChanged: function (event, currentIndex, priorIndex) {
	    //         setButtonWavesEffect(event);
	    //     }
	    // });

	    //Advanced form with validation
	    var form = $('#wizard_with_validation1').show();
	    form.steps({
	        headerTag: 'h3',
	        bodyTag: 'fieldset',
	        transitionEffect: 'slideLeft',
	        onInit: function (event, currentIndex) {
	            $.AdminBSB.input.activate();

	            //Set tab width
	            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
	            var tabCount = $tab.length;
	            $tab.css('width', (100 / tabCount) + '%');

	            //set button waves effect
	            setButtonWavesEffect(event);
	        },
	        onStepChanging: function (event, currentIndex, newIndex) {
	            if (currentIndex > newIndex) { return true; }

	            if (currentIndex < newIndex) {
	                form.find('.body:eq(' + newIndex + ') label.error').remove();
	                form.find('.body:eq(' + newIndex + ') .error').removeClass('error');
	            }

	            form.validate().settings.ignore = ':disabled,:hidden';
	            return form.valid();
	        },
	        onStepChanged: function (event, currentIndex, priorIndex) {
	            setButtonWavesEffect(event);
	        },
	        onFinishing: function (event, currentIndex) {
	            form.validate().settings.ignore = ':disabled';
	            return form.valid();
	        },
	        onFinished: function (event, currentIndex) {

	        	swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
			    }, function () {
			        setTimeout(function () {
			        	var data = $('.ff_rute').serializeArray();
			        	var url = $('.ff_rute').attr('action');
			        	$.post(url,data,function(res){

			        		if(res == 'Success Saving The Rute'){
			        			setTimeout(function(){
			        				swal("Success!", res, "success");
			        				location.reload();
			        			}, 2000);
			        		}else{
			        			setTimeout(function(){
			        				swal("Failed!", res, "error");
			        				location.reload();
			        			}, 2000);
			        		}
			        	});

			        }, 2000);
			    });
	        }
	    });

	    form.validate({
	        highlight: function (input) {
	            $(input).parents('.form-line').addClass('error');
	        },
	        unhighlight: function (input) {
	            $(input).parents('.form-line').removeClass('error');
	        },
	        errorPlacement: function (error, element) {
	            $(element).parents('.form-group').append(error);
	        },
	        rules: {
	            'confirm': {
	                equalTo: '#password'
	            }
	        }
	    });


	    // UPDATE IT
	    
	    var form1 = $('#wizard_with_validation2').show();
	    form1.steps({
	        headerTag: 'h3',
	        bodyTag: 'fieldset',
	        transitionEffect: 'slideLeft',
	        onInit: function (event, currentIndex) {
	            $.AdminBSB.input.activate();

	            //Set tab width
	            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
	            var tabCount = $tab.length;
	            $tab.css('width', (100 / tabCount) + '%');

	            //set button waves effect
	            setButtonWavesEffect(event);
	        },
	        onStepChanging: function (event, currentIndex, newIndex) {
	            if (currentIndex > newIndex) { return true; }

	            if (currentIndex < newIndex) {
	                form1.find('.body:eq(' + newIndex + ') label.error').remove();
	                form1.find('.body:eq(' + newIndex + ') .error').removeClass('error');
	            }

	            form1.validate().settings.ignore = ':disabled,:hidden';
	            return form1.valid();
	        },
	        onStepChanged: function (event, currentIndex, priorIndex) {
	            setButtonWavesEffect(event);
	        },
	        onFinishing: function (event, currentIndex) {
	            // form1.validate().settings.ignore = ':disabled';
	            return form1.valid();
	        },
	        onFinished: function (event, currentIndex) {

	        	swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
			    }, function () {
			        setTimeout(function () {
			        	var data = $('.ff_rute_edit').serializeArray();
			        	var url = $('.ff_rute_edit').attr('action');
			        	$.post(url,data,function(res){

			        		if(res == 'Success Updating The Rute'){
			        			setTimeout(function(){
			        				swal("Success!", res, "success");
			        				location.reload();
			        			}, 2000);
			        		}else{
			        			setTimeout(function(){
			        				swal("Failed!", res, "error");
			        				location.reload();
			        			}, 2000);
			        		}
			        	});

			        }, 2000);
			    });

	        }
	    });

	    form1.validate({
	        highlight: function (input) {
	            $(input).parents('.form-line').addClass('error');
	        },
	        unhighlight: function (input) {
	            $(input).parents('.form-line').removeClass('error');
	        },
	        errorPlacement: function (error, element) {
	            $(element).parents('.form-group').append(error);
	        },
	        rules: {
	            'confirm': {
	                equalTo: '#password'
	            }
	        }
	    });

	    // NED 


		function setButtonWavesEffect(event) {
		    $(event.currentTarget).find('[role="menu"] li a').removeClass('waves-effect');
		    $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('waves-effect');
		}

		// CRUD TRANSPORT TYPE

		var formCrudTTPE = $('#wizard_with_validation3').show();
	    formCrudTTPE.steps({
	        headerTag: 'h3',
	        bodyTag: 'fieldset',
	        transitionEffect: 'slideLeft',
	        onInit: function (event, currentIndex) {
	            $.AdminBSB.input.activate();

	            //Set tab width
	            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
	            var tabCount = $tab.length;
	            $tab.css('width', (100 / tabCount) + '%');

	            //set button waves effect
	            setButtonWavesEffect(event);
	        },
	        onStepChanging: function (event, currentIndex, newIndex) {
	            if (currentIndex > newIndex) { return true; }

	            if (currentIndex < newIndex) {
	                formCrudTTPE.find('.body:eq(' + newIndex + ') label.error').remove();
	                formCrudTTPE.find('.body:eq(' + newIndex + ') .error').removeClass('error');
	            }

	            formCrudTTPE.validate().settings.ignore = ':disabled,:hidden';
	            return formCrudTTPE.valid();
	        },
	        onStepChanged: function (event, currentIndex, priorIndex) {
	            setButtonWavesEffect(event);
	        },
	        onFinishing: function (event, currentIndex) {
	            // formCrudTTPE.validate().settings.ignore = ':disabled';
	            return formCrudTTPE.valid();
	        },
	        onFinished: function (event, currentIndex) {

	        	swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
			    }, function () {
			        setTimeout(function () {
			        	var data = $('.ff_transport_type').serializeArray();
			        	var url = $('.ff_transport_type').attr('action');
			        	$.post(url,data,function(res){

			        		if(res == 'Success Saving The Transport Type'){
			        			setTimeout(function(){
			        				swal("Success!", res, "success");
			        				location.reload();
			        			}, 2000);
			        		}else{
			        			setTimeout(function(){
			        				swal("Failed!", res, "error");
			        				location.reload();
			        			}, 2000);
			        		}
			        	});

			        }, 2000);
			    });
	        }
	    });

	    formCrudTTPE.validate({
	        highlight: function (input) {
	            $(input).parents('.form-line').addClass('error');
	        },
	        unhighlight: function (input) {
	            $(input).parents('.form-line').removeClass('error');
	        },
	        errorPlacement: function (error, element) {
	            $(element).parents('.form-group').append(error);
	        },
	        rules: {
	            'confirm': {
	                equalTo: '#password'
	            }
	        }
	    });


	    var formUPDTTPE = $('#wizard_with_validation4').show();
	    formUPDTTPE.steps({
	        headerTag: 'h3',
	        bodyTag: 'fieldset',
	        transitionEffect: 'slideLeft',
	        onInit: function (event, currentIndex) {
	            $.AdminBSB.input.activate();

	            //Set tab width
	            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
	            var tabCount = $tab.length;
	            $tab.css('width', (100 / tabCount) + '%');

	            //set button waves effect
	            setButtonWavesEffect(event);
	        },
	        onStepChanging: function (event, currentIndex, newIndex) {
	            if (currentIndex > newIndex) { return true; }

	            if (currentIndex < newIndex) {
	                formUPDTTPE.find('.body:eq(' + newIndex + ') label.error').remove();
	                formUPDTTPE.find('.body:eq(' + newIndex + ') .error').removeClass('error');
	            }

	            formUPDTTPE.validate().settings.ignore = ':disabled,:hidden';
	            return formUPDTTPE.valid();
	        },
	        onStepChanged: function (event, currentIndex, priorIndex) {
	            setButtonWavesEffect(event);
	        },
	        onFinishing: function (event, currentIndex) {
	            // formUPDTTPE.validate().settings.ignore = ':disabled';
	            return formUPDTTPE.valid();
	        },
	        onFinished: function (event, currentIndex) {

	        	swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
			    }, function () {
			        setTimeout(function () {
			        	var data = $('.ff_transport_type_edit').serializeArray();
			        	var url = $('.ff_transport_type_edit').attr('action');
			        	$.post(url,data,function(res){

			        		if(res == 'Success Updating The Transport Type'){
			        			setTimeout(function(){
			        				swal("Success!", res, "success");
			        				location.reload();
			        			}, 2000);
			        		}else{
			        			setTimeout(function(){
			        				swal("Failed!", res, "error");
			        				location.reload();
			        			}, 2000);
			        		}
			        	});

			        }, 2000);
			    });

	        }
	    });

	    formUPDTTPE.validate({
	        highlight: function (input) {
	            $(input).parents('.form-line').addClass('error');
	        },
	        unhighlight: function (input) {
	            $(input).parents('.form-line').removeClass('error');
	        },
	        errorPlacement: function (error, element) {
	            $(element).parents('.form-group').append(error);
	        },
	        rules: {
	            'confirm': {
	                equalTo: '#password'
	            }
	        }
	    });



	    // NEXT CRUD TRANSPORTATION
	    

	    var formINSVALID5 = $('#wizard_with_validation5').show();
	    formINSVALID5.steps({
	        headerTag: 'h3',
	        bodyTag: 'fieldset',
	        transitionEffect: 'slideLeft',
	        onInit: function (event, currentIndex) {
	            $.AdminBSB.input.activate();

	            //Set tab width
	            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
	            var tabCount = $tab.length;
	            $tab.css('width', (100 / tabCount) + '%');

	            //set button waves effect
	            setButtonWavesEffect(event);
	        },
	        onStepChanging: function (event, currentIndex, newIndex) {
	            if (currentIndex > newIndex) { return true; }

	            if (currentIndex < newIndex) {
	                formINSVALID5.find('.body:eq(' + newIndex + ') label.error').remove();
	                formINSVALID5.find('.body:eq(' + newIndex + ') .error').removeClass('error');
	            }

	            formINSVALID5.validate().settings.ignore = ':disabled,:hidden';
	            return formINSVALID5.valid();
	        },
	        onStepChanged: function (event, currentIndex, priorIndex) {
	            setButtonWavesEffect(event);
	        },
	        onFinishing: function (event, currentIndex) {
	            // formINSVALID5.validate().settings.ignore = ':disabled';
	            return formINSVALID5.valid();
	        },
	        onFinished: function (event, currentIndex) {

	        	swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
			    }, function () {
			        setTimeout(function () {
			        	var data = $('.ff_transportation').serializeArray();
			        	var url = $('.ff_transportation').attr('action');
			        	$.post(url,data,function(res){

			        		if(res == 'Success Inserting The Transportation'){
			        			setTimeout(function(){
			        				swal("Success!", res, "success");
			        				location.reload();
			        			}, 2000);
			        		}else{
			        			setTimeout(function(){
			        				swal("Failed!", res, "error");
			        				location.reload();
			        			}, 2000);
			        		}
			        	});

			        }, 2000);
			    });

	        }
	    });

	    formINSVALID5.validate({
	        highlight: function (input) {
	            $(input).parents('.form-line').addClass('error');
	        },
	        unhighlight: function (input) {
	            $(input).parents('.form-line').removeClass('error');
	        },
	        errorPlacement: function (error, element) {
	            $(element).parents('.form-group').append(error);
	        },
	        rules: {
	            'confirm': {
	                equalTo: '#password'
	            }
	        }
	    });



	    var formINSVALID6 = $('#wizard_with_validation6').show();
	    formINSVALID6.steps({
	        headerTag: 'h3',
	        bodyTag: 'fieldset',
	        transitionEffect: 'slideLeft',
	        onInit: function (event, currentIndex) {
	            $.AdminBSB.input.activate();

	            //Set tab width
	            var $tab = $(event.currentTarget).find('ul[role="tablist"] li');
	            var tabCount = $tab.length;
	            $tab.css('width', (100 / tabCount) + '%');

	            //set button waves effect
	            setButtonWavesEffect(event);
	        },
	        onStepChanging: function (event, currentIndex, newIndex) {
	            if (currentIndex > newIndex) { return true; }

	            if (currentIndex < newIndex) {
	                formINSVALID6.find('.body:eq(' + newIndex + ') label.error').remove();
	                formINSVALID6.find('.body:eq(' + newIndex + ') .error').removeClass('error');
	            }

	            formINSVALID6.validate().settings.ignore = ':disabled,:hidden';
	            return formINSVALID6.valid();
	        },
	        onStepChanged: function (event, currentIndex, priorIndex) {
	            setButtonWavesEffect(event);
	        },
	        onFinishing: function (event, currentIndex) {
	            // formINSVALID6.validate().settings.ignore = ':disabled';
	            return formINSVALID6.valid();
	        },
	        onFinished: function (event, currentIndex) {

	        	swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
			    }, function () {
			        setTimeout(function () {
			        	var data = $('.ff_transportation_edit').serializeArray();
			        	var url = $('.ff_transportation_edit').attr('action');
			        	$.post(url,data,function(res){

			        		if(res == 'Success Saving The Transportation'){
			        			setTimeout(function(){
			        				swal("Success!", res, "success");
			        				location.reload();
			        			}, 2000);
			        		}else{
			        			setTimeout(function(){
			        				swal("Failed!", res, "error");
			        				location.reload();
			        			}, 2000);
			        		}
			        	});

			        }, 2000);
			    });

	        }
	    });

	    formINSVALID6.validate({
	        highlight: function (input) {
	            $(input).parents('.form-line').addClass('error');
	        },
	        unhighlight: function (input) {
	            $(input).parents('.form-line').removeClass('error');
	        },
	        errorPlacement: function (error, element) {
	            $(element).parents('.form-group').append(error);
	        },
	        rules: {
	            'confirm': {
	                equalTo: '#password'
	            }
	        }
	    });


	});
</script>

<!-- END OF FORM VALIDATION -->


<!-- BEGIN MODAL -->

<script type="text/javascript">
$(function () {
	    $('.open_modal').on('click', function () {
	        var color = $(this).data('color');
	        $('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
	        $('#mdModal').modal('show');
	    });

	    $('.open_modalCustomer').on('click', function () {
	        var color = $(this).data('color');
	        $('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
	        $('#mdModal').modal('show');
	    });

	    $('.open_modalTransport').on('click', function () {
	        var color = $(this).data('color');
	        $('#mdModalTransport .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
	        $('#mdModalTransport').modal('show');
	    });
});
</script>

<!-- END OF JS MODAL -->

<script type="text/javascript">
	$(function(){

		$('#table_rute').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	});

    	$('#table_transport_type').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	});

    	$('#table_transportation').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	});

    	$('#table_transport').DataTable();
    	$('#table_transport_pick').DataTable({
    		"iDisplayLength" : 3,
    		"aLengthMenu" : [[3, 5, 10, 20, 30, 40, 100, -1],[3, 5, 10, 20, 30, 40, 100, "All"]]
    	});

		$('#btn-add-rute').click(function(){
			$('#form_add_rute').fadeOut();
			$('#form_add_rute').attr('hidden',false);
			$('#form_add_rute').fadeIn();
			$('#hold_data_rute').fadeOut();
			$('#hold_data_rute').attr('hidden',true);
		});

		$('#btn-close-rute').click(function(){
			$('#form_add_rute').fadeOut();
			$('#form_add_rute').attr('hidden',true);
			$('#form_add_rute').fadeOut();
			$('#hold_data_rute').fadeIn();
			$('#hold_data_rute').attr('hidden',false);
		});

		$('#btn-close-rute-edit').click(function(){
			$('#form_edit_rute').fadeOut();
			$('#form_edit_rute').attr('hidden',true);
			$('#form_edit_rute').fadeOut();
			$('#hold_data_rute').fadeIn();
			$('#hold_data_rute').attr('hidden',false);
		});

		$('#btn-reset-rute').click(function(){
			$('.form-control').val('');
		});

		$(".showListrute").on('click','tr',function(e){

			e.preventDefault();

			if($(this).text() == 'No data available in table'){
				swal("Failed!", "No Data Available To Be Selected", "error");
			}else{

			var kode = $(this).closest('tr').find('td:eq(0)').text();
			var rute_from = $(this).closest('tr').find('td:eq(1)').text();
			var rute_to = $(this).closest('tr').find('td:eq(2)').text();
			var time_depart = $(this).closest('tr').find('td:eq(3)').text();
			var time_arrive = $(this).closest('tr').find('td:eq(4)').text();
			var price = $(this).closest('tr').find('td:eq(5)').text();
			var transport_id = $(this).closest('tr').find('td:eq(6)').text();

			

			swal({
		        title: "Customize "+kode,
		        text: "Select whether you want to delete or maybe update your data",
		        type: "info",
		        showCancelButton: true,
		        confirmButtonColor: "#DD6B55",
		        confirmButtonText: "Update",
		        cancelButtonText: "Delete",
		        closeOnConfirm: false,
		        closeOnCancel: false
		    }, function (isConfirm) {
		        if (isConfirm) {
		            
		        	$('#form_edit_rute').fadeOut();
		        	$('#form_edit_rute').attr('hidden',false);
		        	$('#form_edit_rute').fadeIn();
		        	$('#hold_data_rute').fadeOut();
					$('#hold_data_rute').attr('hidden',true);

					swal("To The Moon!", "Continue Updating !.", "success");

					$('#edit_id').val(kode);
					$('#rute_from_edit').val(rute_from);
					$('#rute_to_edit').val(rute_to);
					$('#timeDepartEdit').val(time_depart);
					$('#timeArriveEdit').val(time_arrive);
					$('#price_edit').val(price);
					$('#transport_id_edit').val(transport_id);

		        } else {
		            // DELETE
		        		
		        		swal({
					        title: "Delete Your Data ?",
					        text: "You can't recover your data.",
					        type: "warning",
					        showCancelButton: true,
					        confirmButtonColor: "#DD6B55",
					        confirmButtonText: "Yes",
					        cancelButtonText: "No",
					        closeOnConfirm: false,
					        closeOnCancel: false
					    }, function (isConfirm) {
					        if (isConfirm) {
					            
					            swal({
							        title: "Second Confirmation",
							        text: "Are you sure about your data to be deleted ?",
							        type: "info",
							        showCancelButton: true,
							        closeOnConfirm: false,
							        showLoaderOnConfirm: true,
							    }, function () {
							        setTimeout(function () {
							        	var url = '{{ url("rute/delete") }}/'+kode;
							        	$.get(url,function(res){

							        		if(res == 'Success Deleting The Rute'){
							        			setTimeout(function(){
							        				swal("Success!", res, "success");
							        				location.reload();
							        			}, 2000);
							        		}else{
							        			setTimeout(function(){
							        				swal("Failed!", res, "error");
							        				location.reload();
							        			}, 2000);
							        		}
							        	});

							        }, 2000);
							    });

					        } else {
					            swal("Cancelled", "Your data is safe :)", "error");
					        }
					    });

		        	// DELETE
		        }
		    });

		   }

		});

		// $(".showListRute tr").dblclick(function(){

		// 	swal("Deleted!", "Your imaginary file has been deleted.", "success");

		// });


		// CRUD TRANSPORT TYPE

		$('#btn-add-transport_type').click(function(){
			$('#form_add_transport_type').fadeOut();
			$('#form_add_transport_type').attr('hidden',false);
			$('#form_add_transport_type').fadeIn();
			$('#hold_data_transport_type').fadeOut();
			$('#hold_data_transport_type').attr('hidden',true);
		});

		$('#btn-close-transport_type').click(function(){
			$('#form_add_transport_type').fadeOut();
			$('#form_add_transport_type').attr('hidden',true);
			$('#form_add_transport_type').fadeOut();
			$('#hold_data_transport_type').fadeIn();
			$('#hold_data_transport_type').attr('hidden',false);
		});

		$('#btn-close-transport_type-edit').click(function(){
			$('#form_edit_transport_type').fadeOut();
			$('#form_edit_transport_type').attr('hidden',true);
			$('#form_edit_transport_type').fadeOut();
			$('#hold_data_transport_type').fadeIn();
			$('#hold_data_transport_type').attr('hidden',false);
		});

		$('#btn-reset-transport_type').click(function(){
			$('.form-control').val('');
		});

		$('#showListTransport').on('click','tr',function(){
			var kode = $(this).closest('tr').find('td:eq(0)').text();
			$('#transport_id').val(kode);
			$("#transport_id_edit").val(kode);

			$('#mdModal').modal('hide');
		});

		$(".showListtransport_type").on('click','tr',function(){

			if($(this).text() == 'No data available in table'){
				swal("Failed!", "No Data Available To Be Selected", "error");
			}else{

			var kode = $(this).closest('tr').find('td:eq(0)').text();
			var description_edit = $(this).closest('tr').find('td:eq(1)').text();

			swal({
		        title: "Customize "+kode,
		        text: "Select whether you want to delete or maybe update your data",
		        type: "info",
		        showCancelButton: true,
		        confirmButtonColor: "#DD6B55",
		        confirmButtonText: "Update",
		        cancelButtonText: "Delete",
		        closeOnConfirm: false,
		        closeOnCancel: false
		    }, function (isConfirm) {
		        if (isConfirm) {
		            
		        	$('#form_edit_transport_type').fadeOut();
		        	$('#form_edit_transport_type').attr('hidden',false);
		        	$('#form_edit_transport_type').fadeIn();
		        	$('#hold_data_transport_type').fadeOut();
					$('#hold_data_transport_type').attr('hidden',true);

					swal("To The Moon!", "Continue Updating !.", "success");

					$('#id_edit_transport').val(kode);
					$('#description_edit').val(description_edit);
					

		        } else {
		            // DELETE
		        		
		        		swal({
					        title: "Delete Your Data ?",
					        text: "You can't recover your data.",
					        type: "warning",
					        showCancelButton: true,
					        confirmButtonColor: "#DD6B55",
					        confirmButtonText: "Yes",
					        cancelButtonText: "No",
					        closeOnConfirm: false,
					        closeOnCancel: false
					    }, function (isConfirm) {
					        if (isConfirm) {
					            
					            swal({
							        title: "Second Confirmation",
							        text: "Are you sure about your data to be deleted ?",
							        type: "info",
							        showCancelButton: true,
							        closeOnConfirm: false,
							        showLoaderOnConfirm: true,
							    }, function () {
							        setTimeout(function () {
							        	var url = '{{ url("transport_type/delete") }}/'+kode;
							        	$.get(url,function(res){

							        		if(res == 'Success Deleting The Transport Type'){
							        			setTimeout(function(){
							        				swal("Success!", res, "success");
							        				location.reload();
							        			}, 2000);
							        		}else{
							        			setTimeout(function(){
							        				swal("Failed!", res, "error");
							        				location.reload();
							        			}, 2000);
							        		}
							        	});

							        }, 2000);
							    });

					        } else {
					            swal("Cancelled", "Your data is safe :)", "error");
					        }
					    });

		        	// DELETE
		        }
		    });
		  }

		});

		// CRUD TRANSPORTATION
		
		var getQTYClose = '';

		$('#btn-add-transportation').click(function(){
			$('#form_add_transportation').fadeOut();
			$('#form_add_transportation').attr('hidden',false);
			$('#form_add_transportation').fadeIn();
			$('#hold_data_transportation').fadeOut();
			$('#hold_data_transportation').attr('hidden',true);
		});

		$('#btn-close-transportation').click(function(){
			$('#form_add_transportation').fadeOut();
			$('#form_add_transportation').attr('hidden',true);
			$('#form_add_transportation').fadeOut();
			$('#hold_data_transportation').fadeIn();
			$('#hold_data_transportation').attr('hidden',false);
		});

		$('#btn-close-transportation-edit').click(function(){
			$('#form_edit_transportation').fadeOut();
			$('#form_edit_transportation').attr('hidden',true);
			$('#form_edit_transportation').fadeOut();
			$('#hold_data_transportation').fadeIn();
			$('#hold_data_transportation').attr('hidden',false);
		});

		$('#btn-reset-transportation').click(function(){
			$('.form-control').val('');
		});

		$(".showListtransportation").on('click','tr',function(){

			if($(this).text() == 'No data available in table'){
				swal("Failed!", "No Data Available To Be Selected", "error");
			}else{

			var kode = $(this).closest('tr').find('td:eq(0)').text();
			var code = $(this).closest('tr').find('td:eq(1)').text();
			var description = $(this).closest('tr').find('td:eq(2)').text();
			var seatQTY = $(this).closest('tr').find('td:eq(3)').text();
			var transport_typeid = $(this).closest('tr').find('td:eq(4)').text();
			var transport_type = $(this).closest('tr').find('td:eq(5)').text();

			getQTYClose = seatQTY;
			$('#editProg').html(seatQTY+' Seats')

			swal({
		        title: "Customize "+kode,
		        text: "Select whether you want to delete or maybe update your data",
		        type: "info",
		        showCancelButton: true,
		        confirmButtonColor: "#DD6B55",
		        confirmButtonText: "Update",
		        cancelButtonText: "Delete",
		        closeOnConfirm: false,
		        closeOnCancel: false
		    }, function (isConfirm) {
		        if (isConfirm) {
		            
		        	$('#form_edit_transportation').fadeOut();
		        	$('#form_edit_transportation').attr('hidden',false);
		        	$('#form_edit_transportation').fadeIn();
		        	$('#hold_data_transportation').fadeOut();
					$('#hold_data_transportation').attr('hidden',true);

					swal("To The Moon!", "Continue Updating !.", "success");

					$('#transport_id_edit').val(kode);
					$('#code_edit').val(code);
					$('#description_edit').val(description);
					$('#valueSEAT_edit').val(seatQTY);
					$('#transport_type_id_edit').val(transport_typeid);
					

		        } else {
		            // DELETE
		        		
		        		swal({
					        title: "Delete Your Data ?",
					        text: "You can't recover your data.",
					        type: "warning",
					        showCancelButton: true,
					        confirmButtonColor: "#DD6B55",
					        confirmButtonText: "Yes",
					        cancelButtonText: "No",
					        closeOnConfirm: false,
					        closeOnCancel: false
					    }, function (isConfirm) {
					        if (isConfirm) {
					            
					            swal({
							        title: "Second Confirmation",
							        text: "Are you sure about your data to be deleted ?",
							        type: "info",
							        showCancelButton: true,
							        closeOnConfirm: false,
							        showLoaderOnConfirm: true,
							    }, function () {
							        setTimeout(function () {
							        	var url = '{{ url("transportation/delete") }}/'+kode;
							        	$.get(url,function(res){

							        		if(res == 'Success Deleting The Transportation'){
							        			setTimeout(function(){
							        				swal("Success!", res, "success");
							        				location.reload();
							        			}, 2000);
							        		}else{
							        			setTimeout(function(){
							        				swal("Failed!", res, "error");
							        				location.reload();
							        			}, 2000);
							        		}
							        	});

							        }, 2000);
							    });

					        } else {
					            swal("Cancelled", "Your data is safe :)", "error");
					        }
					    });

		        	// DELETE
		        }
		    });
		  }

		});

		$("#showListTransportType").on('click','tr',function(){
			
				var kode = $(this).closest('tr').find('td:eq(0)').text();
				$('#transport_type_id').val(kode);
				$('#transport_type_id_edit').val(kode);
				$('#mdModal').modal('hide');
			
		});

		$('.generateCode').click(function(){

			var url = '{{ url("getRandomCode") }}/12';
			$.get(url,function(res){
				$('#code').val(res);
				$('#code_edit').val(res);
			});

		});

		<?php
			if(Request::segment(2) == 'transportation'){
		?>

		var sliderBasic = document.getElementById('sliderQTY');
		    noUiSlider.create(sliderBasic, {
		        start: [4],
		        connect: 'lower',
		        step: 4,
		        range: {
		            'min': [4],
		            'max': [1000]
		        }
		    });
		    getNoUISliderValue(sliderBasic, true);

		function getNoUISliderValue(slider, percentage) {
		    slider.noUiSlider.on('update', function () {
		        var val = slider.noUiSlider.get();
		        if (percentage) {
		            val = parseInt(val);
		        }
		        $(slider).parent().find('span.js-nouislider-value').text(val+' Seats');
		        $('#valueSEAT').val(val);
		    });
		}


		var sliderBasic1 = document.getElementById('sliderQTY1');
		    noUiSlider.create(sliderBasic1, {
		        start: [getQTYClose],
		        connect: 'lower',
		        step: 4,
		        range: {
		            'min': [4],
		            'max': [1000]
		        }
		    });
		    getNoUISliderValue1(sliderBasic1, true);

		function getNoUISliderValue1(slider, percentage) {
		    slider.noUiSlider.on('update', function () {
		        var val = slider.noUiSlider.get();
		        if (percentage) {
		            val = parseInt(val);
		        }
		        $(slider).parent().find('span.js-nouislider-value').text(val+' Seats');
		        $('#valueSEAT_edit').val(val);
		    });
		}

		<?php } ?>

	});
</script>



<!-- TRANSACTION -->

<script type="text/javascript">
	
	$(function(){

		$("#cariRute").click(function(){
			var from = $('#depart_from').val();
			var to = $('#depart_to').val();
			var url = '{{ url("getRute") }}/'+from+'/'+to;
			$.get(url,function(res){
				$('#listTransportation_rute').html(res);
			});
		});

		
		<?php if(request::segment(1) == 'transaction' AND request::segment(2) == 'reserve' AND request::segment(3) == 'step_2'){ ?>
				$('.showSeatHere_final').show(function(){

					var url = '{{ url("getSeat") }}/'+'<?php echo $transport ?>'+'/'+'<?php echo $rute_id ?>';

						$.get(url,function(res){
							$('.showSeatHere_final').html(res);
						});
				});

				var seat_loc_code = '';
				var rute_loc_id = '';

				$('.showSeatHere_final').on('click','.seatLISTTick',function(){
					$('.iconFA').attr('class','content iconFA');
					var kode = $(this).closest('div').find('.number').text();
					$(this).closest('div').find('.content').attr('class','content bg-yellow iconFA');

					rute_loc_id = '<?php echo request::segment(5) ?>';
					seat_loc_code = kode;
					
					var urlNEXT = '{{ url("transaction/reserve/step_3") }}/'+rute_loc_id+'/'+seat_loc_code;

					$('.link_next_step').attr('href',urlNEXT);

				});


				$('.showSeatHere_final').on('click','.seatLISTTick_err',function(){
					var kode = $(this).closest('div').find('.number').text();
					var kode_reserve = $(this).closest('div').find('.reserve_id').text();
					
					var transport = $('#transport_id').val();
					var rute = $('#rute_id').val();

					$('#modalDetail').modal('show');
					$('#seat_id').html(kode);

					var url = '{{ url("getDataReserve") }}/'+kode_reserve;

					$.get(url,function(res){
					$('#showedRES').html(res);
					});

					$('#print_check').attr('href','{{ url("checkout_transaction") }}/'+kode_reserve);

				});

		<?php } ?>


				$('#identity_card_no').on('blur',function(){
					var identity = $(this).val();
					var url = '{{ url("getName") }}/'+identity;
					var url1 = '{{ url("getAddress") }}/'+identity;
					var url12 = '{{ url("getPhone") }}/'+identity;
					var url123 = '{{ url("getGender") }}/'+identity;
					$.get(url,function(res){
						$('#name').val(res);
					});

					$.get(url1,function(res){
						$('#address').val(res);
					});

					$.get(url12,function(res){
						$('#phone').val(res);
					});

					$.get(url123,function(res){
						$('#gender').val(res);
					});

				});

				$('.reserveDate').bootstrapMaterialDatePicker({
			        format: 'dddd DD MMMM YYYY',
			        clearButton: true,
			        weekStart: 1,
			        time: false
		    	});


		    	$('#confirm_save').click(function(){

					if($('#rute_id').val() == '' || $('#price').val() == '' || $('#reserve_code').val() == '' || $('#seat_code').val() == '' || $('#reserveData1').val() == '' || $('#identity_card_no').val() == '' || $('#name').val() == '' || $('#address').val() == '' || $('#phone').val() == '' || $('#gender').val() == ''){

						swal("To The Hell!", "Nothing to be saved!", "error");

					}else{

					swal({
					        title: "Confirmation",
					        text: "Are you sure about your data ?",
					        type: "info",
					        showCancelButton: true,
					        closeOnConfirm: false,
					        showLoaderOnConfirm: true,
					    }, function () {
					        setTimeout(function () {
					        	var data = $('#saveTransaction').serializeArray();
					        	var url = $('#saveTransaction').attr('action');
					        	$.post(url,data,function(res){

					        		
					        			setTimeout(function(){
					        				swal("Information!", "Loading.. Scroll up!", "info");
					        				$('#tootlt').html(res);

					        				$('#confirm_save').css({
					        					display: 'none'
					        				});

					        				var urlBack = '{{ url("transaction/reservation") }}';
					        				$('.backButton').css({
					        					display: 'block'
					        				});
					        				$('.backButton').attr('href',urlBack);
					        			}, 2000);
					        		
					        	});

					        }, 2000);
					    });
				}

				});


	});

</script>


<script type="text/javascript">
	
	$(function(){

		$('#table_customer').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	});

    	$('#table_transportation_report').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	});

    	$('#table_rute_report').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	});

    	$('#table_user').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	});


    	$('.userModal').on('click', function () {
	        var color = $(this).data('color');
	        $('#mdModalUser .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
	        $('#mdModalUser').modal('show');
	    });

	    $('.addUserModal').on('click', function () {
	        var color = $(this).data('color');
	        $('#mdModalUser_add .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
	        $('#mdModalUser_add').modal('show');
	    });

	    $('#save_user').click(function(e){
	    	e.preventDefault();

	    	if($('#username').val() == '' || $('#password').val() == '' || $('#c-password').val() == '' || $('#fullname').val() == '' || $('#level').val() == ''){
	    		swal("Error!", "Nothing to be Saved", "error");
	    	}else{

	    		if($('#c-password').val() != $('#password').val() || $('#password').val() != $('#c-password').val()){
	    			swal("Error!", "Password and Confirm password doesn't same", "error");
	    		}else{

	    			swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
				    }, function () {
				        setTimeout(function () {
				        	var data = $('#form_user').serializeArray();
				        	var url = $('#form_user').attr('action');
				        	$.post(url,data,function(res){

				        		if(res == 'Success Inserting New User'){
				        			setTimeout(function(){
				        				swal("Success!", res, "success");
				        				location.reload();
				        			}, 2000);
				        		}else{
				        			setTimeout(function(){
				        				swal("Failed!", res, "error");
				        				location.reload();
				        			}, 2000);
				        		}
				        	});

				        }, 2000);
				    });

	    		}

	    	}

	    });



	    $('#save_user_edit').click(function(e){
	    	e.preventDefault();

	    	if($('#username_edit').val() == '' || $('#password_edit').val() == '' || $('#c-password_edit').val() == '' || $('#fullname_edit').val() == '' || $('#level_edit').val() == ''){
	    		swal("Error!", "Nothing to be Saved", "error");
	    	}else{

	    		if($('#c-password_edit').val() != $('#password_edit').val() || $('#password_edit').val() != $('#c-password_edit').val()){
	    			swal("Error!", "Password and Confirm password doesn't same", "error");
	    		}else{

	    			swal({
			        title: "Confirmation",
			        text: "Are you sure about your data ?",
			        type: "info",
			        showCancelButton: true,
			        closeOnConfirm: false,
			        showLoaderOnConfirm: true,
				    }, function () {
				        setTimeout(function () {
				        	var data = $('#form_user_edit').serializeArray();
				        	var url = $('#form_user_edit').attr('action');
				        	$.post(url,data,function(res){

				        		if(res == 'Success Saving User'){
				        			setTimeout(function(){
				        				swal("Success!", res, "success");
				        				location.reload();
				        			}, 2000);
				        		}else{
				        			setTimeout(function(){
				        				swal("Failed!", res, "error");
				        				location.reload();
				        			}, 2000);
				        		}
				        	});

				        }, 2000);
				    });

	    		}

	    	}

	    });


	    $('#listUser').on('click','.edit_user',function(){

	    	var color = $(this).data('color');
	        $('#mdModalUser_edit .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
	        var kode = $(this).closest('tr').find('td:eq(0)').text();
	        var username = $(this).closest('tr').find('td:eq(1)').text();
	        var fullname = $(this).closest('tr').find('td:eq(2)').text();

	        $('#id_edit').val(kode);
	        $('#username_edit').val(username);
	        $('#fullname_edit').val(fullname);

	        $('#mdModalUser_edit').modal('show');

	    });

	    $('#listUser').on('click','.delete_user',function(){

	        var kode = $(this).closest('tr').find('td:eq(0)').text();
	        
	        swal({
					        title: "Delete user ?",
					        text: "You're about to delete user with ID "+kode+'.',
					        type: "warning",
					        showCancelButton: true,
					        confirmButtonColor: "#DD6B55",
					        confirmButtonText: "Yes",
					        cancelButtonText: "No",
					        closeOnConfirm: false,
					        closeOnCancel: false
					    }, function (isConfirm) {
					        if (isConfirm) {
					            
					            swal({
							        title: "Second Confirmation",
							        text: "Are you sure ?",
							        type: "info",
							        showCancelButton: true,
							        closeOnConfirm: false,
							        showLoaderOnConfirm: true,
							    }, function () {
							        setTimeout(function () {
							        	var url = '{{ url("deleteUser") }}/'+kode;
							        	$.get(url,function(res){

							        		if(res == 'Success Deleting User'){
							        			setTimeout(function(){
							        				swal("Success!", res, "success");
							        				location.reload();
							        			}, 2000);
							        		}else{
							        			setTimeout(function(){
							        				swal("Failed!", res, "error");
							        				location.reload();
							        			}, 2000);
							        		}
							        	});

							        }, 2000);
							    });

					        } else {
					            swal("Cancelled", "Your data is safe :)", "error");
					        }
					    });

	    });



	});

</script>


<script type="text/javascript">

  <?php
    if(!empty(Request::Segment(1))){

    }else{
  ?>

  new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'lineCahrt',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
                      data: [
                            <?php
                            $data = \App\HomeModel::getEarning();
                            foreach($data as $row): ?>
                                { y: '<?php echo $row->payment_date; ?>', a: '<?php echo $row->payment ?>'},
                            <?php endforeach?>
                        ],
                        xkey: 'y',
                        ykeys: ['a'],
                        labels: ['Earn Rp.'],
                        resize: true,
                        hideHover: true,
                        xLabels: 'day',
                        gridTextSize: '10px',
                        lineColors: ['#1caf9a','#33414E'],
                        gridLineColor: '#E5E5E5'
});

  <?php } ?>
</script>