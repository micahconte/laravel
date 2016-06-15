var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $timeout) {

	$scope.values=[];
	$scope.total=false;
	$scope.sum=0;
	$scope.addMe=0;

	$scope.addValue=function(){
		var addMe = new Number($scope.addMe);
		if($scope.total)
			$scope.clear();

		$scope.values.push(addMe)
		$scope.addMe=0;
		console.log($scope.values);
	}
	$scope.negate=function(){
		$scope.addMe=String($scope.addMe*-1);
	}
	$scope.appendNumber=function(n){
		if(!$scope.total)
			if($scope.addMe===0 && n!='.')
				$scope.addMe=String(n);
			else
				$scope.addMe+=String(n);
		else{
			$scope.clear();
			$scope.addMe=String(n);
		}
	}
	$scope.math=function(e){
		if($scope.values.length!=0)
		{
			$scope.total=true;
			if($scope.sum==0)
			{
				var sum=new Number($scope.values.pop());
				$scope.sum=sum;
			}
			else
				var sum=$scope.sum;

			if($scope.values.length!=0)
			{
				var val=new Number($scope.values.pop());
				switch(e){
					case 'x':
						$scope.sum=sum*val;
					break;
					case '+':
						$scope.sum=sum+val;
					break;
					case '-':
						$scope.sum=sum-val;
					break;
					case '/':
						if(val!=0)
							$scope.sum=sum/val;
						else
						{
							$scope.sum='Error: divide by 0';
							$timeout(function(){
								$scope.clear();
							},2000);
						}
					break;
					case '%':
						$scope.sum=(sum*val)/100;
					break;
				}
			}
		}
		$scope.addMe=$scope.sum;
	}
	$scope.clear=function(){
		$scope.addMe=0;
		$scope.values=[];
		$scope.total=false;
		$scope.sum=0;
		console.log($scope.values);
	}
});
