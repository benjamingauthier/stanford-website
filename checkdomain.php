<?php
$ch = curl_init("http://www.one.com/test-domain.do?domain=" . $_GET['domain']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);
echo $data

?>