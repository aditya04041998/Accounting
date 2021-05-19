<?php
$error=""; 

if(isset($_POST['submit'])){
    $name=$_POST['user_names'];
    $email=$_POST['user_name'];
    $phone=$_POST['user_phone'];
    $password=$_POST['user_password'];
    $date=date("y/m/d");
        $con=mysqli_connect('localhost','root','','accounting');
        $query=mysqli_query($con,"SELECT * FROM `admin_log` WHERE email='$email'");
        $result=mysqli_fetch_row($query);
        if(!$result){
            $data=mysqli_query($con,"INSERT INTO `admin_log`( `name`, `email`, `password`, `phone`, `date`) VALUES ('$name','$email','$password','$phone','$date')");
            if($data){
                header("Location: adminlogin.php");
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
    <div class="container d-flex justify-content-center justify-content-center align-items-center " style="height:100vh">
       <div class="card p-4 mt-4" style="height:auto;width:350px;">
            <form action="" onsubmit="return mySignup()" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <h3 class="text-info text-center">Admin Signup</h3>
                        </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="user_names" id="user_names" onkeyup="userNames()" placeholder="Enter name" class="form-control">
                        <div id="names_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="">User email</label>
                        <input type="text" name="user_name" id="user_name" onkeyup="userName()" placeholder="Enter user eamil" class="form-control">
                        <div id="name_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="">User phone</label>
                        <input type="text" name="user_phone" id="user_phone" onkeyup="userPhone()" placeholder="Enter user phone" class="form-control">
                        <div id="phone_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="">User password</label>
                        <input type="text" name="user_password" id="user_password" onkeyup="userPasswords()" placeholder="Enter password" class="form-control">
                        <div id="password_error"></div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <div><a href="#"><strong>Forgot password</strong></a></div>
                        <div><a href="adminlogin.php"><strong>Login</strong></a></div>
                    </div>
                    <div class="form-gourp">
                        <?php  
                            if($error=="error"){
                                ?>
                                   <div class="alert alert-danger alert-dismissible">
                                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                     <strong>Error!</strong> This email is already register.
                                    </div> 
                                <?php
                            }
                        ?>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Login" name="submit" class="btn btn-block btn-primary">
                    </div>
                </form>
       </div>
    </div>
    <script>

    </script>
</body>
</html>