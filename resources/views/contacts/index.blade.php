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
                                      <h4 class="modal-title">Add Contact</h4>
                                    </div>
                                    <div class="modal-body">
                                                            <!-- Display validation errors -->
                                        @include('common.errors')

                                        <!-- New Task Form -->
                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/contacts') }}">
                                            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                                            <div id="form-div">
                                                <div class="form-group">
                                                    <label for="contact-name" class="col-sm-3 control-label">Name</label>

                                                    <div class="col-sm-6">
                                                        <input type="text" name="name" id="contact-name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="contact-surname" class="col-sm-3 control-label">Surname</label>

                                                    <div class="col-sm-6">
                                                        <input type="text" name="surname" id="contact-surname" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="contact-phone" class="col-sm-3 control-label">Phone</label>

                                                    <div class="col-sm-6">
                                                        <input type="text" name="phone" id="contact-phone" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="contact-email" class="col-sm-3 control-label">Email</label>

                                                    <div class="col-sm-6">
                                                        <input type="text" name="email" id="contact-email" class="form-control">
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <button type="button" data-custom-id="1" class="addField btn btn-default pull-left"><i class="fa fa-plus"></i></buttton>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- custom fields -->
                                            <div class="form-group hide">
                                                <div class="col-sm-offset-3 col-sm-6">
                                                    <input type="text" name="custom1" id="contact-custom1" class="form-control">
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="button" data-custom-id="2" class="addField btn btn-default pull-left"><i class="fa fa-plus"></i></buttton>
                                                    <button type="button" data-custom-id="1" class="hideField btn btn-default pull-left"><i class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="form-group hide">
                                                <div class="col-sm-offset-3 col-sm-6">
                                                    <input type="text" name="custom2" id="contact-custom2" class="form-control">
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="button" data-custom-id="3" class="addField btn btn-default pull-left"><i class="fa fa-plus"></i></buttton>
                                                    <button type="button" data-custom-id="2" class="hideField btn btn-default pull-left"><i class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="form-group hide">
                                                <div class="col-sm-offset-3 col-sm-6">
                                                    <input type="text" name="custom3" id="contact-custom3" class="form-control">
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="button" data-custom-id="4" class="addField btn btn-default pull-left"><i class="fa fa-plus"></i></buttton>
                                                    <button type="button" data-custom-id="3" class="hideField btn btn-default pull-left"><i class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="form-group hide">
                                                <div class="col-sm-offset-3 col-sm-6">
                                                    <input type="text" name="custom4" id="contact-custom4" class="form-control">
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="button" data-custom-id="5" class="addField btn btn-default pull-left"><i class="fa fa-plus"></i></buttton>
                                                    <button type="button" data-custom-id="4" class="hideField btn btn-default pull-left"><i class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="form-group hide">
                                                <div class="col-sm-offset-3 col-sm-6">
                                                    <input type="text" name="custom5" id="contact-custom5" class="form-control">
                                                </div>
                                                <div class="col-sm-2">
                                                    <button type="button" data-custom-id="5" class="hideField btn btn-default pull-left"><i class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <!-- end:custom fields -->

                                            <div class="modal-footer">
                                              <button type="button" id="contact-submit" class="btn btn-default">Save</button>
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                            <input type="hidden" name="id" id="contact-id" />
                                        </form>
                                    </div>
                                </div><!-- end:Modal content-->
                              
                            </div>
                        </div><!-- end:Modal -->

                        <!-- Add Contact Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-0 col-sm-12">
                                <button type="button" id="addContact" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Contact</button>
                                
                            </div>
                        </div>

                </div>

                <!-- TODO: Current Tasks -->

                    <div class="row">
                        <div class="col-md-12">
                        	<div class="panel panel-default">
                        		<div class="panel-heading">
                        			Contacts
                        		</div>

                        		<div class="panel-body">
                        			<table id="contact-datatable" class="table table-striped contact-table">

                        				<!-- Table Heading -->
                        				<thead>
                                            <tr>
                        					   <th>Name</th>
                                               <th>Surname</th>
                                               <th>Phone</th>
                                               <th>Email</th>
                                               <th>&nbsp;</th>
                                               <th>&nbsp;</th>
                                            </tr>
                        				</thead>

                        				<!-- Table Body -->
                        				<tbody>
                        					@foreach ($contacts as $contact)
                        						<tr>
                        							<!-- Contact Name -->
                                                    <td class="table-text">
                                                        <div>{{ $contact->name }}</div>
                                                    </td>
                                                    <td class="table-text">
                                                        <div>{{ $contact->surname }}</div>
                                                    </td>
                                                    <td class="table-text">
                                                        <div>{{ $contact->phone }}</div>
                                                    </td>
                                                    <td class="table-text">
                                                        <div>{{ $contact->email }}</div>
                                                    </td>
                                                    <td>
                                                        <button type="button" id="contact-{{ $contact->id }}" data-contact-id="{{ $contact->id }}" data-toggle="modal" data-target="#myModal" class="contact-edit btn btn-warning">Edit</button>
                                                    </td>
                        							<td>
                                                        <button type="button" class="contact-delete btn btn-danger" data-contact-id="{{ $contact->id }}">
                        									<i class="fa fa-trash"></i> Delete
                        								</button>
                        							</td>
                        						</tr>
                        					@endforeach
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