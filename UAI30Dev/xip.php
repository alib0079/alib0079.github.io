<?php Header("content-type: application/x-javascript");
$serverIP=$_SERVER['REMOTE_ADDR'];
$token=$_GET[token];
echo "document.write(\"Your IP address is: <b>" . $serverIP . "</b>\");";
echo "document.write(\"" . $token . "\");";
?>