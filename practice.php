<?php  
        session_start();
        // $_SESSION['accounts']="";
        if(!$_SESSION['login']){
            header('Location: adminlogin.php');
        }
       
         $account=$_SESSION['accounts'];
          $_SESSION['opt'];
         if($_SESSION['opt']!=''){

         }else{
            echo $account=$_SESSION['opt'];
         }
        if(isset($_POST['opt'])){
            if($_POST['opt']=='all'){
                $_SESSION['accounts']='';
                $_SESSION['search']="";
            }else{
                $account=$_POST['opt'];  
               $_SESSION['accounts']=$account;
                $_SESSION['search']="";
                $_SESSION['opt']=$account;
                header('Location: userhistory.php');
                
            }
            
        }
        $search=$_SESSION['search'];
        if(isset($_POST['search'])){
            $_SESSION['search']=$_POST['search1'];
            $search=$_SESSION['search'];
        }
        
        if(!isset($_GET['account'])){
        }else{
            $account=$_GET['account'];
        }
     
    
        if($_SESSION['accounts']=="all"){
            
           }else{
             $account=$_SESSION['accounts'];
           } 
       
       if($account==""){
        $con=mysqli_connect('localhost','root','','accounting');
        $datas=mysqli_query($con,"SELECT SUM(debit),SUM(credit),balance FROM `data` ");
        while($r=mysqli_fetch_array($datas)){
          $debit=$r['SUM(debit)'];
           $credit=$r['SUM(credit)'];
           // $total=$r['balance'];
        }
        $q=mysqli_query($con,"SELECT SUM(balance) FROM `user`");
        while($r=mysqli_fetch_array($q)){
           $total=$r['SUM(balance)'];
           // print_r($total);
        }
       }else{
        $con=mysqli_connect('localhost','root','','accounting');
        $datas=mysqli_query($con,"SELECT SUM(debit),SUM(credit),balance FROM `data` where user_id='$account'");
        while($r=mysqli_fetch_array($datas)){
          $debit=$r['SUM(debit)'];
           $credit=$r['SUM(credit)'];
           if($debit=""){
            $debit=0;
           }else{
            $debit=$r['SUM(debit)']; 
           }
           if($credit){
               $credit=0;
           }else{
            $credit=$r['SUM(credit)']; 
           }
        }
        $q=mysqli_query($con,"SELECT balance FROM `user` where user_id='$account'");
        while($r=mysqli_fetch_array($q)){
           $total=$r['balance'];
           if($total=""){
            $total=0;
           }else{
            $total=$r['balance']; 
           }
        }
       }
       
         //select * form tablename where  ORDER BY colname DESC LIMIT 1
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="validation.js"></script>
    <style>
    /* dashboard start */
    body{
        background:#f0f1f6;
        font-size:14px;
    }
