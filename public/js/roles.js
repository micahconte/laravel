$(document).ready(function(){

	$('.user_role_admin').on('change', function(){

		var $this = $(this);
		user_id = $this.data('userId');
		role = $this.data('roleName');
		id = $this.data('roleId');
		token = $('#token').val();

		if($(this).is(":checked"))
		{
			$.ajax({
				url: '/roles',
				method: 'post',
				dataType: 'json',
				data:{
					user: user_id,
					role: role,
					id: id,
					_token: token
				},
				success: function(data, status)
				{
					// console.log(data)
				},
				error: function(data, status, jqxhr)
				{
					// console.log(data.responseText);
				}
			});
		}
		else
		{
			$.ajax({
				url: '/roles/'+id,
				method: 'delete',
				dataType: 'json',
				data: {
					user_id: user_id,
					role: role,
					id: id,
					_token: token
				},
				success: function(data, status)
				{
					// console.log(data)
				},
				error: function(data, status, jqxhr)
				{
					// console.log(data.responseText);
				}
			})
		}
	});
});