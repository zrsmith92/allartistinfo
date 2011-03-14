<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>All Artist Info.</title>
  <meta name="description" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="<?= url::base(); ?>/favicon.ico">
  <link rel="apple-touch-icon" href="<?= url::base(); ?>/apple-touch-icon.png">
  <link rel="stylesheet" href="<?= url::base(); ?>inc/css/style.css?v=2">
  <script src="<?= url::base(); ?>inc/js/libs/modernizr-1.7.min.js"></script>

</head>

<body>

  <div id="container">
    <header>

    </header>
    <div id="main">
        <?php echo $body; ?>
    </div><!-- /#main -->
    <footer>
        Copyright &copy;2011 <em>All Artist Info, Inc.</em> All Rights Reserved.
    </footer>
  </div><!-- /#container -->

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
  <script>window.jQuery || document.write('<script src="<?= url::base(); ?>inc/js/libs/jquery-1.5.1.min.js">\x3C/script>')</script>

  <!-- scripts concatenated and minified via ant build script-->
  <script src="<?= url::base(); ?>inc/js/plugins.js"></script>
  <script src="<?= url::base(); ?>inc/js/script.js"></script>
  <!-- end scripts-->

  <!--[if lt IE 7 ]>
    <script src="<?= url::base(); ?>inc/js/libs/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix('img, .png_bg'); // Fix any <img> or .png_bg bg-images. Also, please read goo.gl/mZiyb </script>
  <![endif]-->


  <script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>

</body>
</html>