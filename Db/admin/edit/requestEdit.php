<?php


include "../../Db/dbConnect.php";

//for saving and fixed interest rate

if(isset($_POST['rsavFix'])){
    $name = $_POST['bank'];
    $sinterest = $_POST['sRate'];
    $finterest = $_POST['fRate'];

    $request = "INSERT into saving_fixed (name,code,saving_rate,fixed_rate,status) values ('$name','code','$sinterest', '$finterest',1)";
    $result = mysqli_query($conn, $request);
    if($result){
        echo "requested";
        header("Location: ../../home/home.php?msg=requested");
    }else{
        echo "Error";
    }
}

//for personal loan interest rate

if(isset($_POST['rpersonal'])){
    $name = $_POST['bank'];
    $interest = $_POST['sRate'];

    $request = "INSERT into personal_loan (name,code,interest,status) values ('$name','code','$interest',1)";

    $result = mysqli_query($conn, $request);
    if($result){
        echo "requested";
        header("Location: ../../loan/loan.php?msg=requested");
    }else{
        echo "Error";
    }
}

// for student loan interest rate
if(isset($_POST['rstudentLoan'])){
    $name = $_POST['bank'];
    $interest = $_POST['sRate'];

    $request = "INSERT into education_loan (name,code,interest,status) values ('$name','code','$interest',1)";

    $result = mysqli_query($conn, $request);
    if($result){
        echo "Requested";
        header("Location: ../../page/studentLoan.php?msg=Requested");
    }else{
        echo "Error";
    }
}

//for student saving interest rate

if(isset($_POST['rstudentSav'])){
    $name = $_POST['bank'];
    $type = $_POST['type'];
    $min = $_POST['min'];
    $interest = $_POST['rate'];

    $request = "INSERT into student_saving (bank_name,code,type,minBalance,interest,status) values ('$name','code','$type','$min',$interest',1)";

    $result = mysqli_query($conn, $request);
    if($result){
        echo "Requested";
        header("Location: ../../page/studentSaving.php?msg=Requested");
    }else{
        echo "Error";
    }
}



?>

