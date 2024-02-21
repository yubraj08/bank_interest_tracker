<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/home.css">
    <link rel="stylesheet" href="./style/style.css">
    <title>EMI Calculator</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

 
    <?php
    $userId = 0;
    $banks = $_GET['bank'];
     if(isset($_GET['bank']) && isset($_GET['rate'])){
        $rate =  $_GET['rate'];
        $bank = $_GET['bank'];
        $type = $_GET['type'];
        $userId = $_GET['userId'];

    }else{
        $userId = 0;
    }

    ?>
    <div class="container">
        <div class="side">
        <?php
             include "../Components/sidebar.php"
        ?>
        </div>
        <div class="calculate">
        <h1>EMI Calculator</h1>
        <a href="depositCalculator.php?bank=none">Switch</a>
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
                <label>Loan Amount (In Rupees)</label>
                <input type="number" placeholder="Eg: 200000" name="amount" required>
                </div>

                <div class="in">
                <label>Interest Rate (per annum)</label>
                <input type="number" oninput="validateInterestRate()" name="rate" value="<?php echo $rate?>" placeholder="Eg: 5%" step="any" required>
                </div>

                <div class="in">
                <label>Loan Tenure</label>
                <input type="number" name="time" placeholder="Eg: 3 years" required >
                </div>
                
                </div>
                <input class="submit" name="submit" type="submit" value="Calculate">

                </form>
            <?php
            
                $year = 0;
                $emi = 0;
                $amount = 0;
                $payable = 0;
                $total = 0;
                if(isset($_POST['submit'])){
                    $amount = $_POST['amount'];
                    $rate = $_POST['rate']/12/100;
                    $year = $_POST['time'];
                    $time = $_POST['time']*12;
                    
                    $emi = $amount * $rate * ((pow(1 + $rate, $time)) / (pow(1 + $rate, $time) - 1));

                    $total = $emi * $time;

                    $payable = $total - $amount;
                    
                }
            ?>
            <div class="display">
            <div>
                <label>Monthly EMI : Rs.</label>
                <span><?php echo number_format($emi, 0, '', ',') ?></span>
            </div>
            <div>
                <label>Principle : Rs. </label>
                <span><?php echo number_format($amount, 0, '', ',');?></span>
            </div>
            <div>
                <label>Tenure : </label>
                <span><?php if ($year < 2) {
                    echo $year . " year";} else {
                    echo $year . " years";
                    }?>
                </span>
            </div>
            <div>
                <label>Interest Payable : Rs. </label>
                <span><?php echo number_format($payable, 0, '', ',')?></span>
            </div>
            <div>
                <label>Total Payment : Rs. </label>
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

    function saveData(princ,time,rate,emi,total,bank,type,userId){
        console.log(bank)
$.ajax({
       type: 'POST',
       url: '../Db/calculate/loan.php', // Specify the server-sidfe script to handle the data
       data: 
       { princ : princ,
        time : time,
        rate : rate,
        emi : emi,
        total : total,
        bank : bank,
        userId : userId

    },
       success: function(response) {
           console.log(response); // Log the server's response (you can handle it accordingly)
        //    location.reload()
       }
   });
    }

    </script>
</body>
</html>