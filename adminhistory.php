<?php  
        session_start();
        if(!$_SESSION['login']){
            header('Location: adminlogin.php');
        }
       
      $account=$_SESSION['login'];
        
       
        $con=mysqli_connect('localhost','root','','accounting');
         $datas=mysqli_query($con,"SELECT SUM(debit),SUM(credit),balance FROM `adminhistory` ");
         while($r=mysqli_fetch_array($datas)){
           $debit=$r['SUM(debit)'];
            $credit=$r['SUM(credit)'];
            // $total=$r['balance'];
         }
         $q=mysqli_query($con,"SELECT balance FROM `admin_log` where email='$account'");
         while($r=mysqli_fetch_array($q)){
            $total=$r['balance'];
            // print_r($total);
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
    background:linear-gradient(to right,#cc2b5e,#753a88);
    box-shadow:0 0 2px 0 grey;
    border-radius:5px;
    color:#fff;
    margin:auto;
}
.box2{
    height:120px;
    width:100%;
    background:linear-gradient( 105.3deg,  rgba(30,39,107,1) 21.8%, rgba(77,118,221,1) 100.2% );
    box-shadow:0 0 2px 0 grey;
    border-radius:5px;
    color:#fff;
    margin:auto;
}
.box3{
    height:120px;
    width:100%;
    background:linear-gradient(to right,#753a88,#753a88);
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
#searchInput{
    border:1px solid #007bff62;
}
#searchInput:focus{
    box-shadow:none;
    border:1px solid #007bff;
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
                    <a class="nav-link text-white" href="userhistory.php">UserHistory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled " style="color:rgba(255, 255, 255, 0.678);" href="adminhistory.php">AdminHistory</a>
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
        <h5 class="mt-3 text-info"> <span class="text-danger">Welcome To</span> Admin History !</h5>
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
              
            </div>
            <div class="row">
                <div class="col-md-6 col-12">
                    <h5 class="text-danger my-3" style="margin-top:-7px;">All transection history</h5>
                </div>
                <div class="col-md-6 col-12">
                         <div class="form-inline float-right">
                                <form action="" method="POST">
                                <input type="text" class="form-control" name="searchInput" id="searchInput" placeholder="Serach by userid">
                                <button type="button" onclick="searchFun()" class="btn btn-sm btn-primary"><i style="padding:6px;" class=" fa fa-search"></i></button>
                                </form>
                            </div>
                </div>
            </div>
          <div id="fetch_data">  
            <div class="table table-responsive-md">
                <table class="table table-bordered text-center" style="box-shadow:0 4px 5px 0 grey">
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
                        $con=mysqli_connect('localhost','root','','accounting');
                    
                            $query=mysqli_query($con,"SELECT * FROM `adminhistory`");
                        $limit=20;
                        $total_row=mysqli_num_rows($query);
                        $total_page=ceil($total_row/$limit);
                        if(!isset($_GET['page'])){
                            $page=1;
                            
                        }else{
                            $page=$_GET['page'];
                            
                        }
                    
                        $row_last=($page-1)*$limit;
                            $data=mysqli_query($con,"SELECT * FROM `adminhistory` where email='$account' ORDER BY id DESC LIMIT $row_last,$limit");
                        $sno=0;
                        while($row=mysqli_fetch_array($data)){
                            $sno++;
                        if($row['credit']!=""){
                                    ?>
                                    <tr style=background:#b2ecc0;>
                                        <td><?php echo $row['user_id']?></td>
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
        
        <ul class="pagination  d-flex justify-content-center">
                 <?php 
                                           
                           
                            if($page<=$total_page){
                                if($page==$total_page){ $one=0;}else{$one=1;}
                                ?>
                                <li class="page-item <?php if($one==0){echo "disabled";}?> ">
                                    <a class="page-link " href="adminhistory.php?page=<?php echo $page+$one;?>"><?php echo "Next";?></a>
                                </li> 
                            <?php
                            }
                                
                                
                                $i=0;
                                for($pages=$page;$pages<=$total_page; $pages++){                               
                                    if($i!=4){
                                        ?>
                                    <li class="page-item <?php if($page==$pages){ echo "disabled"; } ?>" >
                                        <a class="page-link " style="<?php if($page==$pages){ echo "background:blue;color:white;"; } ?>" href="adminhistory.php?page=<?php echo $pages;?>"><?php echo $pages;?></a>
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
                                            <a class="page-link " href="adminhistory.php?page=<?php echo $page-$one;?>"><?php echo "Previous";?></a>
                                        </li> 
                                    <?php
                                    }
                                    ?>

                                <?php
                                    if($total_page==$page){
                                        ?>
                                        <li class="page-item ">
                                            <a class="page-link" href="adminhistory.php?page=<?php echo 1;?>"><?php echo ' First page';?></a>
                                        </li> 
                                        <?php
                                    }else{
                                        ?>
                                        <li class="page-item ">
                                            <a class="page-link" href="adminhistory.php?page=<?php echo $total_page;?>"><?php echo $total_page.' Last page';?></a>
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
    function searchFun(){
            var searchInput=document.getElementById('searchInput').value;
           
            $.ajax({
                type:"POST",
               url:"adminhistorysearch.php",
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