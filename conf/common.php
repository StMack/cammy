<?php

function dumpHttpRequest($prefix='WEBHOOK', $path='/var/www/dev.pearlatlongshore.com/logs/mc')
{
    $fn = "$path/$prefix-" . date('YmdHis') . "-" . rand(100000,999999) . ".dat";
    $fh = fopen($fn, "w");
    
    if($fh==null)
    {
        return;
    }
    
    fputs($fh, "GET STRUCTURE:\r\n==============\r\n");
    fputs($fh, print_r($_GET,true));
    fputs($fh, "\r\n\r\n");
    fputs($fh, "POST STRUCTURE:\r\n==============\r\n");
    fputs($fh, print_r($_POST,true));
    fputs($fh, "\r\n\r\n");
    fputs($fh, "HTTP CONTENT:\r\n==============\r\n");
    fputs($fh, print_r(@file_get_contents('php://input'), true));
    fclose($fh);
    return;
}

