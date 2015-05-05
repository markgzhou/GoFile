<?php 
session_start ();
$sessionid = session_id ();

$cookie_name = "ssid";
$cookie_value = $sessionid;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30)); // 86400 = 1 day
?>


<script type="text/javascript">
<?php 
if(!isset($_COOKIE[$cookie_name])) {
	echo 'alert("Access Saved!");';
} else {
// 	echo "Cookie '" . $cookie_name . "' is set!<br>";
// 	echo "Value is: " . $_COOKIE[$cookie_name];
	echo 'alert("Access Token has been saved to your browser for 30 days!");';
}


?>
    location.href = "transfer.php";
</script>