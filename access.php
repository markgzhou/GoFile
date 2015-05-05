<?php
session_start ();
function RandomString($length) {
	$characters = '0123456789abcdefghkpqrstwxyz';
	$randomString = '';
	$charactersLength = strlen ( $characters );
	for($i = 0; $i < $length; $i ++) {
		$randomString .= $characters [rand ( 0, $charactersLength - 1 )];
	}
	return $randomString;
}

$cid = RandomString ( 8 );
$ExpGMT = gmdate ( "Y-m-d H:i:s", time () + 100 );
$CurrentGMT = gmdate ( "Y-m-d H:i:s", time () );

// echo ($ExpGMT);

include 'conn.php';

$sql = "UPDATE oauthtb SET isable='false' WHERE extime<='$CurrentGMT' AND isable=true";
// echo($sql);
if (! mysqli_query ( $conn, $sql )) {
	die ( "Error: Database Connection Error at Update." );
}

$sql = "INSERT INTO oauthtb (cid, isable, extime)
VALUES ('$cid', true, '$ExpGMT')";
// echo($sql);
if (! mysqli_query ( $conn, $sql )) {
	die ( "Error: Database Connection Error at Create." );
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
<title>Retrieve Access - GoFile</title>
<meta name="description" content="Retrieve GoFile Cloud Access">
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
						<li><a href="aboutus.php">Help</a></li>
						<li class="dropdown active"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-expanded="false">Access<span
								class="sr-only">(current)</span> <span class="caret"></span>
						</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="transfer.php">Transfer/Save</a></li>
								<li class="divider"></li>
								<li class="active"><a href="access.php">Retrive</a></li>
								<li class="divider"></li>
								<li><a href="logout.php">Logout</a></li>
							</ul></li>
						<li><a href="http://mizzou1.com/">Mizzou1.com</a></li>
					</ul>
				</div>
			</div>
		</nav>
		
	<h4>Retrieve your access</h4>
		
		<div class="alert alert-info" role="alert">
			<h4>Scan your access token QR-code</h4>
			Click the following button start scanner
			<form name="Retrieve" action="http://qr.mizzou1.com/" method="post">
				<div class="input-group" style="width: 230px">
					<span class="input-group-addon">MID:</span> <input type="text"
						name="sid" class="form-control" placeholder="<?php echo($cid);?>" disabled> <span
						class="input-group-btn">
						<button class="btn btn-default" type="submit">Scan</button>
					</span>
				</div>
			</form>
		</div>

		<div class="alert alert-info" role="alert">
			<h4>You can retrieve access using a device which has been authorized
				with access token</h4>
			<h5>1.Use the authorized device to start QR-scanner from Remote
				Authorize tab under Access menu</h5>
			<h5>
				or use chrome browser directly go to <b>QR.Mizzou1.com</b>
			</h5>
			<h5>2.Scan the following QR-code:</h5>
			<div align="center">
				<img src="tempqrgen.php?id=<?php echo($cid);?>" />
				<h6>Temporary Push Destination</h6>
				<h5>
					<b><?php echo("$cid");?></b>
				</h5>

				<h6>
					Expire in <span id="timer">90</span> SECs
				</h6>
			</div>
			<h5>3.Click the QR-code after remote authorization.</h5>
		</div>






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
	<script>
	var count=90;

	var counter=setInterval(timer, 1000);
	var counter=setInterval(checkStatus, 800);
	
	function timer()
	{
	  count=count-1;
	  if (count <= 0)
	  {
	     clearInterval(counter);
	     window.location.reload();
	     return;
	  }

	 document.getElementById("timer").innerHTML=count; // watch for spelling
	}

	function post(path, params, method) {
	    method = method || "post"; // Set method to post by default if not specified.

	    // The rest of this code assumes you are not using a library.
	    // It can be made less wordy if you use one.
	    var form = document.createElement("form");
	    form.setAttribute("method", method);
	    form.setAttribute("action", path);

	    for(var key in params) {
	        if(params.hasOwnProperty(key)) {
	            var hiddenField = document.createElement("input");
	            hiddenField.setAttribute("type", "hidden");
	            hiddenField.setAttribute("name", key);
	            hiddenField.setAttribute("value", params[key]);

	            form.appendChild(hiddenField);
	         }
	    }

	    document.body.appendChild(form);
	    form.submit();
	}


	function checkStatus() {
		$.get( "isready.php?mid=<?php echo($cid);?>", function( data ) {
			  
			  var cts ="false!" ;
			  if(data.indexOf(cts) > -1){

			  }else{
					post("doaccess.php",{sid: data});
				  }
			});
	}
	 </script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
