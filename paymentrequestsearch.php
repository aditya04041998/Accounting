<?php
 $con=mysqli_connect('localhost','root','','accounting');
    $inputData=$_POST['inputData'];
?>


<div class="table table-responsive-md">
                <table class="table table-bordered text-center" style="box-shadow:0 4px 5px 0 grey">
                   
                    <?php 
                        $con=mysqli_connect('localhost','root','','accounting');
                        $query=mysqli_query($con,"SELECT * FROM `paymentrequest` where user_id='$inputData' ORDER BY id DESC");
                        $rows=mysqli_num_rows($query);

                        if($rows){
                            ?>
                             <thead class="text-white" style="background:#a56ab7;">
                                <th>S.no</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Particulars</th>
                                <th>Credit</th>
                                <th>Accept</th>
                                <th>Reject</th>
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
                        if($row['status']==0){
                            ?>
                            <tr style=background:#f6cacee1;>
                                <td><?php echo $sno;?></td>
                                <td><?php echo $row['date'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td>
                                    <span style="text-transform:capitalize;"><?php echo $row['title'];?></span><br>
                                    <span class="badge badge-pill badge-primary"><?php echo $row['remark'];?></span>
                                </td>
                                <td ><?php echo $row['debit'];?></td>
                            
                                <td><a onclick="return onClicks()" href="acceptpayrequest.php?account=<?php echo $row['user_id'];?> && id=1 && ref=<?php echo $row['reference']; ?>"  class="btn btns btn-sm btn-success">Accept</a></td>
                                <td><a onclick="return onClicks()" href="acceptpayrequest.php?account=<?php echo $row['user_id']; ?> && id=2 && ref=<?php echo $row['reference']; ?>"  class="btn btns btn-sm btn-danger">Reject</a></td>
                            </tr>
                        <?php
                        }
                        if($row['status']==2){
                            ?>
                            <tr style=background:#ee7e87be;>
                                <td><?php echo $sno;?></td>
                                <td><?php echo $row['date'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td>
                                    <span style="text-transform:capitalize;"><?php echo $row['title'];?></span><br>
                                    <span class="badge badge-pill badge-primary"><?php echo $row['remark'];?></span>
                                </td>
                                <td ><?php echo $row['debit'];?></td>
                                <td></td>
                                <td><span class="badge badge-danger badge-pill p-2">Rejected</span></td>
                            </tr>
                        <?php
                        }
                        if($row['status']==1){
                            ?>
                            </div>
                            <tr style="background:#a9ebb8df">
                                <td><?php echo $sno;?></td>
                                <td><?php echo $row['date'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td>
                                    <span><?php echo $row['title'];?></span><br>
                                    <span class="badge badge-pill badge-primary"><?php echo $row['remark'];?></span>
                                </td>
                                <td ><?php echo $row['debit'];?></td>
                                
                                <td><span class="badge badge-success badge-pill p-2">Accepted</span></td>
                                <td></td>
                            </tr>
                        <?php
                        }
                        }
                    ?>
                </table>
            </div>









