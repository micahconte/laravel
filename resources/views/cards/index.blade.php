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
            		<div id="cards-content">
                        <div>
                            <img id='deck' src='img/deck.png' alt='' />&nbsp;
                            <div id='nextCardDiv'>
                                <img id='nextCard' src='' alt=''/>
                            </div>
                        </div>

                        <div>
                            <img id='card_0' src='' alt='' />&nbsp;
                            <img id='card_1' src='' alt='' />&nbsp;
                            <img id='card_2' src='' alt='' />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection