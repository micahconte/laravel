<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')

	<!-- Bootstrap Boilerplate -->

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
            	<div class="panel-body">
                         
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                            
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Address</h4>
                                    </div>
                                    <div class="modal-body">
                                                            <!-- Display validation errors -->
                                        @include('common.errors')

                                        <!-- New Task Form -->
                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/address') }}">
                                            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                                            <div id="form-div">
                                                <div class="form-group">
                                                    <label for="address-address" class="col-sm-3 control-label">Address</label>

                                                    <div class="col-sm-6">
                                                        <input type="text" name="address" id="address-address" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address-city" class="col-sm-3 control-label">City</label>

                                                    <div class="col-sm-6">
                                                        <input type="text" name="city" id="address-city" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address-state" class="col-sm-3 control-label">State</label>

                                                    <div class="col-sm-6">
                                                        <select name="state" id="address-state" class="form-control" required>
                                                        @foreach($states as $state => $abb)
                                                            <option value="{{ $abb }}">{{ $state }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                              <button type="button" id="address-submit" class="btn btn-default">Save</button>
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                            <input type="hidden" name="id" id="address-id" />
                                        </form>
                                    </div>
                                </div><!-- end:Modal content-->
                            </div>
                        </div><!-- end:Modal -->

                        <!-- Add address Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-0 col-sm-12">
                                <button type="button" id="addaddress" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Address</button>
                                
                            </div>
                        </div>

                </div>

                    <div class="row">
                        <div class="col-md-12">
                        	<div class="panel panel-default">
                        		<div class="panel-heading">
                        			Address
                        		</div>

                        		<div class="panel-body">
                        			<table id="address-datatable" class="table table-striped address-table">

                        				<!-- Table Heading -->
                        				<thead>
                                            <tr>
                        					   <th>Address</th>
                                               <th>City</th>
                                               <th>State</th>
                                               <th>Zip</th>
                                               <th>&nbsp;</th>
                                               <th>&nbsp;</th>
                                            </tr>
                        				</thead>

                        				<!-- Table Body -->
                        				<tbody>
                        				</tbody>
                        			</table>
                        		</div>
                        	</div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection