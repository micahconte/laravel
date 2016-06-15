<!-- views/rpn/index -->

@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-3 col-sm-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					Reverse Polish Notation
				</div>
            	<div class="panel-body" ng-app="myApp" ng-controller="myCtrl">
					<table class="col-sm-offset-2">
						<thead>
							<tr>
								<td colspan="4">
									<input type="text" ng-model="addMe" id="calc" class="form-control text-right" disabled/>
								</td>
							</tr>
							<tr><td colspan="4">&nbsp;</td></tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<input type="button" ng-click="appendNumber(1)" class="btn btn-default number" id="one" value="1"/>
								</td>
								<td>
									<input type="button" ng-click="appendNumber(2)" class="btn btn-default number" id="two" value="2"/>
								</td>
								<td>
									<input type="button" ng-click="appendNumber(3)" class="btn btn-default number" id="three" value="3"/>
								</td>
								<td>
									<input type="button" ng-click="math('x')" class="btn btn-default math" id="multiply" value="x"/>
								</td>
							</tr>
							<tr>
								<td>
									<input type="button" ng-click="appendNumber(4)" class="btn btn-default number" id="four" value="4"/>
								</td>
								<td>
									<input type="button" ng-click="appendNumber(5)" class="btn btn-default number" id="five" value="5"/>
								</td>
								<td>
									<input type="button" ng-click="appendNumber(6)" class="btn btn-default number" id="six" value="6"/>
								</td>
								<td>
									<input type="button" ng-click="math('/')" class="btn btn-default math" id="divide" value="/&nbsp;"/>
								</td>
							</tr>
							<tr>
								<td>
									<input type="button" ng-click="appendNumber(7)" class="btn btn-default number" id="seven" value="7"/>
								</td>
								<td>
									<input type="button" ng-click="appendNumber(8)" class="btn btn-default number" id="eight" value="8"/>
								</td>
								<td>
									<input type="button" ng-click="appendNumber(9)" class="btn btn-default number" id="nine" value="9"/>
								</td>
								<td>
									<input type="button" ng-click="math('+')" class="btn btn-default math" id="plus" value="+"/>
								</td>
							</tr>
							<tr>
								<td>
									<input type="button" ng-click="appendNumber(0)" class="btn btn-default number" id="zero" value="0"/>
								</td>
								<td>
									<input type="button" ng-click="appendNumber('.')" class="btn btn-default number" id="dot" value="&nbsp;."/>
								</td>
								<td>
									<input type="button" ng-click="negate()" class="btn btn-default math" id="neg" value="+/-"/>
								</td>
								<td>
									<input type="button" ng-click="math('-')" class="btn btn-default math" id="minus" value="-&nbsp;"/>
								</td>
							</tr>
							<tr><td colspan="4">&nbsp;</td></tr>
							<tr>
								<td colspan="2">
									<button ng-click="clear()" class="btn btn-default clear" id="clear">&nbsp;Clear &nbsp;</button>
								</td>
								<td colspan="2">
									<button ng-click="addValue()" class="btn btn-default enter" id="enter">&nbsp;&nbsp;&nbsp;Enter &nbsp;&nbsp;&nbsp;</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="{{ url('/js/rpn.js') }}"></script>
@endsection