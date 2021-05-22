<?php
    session_start();
    if(!$_SESSION['session']){
        header('Location: adminlogin.php');
    }
    include('../databaseConnect.php');
    // //   if(isset($_GET['id'])){
    // //     $id=$_GET['id'];
    //     $query=mysqli_query($con,"SELECT * FROM `user`");
    //     // $res=mysqli_num_rows($query);
    //     $res=mysqli_fetch_array($query);
    //    if( $res['active']=='a'){
    //     $data=mysqli_query($con,"UPDATE `user` SET `active`='b' WHERE user_id=$id"); 
    //     // header('Location: users.php');
    //     $error="active";
    //    }
    //    if( $res['active']=='b'){
    //     $data=mysqli_query($con,"UPDATE `user` SET `active`='a' WHERE user_id=$id");
    //     // header('Location: users.php');
    //     $error="block";
    //    }
          
    // // }
    $error="";
    $val=""; 
    if(isset($_POST['submit'])){
        $name=$_POST['user_names'];
        $email=$_POST['user_name'];
        $phone=$_POST['user_phone'];
        $balance=$_POST['balance'];
        $login=$_SESSION['login'];
        $date=date("y/m/d");
        if($balance==""){
            $balance=0;
        }
        include('../databaseConnect.php');
            $query=mysqli_query($con,"SELECT * FROM `user` WHERE user_name='$email'");
            $result=mysqli_fetch_row($query);
            if(!$result){
                $password=str_shuffle('12345678');
                $account=str_shuffle('123456789');
                $active="b";
                $qq=mysqli_query($con,"SELECT * FROM `admin_log` WHERE email='$login'");
                while($row=mysqli_fetch_array($qq)){
                    $val=intval($row['balance']);
                }
                if($val>=$balance){
                    $data=mysqli_query($con,"INSERT INTO `user`(`user_id`, `name`, `user_name`, `phone`, `password`, `date`, `active`,`balance`) VALUES ('$account','$name','$email','$phone','$password','$date','$active','$balance')");
                    if($data){
                        $error="success"; 
                       $totalBalance=$val-intval($balance);
                       $datahistroy=mysqli_query($con,"INSERT INTO `adminhistory`( `email`,`user_id`, `title`, `credit`, `debit`, `date`, `file`, `payment_mode`, `remark`, `name`, `balance`) VALUES ('$login','$account','Admin','','$balance','$date','','Instant','New user','$name','$totalBalance')");                 
                        $q=mysqli_query($con,"UPDATE `admin_log` SET `balance`='$totalBalance' WHERE email='$login'");
                        // header("Location: users.php");
                        $title="New User";
                        $date=date('y/m/d');
                        if($balance==0){
                            $bal="";
                        }else{
                            $bal=$balance;
                        }
                        if($balance==""){
                            $balance=0;
                        }
                        $query="INSERT INTO `data`( `user_id`, `title`, `credit`, `debit`, `date`, `file`, `payment_mode`,`remark`,`name`,`balance`) VALUES ('$account','$title','$bal','','$date','','Instant Pay','New Account','$name','$balance')";
                        $result=mysqli_query($con,$query);
                    }
                }else{
                    $error="balance";
                }
               
            }else{
                $error="unsuccess";
            }
        }
    
       
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
    <script src="../validation.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
    /* dashboard start */
    body{
        background:#f0f1f6;
        font-size:14px;
    }
