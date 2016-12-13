<!doctype html>
<html >

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gulp beast</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="assets/js/main.js"></script>
    <script src="app/app.config.js"></script>
    <script src="app/app.states.js"></script>
    <script src="app/app.controller.js"></script>
    <script src="app/components/about/about.controller.js"></script>
    <script src="app/components/home/home.controller.js"></script>
    <script src="app/components/home/home.services.js"></script>

    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/material.css">

</head>

<body ng-app="voteApp">

    <!-- Add content here -->
    <div ng-controller="appController as ctrl" ng-cloak>
      <md-nav-bar md-selected-nav-item="currentNavItem" nav-bar-aria-label="navigation links">
        <md-nav-item ui-sref="home" md-nav-href="home" name="home">Home</md-nav-item>
        <md-nav-item ui-sref="about" md-nav-sref="about" name="about">About</md-nav-item>
      </md-nav-bar>


    <!-- start dynamic content -->
      <div ui-view="" class="md-padding"></div>
    <!-- end dynamic content -->
    </div>

</body>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<!-- <script>
    (function(b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function() {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = '//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script> -->
</html>
