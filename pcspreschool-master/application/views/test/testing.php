<?php?>



<html  ng-app="myApp" ng-controller="nvCtrl">
<head>
	<title>
		test
	</title>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.js" type="text/javascript"></script>

</head>

<body>


<table>
 <tbody>
	<tr ng-repeat="x in children">
		<td>{{x.first_name}}</td>
		<td>{{x.last_name}}</td>
		<td>{{x.parent_name}}</td>
		<td>{{x.parent_email}}</td>
	</tr>
	
</tbody>

<table>

	<script>
		var app = angular.module('myApp', []);
		app.controller('nvCtrl', function($scope) {
		  $scope.children =<?=json_encode($childDetails)?>;
			});

	</script>
</body>
</html>