.box1{
    height:100px;
    width:250px;
    background:linear-gradient(to right,#5F71E4,#815EE4);
    box-shadow:0 0 2px 0 grey;
    border-radius:5px;
    color:#fff;
    margin:auto;
}
.box2{
    height:100px;
    width:250px;
    background:linear-gradient(to right,#000428,#004e92);
    box-shadow:0 0 2px 0 grey;
    border-radius:5px;
    color:#fff;
    margin:auto;
}
.box3{
    height:100px;
    width:250px;
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
    input[type="text"]:focus{
            box-shadow:0 0 5px 0 #563d7ce1 ;
            border:1px solid #563d7ce1;
        }
        input[type="text"]{
            border:1px solid #563d7c;
            font-size:14px;
        }
        input[type="submit"]{
            background:#563d7c;
            border:none;
        }
        input[type="submit"]:hover{
            background:#563d7c;
        }
        input[type="submit"]:focus{
            box-shadow:0 0 5px 0 #563d7c;
            /* background:#563d7c; */
            border:none;
            outline:none;

        }
        .btns{
            background:#28a745;
            color:white;
            border:none;
            outline:none;
        }
        .btns:hover{
            background:#28a745;  
            box-shadow:0 0 5px 0 #28a745;
            color:white;
            border:none;
            outline:none; 
        }
        .btns:focus{
            border:none;
            outline:none;
            box-shadow:none;
        }
        #close{
            font-size:28px;
            margin-top:-20px;
            color:#563d7cbe;
        }
        #close:hover{
            font-size:28px;
            color:#563d7c;
        }
        .bt{
    box-shadow:none;
    background:#28a745;
        }
        .bt:focus{
            box-shadow:0 0 5px 1px #28a74698;
            background:#28a745;
        }
        .bts{
    box-shadow:none;
    background:#dc3545;
        }
        .bts:focus{
            box-shadow:0 0 5px 1px #dc35469a;
            background:#dc3545;
        }
    </style>
    <script>
        $(document).ready(function(){
            $("#butt").click(function(){
                $("#hid").toggle();
            });
            $("#close").click(function(){
                $("#hid").hide();
            });
        });

    </script>
</head>
<body>
    
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark " style="background:#563d7c;border-radius:4px;">
            <a class="navbar-brand" href="adminhistory.php"><strong>HISAAB</strong>&nbsp;Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                
                <li class="nav-item">
                    <a class="nav-link disabled" style="color:rgba(255, 255, 255, 0.678);" href="users.php">CreateUser</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="userhistory.php">UserHistory</a>
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
        
        <div class="d-flex justify-content-between my-3">
         <h5 class="mt-2 text-info"> <span class="text-danger">Welcome To</span> Create  User!</h5>
            <div><button type="button" id="butt" class="btn btns btn-sm ">Create User</button></div>
            <!-- <div><a href="admin.php" class="btn btn-sm " style="background:#a56ab7;">Back</a></div> -->
        </div>
        <?php
            if($error=="success"){
               ?>
                <div class="alert alert-success text-center alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong class="text-success">Success!</strong> Account created with this <strong class="text-danger">&nbsp;email :</strong>&nbsp;<strong class="text-success"><?php echo $email;?></strong>.
                </div>
               <?php
            }
           
            if($error=="unsuccess"){
                ?>
                 <div class="alert alert-danger text-center alert-dismissible">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong class="text-danger">Warning!</strong> Already account is register with this&nbsp;<strong class="text-danger">email :</strong><strong class="text-danger">&nbsp;<?php echo $email;?></strong>.
                 </div>
                <?php
             }
             if($error=="balance"){
                ?>
                 <div class="alert alert-danger text-center alert-dismissible">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong class="text-danger">Warning!</strong> Your account doesn't have sufficient &nbsp;<strong class="text-danger">balance :</strong><strong class="text-danger">&nbsp;<?php echo $val;?></strong>.
                 </div>
                <?php
             }
             if($error=="active"){
                ?>
                 <div class="alert alert-success text-center alert-dismissible">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong class="text-success">Success!</strong> Account has been activated successfyly.
                 </div>
                <?php
             }
             if($error=="block"){
                ?>
                 <div class="alert alert-danger text-center alert-dismissible">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     <strong class="text-danger">Warning!</strong>Account has been block successfuly.
                 </div>
                <?php
             }
        ?>
            <div class="card p-2 my-3" id="hid" style="display:none;border:none;box-shadow:0px 2px 5px grey;">
            <form action="" onsubmit="return myCreate()" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <div><span id="close" style="cursor:pointer;" class="float-right">&times;</span></div> 
                            <div><h4 class="text-danger text-center mt-2"><span style="box-shadow:0px 1px 1px 0 grey;padding-left:5px;padding-right:5px;">Create new user</span></h4></div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-3 col-sm-6 col-12 mb-3">
                                <input type="text" name="user_names" id="user_names" onkeyup="userNames()" placeholder="Enter name" class="form-control">
                                <div id="names_error"></div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12 mb-3">
                                <input type="text" name="user_name" id="user_name" onkeyup="userName()" placeholder="Enter user eamil" class="form-control">
                                <div id="name_error"></div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12 mb-3">
                                <input type="text" name="user_phone" id="user_phone" onkeyup="userPhone()" placeholder="Enter user phone" class="form-control">
                                <div id="phone_error"></div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12 mb-3">
                                <input type="text" name="balance" id="balance" onkeyup="balance()" placeholder="Enter opening amount" class="form-control">
                                <div id="balance_error"></div>
                            </div>
                            <div class="col-md-12">
                                 <div class="form-gourp" id="error">
                                    <!-- <?php  echo $error; ?> -->
                                </div>
                                <div class="form-group text-center m-2">
                                    <input type="submit" value="Create" name="submit" style="width:200px;" class="btn btn-sm text-white">
                                </div>
                            </div>
                        </div>
                </form>
            
            </div>
        <div class="table table-responsive-md">
            <table class="table table-bordered table-striped text-center" style="box-shadow:0 4px 5px 0 grey">
               
                <?php 
                     include('../databaseConnect.php');
                    $query=mysqli_query($con,"SELECT * FROM `user`");
                    $limit=20;
                    $total_row=mysqli_num_rows($query);
                    $total_page=ceil($total_row/$limit);
                    if(!isset($_GET['page'])){
                        $page=1;
                    }else{
                        $page=$_GET['page'];
                    }
                    $row_last=($page-1)*$limit;
                    $data=mysqli_query($con,"SELECT * FROM `user` LIMIT $row_last,$limit");
                     $row=mysqli_num_rows($data);
                            if($row){
                                ?>
                                <thead class="text-white" style="background:#a56ab7;">
                                    <th>Id</th>
                                    <th>Account Id</th>
                                    <th>Status</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Change Status</th>
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
                        ?>
                            <tr>
                                <td><?php echo $row_last;?></td>
                                <td><?php echo $row['user_id'];?></td>
                                <td>
                                    <?php 
                                        if($row['active']=='a'){
                                           ?>
                                           <span class="badge badge-success badge-pill">
                                            Active
                                           </span>
                                           <?php 
                                        }
                                        if($row['active']=='b'){
                                            ?>
                                            <span class="badge badge-danger badge-pill">
                                             Block
                                            </span>
                                            <?php 
                                         }
                                    ?>
                                </td>
                                <td><?php echo $row['user_name'];?></td>
                                <td><?php echo $row['password'];?></td>
                                <td>
                                    <?php
                                        
                                        if($row['active']=='a'){
                                            ?>
                                    
                                             <button type="button" onclick="onBlock(<?php echo $row['user_id'];?>)" class="text-white btn btn-sm  bts">Block</button>
                                          
                                            <?php
                                        }
                                        if($row['active']=='b'){
                                            ?>
                                            
                                            <button type="button" onclick="onActive(<?php echo $row['user_id'];?>)" class="text-white btn btn-sm  bt ">Active</button>
                                          
                                            <?php
                                        }
                                    ?>
                                </td>
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
                                    <a class="page-link " href="users.php?page=<?php echo $page+$one;?>"><?php echo "Next";?></a>
                                </li> 
                            <?php
                            }
                                
                                
                                $i=0;
                                for($pages=$page;$pages<=$total_page; $pages++){                               
                                    if($i!=4){
                                        ?>
                                    <li class="page-item <?php if($page==$pages){ echo "disabled"; } ?>" >
                                        <a class="page-link " style="<?php if($page==$pages){ echo "background:blue;color:white;"; } ?>" href="users.php?page=<?php echo $pages;?>"><?php echo $pages;?></a>
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
                                            <a class="page-link " href="users.php?page=<?php echo $page-$one;?>"><?php echo "Previous";?></a>
                                        </li> 
                                    <?php
                                    }
                                    ?>

                                <?php
                                    if($total_page==$page){
                                        ?>
                                        <li class="page-item ">
                                            <a class="page-link" href="users.php?page=<?php echo 1;?>"><?php echo ' First page';?></a>
                                        </li> 
                                        <?php
                                    }else{
                                        ?>
                                        <li class="page-item ">
                                            <a class="page-link" href="users.php?page=<?php echo $total_page;?>"><?php echo $total_page.' Last page';?></a>
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
    <script>
     function onActive(account){
        swal({
            title: "Are you sure?",
            text: "You want to activate this account!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                type:"POST",
               url:"userActive.php",
               data:{
                   account:account,
                   active:'a',
               },
                success: function (data) {
                    if(data=='a'){
                        swal("Success! You have activated this account!", {
                            icon: "success",
                            }).then(
                                function(){
                            // location.reload(true);
                            window.location.href="users.php";
                           }
                            );
                    }
                },
               
            });
            } else {
                swal("Please active the account!");
            }
            });
    }
    function onBlock(account){
        swal({
            title: "Are you sure?",
            text: "You want to block this account!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                type:"POST",
               url:"userActive.php",
               data:{
                   account:account,
                   active:'b',
               },
                success: function (data) {
                    if(data=='b'){
                        swal("Success! You have blocked this account!", {
                            icon: "success",
                            }).then(
                                function(){
                            // location.reload(true);
                            window.location.href="users.php";
                           }
                            );
                    }
                },
               
            });
            } else {
                swal("Please block the account!");
            }
            });
    }
    </script>
</body>
</html>