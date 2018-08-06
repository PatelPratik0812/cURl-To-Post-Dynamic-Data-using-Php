<?php
include('db.php');
if(isset($_POST['firstname'])){
    $fname=$con->real_escape_string($_POST['firstname']);
    $lname=$con->real_escape_string( $_POST['lastname']);
   
    $sql = "INSERT INTO `user` SET `firstname`='$fname',`lastname`='$lname' ";
    // print_r($sql);exit();
    $query=$con->query($sql);
   
    if($query){
        echo "Record Added Successfully!!!!";
    }
    else{
        echo "Unable To Add Record";
    }

}
?>