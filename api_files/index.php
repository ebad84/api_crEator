<?php
require_once 'engine/db.php';//require database
$action=$_GET['act'];//getting action from url

if ($action=='insert'){//do reaction for inserting
    $value1=$_GET['value1'];
    $value2=$_GET['value2'];
    $query = mysqli_query($db, "INSERT INTO  your_table (`column1`, `column2`) VALUES ('$value1','$value2')");
    echo (mysqli_error($db));
}


if ($action=='delete'){//do reaction for deleting
    $query = mysqli_query($db, "DELETE FROM your_table");
    echo (mysqli_error($db));
}


if ($action=='select'){//do reaction for selecting
    $a=0;
    $query = mysqli_query($db, "SELECT * FROM your_table ORDER BY id DESC");
    echo (mysqli_error($db));
    while($row = $query->fetch_assoc()){
        if ($a==1){
            echo ',';
        }
        echo $row['your_column'];
        $a=1;
    }
}


else{//do reaction if order in action not found
    echo 'we can not use this order not found';
}


/**
 * change this file and db.php(engine/db.php) with your information.
 *
 *
 *
 * ok. are you changed those?
 * thanks. you will can creat a database soon!
 * for creating it, just open this file(database_file/database.sql) whit a editor and
 * replace Database with your database name that you write it in db.php(engine/db.php) file.
 *
 * ok. after changing settings, open your host(localhost or internet host) and
 * creat a database that name is database name in db.php(engine/db.php) file.
 * then creat a user that username and password is username and password that you write it in db.php(engine/db.php) file.
 *
 * then import database file(database_file/database.sql) in your database.
 *
 * then upload your new files that you changed that (files is : index.php and test.php and engine/db.php) in your host
 *
 * then go to this url : http://your_api_domain.com/test.php?act=test&order=test
 *
 * if that output is :
 * /////////////////////////////////////////////////////////////
 * HELLO WLORD!
 * I HAVE AN API SERVER
 * LETS GO TO WATCH MY SECTION:
 *
 * I CAN AND CANNOT DO{
 *      INSERT TO DATABASE : TRUE
 *      SELECT FROM DATABASE : TRUE
 *      DELETE DATABASE : TRUE
 *      MYSQLI_DATABASE_CONNECT :   true
 * }
 * MY ERRORS ARE {
 *      INSERT TO DATABASE : NOT FOUND ERROR
 *      SELECT FROM DATABASE : NOT FOUND ERROR
 *      DELETE FROM DATABASE : NOT FOUND ERROR
 *      MYSQLI_DATABASE_CONNECT : NOT FOUND ERROR
 * }
 *
 * TOTALLY THER IS ERROR : 0
 *
 * YOUR API SERVER IS RUNNIG AND YOU HAVE IT AND YOU CAN USE IT!
 * ENJOY!!
 * /////////////////////////////////////////////////////////////
 *
 * ok. if you see this messages your connecting to api server is tru and you can use it in
 * your programs, sites and etc
 * for use it you can go to this url : http://your_api_domain.com/index.php?act=your_action and etc
 * write action(select,insert,delete) in place of your_action and add (value1 and value2) after act if you used
 * insert
 * for example by insert : http://your_api_domain.com/index.php?act=insert&value1=test1&value2=test2
 * and for example by others : http://your_api_domain.com/index.php?act=select
 * and : http://your_api_domain.com/index.php?act=delete
 * enjoy it!
 *
 * THIS PACKAGE IS CREATED BY MohammadReza Ebadollah. in 14 May 2020
 * AND ENDED IN 15 May 2020
 *
 */

?>