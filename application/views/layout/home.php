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

    <div id="header">
        <div class="container">
            <a href="<?=base_url()?>" class="logo"><?=$title?> - Sportive.</a>
            <a href="<?=base_url("home/join_now")?>" class="btn-join">Join Now</a>
        </div>

    </div>
    <div id="content">
        <div class="container">
<?php
	echo $content;

?>
        </div>
    </div>
    <div id="footer">
    <br>
        <div class="container">
            <div class="col-md-2">
                <ul class="foot-link">
                    <li><a href="<?=base_url("home/login")?>">Sign In</a></li>
                    <li><a href="<?=base_url("home/join_now")?>">Join</a></li>
                    <li><a href="<?=base_url("home/login")?>">Tentang kami</a></li>
                    <li><a href="<?=base_url("home/login")?>">Kontak kami</a></li>
                    <li><a href="<?=base_url("home/login")?>">Privacy policy</a></li>
                    
                </ul>
            <br>
            </div>

            <div class="col-md-2">
                <ul class="foot-link">
                    <li><a href="https://facebook.com">Facebook</a></li>
                    <li><a href="https://twitter.com">Twitter</a></li>
                    <li><a href="https://plus.google.com">Google+</a></li>
                </ul>
            <br>
            </div>

            <div class="col-md-2">
                <h4>Alamat</h4>
                <p>Jalan Mulyosari Tengah No. 101 Surabaya</p>
            <br>
            </div>
            <div class="col-md-3">
                <h4>Kontak</h4>
                <p>
                    <strong>Email : </strong><a href="mailto:info@sportive.com">info@sportive.com</a><br>
                    <strong>Phone : </strong>081 335 890123<br>
                </p>
                <br>
            </div>

            <div class="col-md-3">
                <a href="<?=base_url()?>" class="logo">Sportive</a>
                <p>Copyright &copy; 2015. Sportive.</p>
             </div>

        </div>
    </div>
<?php
U::loadScripts($local_javascripts);
?>
    <input type="hidden" value="<?=base_url()?>" id="base_url"></input>
	</body>
</html>