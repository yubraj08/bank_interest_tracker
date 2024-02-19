<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/home.css">
    <link rel="stylesheet" href="./style/style.css">
    <title>Deposit Calculator</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<?php

    $banks = $_GET['bank'];
     if(isset($_GET['rate'])){
        $rate =  $_GET['rate'];


    }
    ?>
<?php
     if(isset($_GET['srate'])){
        $rate =  $_GET['srate'];
        $bank = $_GET['bank'];

    }
    ?>

    <div class="container">
        <div class="side">
        <?php
             include "../Components/sidebar.php"
        ?>
        </div>
        <div class="calculate">
        <h1>Deposit Calculator</h1>
        <a href="calculate.php?bank=none">Switch</a>
            <div class="insert">
             
                <form class="first" method="POST">
                <?php
                if($banks != "none"){
                    ?>
                        <h1><?php echo $bank = $_GET['bank'];?></h1>
                    <?php
                }
                ?>
                <div class="inputValue">
                <div class="in">
                <label>Deposit Amount (In Rupees)</label>
                <input type="number" placeholder="Eg: 200000" name="amount" required>
                </div>

                <div class="in">
                <label>Interest Rate (per annum)</label>
                <input type="number" oninput="validateInterestRate()" value="<?php echo $rate?>" name="rate" placeholder="Eg: 5%" step="any" required>
                </div>

                <div class="in">
                <label>Compounding Periods</label>
                    <select name="compound" id="" required>
                        <option value="">Select Compounding Periods</option>
                        <option value="1">Annually</option>
                        <option value="2">Semi-annually</option>
                        <option value="4">Quarterly</option>
                        <option value="12">Monthly</option>
                    </select>
                </div>

                <div class="in">
                <label>Deposit Tenure</label>
                <input type="number" name="time" placeholder="Eg: 3 years" required >
                </div>
                
                </div>
                <input class="submit" name="submit" type="submit" value="Calculate">

                </form>
            <?php

                $maturity = 0;
                $time = 0;
                $amount = 0;
                $payable = 0;
                $total = 0;
                $tax = 0;
                if(isset($_POST['submit'])){
                    $amount = $_POST['amount'];
                    $rate = $_POST['rate']/100;
                    $time = $_POST['time'];
                    $cp = $_POST['compound'];
                    

                    $maturity = $amount *(pow((1+($rate/$cp)),($cp*$time)));

                    $total = $maturity - $amount;
                    $tax = $total * 0.05;
                    
                }
            ?>
            <div class="display">
            
            <div>
                <label>Principle : Rs. </label>
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
                <label>Maturity Amount : Rs.</label>
                <span><?php echo number_format($maturity, 0, '', ',')?></span>
            </div>
            <div>
                <label>Tax Amount : Rs. </label>
                <span><?php echo number_format($tax, 0, '', ',');?></span>
            </div>
            <div>
                <label>Interest Amount : Rs.</label>
                <span><?php echo number_format($total, 0, '', ',');?></span>
            </div>
            <?php
            if($bank != "none" && $amount > 0){
                ?>
        <div class="saveBtn">
            <button onclick="saveData('<?php echo $amount?>','<?php echo $time?>','<?php echo $rate?>',
            '<?php echo $emi?>','<?php echo $total?>','<?php echo $bank?>',
            '<?php echo $type?>','<?php echo $userId?>')">Save this data</button>
        </div>
                <?php
            }
        ?>
            </div>
            

        
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