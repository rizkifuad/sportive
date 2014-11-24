<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title ?> - <?php echo $main_title ?></title>
		    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
<?php
U::loadStyles($stylesheets);
U::loadScripts($javascripts);
?>
	</head>
	<body>
<?php
	/**
	 * Empty layout in case of emergency
	 */

	echo $content;


U::loadScripts($local_javascripts);
?>
    <input type="hidden" value="<?=base_url()?>" id="base_url"></input>
	</body>
</html>