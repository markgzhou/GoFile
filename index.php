<?php

$cookie_name = "ssid";
if (isset ( $_COOKIE [$cookie_name] )) {
	if (preg_match ( "/^[_0-9a-zA-Z]{2,40}$/i", $_COOKIE [$cookie_name] )) {
		session_id ( $_COOKIE [$cookie_name] );
	}
}

if (isset ( $_GET ['sid'] )) {
	$_GET ['sid'] = trim ( $_GET ['sid'], "\r\r(: :)" );
	if (preg_match ( "/^[_0-9a-zA-Z]{2,40}$/i", $_GET ['sid'] )) {
		session_id ( $_GET ['sid'] );
	}
}

session_start ();
$sessionid = session_id ();
// if (! isset ( $_GET ['sid'] )) {
// header ( "Location: ?sid=$sessionid" );
// }

// $protocol = strpos ( strtolower ( $_SERVER ['SERVER_PROTOCOL'] ), 'https' ) === FALSE ? 'http' : 'https';
// $host = $_SERVER ['HTTP_HOST'];
// $script = $_SERVER ['SCRIPT_NAME'];
// $params = $sessionid;
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<meta charset="utf-8">
<title>GoFile</title>
<meta name="description"
	content="File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery. Supports cross-domain, chunked and resumable file uploads and client-side image resizing. Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
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


		<!-- The file upload form used as target for the file upload widget -->
		<form id="fileupload" action="//www.Mizzou1.com/" method="POST"
			enctype="multipart/form-data">
			<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
			<div class="panel panel-default">
				<div class="row fileupload-buttonbar panel-body">

					<div class="col-lg-6">
						<!-- The fileinput-button span is used to style the file input field as button -->
						Actions: <span
							class="btn btn-success fileinput-button text-center"> <i
							class="glyphicon glyphicon-plus"></i> <span>Add files...</span> <input
							type="file" name="files[]" multiple>
						</span> <a class="btn btn-default text-center"
							onclick="alert('Please drag a file and drop on this page!');"> <i
							class="glyphicon glyphicon-log-in"></i> <span>Drap n Drop</span>
						</a>
						<!-- The global file processing state -->
						<span class="fileupload-process"></span>
					</div>


					<!-- The global progress state -->
					<div class="col-lg-6 fileupload-progress fade">
						<!-- The global progress bar -->
						<div class="progress progress-striped active" role="progressbar"
							aria-valuemin="0" aria-valuemax="100">
							<div class="progress-bar progress-bar-success" style="width: 0%;"></div>
						</div>
						<!-- The extended global progress state -->
						<div class="progress-extended">&nbsp;</div>
					</div>
				</div>
			</div>


			<!-- The table listing the files available for upload/download -->
			<table role="presentation" class="table table-striped">
				<tbody class="files"></tbody>
			</table>
		</form>


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
			All rights reserved 2015 <a href="http://www.mizzou1.com/"
				target="_parent">Mizzou1.com</a>
		</div>
	</div>
	<!-- The blueimp Gallery widget -->
	<div id="blueimp-gallery"
		class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
		<div class="slides"></div>
		<h3 class="title"></h3>
		<a class="close">×</a>
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
                    <button type="button" class="btn btn-info share"  onClick="window.location='getfile.php?do=share&path=<?php echo($sessionid.'&fname=');?>{%=file.name%}'">
                    <i class="glyphicon glyphicon-share-alt"></i>
                    <span>Share</span>
                    </button>
                {% } %}
		    {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                
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
	<script
		src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
</body>
</html>
