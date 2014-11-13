<?php
$conn_error = 'Could not connect';
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'indus_shop';
$link = mysql_connect($mysql_host, $mysql_user, $mysql_pass);
mysql_select_db($mysql_db,$link);
?>