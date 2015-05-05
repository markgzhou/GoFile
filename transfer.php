<?php
if (isset ( $_GET ['sid'] )) {
	$_GET ['sid'] = trim ( $_GET ['sid'], "\r\r(: :)" );
	if (preg_match ( "/^[_0-9a-zA-Z]{2,40}$/i", $_GET ['sid'] )) {
		session_id ( $_GET ['sid'] );
	}
}
session_start ();
$sessionid = session_id ();

// if (! isset ( $_GET ['sid'] )) {
// 	header ( "Location: ?sid=$sessionid" );
// }

$currentUrl = "http://file.mizzou1.com/doaccess.php?sid=" . $sessionid;
function TinyURL($u) {
	return file_get_contents ( 'http://go.mizzou1.com/shorten.php?longurl=' . urlencode ( $u ) );
}

$tinyUrl = TinyURL($currentUrl);

$filename = 'token\\'. $sessionid . ".txt";
$myfile = fopen( $filename , "w") or die("Error Unable to create file!");
$txt = $currentUrl."\n \n Click the link to retrieve your access! \n Please keep this file safely!";
fwrite($myfile, $txt);
fclose($myfile);



?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<meta charset="utf-8">
<title>Access GoFile</title>
<meta name="description"
	content="File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery. Supports cross-domain, chunked and resumable file uploads and client-side image resizing. Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.">
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
							data-toggle="dropdown" role="button" aria-expanded="false">Access<span class="sr-only">(current)</span>
								<span class="caret"></span>
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
	
	<h4>Transfer or save your access</h4>
	
		<ul class="list-group">
					<li class="list-group-item">
			<h4 class="list-group-item-heading">1.Remotely authorize a device with your current access token(Anonymous Safe)</h4>
				<form name="Retrieve" action="rmtoauth.php" method="post">
				<p>Please Enter <b>Temporary Push Destination:</b></p>
					<div class="input-group" style="width: 240px">
						<span class="input-group-addon">ID:</span> <input type="text"
							name="id" class="form-control" placeholder="1234abcd"> <span
							class="input-group-btn">
							<button class="btn btn-default" type="submit">Submit</button>
						</span>
					</div>
				</form>
			</li>
			<li class="list-group-item">
			<h4 class="list-group-item-heading">2.Scan the QR-Code showed on the remote device(Anonymous Safe)</h4>
				<p class="list-group-item-text">
					You can remotely authorize a machine by simply scan the QR-code. <br>
					i.On the remote device, choose "Retrieve" under the "Access" tab in the menu to get a temporary QR-code<br>
					ii.On this authorized device, use the following link to start QR-scanner:<br>
					<a class="btn btn-success fileinput-button text-center" href="http://qr.mizzou1.com/" target="_blank">QR.Mizzou1.com</a> <br>
					iii.Use scanner on the authorized device to scan the code on remote device to pass the access token.
					
				</p></li>
			<li class="list-group-item"><h4 class="list-group-item-heading">3.Use
					an url to retrive your acces:(Not Anonymous Safe)</h4>
				<p class="list-group-item-text"><strong><span class="alert-info"><?php echo("$currentUrl")?></span></strong> <br>Or Short-Link:<br> <strong><span class="alert-info"><?php echo("$tinyUrl")?></span></strong><br>
				<a data-toggle="modal" href="#responsive" class="btn btn-success fileinput-button text-center">Click here to email to you</a><br>
				</p></li>
			<li class="list-group-item"><h4 class="list-group-item-heading">4.Scan QR-code:(Not Anonymous Safe)</h4>
				<p class="list-group-item-text"><img src="qrgen.php?sid=<?php echo("$sessionid");?>"/> <br>
					You can transfer the access to your mobile devices, and transfer files between computers, mobile phones and tablets.
					</p></li>
					
					
			<li class="list-group-item"><h4 class="list-group-item-heading">5.Save your access with browser:(Not Anonymous Safe)</h4>
				<p class="list-group-item-text">
				Click the folowing button to save your access token in your browser cookie. You will have the access in your browser as long as you do not clean your browser cookie.<br>
				<a href="savecookie.php" class="btn btn-success fileinput-button text-center">Save with browser</a>
					</p></li>
					
			<li class="list-group-item"><h4 class="list-group-item-heading">6.Download your access as a file :(Not Anonymous Safe)</h4>
				<p class="list-group-item-text"><a href="<?php echo($filename);?>" download="Access Key" class="btn btn-success fileinput-button text-center">Save your key file</a>
					</p></li>
					
							
			<li class="list-group-item"><h4 class="list-group-item-heading">Make sure you have saved the token or the url</h4>
				<p class="list-group-item-text"><span class="alert-danger">If you lost this page URL and forgot your token, there is no way to get your access back.</span></p></li>
		</ul>



		<div class="panel panel-warning">
			<div class="panel-heading">Read before use:</div>
			<div class="panel-body">
				This is a cloud file storage system. Please contact webmaster if
				any file is annoying or offending<br> Current system version 1.1.0,
				designed and developed by <a href="http://whoislong.com/"
					target="_blank"><em>Guanlong Zhou</em></a>
			</div>
		</div>
		<div align="center">
			All rights reserved 2014 <a href="http://www.mizzou1.com/"
				target="_parent">Mizzou1.com</a>
		</div>
	</div>

	
	
<div id="responsive" class="modal fade" tabindex="-1" data-width="760" style="display: none; top:50px; overflow:auto; overflow-y: hidden;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
    <h4 class="modal-title">Save your Cloud access</h4>
  </div>
  <div style="padding:10px">
    <iframe src="emailshare.php" style="width:100%; height:80px;" frameborder="0" scrolling="no"></iframe>
  </div>
  <div class="modal-footer" style="margin-top:0">
    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
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
