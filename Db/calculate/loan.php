<?php

include "../../Db/dbConnect.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['emi'])) {
    $userId = mysqli_real_escape_string($conn, $_POST['userId']);
    $bank = mysqli_real_escape_string($conn, $_POST['bank']);
    $princ = mysqli_real_escape_string($conn, $_POST['princ']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $rate = mysqli_real_escape_string($conn, $_POST['rate']);
    $emi = mysqli_real_escape_string($conn, $_POST['emi']);
    $total = mysqli_real_escape_string($conn, $_POST['total']);


    $totals =  number_format($total, 0, '', ',');
    echo $totals;
    // $check = "delete from star where starid = '$id'";
    // $query  =   mysqli_query($conn, $check);
   

    // if($query){
        
    //     echo "deleted '$bank'";
    // }else{
    //     echo "error";
    // }

    
} 

?>