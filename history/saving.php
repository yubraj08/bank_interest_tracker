

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Saving Calculate History</title>
</head>
<body>

    <div class="container">
        <div class="side">
        <?php
             include "../Components/sidebar.php"
        ?>
        </div>
        <div class="deposit">
            <div class="sbtn">
                <?php include "../Components/search.php" ?>
            </div>
            <div class="first">
            <a href="./loan.php" class="stlink">
                <button class="checkStudent">Check Loan Calculate History</button>
            </a>
            
            
                <?php include "../Components/history/saving.php" ?>
            </div>
        </div>

        
       
        
    </div>
    
</body>
</html>