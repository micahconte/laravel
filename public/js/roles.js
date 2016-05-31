$(document).ready(function(){

	$('.user_role_admin').on('change', function(){

		var $this = $(this);
		user_id = $this.data('userId');
		user_role_id = $this.data('userRoleId');
		role_id = $this.data('roleId');
		token = $('#token').val();

		if($(this).is(":checked"))
		{
			$.ajax({
				url: '/roles',
				method: 'post',
				dataType: 'json',
				data:{
					user_id: user_id,
					role_id: role_id,
					_token: token
				},
				success: function(data, status)
				{
					$this.data('userRoleId', data.id);
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
				url: '/roles/'+ user_role_id,
				method: 'delete',
				dataType: 'json',
				data: {
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