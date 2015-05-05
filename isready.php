<?php
$Error = false;
if (empty ( $_REQUEST )) {
	$Error = true;
} else if (! isset ( $_REQUEST ["mid"] )) {
	$Error = true;
}

if ($Error) {
	die ( "Error: false! " );
}

$MachineID = $_REQUEST ["mid"];
include 'conn.php';

$sql = "SELECT * FROM oauthtb WHERE cid='$MachineID' AND isable=true LIMIT 1";
//echo($sql . "<br>");
$result = mysqli_query ( $conn, $sql );
if (mysqli_num_rows ( $result ) > 0) {
	while ( $row = mysqli_fetch_assoc ( $result ) ) {
		
		if($row ["route"]!=""){
			echo($row ["route"]);
		}else{
			echo("Wait: false!");
		}
	}
} else {
	die ( "Null: false! " );
}

?>