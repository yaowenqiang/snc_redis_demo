<?php
$timeStart  = time();
$fp = stream_socket_client('tcp://localhost:6377', $errno, $errstr, 20);
$timeEnd  = time();
echo $timeEnd - $timeStart;
echo "\n";
if (!$fp) {
    echo "$errstr($errno) <br> \n";
} else {
    echo "connection ok";
}
