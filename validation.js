function myfun(){
    var title=document.getElementById('titles').value;
    var amount=document.getElementById('amount').value;
    var remark=document.getElementById('remarks').value;
    // var mode=document.getElementById('status').value;
    if(title == ""){
        document.getElementById('title_error').innerHTML="Title is required.";
        document.getElementById('title_error').style.color="red";
        return false;
   }else if(!isNaN(title)){
        document.getElementById('title_error').innerHTML="Please enter character";
        document.getElementById('title_error').style.color="red";
        return false;
   }else if(title.length >= 30){
    document.getElementById('title_error').innerHTML="Please enter 30 characters.";
    document.getElementById('title_error').style.color="red";
    return false;
    }else{
        document.getElementById('title_error').innerHTML="";
    }
    
    if(amount == ""){
        document.getElementById('amount_error').innerHTML="Amount is required.";
        document.getElementById('amount_error').style.color="red";
        return false;
   }else if(isNaN(amount)){
        document.getElementById('amount_error').innerHTML="Please enter digits";
        document.getElementById('amount_error').style.color="red";
        return false;
   }else if(amount<=0){
    document.getElementById('amount_error').innerHTML="Invalid amount entered";
    document.getElementById('amount_error').style.color="red";
    return false;
    }else{
    document.getElementById('amount_error').innerHTML="";
   }
   if(remark == ""){
    document.getElementById('remark_error').innerHTML="Remark is required.";
    document.getElementById('remark_error').style.color="red";
    return false;
    }else if(!isNaN(remark)){
        document.getElementById('remark_error').innerHTML="Please enter character";
        document.getElementById('remark_error').style.color="red";
        return false;
    }else if(remark.length >= 50){
    document.getElementById('remark_error').innerHTML="Please enter 50 character";
    document.getElementById('remark_error').style.color="red";
    return false;
    }else{
    document.getElementById('remark_error').innerHTML="";
    }

     if(document.getElementById('status1').checked){
        document.getElementById('mode_error').innerHTML=""; 
    }else if(document.getElementById('status2').checked){
        document.getElementById('mode_error').innerHTML=""; 
    }else if(document.getElementById('status3').checked){
        document.getElementById('mode_error').innerHTML=""; 
    }else{
        document.getElementById('mode_error').innerHTML="Please select payment mode.";
        document.getElementById('mode_error').style.color="red";
        return false;
    }
    

}   
    function checkStatus(){
        if(document.getElementById('status1').checked){
            document.getElementById('mode_error').innerHTML=""; 
        }else if(document.getElementById('status2').checked){
            document.getElementById('mode_error').innerHTML=""; 
        }else if(document.getElementById('status3').checked){
            document.getElementById('mode_error').innerHTML=""; 
        }else{
            document.getElementById('mode_error').innerHTML="Please select payment mode.";
            document.getElementById('mode_error').style.color="red";
            return false;
        } 
    }

    function checkTitle(){
        var title=document.getElementById('titles').value;
        if(title == ""){
            document.getElementById('title_error').innerHTML="Title is required.";
            document.getElementById('title_error').style.color="red";
            return false;
       }else if(!isNaN(title)){
            document.getElementById('title_error').innerHTML="Please enter character";
            document.getElementById('title_error').style.color="red";
            return false;
       }else if(title.length >= 30){
        document.getElementById('title_error').innerHTML="Please enter 30 characters.";
        document.getElementById('title_error').style.color="red";
        return false;
   }else{
        document.getElementById('title_error').innerHTML="";
       }
    }

    function checkAmount(){
        var amount=document.getElementById('amount').value;
        if(amount == ""){
            document.getElementById('amount_error').innerHTML="Amount is required.";
            document.getElementById('amount_error').style.color="red";
            return false;
       }else if(isNaN(amount)){
            document.getElementById('amount_error').innerHTML="Please enter digits";
            document.getElementById('amount_error').style.color="red";
            return false;
       }else if(amount<=0){
        document.getElementById('amount_error').innerHTML="Invalid amount entered";
        document.getElementById('amount_error').style.color="red";
        return false;
        }else{
        document.getElementById('amount_error').innerHTML="";
       }
    }

    function checkRemark(){
        remark=document.getElementById('remarks').value;
        if(remark == ""){
            document.getElementById('remark_error').innerHTML="Remark is required.";
            document.getElementById('remark_error').style.color="red";
            return false;
       }else if(!isNaN(remark)){
            document.getElementById('remark_error').innerHTML="Please enter character";
            document.getElementById('remark_error').style.color="red";
            return false;
       }else if(remark.length >= 50){
        document.getElementById('remark_error').innerHTML="Please enter 50 character";
        document.getElementById('remark_error').style.color="red";
        return false;
   }else{
        document.getElementById('remark_error').innerHTML="";
       }
    }


    function myLogin(){
        var user_name=document.getElementById('user_name').value;
        var user_password=document.getElementById('user_password').value;
        if(user_name == ""){
            document.getElementById("name_error").innerHTML="User name is required";
            document.getElementById("name_error").style.color="red";
            return false;
        }else if(user_name.search(/[@]/)==-1){
            document.getElementById("name_error").innerHTML="Eamil is not valid required";
            document.getElementById("name_error").style.color="red";
            return false;
        }else{
            document.getElementById("name_error").innerHTML="";
        }
        if(user_password == ""){
            document.getElementById("password_error").innerHTML="User password is required";
            document.getElementById("password_error").style.color="red";
            return false;
        }else if(user_password.length != 8){
            document.getElementById("password_error").innerHTML="Password 8 charcter is required";
            document.getElementById("password_error").style.color="red";
            return false;
        }else{
            document.getElementById("password_error").innerHTML="";
        }
    }
    function myReset(){
        var user_name=document.getElementById('user_name').value;
        if(user_name == ""){
            document.getElementById("name_error").innerHTML="Email is required";
            document.getElementById("name_error").style.color="red";
            return false;
        }else if(user_name.search(/[@]/)==-1){
            document.getElementById("name_error").innerHTML="Eamil is not valid required";
            document.getElementById("name_error").style.color="red";
            return false;
        }else{
            document.getElementById("name_error").innerHTML="";
        }
    }

    function userReset(){
        var user_name=document.getElementById('user_name').value;
        if(user_name == ""){
            document.getElementById("name_error").innerHTML="Email is required";
            document.getElementById("name_error").style.color="red";
            return false;
        }else if(user_name.search(/[@]/)==-1){
            document.getElementById("name_error").innerHTML="Eamil is not valid required";
            document.getElementById("name_error").style.color="red";
            return false;
        }else{
            document.getElementById("name_error").innerHTML="";
        }
    }
    function mySet(){
        var user_password=document.getElementById('user_password').value;
        var user_conform=document.getElementById('user_conform').value;

        if(user_password == ""){
            document.getElementById("password_error").innerHTML="User password is required";
            document.getElementById("password_error").style.color="red";
            return false;
        }if(user_password.search(/[a-z]/) == -1){
            document.getElementById("password_error").innerHTML="Atleast 1 small charcter";
            document.getElementById("password_error").style.color="red";
            return false;
        }if(user_password.search(/[A-Z]/) == -1){
            document.getElementById("password_error").innerHTML="Atleast 1 capital charcter";
            document.getElementById("password_error").style.color="red";
            return false;
        }if(user_password.search(/[0-9]/) == -1){
            document.getElementById("password_error").innerHTML="Atleast 1 digit is required";
            document.getElementById("password_error").style.color="red";
            return false;
        }if(user_password.search(/[@\#\$\%\*]/) == -1){
            document.getElementById("password_error").innerHTML="Atleast 1 special charcter";
            document.getElementById("password_error").style.color="red";
            return false;
        }if(user_password.length != 8){
            document.getElementById("password_error").innerHTML="Pasword 8 charcter is required";
            document.getElementById("password_error").style.color="red";
            return false;
        }else if(user_conform == ""){
            document.getElementById("conform_error").innerHTML="Conform password is required.";
            document.getElementById("conform_error").style.color="red";
            return false;
        }else if(user_password != user_conform ){
            document.getElementById("conform_error").innerHTML="Conform password didn't matche.";
            document.getElementById("conform_error").style.color="red";
            return false;
        }else{
            document.getElementById("name_error").innerHTML="";
        }
    }
    function userConform(){
        var user_password=document.getElementById('user_password').value;
        var user_conform=document.getElementById('user_conform').value;
        if(user_password != user_conform ){
            document.getElementById("conform_error").innerHTML="Conform password didn't matche.";
            document.getElementById("conform_error").style.color="red";
            return false;
        }else{
            document.getElementById('conform_error').innerHTML="";
        }
    }
    function mySignup(){
        var user_names=document.getElementById('user_names').value;
        var user_name=document.getElementById('user_name').value;
        var user_phone=document.getElementById('user_phone').value;
        var user_password=document.getElementById('user_password').value;
        if(user_names == ""){
            document.getElementById("names_error").innerHTML="Name is required";
            document.getElementById("names_error").style.color="red";
            return false;
        }else{
            document.getElementById("names_error").innerHTML="";
        }
        if(user_name == ""){
            document.getElementById("name_error").innerHTML="User email is required";
            document.getElementById("name_error").style.color="red";
            return false;
        }else{
            document.getElementById("name_error").innerHTML="";
        }
        if(user_phone == ""){
            document.getElementById("phone_error").innerHTML="User phone is required";
            document.getElementById("phone_error").style.color="red";
            return false;
        }else{
            document.getElementById("phone_error").innerHTML="";
        }
        if(user_password == ""){
            document.getElementById("password_error").innerHTML="User name is required";
            document.getElementById("password_error").style.color="red";
            return false;
        }else{
            document.getElementById("password_error").innerHTML="";
        }
    }
    function myCreate(){
        var user_names=document.getElementById('user_names').value;
        var user_name=document.getElementById('user_name').value;
        var user_phone=document.getElementById('user_phone').value;
        if(user_names == ""){
            document.getElementById("names_error").innerHTML="Name is required";
            document.getElementById("names_error").style.color="red";
            return false;
        }else if(!isNaN(user_names)){
            document.getElementById("names_error").innerHTML="Please enter character";
            document.getElementById("names_error").style.color="red";
            return false;
        }else{
            document.getElementById("names_error").innerHTML="";
        } 
        if(user_name == ""){
            document.getElementById("name_error").innerHTML="User name is required";
            document.getElementById("name_error").style.color="red";
            return false;
        }else if(user_name.search(/[@]/)==-1){
            document.getElementById("name_error").innerHTML="Valid email is required";
            document.getElementById("name_error").style.color="red";
            return false;
        }else{
            document.getElementById("name_error").innerHTML="";
        }
        if(user_phone == ""){
            document.getElementById("phone_error").innerHTML="User phone is required";
            document.getElementById("phone_error").style.color="red";
            return false;
        }else if(isNaN(user_phone)){
            document.getElementById("phone_error").innerHTML="Please enter digits.";
            document.getElementById("phone_error").style.color="red";
            return false;
        }else if(user_phone.length!=10){
            document.getElementById("phone_error").innerHTML="Please enter 10 digits.";
            document.getElementById("phone_error").style.color="red";
            return false;
        }else{
            document.getElementById("phone_error").innerHTML="";
        } 
       
    }
    function userNames(){
        var user_name=document.getElementById('user_names').value;
        if(user_name == ""){
            document.getElementById("names_error").innerHTML="Name is required";
            document.getElementById("names_error").style.color="red";
            return false;
        }else if(!isNaN(user_name)){
            document.getElementById("names_error").innerHTML="Please enter character";
            document.getElementById("names_error").style.color="red";
            return false;
        }else{
            document.getElementById("names_error").innerHTML="";
        } 
    }

    function userName(){
        var user_name=document.getElementById('user_name').value;
        var error=document.getElementById('error').value;
        if(user_name == ""){
            document.getElementById("name_error").innerHTML="User name is required";
            document.getElementById("name_error").style.color="red";
            return false;
        }else if(user_name.search(/[@]/)==-1){
            document.getElementById("name_error").innerHTML="Valid email is required";
            document.getElementById("name_error").style.color="red";
            return false;
        }else{
            document.getElementById("name_error").innerHTML="";
        } 
        if(error!=""){
            document.getElementById("error").innerHTML="";
        }
    }
    
    function userPhone(){
        var user_phone=document.getElementById('user_phone').value;
        if(user_phone == ""){
            document.getElementById("phone_error").innerHTML="User phone is required";
            document.getElementById("phone_error").style.color="red";
            return false;
        }else if(isNaN(user_phone)){
            document.getElementById("phone_error").innerHTML="Please enter digits.";
            document.getElementById("phone_error").style.color="red";
            return false;
        }else if(user_phone.length!=10){
            document.getElementById("phone_error").innerHTML="Please enter 10 digits.";
            document.getElementById("phone_error").style.color="red";
            return false;
        }else{
            document.getElementById("phone_error").innerHTML="";
        } 
    }
    function userPasswords(){
        var user_password=document.getElementById('user_password').value;
        if(user_password == ""){
            document.getElementById("password_error").innerHTML="User password is required";
            document.getElementById("password_error").style.color="red";
            return false;
        }if(user_password.search(/[a-z]/) == -1){
            document.getElementById("password_error").innerHTML="Atleast 1 small charcter";
            document.getElementById("password_error").style.color="red";
            return false;
        }if(user_password.search(/[A-Z]/) == -1){
            document.getElementById("password_error").innerHTML="Atleast 1 capital charcter";
            document.getElementById("password_error").style.color="red";
            return false;
        }if(user_password.search(/[0-9]/) == -1){
            document.getElementById("password_error").innerHTML="Atleast 1 digit is required";
            document.getElementById("password_error").style.color="red";
            return false;
        }if(user_password.search(/[@\#\$\%\*]/) == -1){
            document.getElementById("password_error").innerHTML="Atleast 1 special charcter";
            document.getElementById("password_error").style.color="red";
            return false;
        } if(user_password.length != 8){
            document.getElementById("password_error").innerHTML="Pasword 8 charcter is required";
            document.getElementById("password_error").style.color="red";
            return false;
        }else{
            document.getElementById("password_error").innerHTML="";
        } 
    }
    function userPassword(){
        var user_password=document.getElementById('user_password').value;
        var error=document.getElementById('error').value;
        if(user_password == ""){
            document.getElementById("password_error").innerHTML="User password is required";
            document.getElementById("password_error").style.color="red";
            return false;
        }else if(user_password.length != 8){
            document.getElementById("password_error").innerHTML="Password 8 charcter is required";
            document.getElementById("password_error").style.color="red";
            return false;
        }else{
            document.getElementById("password_error").innerHTML="";
        } 
        if(error!=""){
            document.getElementById("error").innerHTML="";
        }
    }