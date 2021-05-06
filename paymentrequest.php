<?php
    session_start();
     include('database.php');
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
    <title>Inwards</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="validation.js"></script>
    
    <style>
    body{
        background:#f0f1f6;
    }
        input[type="text"],input[type="file"]{
            box-shadow:none;
            outline:none;
            border:1px solid #80bdff9d;
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
        
        }
        input[type="submit"]:focus{
            box-shadow:0 0 10px 0 #288af3ed;
        
        }
        input[type="text"]:focus{
            box-shadow:none;
        }
        input[type="file"]:focus{
            box-shadow:none;
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
           
        }
        .btns:hover{
            color:#ffffff;   
        }
        .btns:focus{
            box-shadow:0 0 5px 0 #ef6f14a9;
        }
       #img-box{
        position:fixed;height:50%;width:40%;border-radius:15px;
       }
       #closes{
        font-size:35px; cursor:pointer; color: #ef4242cc; float:right; margin-right:-20px;margin-top:-40px;
       }
       #closes:hover{
           color:#ef4242;
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
        <a class="nav-link active" href="outwards.php">outwards</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" style="color:rgba(255, 255, 255, 0.678);" href="paymentrequest.php">SendPaymentRequest</a>
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
                <div class="alert alert-success text-center mt-3 mb-2 alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong class="text-success">Success!</strong>&nbsp;Payment request has been sent of <strong class="text-danger">&nbsp;Rs :</strong>&nbsp;<strong class="text-success"><?php echo $amount;?></strong>.
                </div>
               <?php
            }
            if($error=="error"){
                ?>
                 <div class="alert alert-danger text-center mt-3 mb-2 alert-dismissible">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong class="text-danger">Warning!</strong>&nbsp; Your account balance is <strong class="text-danger">&nbsp;Rs :</strong><strong class="text-danger">&nbsp;<?php echo $balance;?></strong>.
                 </div>
                <?php
             }
             if($error=="payrequest"){
                ?>
                 <div class="alert alert-danger text-center mt-3 mb-2 alert-dismissible">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong class="text-danger">Warning!</strong>&nbsp; Your requested pending balance is <strong class="text-danger">&nbsp;Rs :</strong><strong class="text-danger">&nbsp;<?php echo $payment;?></strong>.
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
            <div class="card-header" style="background:#007bff;">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6">
                        <h6 class="text-white">Payment Request</h6>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6">
                        <a href="inwards.php" style="background:#66cf3de8;" class=" btn btns btn-sm float-right">inwards</a>
                         <a href="outwards.php" style="background:#ef6e14;" class="mr-2 btn btns btn-sm float-right">Outwards</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="" id="reset" onsubmit="return myfun()" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="">Send Payment Request Title<span class="text-danger">*</span></label>
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
                                    <input type="radio" onchange="checkStatus()" value="cash" name="status" id="status1" />&nbsp;<label for="">cash</label>
                                    <input type="radio" onchange="checkStatus()" value="cheque" name="status" id="status2"/>&nbsp;<label for="">cheque</label>
                                    <input type="radio" onchange="checkStatus()" value="online" name="status" id="status3"/>&nbsp;<label for="">online</label>
                                </div>
                                <div id="mode_error" style="margin-top:-20px;" ></div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="form-group text-center">
                        <input type="submit" name="paymentrequest" value="payemnt request" style="background:#007bff;" class="btn mt-4 btns btn-sm  " style="background:#4b97f0;">
                
                        <!-- <button type="button" style="width:150px;height:32px;" id="submit" onclick="myReset()" class="btn btn-sm btn-danger">Reset</button> -->
                    </div>
                </form>
            </div>
        </div>
        <h5 class="text-danger mb-3" >Your Recent Payment History</h5>    
        <div class="table table-responsive-md">
            <table class="table table-bordered table-striped text-center" style="box-shadow:0 4px 5px 0 grey">
                <thead class="text-white" style="background:#a56ab7;">
                    <th>S.no</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Particulars</th>
                    <th>Debit</th>
                    <th>Current balance</th>
                    <th>Status</th>
                </thead>
                <?php 
                    $con=mysqli_connect('localhost','root','','accounting');
                   
                        $query=mysqli_query($con,"SELECT * FROM `paymentrequest`");
                    $limit=20;
                    $total_row=mysqli_num_rows($query);
                    $total_page=ceil($total_row/$limit);
                    if(!isset($_GET['page'])){
                        $page=1;
                        
                    }else{
                         $page=$_GET['page'];
                         
                    }
                    $row_last=($page-1)*$limit;
                        $data=mysqli_query($con,"SELECT * FROM `paymentrequest` where user_id='$userId' ORDER BY id DESC LIMIT $row_last,$limit");
                    $sno=0;
                    while($row=mysqli_fetch_array($data)){
                        $sno++;
                        if($row['status']==1){
                            $background="#b2ecc0";
                            $results="Success";
                            $badge="badge-success";
                        }else if($row['status']==0){
                            $background="#f8d7da";
                            $results="Penidng...";
                            $badge="badge-danger";
                        }else if($row['status']==2){
                            $background="#ee9ba4";
                            $results="Rejected";
                            $badge="badge-danger";
                        }
                        ?>
                        <tr style="background:<?php echo $background; ?>">
                            <td><?php echo $sno;?></td>
                            <td><?php echo $row['date'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td>
                                <span style="text-transform:capitalize;"><?php echo $row['title'];?></span><br>
                                <span class="badge badge-pill badge-primary"><?php echo $row['remark'];?></span>
                            </td>
                            <td ><?php echo $row['debit'];?></td>
                            <td ><?php echo $row['balance'];?></td>    
                            <td ><strong class="badge badge-pill <?php echo $badge; ?>"><?php echo $results;?></strong></td>   
                        </tr>
                    <?php
                    }
                ?>
            </table>
        </div>
        <ul class="pagination  d-flex justify-content-center">
                 <?php 
                                           
                           
                            if($page<=$total_page){
                                if($page==$total_page){ $one=0;}else{$one=1;}
                                ?>
                                <li class="page-item <?php if($one==0){echo "disabled";}?> ">
                                    <a class="page-link " href="paymentrequest.php?page=<?php echo $page+$one;?>"><?php echo "Next";?></a>
                                </li> 
                            <?php
                            }
                                
                                
                                $i=0;
                                for($pages=$page;$pages<=$total_page; $pages++){                               
                                    if($i!=4){
                                        ?>
                                    <li class="page-item <?php if($page==$pages){ echo "disabled"; } ?>" >
                                        <a class="page-link " style="<?php if($page==$pages){ echo "background:blue;color:white;"; } ?>" href="paymentrequest.php?page=<?php echo $pages;?>"><?php echo $pages;?></a>
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
                                            <a class="page-link " href="paymentrequest.php?page=<?php echo $page-$one;?>"><?php echo "Previous";?></a>
                                        </li> 
                                    <?php
                                    }
                                    ?>

                                <?php
                                    if($total_page==$page){
                                        ?>
                                        <li class="page-item ">
                                            <a class="page-link" href="paymentrequest.php?page=<?php echo 1;?>"><?php echo ' First page';?></a>
                                        </li> 
                                        <?php
                                    }else{
                                        ?>
                                        <li class="page-item ">
                                            <a class="page-link" href="paymentrequest.php?page=<?php echo $total_page;?>"><?php echo $total_page.' Last page';?></a>
                                        </li> 
                                        <?php
                                    }
                                ?>
                                <?php
                                }
            
                               
                        
                    
                 ?>  
            </ul>
                    <div class="text-center text-white" >
                        <h5 class="text-white p-2" style="background:#563d7c;border-radius:5px;"><span>HISAAB | BIPL</span></h5>     
                    </div>
    </div>
</body>
</html>