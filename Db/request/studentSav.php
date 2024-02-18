
<?php

include "../Db/dbConnect.php";

    $personal = "select * from student_saving where bank_name = '$bank' and status = 1 ";
    $perRes = mysqli_query($conn,$personal);

    $num = mysqli_num_rows($perRes);
    if($num > 0){
        while ($row = mysqli_fetch_assoc($perRes)) {
            ?>
            <tr>
                <td><?php echo $row['bank_name'] ?></td>
                <td style="text-align:center;padding:1rem"><?php echo $row['type'] ?></td>
                <td style="text-align:center"><?php echo $row['interest'] ?></td>
                <td style="text-align:center"><?php echo $row['minBalance'] ?></td>
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
    }else{
        ?>
        <tr>
        <td style="text-align:center;padding:1rem" colspan=5>Empty</td>
        </tr>
        <?php
    }
