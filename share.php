<?php session_start();
$sessionid=session_id();
$currentUrl="http://files.mizzou1.com?sid=".$sessionid;
$params=$sessionid;
function TinyURL($u){
return file_get_contents('http://tinyurl.com/api-create.php?url='.$u);
}
$shortenurl=TinyURL($currentUrl);
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<meta charset="utf-8">
<title>Save Access - Mizzou1</title>
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
        <li class="active"><a href="share.php">Save &amp; Share</a></li>
        <li><a href="get.php">Retrieve Access</a></li>
        <li><a href="aboutsys.php">System Info</a></li>
    </ul>
    <br>
    
    
<div class="alert alert-warning" role="alert">
        <p><h4>Upload your photos and compressed files here for free. The max file size is 100MB<br>
       <span style="color: #F00"> Your Cloud URL is the only link to access all your files!</span> Add it to favorite(Ctrl+D)</h4>
<div class="input-group" style="width:750px">
  <span class="input-group-addon">Your Cloud URL:</span>
  <input type="text" class="form-control" value="<?php echo($currentUrl);?>">
  <span class="input-group-btn">
  <button class="btn btn-default" type="button" data-toggle="modal" href="#responsive">Email Link</button>
  </span>
</div>
<h4>Or remember your SID(Storage ID)</h4>
<div class="input-group" style="width:450px">
  <span class="input-group-addon">Your SID:</span>
  <input type="text" class="form-control" value="<?php echo($params);?>">
  <span class="input-group-btn">
  <button class="btn btn-default" type="button" data-toggle="modal" href="#responsive">Email SID</button>
  </span>
</div>
</p>
</div>

    
<div class="alert alert-warning" role="alert" align="center">
Get your mobile devices access to your current Cloud storage by scanning QR-code Below<br>

  <img src="http://chart.apis.google.com/chart?cht=qr&chs=200x200&chl=<?php echo($shortenurl);?>&chld=H|0" width="200" height="200"  alt=""/><br>

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
            </ul>
        </div>
    </div>
    <div align="center">All rights reserved 2014 <a href="http://www.mizzou1.com/" target="_parent">Mizzou1.com</a>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<div id="responsive" class="modal fade" tabindex="-1" data-width="760" style="display: none; top:50px; overflow:auto; overflow-y: hidden;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">Save your Cloud access</h4>
  </div>
  <div style="padding:10px">
    <iframe src="emailshare.php" style="width:100%; height:80px;" frameborder="0" scrolling="no"></iframe>
  </div>
  <div class="modal-footer" style="margin-top:0">
    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
  </div>
</div>


</body> 
</html>
