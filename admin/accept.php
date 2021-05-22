<?php
  include('../databaseConnect.php');
    $account=$_POST['account'];
    $id=$_POST['id'];
    $reference=$_POST['reference'];

    $q=mysqli_query($con,"SELECT balance FROM `admin_log` ORDER BY balance DESC LIMIT 1");
         while($r=mysqli_fetch_array($q)){
            $total=intVal($r['balance']);
            // print_r($total);
         }
    $query=mysqli_query($con,"SELECT * from `paymentrequest` where reference='$reference' && status=0");
    $num=mysqli_num_rows($query);
    if($num){
        if($row=mysqli_fetch_array($query)){
                   $bal=intVal($row['debit']);
                   $account=$row['user_id'];
                   $email=$row['email'];
                   $adbal=$bal+$total;
                   $title=$row['title'];
                   $credit=$row['debit'];
                   $date=date("d M Y");
                   $file="";
                   $payment=$row['payment_mode'];
                   $remark=$row['remark'];
                   $name=$row['name'];
                   $balance=$row['balance'];
                   $status=$id;
                   if($status==2){
                    $reqs=mysqli_query($con,"UPDATE `paymentrequest` SET `status`='$status' where reference='$reference' ");
                    $query=mysqli_query($con,"SELECT * from `paymentrequest` where reference='$reference'");  
  
                        if($r=mysqli_fetch_array($query)){
                        echo $r['status'];
                        }
                    }else{
                        $adminhistory=mysqli_query($con,"INSERT INTO `adminhistory`( `email`, `user_id`, `title`, `credit`, `debit`, `date`, `file`, `payment_mode`, `remark`, `name`, `balance`) VALUES ('$email','$account','$title','$credit','','$date','$file','$payment','$remark','$name','$adbal')");
                        $reqs=mysqli_query($con,"UPDATE `paymentrequest` SET `status`='$status' where reference='$reference' ");
                    
                        $req=mysqli_query($con,"UPDATE `admin_log` SET `balance`='$adbal' WHERE email='$email'");
                        $d=mysqli_query($con,"SELECT * FROM `user` WHERE user_id='$account'");
                        if($r=mysqli_fetch_array($d)){
                            $sub=$r['balance']-$bal;
                            $reqa=mysqli_query($con,"UPDATE `user` SET `balance`='$sub' where user_id=$account");
                        } 
                        $query=mysqli_query($con,"SELECT * from `paymentrequest` where reference='$reference'");  
    
                        if($r=mysqli_fetch_array($query)){
                            echo $r['status'];
                        }
                    }
                  
                }
    

            }




?>
