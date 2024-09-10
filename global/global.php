<?php

class GlobalUtil {
    private $baseUrl;
    public function __construct() {
        $this->baseUrl = "http://" . $_SERVER['SERVER_NAME'];
    }

    public function getBaseUrl() {
        return $this->baseUrl;
    }
}