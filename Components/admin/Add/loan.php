<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Personal Loan Interest</title>
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
                <label>Personal Interest Rate</label>
                <input type="number" step="0.0001" name="sRate">
            </div>
            </div>
            <div class="editBtn">
            <input type="submit" name="personal" class="submit" value="Add">
            
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
            window.location.href = "../../../loan/loan.php";
        }
        }
    </script>

</body>
</html>