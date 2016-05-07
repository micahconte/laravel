$(document).ready(function(){
	$("#contact-datatable").DataTable({
        "info":   false,
        "paging": false,        
        "processing": true,
        "serverSide": true,
        "ajax": "/datatable"
	});

	$(".modal-body").on("click", ".hideField", function(){
		var customId = $(this).data("customId");
		$("#contact-custom"+customId).val('');
		$(this).parents('.form-group').addClass('hide');
	});

	$(".modal-body").on("click", ".addField", function(){
		$("#contact-custom"+$(this).data("customId")).parents('.form-group').removeClass('hide');
	});

	$("#addContact").on("click", function(){
		clearModal();
	});

	$("#contact-submit").on("click", function(){
		var urlPath = "/contacts";
		if($('#contact-id').val() != '')
			urlPath += "/"+$('#contact-id').val();
		
		$.ajax({
			type: "POST",
			url: urlPath,
			dataType: 'json',
			data: {
				name: $('#contact-name').val(),
				surname: $('#contact-surname').val(),
				phone: $('#contact-phone').val(),
				email: $('#contact-email').val(),
				custom1: $('#contact-custom1').val(),
				custom2: $('#contact-custom2').val(),
				custom3: $('#contact-custom3').val(),
				custom4: $('#contact-custom4').val(),
				custom5: $('#contact-custom5').val(),
				_token: $('#token').val()
			},
			success:function(data,status,jqxhr){
					$(".dataTables_empty").parent().hide();// hide empty result td
					
					if($('#contact-id').val() != '')
					{
						$('#contact-'+data.id).parents('tr').html(
							contactRow({
									name: $('#contact-name').val(),
									surname: $('#contact-surname').val(),
									phone: $('#contact-phone').val(),
									email: $('#contact-email').val(),
									token: $('#token').val(),

									custom1: $('#contact-custom1').val(),
									custom2: $('#contact-custom2').val(),
									custom3: $('#contact-custom3').val(),
									custom4: $('#contact-custom4').val(),
									custom5: $('#contact-custom5').val(),
				
									id: data.id
							})
						);//replace existing row if updating
						updateCampaignContact(data.id);
					}
					else
					{
						$('#contact-datatable tbody').append("<tr>"+
							contactRow({
								name: $('#contact-name').val(),
								surname: $('#contact-surname').val(),
								phone: $('#contact-phone').val(),
								email: $('#contact-email').val(),
								token: $('#token').val(),
									
								custom1: $('#contact-custom1').val(),
								custom2: $('#contact-custom2').val(),
								custom3: $('#contact-custom3').val(),
								custom4: $('#contact-custom4').val(),
								custom5: $('#contact-custom5').val(),

								id: data.id

							})+"</tr>"
						);//add new row if creating

						addCampaignContact(data.id);
					}
					clearModal();
					$('.close').click();
			},
			error:function(data,status,jqxhr){
				var errors = $.parseJSON(data.responseText);
				var message = '';
				for(error in errors){
					message += errors[error][0]+'<br>';
				}
				$('#alert-messages').html('<div class="alert alert-danger">'+message+'</div>');
			}

		});
	});

	$("#contact-datatable").on("click", ".contact-edit", function(){
		$.ajax({
			type: "GET",
			url: "/contacts/"+$(this).data('contactId'),
			dataType: 'json',
			data: {
				_token: $('#token').val(),
			},
			success:function(data,status,jqxhr){
				clearModal();
				$('#contact-name').val(data.name);
				$('#contact-surname').val(data.surname);
				$('#contact-phone').val(data.phone);
				$('#contact-email').val(data.email);
				$('#contact-id').val(data.id);


				for(var i=1;i<6;i++)
				{
					if('' != data['custom'+i])
					{
						var custom = data['custom'+i];

						$("#contact-custom"+i).parents('.form-group').removeClass('hide');
						$('#contact-custom'+i).val(custom);
					}
					else
						$("#contact-custom"+i).parents('.form-group').addClass('hide');
				}
			},
			error:function(data,status,jqxhr){
				var errors = $.parseJSON(data.responseText);
				var message = '';
				for(error in errors){
					message += errors[error][0]+'<br>';
				}
				$('#alert-messages').html('<div class="alert alert-danger">'+message+'</div>');
			}

		});
	});

	$("#contact-datatable").on("click", ".contact-delete", function(){

	    if (confirm("Do you really want to delete?")){
			$.ajax({
				type: "DELETE",
				url: "/contacts/"+$(this).data('contactId'),
				dataType: 'json',
				data: {
					_token: $('#token').val(),
				},
			});
			$(this).parents('tr').addClass('hide');
	    }
	});

	function addCampaignContact(id)
	{
		$.ajax({
			type: "GET",
			url: "/campaign/contact/"+id,
			dataType: 'json',
			data: {
				_token: $('#token').val(),
			},
			success:function(data,status,jqxhr){
				// console.log(data);
			},
			error:function(data,status,jqxhr){
				// console.log(data);
			}
		});
	}
	function updateCampaignContact(id)
	{
		$.ajax({
			type: "POST",
			url: "/campaign/contact/"+id,
			dataType: 'json',
			data: {
				_token: $('#token').val(),
			},
			success:function(data,status,jqxhr){
				// console.log(data);
			},
			error:function(data,status,jqxhr){
				// console.log(data);
			}
		});
	}

	function contactRow(data)
	{
		return "<td class='table-text'><div>"+data.name+"</div></td><td class='table-text'><div>"+data.surname+"</div></td><td class='table-text'><div>"+data.phone+"</div></td><td class='table-text'><div>"+data.email+"</div></td><td><button type='button' data-toggle='modal' data-target='#myModal' id='contact-"+data.id+"' data-contact-id='"+data.id+"' class='contact-edit btn btn-warning'> Edit </button></td><td><button type='button' class='contact-delete btn btn-danger' data-contact-id='"+data.id+"'><i class='fa fa-trash'></i> Delete </button></td>";

	}
	function clearModal()
	{
		$('#contact-name').val('');
		$('#contact-surname').val('');
		$('#contact-phone').val('');
		$('#contact-email').val('');
		$('#contact-id').val('');

		for(var i=1;i<6;i++)
		{
			$('#contact-custom'+i).val('');
			$('#contact-custom'+i).parents('.form-group').addClass('hide');
		}

		$('#alert-messages').html('');
	}

});