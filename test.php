<?php
error_reporting(0);
ini_set('display_errors', 0);
require_once 'engine/db.php';//require database

$error='0';

$connect_error='NOT FOUND ERROR';
$connect_action='0';
if (!$db) {
    $error='1';
    $connect_action='1';
    $connect_error=mysqli_error($db);
}

$value1='value1';
$value2='value2';
$insert = mysqli_query($db, "INSERT INTO  your_table (`column1`, `column2`) VALUES ('$value1','$value2')");
$insert_errors=mysqli_error($db);
$insert_action='';
if ($insert_errors!=''){
    $insert_action='<b style="color: red">FALSE</b>';
    $error='1';
}else{
    $insert_action='<b style="color: green">TRUE</b>';
}
//<p color="red">NOT FOUND ERROR</p>




$select = mysqli_query($db, "SELECT * FROM your_table ORDER BY id DESC");
$select_errors=mysqli_error($db);
$select_action='';
if ($select_errors!=''){
    $error='1';
    $select_action='<b style="color: red">FALSE</b>';
}else{
    $select_action='<b style="color: green">TRUE</b>';
}





$delete = mysqli_query($db, "DELETE FROM your_table");
$delete_errors=mysqli_error($db);
$delete_action='';
if ($delete_errors!=''){
    $error='1';
    $delete_action='<b style="color: red">FALSE</b>';
}else{
    $delete_action='<b style="color: green">TRUE</b>';
}
if ($select_action=='<b style="color: red">FALSE</b>' or $delete_action=='<b style="color: red">FALSE</b>' or $insert_action=='<b style="color: red">FALSE</b>'){
    $error='1';
    $connect_error='';
    $connect_error=$connect_error+mysqli_error($db);
}


if ($insert_errors==''){
    $insert_errors='<b style="color: green">NOT FOUND ERROR</b>';
}
if ($delete_errors==''){
    $delete_errors='<b style="color: green">NOT FOUND ERROR</b>';
}
if ($select_errors==''){
    $select_errors='<b style="color: green">NOT FOUND ERROR</b>';
}


$mysql_error_action='';
$mysql_error='';
$a=mysqli_connect_error();
if($db) {
    $mysql_error_action='<b style="color: green">TRUE</b>';
    $mysql_error='<b style="color: green">NOT FOUND ERROR</b>';
}
else{
    $error='1';
    $mysql_error_action= '<b style="color: #ff0000">FALSE</b>';
    $mysql_error=mysqli_connect_error();
}

$TITLE="
<!DOCTYPE html>
      <html>
            <head>
		<meta charset=”utf-8”/>
		<title>api_server_testing</title>
            </head>
            <body>
                <b><i>HELLO WLORD!</i></b><br/>
        		<b><i>I HAVE AN API SERVER</i></b><br/>
        		<b><i>LETS GO TO WATCH MY SECTION:</i></b><br/><br/>
        		<b><i>I CAN AND CANNOT DO{</i></b><br/>
        		<b><i>INSERT TO DATABASE : ".$insert_action."</i></b><br/>
        		<b><i>SELECT FROM DATABASE : ".$select_action."</i></b><br/>
        		<b><i>DELETE FROM DATABASE : ".$delete_action."</i></b><br/>
        		<b><i>MYSQLI_DATABASE_CONNECT : ".$mysql_error_action."</i></b><br/>
        		<b><i>}</i></b><br/><br/>
        		<b><i>MY ERRORS ARE {</i></b><br/>
        		<b><i>INSERT TO DATABASE : ".$insert_errors."</i></b><br/>
        		<b><i>SELECT FROM DATABASE : ".$select_errors."</i></b><br/>
        		<b><i>DELETE FROM DATABASE : ".$delete_errors."</i></b><br/>
        		<b><i>MYSQLI_DATABASE_CONNECT : ".$mysql_error."</i></b><br/>
        		<b><i>}</i></b><br/>
        		<br/>
        		<b><i>TOTALLY THER IS ERROR : ".$error."</i></b><br/>
            </body>
     </html>
";

echo $TITLE;
if ($error=='1'){
    echo '<br>you can fix this error by changing setting in db.php file.';
    echo '<br>Make sure there are no errors here and the error comes from the db.php file';
    echo '<br>If there is a problem here, it will be displayed at the top and the reason is';
    echo '<br>Make sure you have entered the database connection settings correctly';
}else{
    echo '<br>YOUR API SERVER IS RUNNIG AND YOU HAVE IT AND YOU CAN USE IT!';
    echo "<br>ENJOY!!";
}
?>