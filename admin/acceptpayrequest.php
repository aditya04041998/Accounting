<?php  
        session_start();
        if(!$_SESSION['session']){
            header('Location: adminlogin.php');
        }
        
        $account=$_SESSION['login'];
        
        $con=mysqli_connect('localhost','root','','accounting');
         $datas=mysqli_query($con,"SELECT SUM(debit),SUM(credit),balance FROM `paymentrequest` where status=1");
         while($r=mysqli_fetch_array($datas)){
           $debit=$r['SUM(debit)'];
            $credit=$r['SUM(credit)'];
            // $total=$r['balance'];
         }
         if($debit==""){
             $debit=0;
         }
         $requests=mysqli_query($con,"SELECT * FROM `paymentrequest` where status=0 ");
         $request_no=0;
         while($r=mysqli_fetch_array($requests)){
             $request_no++;
            // $total=$r['balance'];
         }
         $q=mysqli_query($con,"SELECT balance FROM `admin_log` ORDER BY balance DESC LIMIT 1");
         while($r=mysqli_fetch_array($q)){
            $total=$r['balance'];
            // print_r($total);
         }
         //select * form tablename where  ORDER BY colname DESC LIMIT 1
         if(isset($_GET['account'] )){
            $account=$_GET['account'];
            $dat=mysqli_query($con,"SELECT * from `paymentrequest` where user_id=$account && status=0");
            $num=mysqli_num_rows($dat);
            if($num){
                if($row=mysqli_fetch_array($dat)){
                    // $id=$row['id'];
                   $bal=$row['debit'];
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
                   $id=$row['id'];
                   if($_GET['id']==1){
                       $status=1;
                       
                   }
                   if($_GET['id']==2){
                    $status=2;
                    
                     }
                   $adminhistory=mysqli_query($con,"INSERT INTO `adminhistory`( `email`, `user_id`, `title`, `credit`, `debit`, `date`, `file`, `payment_mode`, `remark`, `name`, `balance`) VALUES ('$email','$account','$title','$credit','','$date','$file','$payment','$remark','$name','$balance')");
                    $reference=$_GET['ref'];
                        $reqs=mysqli_query($con,"UPDATE `paymentrequest` SET `status`='$status' where reference='$reference' ");
                
                    if($_GET['id']==1){
                        $req=mysqli_query($con,"UPDATE `admin_log` SET `balance`='$adbal' WHERE email='$email'");
                        $d=mysqli_query($con,"SELECT * FROM `user` WHERE user_id='$account'");
                        if($r=mysqli_fetch_array($d)){
                            $sub=$r['balance']-$bal;
                            $reqa=mysqli_query($con,"UPDATE `user` SET `balance`='$sub' where user_id=$account");
                            
                        }
                        
                    }
                    header('Location: acceptpayrequest.php');                     
                }
               
            }
            
            
            
         }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accept Payment Request</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="../validation.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="Zebra Pageination/public/javascript/zebra_pagination.js"></script>
    <link rel="stylesheet" href="Zebra Pageination/public/css/zebra_pagination.css" type="text/css">

    <style>
    /* dashboard start */
    body{
        background:#f0f1f6;
        font-size:14px;
    }
.box1{
    height:120px;
    width:100%;
    background:linear-gradient(to right,grey,#815EE4);
    box-shadow:0 0 2px 0 grey;
    border-radius:5px;
    color:#fff;
    margin:auto;
}
.box2{
    height:120px;
    width:100%;
    background:linear-gradient(to right,green,#004e92);
    box-shadow:0 0 2px 0 grey;
    border-radius:5px;
    color:#fff;
    margin:auto;
}
.box3{
    height:120px;
    width:100%;
    background:linear-gradient(to right,orange,#b06ab3);
    box-shadow:0 0 2px 0 grey;
    border-radius:5px;
    color:#fff;
    margin:auto;
}
.box4{
    height:100px;
    width:250px;
    background:linear-gradient(to right,#cc2b5e,#753a88);
    box-shadow:0 0 2px 0 grey;
    border-radius:5px;
    color:#fff;
}
.box5{
    height:100px;
    width:250px;
    background: linear-gradient( 105.3deg,  rgba(30,39,107,1) 21.8%, rgba(77,118,221,1) 100.2% );
    box-shadow:0 0 2px 0 grey;
    border-radius:5px;
    color:#fff;
}
.box6{
    height:100px;
    width:250px;
    background: radial-gradient( circle 939px at 0.7% 2.4%,  rgba(116,106,255,1) 0%, rgba(221,221,221,1) 100.2% );
    box-shadow:0 0 2px 0 grey;
    border-radius:5px;
    color:#fff;
}
#opt{
    box-shadow:none;
    font-size:14px;
    text-transform:capitalize;
    border:1px solid #563d7c6c;
}
#opt:focus{
    border:1px solid #563d7caf;
}
.btns:focus{
    border:none;
    box-shadow:none;
    outline:none;
}
#searchInput{
    border:1px solid #007bff62;
}
#searchInput{
    border:1px solid #007bff62;
}
#searchInput:focus{
    box-shadow:none;
    border:1px solid #007bff;
}
.bt{
    box-shadow:none;
    background:#0069d9;
}
.bt:focus{
    box-shadow:0 0 5px 1px #0069d991;
    background:#0069d9;
    border-radius:5px;
}
    </style>
