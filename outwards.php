<?php 
    $img_error="";
    $error="";
    session_start();
    
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

                $data=mysqli_query($con,"SELECT sum(debit) FROM `paymentrequest` where  user_id='$account' && status='0'");
                $drow=mysqli_num_rows($data);
                if($drow){
                    while($re=mysqli_fetch_array($data)){
                       $payment=$re['sum(debit)'];
                    } 
                }

                if($balance>=$payment+$amount){
                        $data=mysqli_query($con,"SELECT * FROM `data` where user_id='$account'");
                        $drow=mysqli_num_rows($data);
                        if($drow){
                            while($re=mysqli_fetch_row($data)){
                                $total=intval($re['10'])-$amount;
                            }  
                        }else{
                            $total=$balance-$amount;
                        }
                            
                        $query="INSERT INTO `data`( `user_id`, `title`, `credit`, `debit`, `date`, `file`, `payment_mode`,`remark`,`name`,`balance`) VALUES ('$account','$title','','$amount','$date','$file','$payment_mode','$remark','$name','$total')";
                        $result=mysqli_query($con,$query);
                        if($result){
                                $error="success"; 
                            $query2=mysqli_query($con,"UPDATE `user` SET `balance`='$total' WHERE user_id='$account'");
                        }

                        }else{
                            if($payment==""){
                                $error="error";
                            }else{
                                $error="payment";   
                            }
                        }        
                
        // if($file_type == "image/jpg" || $file_type =="image/png" || $file_type =="image/jpeg" ){
        //      }  else{
        //     $img_error="Please select jpeg/png/jif file.";
        // }
        
       
        

    }
    $con=mysqli_connect('localhost','root','','accounting');
    $login=$_SESSION['login'];
    $userId=$_SESSION['account'];
       // $success=$_SESSION['success'];
           if(!$login){
               header("Location: login.php");
           }
           $query=mysqli_query($con,"SELECT * FROM `user` where user_name='$login'");
           
               while($r=mysqli_fetch_array($query)){
                   $balance=$r['balance'];
               }
          
           
           $querys=mysqli_query($con,"SELECT * FROM `data` where user_id='$userId'");
           $res=mysqli_num_rows($querys);
           if($res){
               $queryss=mysqli_query($con,"SELECT sum(debit),sum(credit) FROM `data` where user_id='$userId'");
               while($r=mysqli_fetch_array($queryss)){
                   $totalDebit=$r['sum(debit)'];
                   $totalCredit=$r['sum(credit)'];     
               }
           }else{
               $totalCredit=0;
               $totalDebit=0;
           }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outwards</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="validation.js"></script>
    <style>
    body{
        background:#f0f1f6;
    }
        input[type="text"],input[type="file"]{
            box-shadow:none;
            outline:none;
            border:1px solid #ee833777;
            font-size:14px;
        }
        input[type="text"]:hover{
            box-shadow:none;
            outline:none;
        }
        input[type="file"]:hover{
            box-shadow:none;
            outline:none;
        }
        input[type="submit"]{
            height:32px;
            width:150px;
            border:none;
            box-shadow:none;
            outline:none;
        }
        input[type="submit"]:focus{
            border:none;
            box-shadow:0 0 10px 0 #ef6f14a9;
           
        }
        
      
        input[type="text"]:focus{
            box-shadow:none;
            border:1px solid #ef6f14a9;
        }
        input[type="file"]:focus{
            box-shadow:none;
            border:1px solid #ef6f14a9;
        }
        
        img{
            width:100%;
            height:130px;
            border-radius:6px;
        }
        .btns{
            color:#ffffff;
            text-transform:uppercase;
            font-size:11px;
            font-family:verdana;
            outline:none;
            box-shadow:none; 
        }
        .btns:hover{
            color:#ffffff;   
        }
        .btns:focus{
            box-shadow:0 0 5px 0 #4b97f0;
        }
       #img-box{
        position:fixed;height:50%;width:40%;border-radius:15px;
       }
       #closes{
        font-size:35px; font-weight:normal;cursor:pointer; color: rgba(0, 0, 0, 0.589); float:right; margin-right:-20px;margin-top:-40px;
       }
       #closes:hover{
           color:rgb(0, 0, 0);
       }
       @media only screen and (max-width:700px){
        #img-box{
             position:fixed;height:50%;width:80%;border-radius:15px;
            }
       }
       @media only screen and (max-width:500px){
        #img-box{
             position:fixed;height:50%;width:80%;border-radius:15px;
            }
       }
    </style>
    <script>
        function myReset(){
            $('#reset').trigger('reset');
        }
    </script>
