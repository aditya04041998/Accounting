<?php
 $con=mysqli_connect('localhost','root','','accounting');
    $inputData=$_POST['inputData'];
?>


<div class="table-responsiv-md">
            <table class="table table-bordered text-center" style="box-shadow:0 4px 5px 0 grey">
         
<?php

$query=mysqli_query($con,"SELECT * FROM `adminhistory` WHERE user_id='$inputData'");
$rows=mysqli_num_rows($query);
    if($rows){
        ?>
        <thead class="text-white" style="background:#a56ab7;">
            <th>S.no</th>
            <th>Date</th>
            <th>Name</th>
            <th>Particulars</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Balance</th>
        </thead>
    <?php
    }else{
        ?> 
        <div class="alert alert-danger text-center mt-4">
            <span>No record found</span>
        </div>
        <?php
    }

        $sno=0;
        while($row=mysqli_fetch_array($query)){
            $sno++;
                if($row['credit']!=""){
                            ?>
                            <tr style=background:#b2ecc0;>
                                <td><?php echo $sno;?></td>
                                <td><?php echo $row['date'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td>
                                    <span style="text-transform:capitalize;"><?php echo $row['title'];?></span><br>
                                    <span class="badge badge-pill badge-primary"><?php echo $row['remark'];?></span>
                                </td>
                                <td ><?php echo $row['debit'];?></td>
                                <td><?php echo $row['credit'];?></td>
                                <td><?php echo $row['balance'];?></td>
                            </tr>
                        <?php
                }
                if($row['debit']!=""){
                            ?>
                            </div>
                            <tr style="background:#f6cacee1">
                                <td><?php echo $sno;?></td>
                                <td><?php echo $row['date'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td>
                                    <span><?php echo $row['title'];?></span><br>
                                    <span class="badge badge-pill badge-primary"><?php echo $row['remark'];?></span>
                                </td>
                                <td ><?php echo $row['debit'];?></td>
                                <td ><?php echo $row['credit'];?></td>
                                <td><?php echo $row['balance'];?></td>
                            </tr>
                        <?php
                    }
        
}

?>
</table>
</div>