</head>
<body>
    <div class="container">
         <nav class="navbar navbar-expand-lg navbar-dark " style="background:#563d7c;border-radius:4px;">
            <a class="navbar-brand" href="adminhistory.php"><strong>HISSAB</strong>&nbsp;Admin</a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" ></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="users.php">CreateUser</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="userhistory.php">UserHistory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="adminhistory.php">AdminHistory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" style="color:rgba(255, 255, 255, 0.678);" href="acceptpayrequest.php">PaymentRequest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="adminlogout.php">Logout</a>
                </li>
              
                </ul>
                
            </div>
        </nav>
        <h5 class="mt-3 text-info"> <span class="text-danger">Welcome To</span>  Payment Request !</h5>  
            <div class="card my-3" style="border:none;box-shadow:0 0 5px 0 grey;">
            <div class="row text-center p-4" style="margin-top:-10px;">
                                        <div class="col-md-4 col-sm-6 ">
                                            <div class="box1">
                                                <h5 class="mt-3 pt-4">Total Balance</h5>
                                               <span style="font-size:18px;"><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo $total;?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="box2" >
                                                <h5 class="mt-3 pt-4">Total Credit</h5>
                                                <span style="font-size:18px;"><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo $debit;?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 ">
                                            <div class="box3">
                                                <h5 class="mt-3 pt-4">Pendig Request</h5>
                                                <span style="font-size:18px;"><i class="fas fa"></i>&nbsp;<?php echo $request_no;?></span>
                                            </div>
                                        </div>
                        </div>
            </div>
            <div class="form-group">
              
            </div>
            
            <div class="row ">
                <div class="col-md-6 col-12" >
                    <h5 class="text-danger my-3" style="margin-top:-7px;">All transection history</h5>
                </div>
                <div class="col-md-6 col-12" >
                            <form action="" method="POST">
                            <div class="input-group mt-1 mb-2">
                            
                                <input type="text" class="form-control" name="searchInput" id="searchInput" placeholder="Serach by userid">
                                <div class="input-group-btn">
                                     <button type="button" onclick="searchFun()" style="margin-top:1px;" class="form-control btn btn-sm bt"><i  class=" text-white fa fa-search"></i></button>                      
                                </div>
                            </div>
                            </form>
                </div>
            </div>
         <div id="fetch_data">   
            <div class="table table-responsive-md table-responsive-lg" style="font-size:13px;">
                <table class="table table-bordered text-center" style="box-shadow:0 4px 5px 0 grey">
                    
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
                            $data=mysqli_query($con,"SELECT * FROM `paymentrequest`  ORDER BY id DESC LIMIT $row_last,$limit");
                           $row=mysqli_num_rows($data);
                            if($row){
                                ?>
                                <thead class="text-white" style="background:#a56ab7;">
                                    <th>S.no</th>
                                    <th>Account</th>
                                    <th style="min-width:120px;">Date</th>
                                    <th style="min-width:200px;">Name</th>
                                    <th style="min-width:300px;">Particulars</th>
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
                        while($row=mysqli_fetch_array($data)){
                            $row_last++;
                        if($row['status']==0){
                            ?>
                            <tr style=background:#f6cacee1;>
                                <td><?php echo $row_last;?></td>
                                <td><?php echo $row['user_id']?></td>
                                <td><?php echo $row['date'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td>
                                    <span style="text-transform:capitalize;"><?php echo $row['title'];?></span><br>
                                    <span class="badge badge-pill badge-primary"><?php echo $row['remark'];?></span>
                                </td>
                                <td ><?php echo $row['debit'];?></td>
                            
                                <td><button onclick="onAccept('<?php echo $row['user_id'];?>','1','<?php echo $row['reference']; ?>')"  class="btn btns btn-sm btn-success">Accept</button></td>
                                <td><button onclick="onReject('<?php echo $row['user_id'];?>','2','<?php echo $row['reference']; ?>')"  class="btn btns btn-sm btn-danger">Reject</button></td>
                             </tr>
                        <?php
                        }
                        if($row['status']==2){
                            ?>
                            <tr style=background:#ee7e87be;>
                                <td><?php echo $row_last;?></td>
                                <td><?php echo $row['user_id']?></td>
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
                                <td><?php echo $row_last;?></td>
                                <td><?php echo $row['user_id']?></td>
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
          

        <ul class="pagination  d-flex justify-content-center">
                 <?php 
                                           
                           
                            if($page<=$total_page){
                                if($page==$total_page){ $one=0;}else{$one=1;}
                                ?>
                                <li class="page-item <?php if($one==0){echo "disabled";}?> ">
                                    <a class="page-link " href="acceptpayrequest.php?page=<?php echo $page+$one;?>"><?php echo "Next";?></a>
                                </li> 
                            <?php
                            }
                                
                                
                                $i=0;
                                for($pages=$page;$pages<=$total_page; $pages++){                               
                                    if($i!=4){
                                        ?>
                                    <li class="page-item <?php if($page==$pages){ echo "disabled"; } ?>" >
                                        <a class="page-link " style="<?php if($page==$pages){ echo "background:blue;color:white;"; } ?>" href="acceptpayrequest.php?page=<?php echo $pages;?>"><?php echo $pages;?></a>
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
                                            <a class="page-link " href="acceptpayrequest.php?page=<?php echo $page-$one;?>"><?php echo "Previous";?></a>
                                        </li> 
                                    <?php
                                    }
                                    ?>

                                <?php
                                    if($total_page==$page){
                                        ?>
                                        <li class="page-item ">
                                            <a class="page-link" href="acceptpayrequest.php?page=<?php echo 1;?>"><?php echo ' First page';?></a>
                                        </li> 
                                        <?php
                                    }else{
                                        ?>
                                        <li class="page-item ">
                                            <a class="page-link" href="acceptpayrequest.php?page=<?php echo $total_page;?>"><?php echo $total_page.' Last page';?></a>
                                        </li> 
                                        <?php
                                    }
                                ?>
                                <?php
                                }
            
                               
                        
                    
                 ?>  
            </ul>
                    
     </div>    
        <div class="text-center text-white" >
            <h5 class="text-white p-2" style="background:#563d7c;border-radius:5px;"><span>HISAAB | BIPL</span></h5>     
        </div>
    </div>
   <script>
    function onAccept(account,id,reference){
        swal({
            title: "Are you sure?",
            text: "You want to accept the given amount!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                type:"POST",
               url:"accept.php",
               data:{
                   account:account,
                   id:id,
                   reference:reference,
               },
                success: function (data) {
                    if(data==1){
                        swal("Success! You have accepted the amount!", {
                            icon: "success",
                            }).then(
                                function(){
                            location.reload();
                           }
                            );
                            
                            
                    }
                },
               
            });
            } else {
                swal("Please accept the amount!");
            }
            });
    }
    function onReject(account,id,reference){
        swal({
            title: "Are you sure?",
            text: "Once reject, you will not be able to accept this amount!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                type:"POST",
               url:"accept.php",
               data:{
                   account:account,
                   id:id,
                   reference:reference,
               },
                success: function (data) {
                    if(data==2){
                        swal("Success! You have rejected the amount!", {
                            icon: "success",
                            }).then(
                                function(){
                            location.reload();
                           }
                            );
                    }
                },
               
            });
            } else {
                swal("Please reject the amount!");
            }
            });
    }
    function searchFun(){
            var searchInput=document.getElementById('searchInput').value;
           
            $.ajax({
                type:"POST",
               url:"paymentrequestsearch.php",
               data:{
                   inputData:searchInput,
               },
                success: function (data) {
                    $("#fetch_data").html(data);
                },
               
            });
        }
   </script> 
</body>
</html>