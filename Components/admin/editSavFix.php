<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Saving and Fixed Interest</title>
    <link rel="stylesheet" href="./style/edit.css">
</head>
<body>
<?php
    include "../../Db/dbConnect.php";
    include "../../session/session.php";
     if(isset($_GET['id'])){
        $id =  $_GET['id'];

        $sql = "Select * from saving_fixed where sid = $id";
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
                <label>Saving Interest Rate</label>
                <input type="number" step="0.0001" name="sRate" value="<?php echo $data['saving_rate']?>">
            </div>
    
            <div class="ed">
                <label>Fixed Interest Rate</label>
                <input type="number" step="0.0001" name="fRate" value="<?php echo $data['fixed_rate']?>">
            </div>
            </div>
            <div class="editBtn">
            <?php
                if($bank == "none"){
                    ?>
                    <input type="submit" name="savFix" class="submit" value="Edit">
                    <?php
                }else{
                    ?>
                    <input type="submit" name="rsavFix" class="submit" value="Request Edit">
                    <?php
                }
            ?>
            </div>
            
        </form>
        
        <?php include "../../Db/admin/edit/editBank.php" ?>
        <?php include "../../Db/admin/edit/requestEdit.php" ?>
        <div class="cancel" >
            <a onclick="onCancel()">
                <img src="../../assets/icon/multiply.png" alt="">
            </a>
        </div>
    </div>

    <script>
        const onCancel = ()=>{
            const isConfirmed = confirm(`Are you sure you want to cancel process`);
        if(isConfirmed){
            window.location.href = "../../home/home.php";
        }
        }
    </script>
</body>
</html>