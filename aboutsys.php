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
<meta name="description" content="File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery. Supports cross-domain, chunked and resumable file uploads and client-side image resizing. Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.">
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
<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>
</head>
<body>
<div class="container">
  <h1><a href="http://file.mizzou1.com/" target="_parent">Cloud Storage</a> - <a href="http://mizzou1.com/" target="_parent">Mizzou1.com</a></h1>
    <ul class="nav nav-tabs">
        <li><a href="index.php">Home</a></li>
        <li><a href="share.php">Save &amp; Share</a></li>
        <li><a href="get.php">Retrieve Access</a></li>
        <li class="active"><a href="aboutsys.php">System Info</a></li>
    </ul>
    <br>
    <?php $counterFile = "server/php/size.txt";
	$totalsize = file($counterFile);
	?>
    
<div class="alert alert-warning" role="alert">
        <p>
        <h4>Once the system is on Cloud, it flies in the sky~~</h4>
<h4>Real-time System File Storage Size: 
<?php 
function formatBytes($size) { 
  $units = array(' B', ' KB', ' MB', ' GB', ' TB'); 
  for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024; 
  return round($size, 2).$units[$i]; 
 }
 echo(formatBytes($totalsize[0]));?></h4>

<div class="progress">
  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%; background-image:url(img/progressbar.gif)">
    <span class="sr-only">Processing...</span>
  </div>
</div>

</p>
</div>

  

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Please Read Carefully:</h3>
        </div>
        <div class="panel-body">
            <ul>
                <li>The maximum file size for uploads currently is <strong>100 MB</strong> (due to Cloud Server policies).</li>
                <li>File types(<strong>JPG, GIF, PNG, PDF, ZIP, RAR, TAR.GZ</strong>) are allowed to upload.</li>
                <li>Uploaded files will be deleted at <strong>30 days after the last time when the file is downloaded.</strong></li>
                <li>You can <strong>drag &amp; drop</strong> files from your desktop on this webpage.</li>
                <li>Once you delete the file. It is <strong>impossible</strong> to recover the file. It's gone forever.</li>
              <li>The Cloud File Storage system is developed based on the original program written by <em><a href="https://github.com/blueimp/jQuery-File-Upload/wiki" target="_blank">Sebastian Tschan</a></em>.</li>
                <li>Current system version 1.0.0 beta, designed and re-developed by <a href="http://whoislong.com/" target="_blank"><em>Guanlong Zhou</em></a></li>
            <?php 
			$sessionid=session_id(); ?>
            <li>Your current SID: <em><?php echo($sessionid) ?></em></li>
            </ul>
        </div>
    </div>
    <div align="center">All rights reserved 2014 <a href="http://www.mizzou1.com/" target="_parent">Mizzou1.com</a></div>
</div>
</body> 
</html>
