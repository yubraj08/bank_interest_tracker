<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Loan Interest</title>
    <link rel="stylesheet" href="./style/edit.css">
</head>
<body>
<?php
    include "../../Db/dbConnect.php";
    include "../../session/session.php";
     if(isset($_GET['id'])){
        $id =  $_GET['id'];

        $sql = "Select * from education_loan where eid = $id";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
    }
   
    ?>
<div class="container">
        <form class="containers" method="POST">
            <div class="editValue">
            <div class="ed">
                <label>Bank/Finance Name</label>
                <input type="text" name="bank" <?php if ($bank){echo "disabled";}?> value="<?php echo $data['name']?>">
            </div>
    
            <div class="ed">
                <label>Student Interest Rate</label>
                <input type="number" step="0.0001" name="sRate" value="<?php echo $data['interest']?>">
            </div>
            </div>
            <div class="editBtn">
            <?php
                if($bank == "none"){
                    ?>
                    <input type="submit" name="studentLoan" class="submit" value="Edit">
                    <?php
                }else{
                    ?>
                    <input type="submit" name="rstudentLoan" class="submit" value="Request Edit">
                    <?php
                }
            ?>
            
            </div>
        </form>
        <?php include "../../Db/admin/edit/editBank.php" ?>
        <?php include "../../Db/admin/edit/requestEdit.php" ?>
        <div class="cancel">
            <a onclick="onCancel()">
                <img src="../../assets/icon/multiply.png" alt="">
            </a>
        </div>
    </div>

    <script>
        const onCancel = ()=>{
            const isConfirmed = confirm(`Are you sure you want to cancel process`);
        if(isConfirmed){
            window.location.href = "../../page/studentLoan.php";
        }
        }
    </script>

</body>
</html>