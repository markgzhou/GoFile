<?php

include 'phpqrcodegen2.php'; 
$string='http://file.mizzou1.com/doaccess.php?sid=' . $_GET["sid"];
QRcode::png($string);


?>