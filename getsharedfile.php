<?php
$error = 0;
$basedir = "server/php/files/";
if (! isset ( $_GET ['path'] )) {
	$error = 1;
} else {
	$_GET ['path'] = base64_decode ( $_GET ['path'] );
}
if (! isset ( $_GET ['fname'] )) {
	$error = 1;
}
if ($error == 1) {
	$_GET ['fname'] = 'ErrorFile';
	$_GET ['path'] = 'ErrorFile';
	$longdir = "index.php";
} else {
	$longdir = $basedir . $_GET ['path'] . '/' . $_GET ['fname'];
}
?>
<?php

function TinyURL($u) {
	return file_get_contents ( 'http://go.mizzou1.com/shorten.php?longurl=' . urlencode($u) );
}

$fulllongurl = "http://file.mizzou1.com/getsharedfile.php?path=" . base64_encode ( $_GET ['path'] ) . "&fname=" . rawurlencode ( $_GET ['fname'] );
$shortenurl = TinyURL ( $fulllongurl );
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<meta charset="utf-8">
<title>Download- GoFile</title>
<meta name="description"
	content="Anonymous File Sharing System">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap styles -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Generic page styles -->
<link rel="stylesheet" href="css/style.css">
<!-- blueimp Gallery styles -->
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<link rel="stylesheet" href="css/bootstrap-modal-bs3patch.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript>
	<link rel="stylesheet" href="css/jquery.fileupload-noscript.css">
</noscript>
<noscript>
	<link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css">
</noscript>
<!--Share This-->
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript">var url="http://www.sina.com";</script>
<script type="text/javascript"
	src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-1ab85973-d105-f635-7ebc-b54266b96da3", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</head>
<body>
	<div class="container">
<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed"
						data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="http://file.mizzou1.com"><strong>GoFile</strong></a>
				</div>

				<div class="collapse navbar-collapse"
					id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="./">Files <span class="sr-only">(current)</span></a></li>
						<li><a href="aboutus.php">Help</a></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-expanded="false">Access
								<span class="caret"></span>
						</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="transfer.php">Transfer/Save</a></li>
								<li class="divider"></li>
								<li><a href="access.php">Retrive</a></li>
								<li class="divider"></li>
								<li><a href="logout.php">Logout</a></li>
							</ul></li>
						<li><a href="http://mizzou1.com/">Mizzou1.com</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="alert alert-info" role="alert" align="center">
			<img src="img/file.png" width="128" height="128" alt="" /> <br>
			<h3>
		<?php
		$isFileExist = false;
		if (file_exists ( $longdir ) && ($error == 0)) {
			echo ($_GET ['fname']);
		}
		?></h3>
			<h5><?php
			function formatBytes($size) {
				$units = array (
						' B',
						' KB',
						' MB',
						' GB',
						' TB' 
				);
				for($i = 0; $size >= 1024 && $i < 4; $i ++)
					$size /= 1024;
				return round ( $size, 2 ) . $units [$i];
			}
			if (file_exists ( $longdir ) && ($error == 0)) {
				echo (formatBytes ( filesize ( $longdir ) ));
				$isFileExist = true;
			} else {
				echo ("Not Found!");
			}
			?></h5>
			<a target="_blank" href="<?php echo($longdir);?>"
				class="btn btn-primary <?php if(!$isFileExist) echo('disabled')?>" role="button">Download</a> &nbsp;
			<button type="button" class="btn btn-success <?php if(!$isFileExist) echo('disabled')?>" data-toggle="modal"
				href="#responsive">Share</button>
		</div>


		<div class="alert alert-warning" role="alert" align="center">
			Download the file directly to your mobile devices by scanning QR-code
			below<br> <img
				src="http://chart.apis.google.com/chart?cht=qr&chs=200x200&chl=<?php echo($shortenurl);?>&chld=H|0"
				width="200" height="200" alt="" /><br>
				Permanent URL<br>
				<a href="<?php echo($shortenurl);?>"><?php echo($shortenurl);?></a>
		</div>


		<div class="panel panel-warning">
			<div class="panel-heading">Read before use:</div>
			<div class="panel-body">
				This is a cloud file storage system. Please contact webmaster if this file is annoying or offending<br> Current
				system version 1.1.0, designed and developed by <a
					href="http://whoislong.com/" target="_blank"><em>Guanlong Zhou</em></a>
			</div>
		</div>
		<div align="center">
			All rights reserved 2014 <a href="http://www.mizzou1.com/"
				target="_parent">Mizzou1.com</a>
		</div>
	</div>

	<div id="responsive" class="modal fade" tabindex="-1" data-width="760"
		style="display: none; top: 50px; overflow: auto; overflow-y: hidden;">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">×</button>
			<h4 class="modal-title">Share this file with friends</h4>
		</div>
		<div style="padding: 10px">
			<iframe src="emailfile.php?url=<?php echo($shortenurl);?>"
				style="width: 100%; height: 80px;" frameborder="0" scrolling="no"></iframe>
		</div>
		<div align="center">
			<!-- Go to www.addthis.com/dashboard to customize your tools -->
			<div class="addthis_sharing_toolbox"></div>
		</div>
		<div class="modal-footer" style="margin-top: 0">
			<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		</div>
	</div>
	<script
		src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
	<script src="js/vendor/jquery.ui.widget.js"></script>
	<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript"
		src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-552717b54e68da17"
		async="async"></script>
</body>
</html>
