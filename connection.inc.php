<?php
session_start();
$con=mysqli_connect("localhost","root","","doremon");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/projects/gss/doremon/');
define('SITE_PATH','http://localhost/projects/gss/doremon/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
?>