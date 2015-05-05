<?php 
$error=0;
$basedir="server/php/files/";
if(!isset($_GET['path']))
{
$error=1;
}
if(!isset($_GET['fname']))
{
$error=1;
}
if($error==1){
$_GET['fname']='ErrorFile';
$_GET['path']='ErrorFile';
$longdir="index.php";
}
else {
$longdir=$basedir.$_GET['path'].'/'.$_GET['fname'];
}
?>
<?php
function TinyURL($u){
return file_get_contents('http://tinyurl.com/api-create.php?url='.$u);
}

$fulllongurl="http://files.mizzou1.com/getsharedfile.php?path=".base64_encode($_GET['path'])."&fname=".rawurlencode($_GET['fname']);
$shortenurl=TinyURL($fulllongurl);
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<meta charset="utf-8">
<title>Download File - Mizzou1</title>
<meta name="description" content="File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery. Supports cross-domain, chunked and resumable file uploads and client-side image resizing. Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.">
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
<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>
<!--Share This-->
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-1ab85973-d105-f635-7ebc-b54266b96da3", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
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

    <div class="alert alert-info" role="alert" align="center">
        <img src="img/file.png" width="128" height="128"  alt=""/>
        <br>
        <h3>
		<?php 
		if(file_exists($longdir) && ($error==0)){
         echo($_GET['fname']);}
         ?></h3>
<h5><?php
function formatBytes($size) { 
  $units = array(' B', ' KB', ' MB', ' GB', ' TB'); 
  for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024; 
  return round($size, 2).$units[$i]; 
 }
 if(file_exists($longdir) && ($error==0)){
 echo (formatBytes(filesize($longdir)));}
 else{
 echo ("Not Found!");
 }?></h5>
<a target="_blank" href="<?php echo($longdir);?>" class="btn btn-primary" role="button">Download</a>
&nbsp;
<button type="button" id="sharebtn" class="btn btn-success" data-toggle="modal" href="#responsive">Share</button>
</div>


<div class="alert alert-warning" role="alert" align="center">
Download the file directly to your mobile devices by scanning QR-code below<br>

  <img src="http://chart.apis.google.com/chart?cht=qr&chs=200x200&chl=<?php echo($shortenurl);?>&chld=H|0" width="200" height="200"  alt=""/><br>
  
  <a href="<?php echo($fulllongurl);?>"><?php echo($fulllongurl);?></a></div>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">If you want to remove information from Cloud where you do not have access</h3>
        </div>
        <div class="panel-body">
            <ul>
                <li>Please email webmaster to remove files.</li>
            </ul>
        </div>
    </div>
    <div align="center">All rights reserved 2014 <a href="http://www.mizzou1.com/" target="_parent">Mizzou1.com</a></div>
</div>

<div id="responsive" class="modal fade" tabindex="-1" data-width="760" style="display: none; top:50px; overflow:auto; overflow-y: hidden;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">Share this file with friends</h4>
  </div>
  <div style="padding:10px">
    <iframe src="emailfile.php?url=<?php echo($shortenurl);?>" style="width:100%; height:80px;" frameborder="0" scrolling="no"></iframe>
  </div>
  <div align="center">
  <span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_googleplus_large' displayText='Google +'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_linkedin_large' displayText='LinkedIn'></span>
<span class='st_pinterest_large' displayText='Pinterest'></span>
<span class='st_email_large' displayText='Email'></span>
</div>
  <div class="modal-footer" style="margin-top:0">
    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
  </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $("#sharebtn").click();
});
</script>

</body> 
</html>
