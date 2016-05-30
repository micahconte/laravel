<!-- views/roles/index -->

@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					User Roles
				</div>
				<div class="panel-body">
					<div class="col-sm-10 col-sm-offset-2">
						<table id="roles-data" class="table table-striped">
							<thead>
								<tr>
									<td>User</td>
									<td>Admin</td>
								</tr>
							</thead>
							<tbody>
								@if(!empty($users))
									@foreach($users as $user)
									<tr>
										<td><label for="role-checkbox-{{ $user->role_id }}" class="control-label">{{ $user->user_name }}</label></td>
										<td><input type="checkbox" id="role-checkbox-{{ $user->user_id }}" data-user-id="{{ $user->user_id }}" data-role-id="{{ $user->role_id }}" data-role-name="admin" class="user_role_admin" {{ $user->role_name == 'admin' ? 'checked' : '' }} /></td>
									</tr>
									@endforeach
								@endif
							</tbody>
						</table>
						<input type="hidden" id="token" value="{{ csrf_token() }}"
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection