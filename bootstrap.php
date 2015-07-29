<?php
ini_set('opcache.enable', 0);
session_start();
require_once("classLoader.php");
require_once("constants.php");
$auto = new \ClassLoader();
$auto->register();