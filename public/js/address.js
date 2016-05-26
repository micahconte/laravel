$(document).ready(function(){
	$("#address-datatable").DataTable({
        "info":   	  false,
        "paging": 	  false,        
        "processing": false,
        "serverSide": true,
        // "ordering":   false,
        "ajax": 	  "/addresstable"
	});

	$("#addaddress").on("click", function(){
		clearModal();
	});

	$("#address-submit").on("click", function(){
		var urlPath = "/address";
		if($('#address-id').val() != '')
			urlPath += "/"+$('#address-id').val();
		
		$.ajax({
			type: "POST",
			url: urlPath,
			dataType: 'json',
			data: {
				address: $('#address-address').val(),
				city: $('#address-city').val(),
				state: $('#address-state').val(),
				zip: $('#address-zip').val(),
				_token: $('#token').val()
			},
			success:function(data,status,jqxhr){
					$(".dataTables_empty").parent().hide();// hide empty result td
					console.log(data);
					if($('#address-id').val() != '')
					{
						$('#address-'+data.id).parents('tr').html(
							addressRow({
									address: data.address,
									city: data.city,
									state: data.state,
									zip: data.zip,
									token: $('#token').val(),

									id: data.id
							})
						);//replace existing row if updating
					}
					else
					{
						$('#address-datatable tbody').append("<tr>"+
							addressRow({
								address: data.address,
								city: data.city,
								state: data.state,
								zip: data.zip,
								token: $('#token').val(),
								
								id: data.id

							})+"</tr>"
						);//add new row if creating
					}
					clearModal();
					$('.close').click();
			},
			error:function(data,status,jqxhr){
				var message = '';
				if(data.status != 200 && data.status != 403 && data.status != 500)
				{
					var errors = $.parseJSON(data.responseText);
					for(error in errors){
						message += errors[error][0]+'<br>';
					}
				}
				else
					message = data.responseText;
				$('#alert-messages').html('<div class="alert alert-danger">'+message+'</div>');
			}

		});
	});

	$("#address-datatable").on("click", ".address-edit", function(){
		$.ajax({
			type: "GET",
			url: "/address/"+$(this).data('addressId'),
			dataType: 'json',
			data: {
				_token: $('#token').val(),
			},
			success:function(data,status,jqxhr){
				clearModal();
				$('#address-address').val(data.address);
				$('#address-city').val(data.city);
				$('#address-state').val(data.state);
				$('#address-id').val(data.id);

			},
			error:function(data,status,jqxhr){
				var message = '';
				if(data.status != 200)
				{
					var errors = $.parseJSON(data.responseText);
					for(error in errors){
						message += errors[error][0]+'<br>';
					}
				}
				else
					message = data.responseText;
				$('#alert-messages').html('<div class="alert alert-danger">'+message+'</div>');
			}

		});
	});

	$("#address-datatable").on("click", ".address-delete", function(){

	    if (confirm("Do you really want to delete?")){
			$.ajax({
				type: "DELETE",
				url: "/address/"+$(this).data('addressId'),
				dataType: 'json',
				data: {
					_token: $('#token').val(),
				}
			});
			$(this).parents('tr').addClass('hide');
	    }
	});


	function addressRow(data)
	{
		return "<td class='table-text'><div>"+data.address+"</div></td><td class='table-text'><div>"+data.city+"</div></td><td class='table-text'><div>"+data.state+"</div></td><td class='table-text'><div>"+data.zip+"</div></td><td><button type='button' data-toggle='modal' data-target='#myModal' id='address-"+data.id+"' data-address-id='"+data.id+"' class='address-edit btn btn-warning'> Edit </button></td><td><button type='button' class='address-delete btn btn-danger' data-address-id='"+data.id+"'><i class='fa fa-trash'></i> Delete </button></td>";

	}
	function clearModal()
	{
		$('#address-address').val('');
		$('#address-city').val('');
		$('#address-state').val('');
		$('#address-id').val('');

		$('#alert-messages').html('');
	}

});