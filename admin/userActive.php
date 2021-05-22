<?php
 include('../databaseConnect.php');
    $account=$_POST['account'];
    $active=$_POST['active'];
    $query=mysqli_query($con,"SELECT * from `user` where user_id='$account' ");
    $num=mysqli_num_rows($query);
    if($num){
        $data=mysqli_query($con,"UPDATE `user` SET `active`='$active' where user_id='$account' ");
        $query=mysqli_query($con,"SELECT * from `user` where user_id='$account'");
        while($row=mysqli_fetch_array($query)){
           echo $row['active'];
        }
    }
    






?>