</head>
<body>
    <div class="container " style="font-size:14px;">
       
    <nav class="navbar navbar-expand-lg navbar-dark " style="background:#563d7c;border-radius:4px;">
  <a class="navbar-brand" href="inwards.php">Accouinting</a>
  <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" ></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item">
        <a class="nav-link" href="inwards.php">Home <span class="sr-only">(current)</span></a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link active"  href="inwards.php">inwards</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" style="color:rgba(255, 255, 255, 0.678);" href="outwards.php">outwards</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="paymentrequest.php">SendPaymentRequest</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="logout.php">Logout</a>
      </li>
     
    </ul>
    
  </div>
</nav>

        <?php
            if($error=="success"){
               ?>
                <div class="alert alert-success text-center mt-3 alert-dismissible" style="margin-bottom:0px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong class="text-success">Success!</strong>&nbsp; Balance withdraw of <strong class="text-danger">&nbsp;Rs :</strong>&nbsp;<strong class="text-success"><?php echo $amount;?></strong>.
                </div>
               <?php
            }
            if($error=="error"){
                ?>
                 <div class="alert alert-danger text-center mt-3 alert-dismissible" style="margin-bottom:0px;">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong class="text-danger">Warning!</strong>&nbsp; Your account balance is <strong class="text-danger">&nbsp;Rs :</strong><strong class="text-danger">&nbsp;<?php echo $balance;?></strong>
                 </div>
                <?php
             }
             if($error=="payment"){
                ?>
                 <div class="alert alert-danger text-center mt-3 alert-dismissible" style="margin-bottom:0px;">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong class="text-danger">Pending!</strong>&nbsp; Your payment request balance <strong class="text-danger">&nbsp;Rs :</strong><strong class="text-danger">&nbsp;<?php echo $payment;?></strong>
                 </div>
                <?php
             }
        ?>
          <div class="row d-flex ml-2">
                <div  style=" margin-top:15px;margin-right:10px;border:1px solid #563d7c; border-radius:15px;align-items:center;box-shadow:0 0 5px 0 grey; " class="d-flex " >
                    <div style="background:#563d7c;font-size:13px; border-radius:12px 0px 0px 12px;" class="text-white p-2"><b>Main Balance</b></div>
                    <div style="font-size:16px;color:#563d7c;" class=" px-2"><b><?php echo $balance;?></b></div>
                </div>
                    <div   style=" margin-top:15px; margin-right:10px;border:1px solid #4b97f0; border-radius:15px;align-items:center;box-shadow:0 0 5px 0 grey; " class="d-flex " >
                        <div style="background:#4b97f0;font-size:13px; border-radius:12px 0px 0px 12px;" class="text-white p-2"><b>Inwards Balance</b></div>
                        <div style="font-size:16px;color:#4b97f0;" class="px-2"><b><?php echo $totalCredit; ?></b></div>
                    </div>
                <div  style="margin-top:15px; border:1px solid #ef6e14; border-radius:15px;align-items:center;box-shadow:0 0 5px 0 grey; " class="d-flex " >
                    <div style="background:#ef6e14;font-size:13px; border-radius:12px 0px 0px 12px;" class="text-white p-2"><b>Outwards Balance</b></div>
                    <div style="font-size:16px;color:#ef6e14;" class="px-2"><b><?php echo $totalDebit?></b></div>
                </div>
            </div>
        <div class="card my-3" style="border:none;box-shadow:0 0  5px grey;">
            <div class="card-header" style="background:#ef6e14;">
                <div class="row">
                     <div class="col-md-6 col-sm-6 col-6">
                        <h6 class="text-white">Outwards</h6>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6">
                         <a href="inwards.php" style="background:#4b97f0;" class="btn btns btn-sm float-right">Inwards</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <form action="" id="reset" onsubmit="return myfun()" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="">Outwards Title<span class="text-danger">*</span></label>
                                <input type="text" name="titles" id="titles" onkeyup="checkTitle()" placeholder="Enter title" class="form-control">
                                <div id="title_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="">Amount<span class="text-danger">*</span></label>
                                <input type="text" name="amount" id="amount" onkeyup="checkAmount()" placeholder="Enter amount" class="form-control">
                                <div id="amount_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="">Remarks<span class="text-danger">*</span></label>
                                <input type="text" name="remarks" id="remarks" onkeyup="checkRemark()" placeholder="Enter remarks" class="form-control">
                                <div id="remark_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="">Choose file</label>
                                <input type="file" name="choose_file" id="choose_file"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="">Payment modes <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="radio" onchange="checkStatus()" value="cash" name="status" id="status1">&nbsp;<label for="" >cash</label>
                                    <input type="radio" onchange="checkStatus()" value="cheque" name="status" id="status2">&nbsp;<label for="">cheque</label>
                                    <input type="radio" onchange="checkStatus()" value="online" name="status" id="status3">&nbsp;<label for="">online</label>
                                </div>
                                <div id="mode_error" style="margin-top:-20px;"></div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="form-group text-center">
                        <input type="submit" name="submit" value="Submit" class="btn mt-4 btn-sm text-white" style="background:#ef6e14;">
                        <!-- <button type="button" id="submit" style="width:150px;height:32px;" onclick="myReset()" class="btn btn-sm btn-danger">Reset</button> -->
                    </div>
                </form>
            </div>
        </div>
        <h5 class="text-danger" >Your Recent Outwards</h5>
        <hr>
          <?php 
          
                ?>
                        <div class="row mb-2">
                            <?php
                                $result_per_page=12;
                                $account=$_SESSION['account'];
                                $query=mysqli_query($con,"SELECT * FROM `data` where debit!='' && user_id='$account'");
                                $total_result=mysqli_num_rows($query);
                                $number_of_page=ceil($total_result/$result_per_page);
                                $total_page=$number_of_page;
                                if(!isset($_GET['page'])){
                                    $page=1;
                                }else{
                                    $page=$_GET['page'];
                                }
                                $this_page_first_result=($page-1)*$result_per_page;
                                $data=mysqli_query($con,"SELECT * FROM `data` where debit!='' && user_id='$account' ORDER BY id DESC LIMIT $this_page_first_result,$result_per_page");
                                
                                while($row=mysqli_fetch_array($data)){
                                ?>
                                     <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                        <div class="card my-2" style=" height:270px;width:100%;box-shadow:0 0 10px 0 grey;border:none;">
                                            <div class="card-header text-white" style="background:#ef6e14;">
                                                <span style="font-family:arial;font-size:13px; text-transform:capitalize;"><b><?php echo $row['title'];?></b></span><br>
                                                <span style="font-size:11px;"><?php echo $row['date'];?></span>
                                            </div>
                                            <div class="card-body" style="margin-top:-10px;">
                                            <span style="font-size:11px;"><i class=" text-success fas fa-rupee-sign"></i></span ><span class="text-success">&nbsp;<b>:</b>&nbsp;</span><span style="font-size:12px;"class="text-success text-bold"><b><?php echo $row['debit'];?></b></span>&nbsp;&nbsp;<b style="font-size:11px;color:#be3dcf"><?php echo $row['remark'];?></b><span></span><br>
                                            <span style="font-size:12px;color:#353535;text-transform:capitalize;" ><span style="font-size:11px;" class="text-danger"><b>CB :-</b></span ><b class="text-danger"><?php echo $row['balance'];?></b></span> 
                                            <div class="mt-2 text-danger">
                                                    <?php 
                                                        if($row['file']==""){
                                                            echo "Image Not Available";
                                                        }else{
                                                            ?>
                                                            <img onmouseover="zoomIn('<?php echo $row['file'];?>')"  src="uploads/<?php echo $row['file'];?>" >
                                                        <?php 
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                <?php 
                                }
                            ?>         
                        </div>
                    
                <div>
                    <nav aria-label="Page navigation example" >
                    <ul class="pagination  d-flex justify-content-center">
                 <?php 
                                           
                           
                            if($page<=$total_page){
                                if($page==$total_page){ $one=0;}else{$one=1;}
                                ?>
                                <li class="page-item <?php if($one==0){echo "disabled";}?> ">
                                    <a class="page-link " href="outwards.php?page=<?php echo $page+$one;?>"><?php echo "Next";?></a>
                                </li> 
                            <?php
                            }
                                
                                
                                $i=0;
                                for($pages=$page;$pages<=$total_page; $pages++){                               
                                    if($i!=4){
                                        ?>
                                    <li class="page-item <?php if($page==$pages){ echo "disabled"; } ?>" >
                                        <a class="page-link " style="<?php if($page==$pages){ echo "background:blue;color:white;"; } ?>" href="outwards.php?page=<?php echo $pages;?>"><?php echo $pages;?></a>
                                    </li> 
                                    <?php
                                    $i++;
                                    }
                                    
                                }
                             
                              

                               

                                if($total_page){
                                    ?>
                                    <li class="page-item">
                                        <span class="page-link">...</span>
                                    </li>

                                    <?php 
                                     if($page>0){
                                        if($page==1){ $one=0;}else{$one=1;}
                                        ?>
                                        <li class="page-item <?php if($page==1){echo "disabled";}?> ">
                                            <a class="page-link " href="outwards.php?page=<?php echo $page-$one;?>"><?php echo "Previous";?></a>
                                        </li> 
                                    <?php
                                    }
                                    ?>

                                <?php
                                    if($total_page==$page){
                                        ?>
                                        <li class="page-item ">
                                            <a class="page-link" href="outwards.php?page=<?php echo 1;?>"><?php echo ' First page';?></a>
                                        </li> 
                                        <?php
                                    }else{
                                        ?>
                                        <li class="page-item ">
                                            <a class="page-link" href="outwards.php?page=<?php echo $total_page;?>"><?php echo $total_page.' Last page';?></a>
                                        </li> 
                                        <?php
                                    }
                                ?>
                                <?php
                                }
            
                               
                        
                    
                 ?>  
            </ul>
                        </nav>
                    </div>
                   
                <?php
          
          ?>
             
            <div class="text-center text-white" >
                        <h5 class="text-white p-2" style="background:#563d7c;border-radius:5px;"><span>HISAAB | BIPL</span></h5>     
                    </div>
                 
                    
                </div>

         <div id="zoom" style="display:none;">
            <div style="height:100vh;width:100%;background:rgba(128, 128, 128, 0.205);display:flex;position:fixed;top:0;align-items:center;justify-content:center;">
                    <div id="img-box" >
                            <span onclick="closes()" id="closes"><strong>&times;</strong></span>
                        <img id="imgas" style="height:100%; width:100%;" src="uploads/circle.pnwg" alt="">
                    </div>
            </div>  
         </div>    
   <script>
        function zoomIn(asd){
            document.getElementById('zoom').style.display="block";
            document.getElementById('imgas').src="uploads/"+asd;
        }
        function closes(){
            document.getElementById('zoom').style.display="none"; 
        }
        // function zoomOut(x){
        //     x.style.height="50%";
        //     x.style.width="50%";
        // }
   </script>
</body>
</html>