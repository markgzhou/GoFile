<?php

include 'phpqrcodegen2.php'; 
$string='http://file.mizzou1.com/rmtoauth.php?id=' . $_GET["id"];
QRcode::png($string);


?>