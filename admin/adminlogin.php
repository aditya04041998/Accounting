<?php 
$error="";
if(isset($_POST['submit'])){
    $name=$_POST['user_name'];
    $password=$_POST['user_password'];
  
    
       include('../databaseConnect.php');
        $query=mysqli_query($con,"SELECT * FROM `admin_log` WHERE email='$name' && password='$password'");
       $result=mysqli_fetch_row($query);
        if($result){
            session_start();
            $_SESSION['login']=$result[2];
            $_SESSION['session']=$result[3];
            $_SESSION['account']=$result[0];
            // $_SESSION['accounts']="";
            $_SESSION['error']="";
            $_SESSION['admin_name']=$result[1];
            $_SESSION['success']="Successful Login";
            $_SESSION['accounts']="";
            $_SESSION['opt']="";
            header("Location: userhistory.php");
        }else{
            $error= "Password/User Id is wrong!";
        }
    }

    
   


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="../validation.js"></script>

<style>
body{
    background:#f0f1f6;
    font-size:14px;
}
#asd{
    height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
}
input[type="text"]{
    border:1px solid #80bdff96;
    font-size:14px;
}
input[type="text"]:focus{
    box-shadow:none;
}
input[type="password"]{
    border:1px solid #80bdff96;
    font-size:14px;
}
input[type="password"]:focus{
    box-shadow:none;
}
.btns {
    background:#007bff;
}
.btns:focus{
    border:none;
    box-shadow:0 0 10px #007bff;
}
::placeholder{
    font-size:14px;
}

.card{
    border-radius:10px;
    box-shadow:0 0 5px 0 rgba(128, 128, 128, 0.253);
}
</style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center " style="height:100vh">
       <div class="card p-4 mt-4" style="height:auto;width:350px;">
            <form action="" onsubmit="return myLogin()" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <h3 class="text-primary text-center">Admin Login</h3>
                        </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="user_name" id="user_name" onkeyup="userName()" placeholder="Enter user email" class="form-control">
                        <div id="name_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="user_password" id="user_password" onkeyup="userPassword()" placeholder="Enter password" class="form-control">
                        <div id="password_error"></div>
                    </div>
                   
                    <div class="form-group">
                        <!-- <div><a href="resetpassword.php"><strong>Forgot password</strong></a></div> -->
                        <!-- <div><a href="adminsignup.php"><strong>Signup</strong></a></div> -->

                        <div class="row">
                            <div class="col-md-6">
                                <a  style="text-decoration:none;" href="resetpassword.php"><strong>Forgot password</strong></a><br>
                            </div>
                            <div class="col-md-6 text-right">
                                <a  style="text-decoration:none;" href="../login.php"><strong>User Login</strong></a><br>
                            </div>
                        </div>
                       <div class="text-center mt-1">
                            <span id="error"class="text-danger"><strong><?php echo $error; ?></strong></span>
                       </div>

                    </div>
                   <!-- <div class="form-group text-center" id="error">
                   <span class="text-danger"><strong ><?php echo $error;?></strong></span>
                   </div> -->
                    <div class="form-group text-center">
                        <input type="submit" value="Login" name="submit" class="btn text-white btns btn-block">
                    </div>
                </form>
       </div>
    </div>
    <script>

    </script>
</body>
</html>