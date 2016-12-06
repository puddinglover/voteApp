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
    <script src="app/components/about/about.controller.js"></script>
    <script src="app/components/home/home.controller.js"></script>
    <script src="app/components/home/home.services.js"></script>

</head>

<body ng-app="voteApp">

    <!-- Add content here -->


    <a href="" ui-sref="about" ui-sref-active="active">Hello</a>

    <!-- start dynamic content -->
      <div ui-view=""></div>
    <!-- end dynamic content -->


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
