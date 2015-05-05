<?php
$isGetAccess = false;
$id = "ca0e8bdd86791c84698dd78a4d2ctest";
if (isset ( $_REQUEST ['id'] )) {
	$_REQUEST ['id'] = trim ( $_REQUEST ['id'], "\r\r(: :)" );
	if (preg_match ( "/^[_0-9a-zA-Z]{4,10}$/i", $_REQUEST ['id'] )) {
		$id = $_REQUEST ['id'] ;
		$isGetAccess = true;
	}
}
session_start ();
$sessionid = session_id ();
include 'conn.php';

 //echo($id);
 //echo($_REQUEST ['id']);

if ($isGetAccess) {
	$msg = 'Your remote authorization request has been submitted successfully. It could take seconds to deliver this request. <br>  <a href="transfer.php" class="btn btn-default">Click to go back</a>';
	$msgtype = "alert-info";
	
	$sql = "UPDATE oauthtb SET route='$sessionid' WHERE cid='$id' AND isable=true";
	 //echo($sql);
	if (! mysqli_query ( $conn, $sql )) {
		die ( "Error: Database Connection Error at Update." );
	}
} else {
	$msg = 'Something went wrong! Your request is not sent! <br> <a href="transfer.php" class="btn btn-default">Click to go back</a>';
	$msgtype = "alert-danger";
}

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<meta charset="utf-8">
<title>Remote Auth Request GoFile</title>
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
						<li><a href="aboutus.php">Help</a></li>
						<li class="dropdown active"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-expanded="false">Access<span
								class="sr-only">(current)</span> <span class="caret"></span>
						</a>
							<ul class="dropdown-menu" role="menu">
								<li class="active"><a href="transfer.php">Transfer/Save</a></li>
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

		<ul class="list-group">


			<li class="list-group-item"><h4 class="list-group-item-heading">System
					Message</h4>

				<div class="alert alert-dismissible <?php echo($msgtype);?>">
					<h4 class="list-group-item-heading">Access Control</h4>
					<p class="list-group-item-text"><?php echo($msg); ?></p>
				</div>
		
		</ul>



		<div class="panel panel-warning">
			<div class="panel-heading">Read before use:</div>
			<div class="panel-body">
				This is a cloud file storage system. Please contact webmaster if any
				file is annoying or offending<br> Current system version 1.1.0,
				designed and developed by <a href="http://whoislong.com/"
					target="_blank"><em>Guanlong Zhou</em></a>
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

	<!-- Go to AddThis Sharing Script -->
	<script type="text/javascript"
		src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-552717b54e68da17"
		async="async"></script>
</body>
</html>
