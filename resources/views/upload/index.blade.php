<!-- resources/views/upload/index.blade.php -->

@extends('layouts.app')

@section('content')

	<!-- Bootstrap Boilerplate -->

<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-3">
            <div class="panel panel-default">
            	<div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                        	<div class="panel panel-default">
                        		<div class="panel-heading">
                        			Excel Upload
                        		</div>

                        		<div class="panel-body">
			            		@include('common.errors')

			            		<form method="post" enctype="multipart/form-data">
			            			<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-div">
										<div class='form_group'>
											<div class="col-sm-6">
												<input type="file" id="excel" name="doc" class="form-control" required="true" />
											</div>
										</div>
										<div class='form_group'>
											<div class="col-sm-3">
												<button type="submit" class="form-control">Submit</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
            	<div class="panel-body">
					@if($image)
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<img src='{{ $image }}' />
								</div>
							</div>
						</div>
					</div>
					@endif
            	</div>
            </div>
        </div>
    </div>
</div>

@endsection