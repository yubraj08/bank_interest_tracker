<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $bank = mysqli_real_escape_string($conn, $_POST['bank']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $interest = mysqli_real_escape_string($conn, $_POST['interest']);
    $userId = mysqli_real_escape_string($conn, $_POST['user']);

    echo $userId;
    $check = "Select stdSav,isStar from star where stdSav = '$id' and userId = '$userId'";
    $query  =   mysqli_query($conn, $check);
    $result = mysqli_fetch_assoc($query);

        $insertQuery = "INSERT INTO history (isStar,stdSav,userId,bank,types,interests) VALUES ('1','$id','$userId','$bank','$type','$interest')";
        mysqli_query($conn, $insertQuery);
        echo 'Bank name saved successfully';
        exit();
 
} 


?>