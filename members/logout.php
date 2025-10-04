<?php
if( !defined('IN_TBDEV_REG') )
    header( "Location: {$TBDEV['baseurl']}/404.html" );

dbconn();

logoutcookie();

//header("Refresh: 0; url=./");
Header("Location: {$TBDEV['baseurl']}/index.php");

?>