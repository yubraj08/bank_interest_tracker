<?php

include "../../Db/dbConnect.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['emi'])) {
    $userId = mysqli_real_escape_string($conn, $_POST['userId']);
    $bank = mysqli_real_escape_string($conn, $_POST['bank']);
    $princ = mysqli_real_escape_string($conn, $_POST['princ']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $rate = mysqli_real_escape_string($conn, $_POST['rate']);
    $tax = mysqli_real_escape_string($conn, $_POST['tax']);
    $total = mysqli_real_escape_string($conn, $_POST['total']);


    
    // $check = "delete from star where starid = '$id'";
    // $query  =   mysqli_query($conn, $check);
   

    // if($query){
        
    //     echo "deleted '$bank'";
    // }else{
    //     echo "error";
    // }

    
} 

?>