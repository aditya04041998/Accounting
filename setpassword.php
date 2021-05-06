<?php 
 $error="";
if(isset($_POST['submit'])){
    $reset=$_GET['id'];
    $password=$_POST['password'];
        $con=mysqli_connect('localhost','root','','accounting');
        $query=mysqli_query($con,"SELECT * FROM `user` WHERE reset='$reset'");
       $result=mysqli_num_rows($query);
    //    echo $result;
       $res=mysqli_fetch_array($query);
        $active=$res['active'];
        if($result){
            if($active=='a'){
                $que=mysqli_query($con,"UPDATE `user` SET `password`='$password',`reset`='' WHERE reset='$reset'");
                $error="success";
            }else{
                $error="block";
            }
        }else{
            $error="error";
        }
    }

    
   


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="validation.js"></script>
</head>
<style>
*{
    font-size:14px;
}
body{
    background:#f0f1f6;
}
#asd{
    height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
}
input[type="text"]:focus{
    box-shadow:none;
}
input[type="password"]:focus{
    box-shadow:none;
}
.card{
    border-radius:10px;
    box-shadow:0 0 5px 0 rgba(128, 128, 128, 0.253);
}
</style>
<body>
    <div class="container" id="asd">
       <div class="card p-4 mt-4" style="height:auto;width:350px;">
            <form action="" onsubmit="return mySet()" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <h3 class="text-info text-center">Set Password</h3>
                        </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input  type="text" name="user_password" id="user_password" onkeyup="userPasswords()" placeholder="Enter user name" class="form-control">
                        <div id="password_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Conform Password</label>
                        <input  type="password" name="user_conform" id="user_conform" onkeyup="userConform()" placeholder="Enter user name" class="form-control">
                        <div id="conform_error"></div>
                    </div>
                    <div class="form-group">
                        <?php 
                            if($error == "success"){
                                ?>
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong class="text-success">Success!</strong>&nbsp; Password has been reset successfuly.
                                    </div>
                                <?php
                            }
                            if($error == "block"){
                                ?>
                                    <div class="alert alert-danger  alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong class="text-danger">Block!</strong>&nbsp; You account is block.
                                    </div>
                                <?php
                            }
                            if($error == "error"){
                                ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong class="text-danger">Error!</strong>&nbsp;Expired your reset token.
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Reset" name="submit" class="btn btn-block btn-primary">
                    </div>
                </form>
       </div>
    </div>
    <script>

    </script>
</body>
</html>