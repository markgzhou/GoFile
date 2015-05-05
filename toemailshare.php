<?php
if(!isset($_GET['email'])) 
{echo ("Error:invalid Email Address!");
die();}
if(!isset($_GET['sid'])) {
echo ("Error: No sID!");
die();
}

//define the receiver of the email
$to = $_GET['email'];
//define the subject of the email
$subject = 'Your access link to your GoFile Cloud Storage'; 
//create a boundary string. It must be unique 
//so we use the MD5 algorithm to generate a random hash
$random_hash = md5(date('r', time())); 
//define the headers we want passed. Note that they are separated with \r\n
$headers = "From: Mizzou1@mizzou1.com\r\nReply-To: Mizzou1@mizzou1.com";
//add boundary string and mime type specification
$headers .= "\r\nContent-Type: multipart/alternative; boundary=\"PHP-alt-".$random_hash."\""; 
//define the body of the message.
ob_start(); //Turn on output buffering
?>
--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/html; charset="utf-8" 
Content-Transfer-Encoding: 7bit

<h2>Hello from GoFile Cloud!</h2>
<p>An access link from <b>Mizzou1</b> <strong>GoFile</strong> Cloud Storage.</p> 
<p>You can use the link below to check or download the file in the cloud:<br>
<a href="http://file.mizzou1.com/?sid=<?php echo($_GET['sid']);?>" target="_blank">http://file.mizzou1.com/?sid=<?php echo($_GET['sid']);?></a></p>
   <br>
  or use your SID:<b><?php echo($_GET['sid']);?></b><br>
  <br><br>
  <div><font size="2"><em>Visit <a href="http://mizzou1.com/" target="_blank"><font color="#3B6E8F">Mizzou1.com</font></a>
Search and Play <a href="http://mizzou1.com/musicproject.php" target="_blank"><font color="#3B6E8F">Music Project</font></a> File Sharing <a href="http://mizzou1.com/cloudstorage.php" target="_blank"><font color="#3B6E8F">Cloud</font></a></em></font></div>

<td style="padding:0 0 20px 0;"><font size="1" color="gray"><span style="font-size:12px;"><i>Copyright (c) 2014 </i></span></font><font color="gray"><span style="font-size:12px;"><i>Mizzou1.com</i></span></font><font size="1" color="gray"><span style="font-size:12px;">&nbsp;|&nbsp;</span></font><font color="gray"><span style="font-size:12px;">University of Missouri, Columbia</span></font><font size="1" color="gray"><span style="font-size:12px;">, </span></font><font color="gray"><span style="font-size:12px;">MO</span></font> <font color="gray"><span style="font-size:12px;">65201</span></font><font size="1" color="gray"><span style="font-size:12px;"> USA</span></font></td>
<br>

--PHP-alt-<?php echo $random_hash; ?>--
<?
//copy current buffer contents into $message variable and delete current output buffer
$message = ob_get_clean();
//send the email
$mail_sent = @mail( $to, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
echo $mail_sent ? "Mail sent" : "Mail failed";
?>
<meta http-equiv="refresh" content="3;url=emailshare.php">