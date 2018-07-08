<?php

    //print_r($_POST);
    
   //echo $firstname = $_POST['Firstname'];
    //echo $last = $_POST['Lastname'];
    //echo $email = $_POST['Email'];

$data->amount = $_POST['Amount'];
$myJSON = json_encode($data);

echo $myJSON;

?>


