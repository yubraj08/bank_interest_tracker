<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/styles.css">
   
    <title>Loan</title>
</head>
<body>
    <div class="container">
        <div class="side">
        <?php
            include "../Components/sidebar.php"
        ?>
        </div>
        <div class="deposit">
        <div class="banks">
            <a href="./savingFixed.php?type=savingFix" class="stlink">
                <button class="checkStudent">Check Saving and Fixed Interest</button>
            </a>
            <a href="./studentSav.php?type=studentSave" class="stlink">
                <button class="checkStudent">Check Student Saving Interest</button>
            </a>
            <a href="./personalLoan.php?type=personalLoan" class="stlink">
                <button class="checkStudent">Check Persoanl Loan Interest</button>
            </a>
            <a href="./studentLoan.php?type=studentLoan" class="stlink">
                <button class="checkStudent">Check Student Loan Interest</button>
            </a>
        </div>
            <div class="first">
            <?php include "../Components/request/savingFixed.php" ?>
            </div>
        </div>
        
       
        
    </div>
    
</body>
</html>