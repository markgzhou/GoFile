<?php
if(!isset($_GET['url']))
{
$_GET['url']="http://file.mizzou1.com";
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
<title>Cloud Storage - Mizzou1</title>
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
<h4>Enter email address:</h4>
<form name="Retrieve" action="toemailfile.php" method="get">
<div class="input-group" style="width:450px">
  <span class="input-group-addon">Email:</span>
  <input type="text" name="email" class="form-control" placeholder="XXX@XXX.XXX">
  <input type="hidden" name="url" id="hiddenField" value="<?php echo($_GET['url']);?>">
  <span class="input-group-btn">
  <button class="btn btn-default" type="submit">Send</button>
  </span>
</div>
</form>
</body>
</html>