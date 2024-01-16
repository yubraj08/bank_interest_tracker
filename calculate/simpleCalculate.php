<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/home.css">
    <link rel="stylesheet" href="./style/style.css">
    <title>Saving Calculator</title>
</head>
<body>
    <?php
         if(isset($_GET['rate'])){
            $rate =  $_GET['rate'];
        }
    ?>
    <div class="container">
        <div class="side">
        <?php
             include "../Components/sidebar.php"
        ?>
        </div>
        <div class="calculate">
        <h1>Saving Calculator</h1>
        <a href="calculate.php">Switch</a>
            <div class="insert">
                <form class="first" method="POST">
                <div class="inputValue">
                <div class="in">
                <label>Deposit Amount (In Rupees)</label>
                <input type="number" placeholder="Eg: 200000" name="amount" required>
                </div>

                <div class="in">
                <label>Interest Rate (per annum)</label>
                <input type="number" oninput="validateInterestRate()" value="<?php echo $rate;?>" name="rate" placeholder="Eg: 5%" step="any" required>
                </div>

                <div class="in">
                <label>Tenure</label>
                <input type="number" name="time" placeholder="Eg: 3 years" required >
                </div>
                
                </div>
                <input class="submit" name="submit" type="submit" value="Calculate">

                </form>
            <?php

                $saving = 0;
                $time = 0;
                $amount = 0;
                $payable = 0;
                $total = 0;
                
                if(isset($_POST['submit'])){
                    $amount = $_POST['amount'];
                    $rate = $_POST['rate']/100;
                    $time = $_POST['time'];
                    

                    $saving = $amount * $time * $rate;

                    $total = $saving + $amount;
                    
                }
            ?>
            <div class="display">
            
            <div>
                <label>Principle : </label>
                <span><?php echo number_format($amount, 0, '', ',');?></span>
            </div>
            <div>
                <label>Tenure : </label>
                <span><?php if ($time < 2) {
                    echo $time . " year";} else {
                    echo $time . " years";
                    }?>
                </span>
            </div>
            <div>
                <label>Maturity Amount : </label>
                <span><?php echo number_format($total, 0, '', ',')?></span>
            </div>
            <div>
                <label>Interest Amount : </label>
                <span><?php echo number_format($saving, 0, '', ',');?></span>
            </div>
            </div>
            

        
        </div>
        <div class="saveBtn">
            <button>Save this data</button>
        </div>
    </div>
    <script>
         function validateInterestRate() {
        // Get the input element for the interest rate
        var rateInput = document.getElementsByName("rate")[0];
        
        // Get the value entered by the user
        var rateValue = parseFloat(rateInput.value);

        // Check if the rate is greater than 100
        if (rateValue > 100) {
            // Display an error message
            alert("Error: Interest rate cannot be greater than 100.");
            
            // Clear the input field
            rateInput.value = '';

            // Set focus back to the input field
            rateInput.focus();
        }
        if (rateValue < 0) {
            // Display an error message
            alert("Error: Interest rate cannot be lower than 0.1.");
            
            // Clear the input field
            rateInput.value = '';

            // Set focus back to the input field
            rateInput.focus();
        }
    }
    </script>
</body>
</html>