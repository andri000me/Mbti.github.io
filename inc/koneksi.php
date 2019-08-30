<?php
$host		= "localhost";
$dbName		= "myers_briggs";
$truecont	= mysql_connect($host,"root","");

if (!mysql_select_db($dbName))
    die("Can't select database");
?>