<?php
//$db = mysqli_connect('localhost','user_username','user_password','database_name');
$db = mysqli_connect('localhost','root','','database');
mysqli_query($db, "SET character_set_results=utf8;");
mysqli_query($db, "SET character_set_client=utf8;");
mysqli_query($db, "SET character_set_connection=utf8;");
mysqli_query($db, "SET character_set_database=utf8;");
mysqli_query($db, "SET character_set_server=utf8;");
session_start();

?>