<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/utils/sanitizer.php";
function getClientIPAddr()
{

    $clientRemoteAdd = outputSantizer($_SERVER['REMOTE_ADDR']);

    if (!empty($_SERVER["HTTP_CLIENT_IP"]) && array_key_exists('HTTP_CLIENT_IP', $_SERVER)) {
        $clientIp = outputSantizer($_SERVER["HTTP_CLIENT_IP"]);
        return $clientIp;
    } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]) && array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
        $clientProxy = outputSantizer($_SERVER["HTTP_X_FORWARDED_FOR"]);
        return $clientProxy;
    }

    return $clientRemoteAdd;
}

function getClientUserAgent()
{


    if (!empty($_SERVER["HTTP_USER_AGENT"]) && array_key_exists('HTTP_USER_AGENT', $_SERVER)) {
        $userAgent = outputSantizer($_SERVER["HTTP_USER_AGENT"]);
        return $userAgent;
    }
}