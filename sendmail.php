<?php 
     require 'PHPMailer/PHPMailerAutoload.php';

     $mail = new PHPMailer;

     //$mail->SMTPDebug = 3;                               // Enable verbose debug output

     $mail->isSMTP();                                      // Set mailer to use SMTP
     $mail->Host = 'smtp.hostinger.in';  // Specify main and backup SMTP servers
     $mail->SMTPAuth = true;                               // Enable SMTP authentication
     $mail->Username = 'aditya.kumar@bunkinfotech.in';                 // SMTP username
     $mail->Password = 'adityabunk';                           // SMTP password
     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
     $mail->Port = 587;                                    // TCP port to connect to
        $name="Hi Aditya";
     $mail->setFrom('aditya.kumar@bunkinfotech.in', 'Mailer');
     $mail->addAddress($email, $name);     // Add a recipient

     // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
     // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
     $mail->isHTML(true);                                  // Set email format to HTML
     $html='<htm>
             <head></head>
             <body>
                 <h4>Contact Us</h4>
                 <h4>Name : '.$name.'</h4>
                 <a href="http://localhost/accounting/setpassword.php?id='.$reset.'">Reset Password</a>
             </body>
         </html>';
     $mail->Subject = '';
     $mail->Body    = $html;
    

     if($mail->send()) {
         $error="success";
     } else {
         $error="error";
     }
?>