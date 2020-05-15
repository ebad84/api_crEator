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
?>