<?php

if (!session_start()) {
 header("Location: unauthorized_error.php");
} 

$client = new SoapClient(null, array(
      'location' => "http://localhost:81/AdminUni/WebServiceSOAP/server.php",
      'uri'      => "urn://www.herong.home/req",
      'trace'    => 1 ));

?>
