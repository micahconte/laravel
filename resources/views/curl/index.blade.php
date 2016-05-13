<!-- resources/views/curl/index.blade.php -->

@extends('layouts.app')

@section('content')

	<!-- Bootstrap Boilerplate -->

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            	<div class="panel-body">
            		<!-- Display validation errors -->
            		@include('common.errors')

            		<!-- New Task Form -->
            		<form class="form-horizontal" role="form" method="POST" action="{{ url('/curl') }}">
            			{!! csrf_field() !!}
<!--
                        <div class="form-group">
                            <div class="row">
                                <label for="url" class="col-sm-3 control-label">Url</label>
                                <div class="col-sm-6">
                                    <input type="text" name="url" id="url" class="form-control">
                                </div>
                            </div>
                        </div>
-->
            			<!-- Task Name -->
                        <div class="form-group">
                            <div class="row">
                                <label for="name" class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-6">
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <label for="email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="text" name="email" id="email" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <label for="phone" class="col-sm-3 control-label">Phone</label>
                                <div class="col-sm-6">
                                    <input type="text" name="phone" id="phone" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <label for="result" class="col-sm-3 control-label">Result</label>
                                <div class="col-sm-6">
                                    <textarea type="text" name="result" id="result" class="form-control" rows="20">@if(isset($result)){{ $result }}@endif</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Add Send Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa "></i> SEND
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection