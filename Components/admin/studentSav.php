<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Saving Interest</title>
    <link rel="stylesheet" href="./style/edit.css">
</head>
<body>
<?php
    include "../../Db/dbConnect.php";
     if(isset($_GET['id'])){
        $id =  $_GET['id'];

        $sql = "Select * from student_saving where stid = $id";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
    }
   
    ?>
<div class="container">
        <form class="containers">
            <div class="editValue">
            <div class="ed">
                <label>Bank/Finance Name</label>
                <input type="text" name="bank" value="<?php echo $data['bank_name']?>">
            </div>

            <div class="ed">
                <label>Type</label>
                <input type="text" name="type" value="<?php echo $data['type']?>">
            </div>
    
            <div class="ed">
                <label>Minimum Balance</label>
                <input type="number" name="sRate" value="<?php echo $data['minBalance']?>">
            </div>
    
            <div class="ed">
                <label>Interest Rate</label>
                <input type="number" name="fRate" value="<?php echo $data['interest']?>">
            </div>
            </div>
            <div class="editBtn">
            <input type="submit" class="submit" value="Edit">
            
            </div>
        </form>
        <div class="cancel">
            <a href="../../page/studentSaving.php">
                <img src="../../assets/icon/multiply.png" alt="">
            </a>
        </div>
    </div>


</body>
</html>