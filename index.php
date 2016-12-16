<!doctype html>
<html >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>VoteApp ALPHA</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="assets/js/main.js"></script>
    <script src="app/app.services.js"></script>
    <script src="app/app.config.js"></script>
    <script src="app/app.states.js"></script>
    <script src="app/app.controller.js"></script>
    <script src="app/components/about/about.controller.js"></script>
    <script src="app/components/home/home.controller.js"></script>

    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/material.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
     rel="stylesheet">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
</head>

<body ng-app="voteApp">

    <div ng-controller="appController as ctrl" ng-cloak>

    <!-- start dynamic content -->
      <div ui-view="" class="md-padding"></div>
    <!-- end dynamic content -->
    </div>

</body>

</html>
