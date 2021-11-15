<?php
$serverName = "localhost";                                      //server name
$userName = "root";                                             //username phpmyadmin
$password = "";                                                 //password for database
$dbName = "attend_manager";                                        		//database name
$con = mysqli_connect($serverName,$userName,$password,$dbName);	// to connect database
if(!$con)
{
	echo mysql_error($con);                          //display error if connetion is not set
}
?>
