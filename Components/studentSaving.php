<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="../Components/style/savingFixed.css">
    <title>Student Saving Interest</title>
</head>
<body>
    <div clas="savingFd">
       
        <center>
        <table border="0">
           <thead>
                <tr>
                    <th>Bank/Finance</th>
                    <th>Type</th>
                    <th>Interest</th>
                    <th>Minimum Balance</th>
                    <?php
                    if (isset($_SESSION['isAdmin']) == 1 ) {
                        ?>
                        <th>Edit</th>
                        <th>Delete</th>
                        <?php
                        
                    }else{
                        ?>
                        <th>Favorite</th>
                        <th>Calculate</th>
                        <?php
                    }?>
                </tr>
           </thead>
            <?php include "../Db/studentSave.php" ?>
        </table>
        </center>
    </div>
</body>
</html>