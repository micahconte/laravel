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
										<td><input type="checkbox" id="role-checkbox-{{ $user->user_id }}" data-user-id="{{ $user->user_id }}" data-role-id="{{ $role->id }}" data-user-role-id="{{ $user->user_role_id }}" class="user_role_admin" {{ $user->user_role_id ? 'checked' : '' }} /></td>
									</tr>
									@endforeach
								@endif
							</tbody>
						</table>
						<input type="hidden" id="token" value="{{ csrf_token() }}" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="{{ url('/js/roles.js') }}"></script>
@endsection