
<?php

include "../Db/dbConnect.php";

 
    $personal = "select * from personal_loan where name = '$bank' and status = 1 ";
    $perRes = mysqli_query($conn,$personal);

    $num = mysqli_num_rows($perRes);

    if($num <= 0){
        ?>
        <tr>
        <td style="text-align:center;padding:1rem" colspan=3>Empty</td>
        </tr>
        <?php
    }else{
        while ($row = mysqli_fetch_assoc($perRes)) {
            ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td style="text-align:center"><?php echo $row['interest'] ?></td>
                <td style="text-align:center">
                <?php
                    if($row['status'] == 1){
                        echo "Pending";
                    }
                    if($row['status'] == 2){
                        echo "Approved";
                    }
                    if($row['status'] == 3){
                        echo "Rejected";
                    }

                ?>
            </td>
                <?php
    
        }
    }

?>

    


