<?php session_start();?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<meta charset="utf-8">
<title>System Info - Mizzou1 Cloud</title>
<meta name="description"
	content="File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery. Supports cross-domain, chunked and resumable file uploads and client-side image resizing. Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap styles -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Generic page styles -->
<link rel="stylesheet" href="css/style.css">
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="css/blueimp-gallery.min.css">
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
					<a class="navbar-brand" href="http://file.mizzou1.com/"><strong>GoFile</strong></a>
				</div>

				<div class="collapse navbar-collapse"
					id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="./">Files</a></li>
						<li class="active"><a href="aboutus.php">Help</a></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-expanded="false">Access<span
								class="sr-only"></span> <span class="caret"></span>
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
    <?php $counterFile = "server/php/size.txt";
	$totalsize = file($counterFile);
	?>
    <h4>Hmm... I think I should write something here... Maybe later...</h4>
<div class="alert alert-warning" role="alert">
			<p>
			Once the system is on Cloud, it flies in the sky~~<br>
			Real-time System File Storage Size: 
<?php 
function formatBytes($size) { 
  $units = array(' B', ' KB', ' MB', ' GB', ' TB'); 
  for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024; 
  return round($size, 2).$units[$i]; 
 }
 echo(formatBytes($totalsize[0]));?><br>

			<div class="progress">
				<div class="progress-bar progress-bar-info progress-bar-striped"
					role="progressbar" aria-valuenow="20" aria-valuemin="0"
					aria-valuemax="100"
					style="width: 20%; background-image: url(img/progressbar.gif)">
					<span class="sr-only">Processing...</span>
				</div>
			</div>
			Current Status: <strong><a href="status.php" target="_blank">Active</a></strong>.
</p>
		</div>



		<div class="panel panel-warning">
			<div class="panel-heading">Read before use:</div>
			<div class="panel-body">
				The maximum file size for uploads currently is <strong>100 MB</strong>
				(due to Cloud Server policies). <br> Allowed File types: <strong>JPEG,
					GIF, PNG, PDF, ZIP, RAR, 7Z, TAR, DOC, PPT, XLS, TXT,</strong> <br>
				Please make sure you have saved/transfered the access token before
				leave. Or you will never find your files.<br> Once you delete the
				file. It is <strong>impossible</strong> to recover it. <br> Current
				system version 1.1.0, designed and developed by <a
					href="http://whoislong.com/" target="_blank"><em>Guanlong Zhou</em></a>


			</div>
		</div>
		<div align="center">
			All rights reserved 2014 <a href="http://www.mizzou1.com/"
				target="_parent">Mizzou1.com</a>
		</div>
	</div>
		<script
		src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
	<script src="js/vendor/jquery.ui.widget.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</body>
</html>
