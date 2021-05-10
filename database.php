<?php 
    $img_error="";
    $error="";
    if(isset($_POST['submit'])){
        $title=$_POST['titles'];
        $amount=$_POST['amount'];
        $payment_mode=$_POST['status'];
        $remark=$_POST['remarks'];
        $date=date("d M Y");
        $account=$_SESSION['account'];
        $name=$_SESSION['name'];
        $file=$_FILES['choose_file']['name'];
        $tmp=$_FILES['choose_file']['tmp_name'];
        $file_type=$_FILES['choose_file']['type'];
        $login=$_SESSION['login'];
            $dir="uploads/".$file;
            move_uploaded_file($tmp,$dir);
            $con=mysqli_connect('localhost','root','','accounting');
                $query=mysqli_query($con,"SELECT * FROM `user` where user_name='$login'");
                while($r=mysqli_fetch_array($query)){
                    $balance=$r['balance'];
                }
                $data=mysqli_query($con,"SELECT * FROM `data` where user_id='$account'");
                $drow=mysqli_num_rows($data);
                if($drow){
                    while($re=mysqli_fetch_row($data)){
                        $total=intval($re['10'])+$amount;
                    }  
                }else{
                    $total=$balance+$amount;
                }
                    
                $query="INSERT INTO `data`( `user_id`, `title`, `credit`, `debit`, `date`, `file`, `payment_mode`,`remark`,`name`,`balance`) VALUES ('$account','$title','$amount','','$date','$file','$payment_mode','$remark','$name','$total')";
                $result=mysqli_query($con,$query);
                if($result){
                    $error="success";
                    $query2=mysqli_query($con,"UPDATE `user` SET `balance`='$total' WHERE user_id='$account'");
                }
        
        
        // if($file_type == "image/jpg" || $file_type =="image/png" || $file_type =="image/jpeg" ){
        //      }  else{
        //     $img_error="Please select jpeg/png/jif file.";
        // }
        
       
        

    }

    if(isset($_POST['paymentrequest'])){
        $title=$_POST['titles'];
        $amount=$_POST['amount'];
        $payment_mode=$_POST['status'];
        $remark=$_POST['remarks'];
        $date=date("d M Y");
        $account=$_SESSION['account'];
        $name=$_SESSION['name'];
        $file=$_FILES['choose_file']['name'];
        $tmp=$_FILES['choose_file']['tmp_name'];
        $file_type=$_FILES['choose_file']['type'];
        $login=$_SESSION['login'];
            $dir="uploads/".$file;
            move_uploaded_file($tmp,$dir);
            $con=mysqli_connect('localhost','root','','accounting');
                $query=mysqli_query($con,"SELECT * FROM `user` where user_name='$login'");
                while($r=mysqli_fetch_array($query)){
                    $balance=$r['balance'];
                }
               if($balance>=$amount){
                $data=mysqli_query($con,"SELECT sum(debit) FROM `paymentrequest` where  user_id='$account' && status='0'");
                $drow=mysqli_num_rows($data);
                if($drow){
                    while($re=mysqli_fetch_array($data)){
                       $payment=$re['sum(debit)'];
                    }  
                    $datas=mysqli_query($con,"SELECT * FROM `admin_log` ");
                    while($d=mysqli_fetch_array($datas)){
                        $emails=$d['email'];
                    }
                    if($balance>=$payment+$amount){
                        $payment;
                        $total=$balance-($payment+$amount);
                        $reference=str_shuffle('123456789');
                        if($re['reference']==$reference){
                            $reference=str_shuffle('123456789');
                        }else{
                            $query="INSERT INTO `paymentrequest`(`email`,`user_id`, `title`, `credit`, `debit`, `date`, `file`, `payment_mode`,`remark`,`name`,`balance`,`status`,`reference`) VALUES ('$emails','$account','$title','','$amount','$date','$file','$payment_mode','$remark','$name','$total','0','$reference')";
                            $result=mysqli_query($con,$query);
                            $error="success";
                        }
                    
                    }else{
                        $error="payrequest";
                    }
                }else{
                    $total=$balance-$amount;
                    $query="INSERT INTO `paymentrequest`(`email`,`user_id`, `title`, `credit`, `debit`, `date`, `file`, `payment_mode`,`remark`,`name`,`balance`,`status`) VALUES ('aditya@gmail.com','$account','$title','','$amount','$date','$file','$payment_mode','$remark','$name','$total','0')";
                    $result=mysqli_query($con,$query);
                    $error="success"; 
                }
                    
                
                // if($result){
                //     $error="success";
                //     $query2=mysqli_query($con,"UPDATE `user` SET `balance`='$total' WHERE user_id='$account'");
                // }
                
               }else{
                $error="error";
               }
        
        
        // if($file_type == "image/jpg" || $file_type =="image/png" || $file_type =="image/jpeg" ){
        //      }  else{
        //     $img_error="Please select jpeg/png/jif file.";
        // }
        
       
        

    }


    
?>