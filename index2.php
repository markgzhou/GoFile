<?php if(isset($_GET['sid']))
{
	$_GET['sid']=trim($_GET['sid'],"\r\r(: :)");
	if(preg_match("/^[_0-9a-zA-Z]{2,40}$/i",$_GET['sid']))
	{
	 session_id($_GET['sid']);
	}
}
session_start();
$sessionid=session_id();
if(!isset($_GET['sid'])){
	 header( "Location: ?sid=$sessionid" );
}


$protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') 
                === FALSE ? 'http' : 'https';
$host     = $_SERVER['HTTP_HOST'];
$script   = $_SERVER['SCRIPT_NAME'];
$params   = $sessionid;

$currentUrl="http://files.mizzou1.com?sid=".$sessionid;
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
<div class="container">
    <h1><a href="http://file.mizzou1.com/" target="_parent">Cloud Storage</a> - <a href="http://mizzou1.com/" target="_parent">Mizzou1.com</a></h1>
    <ul class="nav nav-tabs">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="share.php">Save &amp; Share</a></li>
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

    
  
  
  <br>
    <!-- The file upload form used as target for the file upload widget -->
    <form id="fileupload" action="//www.Mizzou1.com/" method="POST" enctype="multipart/form-data">
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <div class="col-lg-7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                    <input type="file" name="files[]" multiple>
                </span>
                <button type="submit" class="btn btn-primary start">
                    <i class="glyphicon glyphicon-cloud-upload"></i>
                    <span>Start upload</span>
                </button>
                <button type="reset" class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel upload</span>
                </button>
                <button type="button" class="btn btn-danger delete">
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" class="toggle">
                <!-- The global file processing state -->
                <span class="fileupload-process"></span>
            </div>
            <!-- The global progress state -->
            <div class="col-lg-5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <!-- The extended global progress state -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
    </form>
    <br>
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
<!-- The blueimp Gallery widget -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td align="center">
            <span class="preview"></span>
        </td>
        <td align="center">
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td align="center">
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td align="center">
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-cloud-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td align="center">
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td align="center">
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td align="center">
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td align="center"> 
		                {% if (file.url) { %}
                    <button type="button" class="btn btn-primary download"  onClick="window.location='getfile.php?path=<?php echo($sessionid.'&fname=');?>{%=file.name%}'">
                    <i class="glyphicon glyphicon-cloud-download"></i>
                    <span>Download</span>
                    </button>
                {% } %}
				
				{% if (file.url) { %}
                    <button type="button" class="btn btn-info share"  onClick="window.location='sharefile.php?path=<?php echo($sessionid.'&fname=');?>{%=file.name%}'">
                    <i class="glyphicon glyphicon-share-alt"></i>
                    <span>Share</span>
                    </button>
                {% } %}
		    {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="js/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="js/bootstrap.min.js"></script>
<!-- blueimp Gallery script -->
<script src="js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="js/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="js/cors/jquery.xdr-transport.js"></script>
<![endif]-->
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
