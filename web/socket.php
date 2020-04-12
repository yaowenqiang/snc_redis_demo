<?php
$time  = -microtime(true);
$fp = stream_socket_client('tcp://115.28.221.31:6377', $errno, $errstr, 30);
$time  = $time + microtime(true);
echo "socket time: " + $time . "\n";
if (!$fp) {
    echo "$errstr($errno) <br> \n";
} else {
    echo "connection ok";
}
