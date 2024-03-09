

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/home.css">
    <title>Home</title>
</head>
<body>
  <!-- <button>
    <a href="../logout/logout.php">logout</a>
  </button> -->
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

            <?php
                if ($isAdmin == 1 ) {
                    ?>
                   <a href="../Components/admin/Add/personal.php">
                    <button>Add</button>
                   </a>
                    <?php
                    
                }
            ?>
            
                <?php include "../Components/savingFixed.php" ?>
            </div>
        </div>

        
       
        
    </div>
    
</body>
</html>