.box1{
    height:120px;
    width:100%;
    background:linear-gradient(to right,#5F71E4,#815EE4);
    box-shadow:0 0 2px 0 grey;
    border-radius:5px;
    color:#fff;
    margin:auto;
}
.box2{
    height:120px;
    width:100%;
    background:linear-gradient(to right,#000428,#004e92);
    box-shadow:0 0 2px 0 grey;
    border-radius:5px;
    color:#fff;
    margin:auto;
}
.box3{
    height:120px;
    width:100%;
    background:linear-gradient(to right,#4568dc,#b06ab3);
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
    </style>
</head>
<body>
    <div class="container">
         <nav class="navbar navbar-expand-lg navbar-dark " style="background:#563d7c;border-radius:4px;">
            <a class="navbar-brand" href="adminhistory.php">Admin</a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" ></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                
                <li class="nav-item">
                    <a class="nav-link text-white" href="users.php">CreateUser</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" style="color:rgba(255, 255, 255, 0.678); href="userhistory.php">UserHistory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="adminhistory.php">AdminHistory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="acceptpayrequest.php">PaymentRequest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="adminlogout.php">Logout</a>
                </li>
               
                </ul>
                
            </div>
        </nav>
        
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
                                                <span style="font-size:18px;"><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo $credit;?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 ">
                                            <div class="box3">
                                                <h5 class="mt-3 pt-4">Total Debit</h5>
                                                <span style="font-size:18px;"><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo $debit;?></span>
                                            </div>
                                        </div>
                        </div>
            </div>
            <div class="form-group">
            <form action="" method="POST" id="myForm">
                <select name="opt" onchange="formSubmit()" id="opt"  class="form-control">
                    <?php 
                  
                    $qer=mysqli_query($con,"SELECT * FROM `user`");
                    ?>
                    <option value="" hidden="true" selected>Select Account</option>
                    <option value="all" >All Record</option>
                    <?php
                    while($ros=mysqli_fetch_array($qer)){
                        ?>
                            <option  value="<?php echo $ros['user_id'];?>"><?php echo $ros['name'];?></option>
                        <?php
                    }
                    ?>
                </select>
               <!-- <div class="text-center"> <input type="submit" name="submit" class="btn btn-sm btn-success mt-2" value="Submit"></div> -->
            </form>    
            </div>
            <div>
             <?php 
               if($account==""){
                ?>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <h5 class="text-danger my-3" style="margin-top:-7px;">All users records</h5>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <form action="" method="POST">
                                <input type="text" class="form-control" name="searchInput" id="searchInput" placeholder="Serach by mobile/userid">
 <!-- <input type="submit" onclick="" name="search" value="Search"> -->
                                <button type="button" onclick="searchFun()" class="btn btn-sm btn-primary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>   
                <?php
               }else{
                $qer=mysqli_query($con,"S
                ELECT * FROM `user` where user_id='$account'");
                while($ros=mysqli_fetch_array($qer)){
                    ?>
                        <p class="text-center "><strong class="text-secondary"><?php echo $_SESSION['admin_name'];?></strong>&nbsp; is printing the record of &nbsp; <strong class="text-success"><?php echo $ros['name'];?></strong></p>
                    <?php
                }
               }   
                 
             ?>
            </div>
               <div id="fetch_data">
               
               
        <div class="table-responsiv-md">
            <table class="table table-bordered text-center" style="box-shadow:0 4px 5px 0 grey">
                
                <?php 
                    $con=mysqli_connect('localhost','root','','accounting');
                    
                    if($search!=""){
                        $query=mysqli_query($con,"SELECT * FROM `data` WHERE name LIKE '$search%';");
                       echo $_SESSION['search']="This is what";
                    }else{
                        if($account==""){
                        $query=mysqli_query($con,"SELECT * FROM `data`");
                       
                        }else{
                            $query=mysqli_query($con,"SELECT * FROM `data` where user_id='$account'");
                        }
                    }
                    $limit=10;
                   echo $total_row=mysqli_num_rows($query);
                    $total_page=ceil($total_row/$limit);
                    if(!isset($_GET['page'])){
                        $page=1;
                        
                    }else{
                         $page=$_GET['page'];
                         
                    }
                    
                    $row_last=($page-1)*$limit;
                    if($search!=""){
                        $data=mysqli_query($con,"SELECT * FROM `data` where name LIKE '$search%'  ORDER BY id DESC LIMIT $row_last,$limit");
                            $row=mysqli_num_rows($data);
                    }else{
                        if($account!=""){
                            $data=mysqli_query($con,"SELECT * FROM `data` where user_id='$account' ORDER BY id DESC LIMIT $row_last,$limit");
                            $row=mysqli_num_rows($data);
                        }else{
                            $data=mysqli_query($con,"SELECT * FROM `data`  ORDER BY id DESC LIMIT $row_last,$limit");
                            $row=mysqli_num_rows($data);
                        }
                    } 
                    if($row){
                        ?>
                        <thead class="text-white" style="background:#a56ab7;">
                            <th>S.no</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Particulars</th>
                            <th>Debit</th>
                            <th>Credit</th>
                        </thead>
                    <?php
                    }else{
                        ?> 
                        <div class="alert alert-danger text-center">
                            <span>No record found</span>
                        </div>
                        <?php
                    }
                    $sno=0; 
                    while($row=mysqli_fetch_array($data)){
                        $sno++;
                       if($row['credit']!=""){
                        ?>                
                        <tr style=background:#b2ecc0;>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $row['date'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td>
                                <span style="text-transform:capitalize;"><?php echo $row['title'];?></span><br>
                                <span class="badge badge-pill badge-primary"><?php echo $row['remark'];?></span>
                            </td>
                            <td ><?php echo $row['debit'];?></td>
                            <td><?php echo $row['credit'];?></td>
                        </tr>
                    <?php
                       }
                       if($row['debit']!=""){
                        ?>
                        </div>
                        <tr style="background:#f6cacee1;">
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $row['date'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td>
                                <span><?php echo $row['remark'];?></span><br>
                                <span class="badge badge-pill badge-success"><?php echo $row['remark'];?></span>
                            </td>
                            <td ><?php echo $row['debit'];?></td>
                            <td ><?php echo $row['credit'];?></td>
                        </tr>
                    <?php
                       }
                    }
                ?>
            </table>
        </div>



        </div>


        <ul class="pagination  d-flex justify-content-center">
                 <?php 
                                           
                           
                            if($page<=$total_page){
                                if($page==$total_page){ $one=0;}else{$one=1;}
                                ?>
                                <li class="page-item <?php if($one==0){echo "disabled";}?> ">
                                    <a class="page-link " href="userhistory.php?page=<?php echo $page+$one;?>"><?php echo "Next";?></a>
                                </li> 
                            <?php
                            }
                                
                                
                                $i=0;
                                for($pages=$page;$pages<=$total_page; $pages++){                               
                                    if($i!=4){
                                        ?>
                                    <li class="page-item <?php if($page==$pages){ echo "disabled"; } ?>" >
                                        <a class="page-link " style="<?php if($page==$pages){ echo "background:blue;color:white;"; } ?>" href="userhistory.php?page=<?php echo $pages;?>"><?php echo $pages;?></a>
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
                                            <a class="page-link " href="userhistory.php?page=<?php echo $page-$one;?>"><?php echo "Previous";?></a>
                                        </li> 
                                    <?php
                                    }
                                    ?>

                                <?php
                                    if($total_page==$page){
                                        ?>
                                        <li class="page-item ">
                                            <a class="page-link" href="userhistory.php?page=<?php echo 1;?>"><?php echo ' First page';?></a>
                                        </li> 
                                        <?php
                                    }else{
                                        ?>
                                        <li class="page-item ">
                                            <a class="page-link" href="userhistory.php?page=<?php echo $total_page;?>"><?php echo $total_page.' Last page';?></a>
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
    <script type="text/javascript">
        function formSubmit(){
            document.getElementById('myForm').submit();
        }
        function searchFun(){
            var searchInput=document.getElementById('searchInput').value;
           
            $.ajax({
                type:"POST",
               url:"search.php",
               data:{
                   inputData:searchInput,
               },
                success: function (data) {
                    // alert(data);
                    $("#fetch_data").HTML("data");
                },
               
            });
        }
    </script>
</body>
</html>

<td><?php echo $row['user_id']; ?></td>
                             <td><?php echo $row['date'];?></td>
                             <td><?php echo $row['name'];?></td>
                             <td>
                                 <span style="text-transform:capitalize;"><?php echo $row['title'];?></span><br>
                                 <span class="badge badge-pill badge-primary"><?php echo $row['remark'];?></span>
                             </td>
                             <td ><?php echo $row['debit'];?></td>
                             <td><?php echo $row['credit'];?></td>
                         </tr>