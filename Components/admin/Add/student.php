<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Saving Interest</title>
    <link rel="stylesheet" href="../style/edit.css">
</head>
<body>

<div class="container">
        <form class="containers" method="POST">
            <div class="editValue">
            <div class="ed">
                <label>Bank/Finance Name</label>
                <input type="text" name="bank">
            </div>

            <div class="ed">
                <label>Code</label>
                <input type="text" name="code">
            </div>

            <div class="ed">
                <label>Type</label>
                <input type="text" name="type">
            </div>
    
            <div class="ed">
                <label>Minimum Balance</label>
                <input type="number" step="0.0001" name="min">
            </div>
    
            <div class="ed">
                <label>Interest Rate</label>
                <input type="number" step="0.0001" name="rate">
            </div>
            </div>
            <div class="editBtn">
            <input type="submit" name="studentSav" class="submit" value="Add">
            
            </div>
        </form>
        <?php include "../../../Db/admin/add/addBank.php" ?>
        <div class="cancel">
            <a onclick="onCancel()">
                <img src="../../../assets/icon/multiply.png" alt="">
            </a>
        </div>
    </div>
    <script>
        const onCancel = ()=>{
            const isConfirmed = confirm(`Are you sure you want to cancel process`);
        if(isConfirmed){
            window.location.href = "../../../page/studentSaving.php";
        }
        }
    </script>

</body>
</html>