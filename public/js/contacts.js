$(document).ready(function(){
	$("#contact-datatable").DataTable({
        "info":   false,
        "paging": false
	});

	$(".modal-body").on("click", ".hideField", function(){
		var customId = $(this).data("customId");
		$("#contact-customName"+customId).val('');
		$("#contact-customValue"+customId).val('');
		$(this).parents('.form-group').addClass('hide');
	});

	$(".modal-body").on("click", ".addField", function(){
		$("#contact-customValue"+$(this).data("customId")).parents('.form-group').removeClass('hide');
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
				custom1: $('#contact-customName1').val()+":"+$('#contact-customValue1').val(),
				custom2: $('#contact-customName2').val()+":"+$('#contact-customValue2').val(),
				custom3: $('#contact-customName3').val()+":"+$('#contact-customValue3').val(),
				custom4: $('#contact-customName4').val()+":"+$('#contact-customValue4').val(),
				custom5: $('#contact-customName5').val()+":"+$('#contact-customValue5').val(),
				_token: $('#token').val()
			},
			success:function(data,status,jqxhr){
					$(".dataTables_empty").parent().hide();// hide empty result td
					
					if($('#contact-id').val() != '')
						$('#contact-'+data.id).parents('tr').html(
							contactRow({
									name: $('#contact-name').val(),
									surname: $('#contact-surname').val(),
									phone: $('#contact-phone').val(),
									email: $('#contact-email').val(),
									token: $('#token').val(),

									customName1: $('#contact-customName1').val(),
									customName2: $('#contact-customName2').val(),
									customName3: $('#contact-customName3').val(),
									customName4: $('#contact-customName4').val(),
									customName5: $('#contact-customName5').val(),
									customValue1: $('#contact-customValue1').val(),
									customValue2: $('#contact-customValue2').val(),
									customValue3: $('#contact-customValue3').val(),
									customValue4: $('#contact-customValue4').val(),
									customValue5: $('#contact-customValue5').val(),
				
									id: data.id
							})
						);//replace existing row if updating
					else
						$('#contact-datatable tbody').append("<tr>"+
							contactRow({
								name: $('#contact-name').val(),
								surname: $('#contact-surname').val(),
								phone: $('#contact-phone').val(),
								email: $('#contact-email').val(),
								token: $('#token').val(),
									
								customName1: $('#contact-customName1').val(),
								customName2: $('#contact-customName2').val(),
								customName3: $('#contact-customName3').val(),
								customName4: $('#contact-customName4').val(),
								customName5: $('#contact-customName5').val(),
								customValue1: $('#contact-customValue1').val(),
								customValue2: $('#contact-customValue2').val(),
								customValue3: $('#contact-customValue3').val(),
								customValue4: $('#contact-customValue4').val(),
								customValue5: $('#contact-customValue5').val(),

								id: data.id

							})+"</tr>"
						);//add new row if creating
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
					if(data['custom'+i] != ':' && data['custom'+i] != '')
					{
						var custom = data['custom'+i].split(':');

						$("#contact-customValue"+i).parents('.form-group').removeClass('hide');
						$('#contact-customName'+i).val(custom[0]);
						$('#contact-customValue'+i).val(custom[1]);
					}
					else
						$("#contact-customValue"+i).parents('.form-group').addClass('hide');
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

	function contactRow(data)
	{
		return "<td class='table-text'><div>"+data.name+"</div></td><td class='table-text'><div>"+data.surname+"</div></td><td class='table-text'><div>"+data.phone+"</div></td><td class='table-text'><div>"+data.email+"</div></td><td><button type='button' data-toggle='modal' data-target='#myModal' id='contact-"+data.id+"' data-contact-id='"+data.id+"' class='contact-edit btn btn-warning'> Edit </button></td><td><form action='/contacts/"+data.id+"' method='POST'><input type='hidden' name='_token' value='"+data.token+"'><input type='hidden' name='_method' value='DELETE'><button type='submit' class='btn btn-danger'><i class='fa fa-trash'></i> Delete </button></form></td>";

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
			$('#contact-customName'+i).val('');
			$('#contact-customValue'+i).val('');
			$('#contact-customValue'+i).parents('.form-group').addClass('hide');
		}

		$('#alert-messages').html('');
	}

});