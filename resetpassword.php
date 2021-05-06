<?php 
 $error="";
if(isset($_POST['submit'])){
    $email=$_POST['user_name'];
    $reset=str_shuffle('2345678');
        $con=mysqli_connect('localhost','root','','accounting');
        $query=mysqli_query($con,"SELECT * FROM `user` WHERE user_name='$email'");
       $result=mysqli_num_rows($query);
    //    echo $result;
       $res=mysqli_fetch_array($query);
        $active=$res['active'];
        if($result){
            if($active=='a'){
                $que=mysqli_query($con,"UPDATE `user` SET `reset`='$reset' WHERE user_name='$email'");
                include('sendmail.php');
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
input[type="text"]{
    border:1px solid #80bdff96;
}
input[type="text"]:focus{
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
    <div class="container" id="asd">
       <div class="card p-4 mt-4" style="height:auto;width:350px;">
            <form action="" onsubmit="return myReset()" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <h3 class="text-primary text-center">Reset Password</h3>
                        </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input  type="text" name="user_name" id="user_name" onkeyup="userReset()" placeholder="Enter email" class="form-control">
                        <div id="name_error"></div>
                    </div>
                    <div class="form-group">
                        <?php 
                            if($error == "success"){
                                ?>
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong class="text-success">Success!</strong>&nbsp; Reset link has been sent on your email.
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
                                        <strong class="text-danger">Not Found!</strong>&nbsp;We didn't get any account with this email.
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Reset" name="submit" class="btn btns btn-block text-white">
                    </div>
                </form>
       </div>
    </div>
    <script>

    </script>
</body>
</html>