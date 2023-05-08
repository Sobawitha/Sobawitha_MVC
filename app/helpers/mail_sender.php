<?php                       
                       use PHPMailer\PHPMailer\PHPMailer;
                       use PHPMailer\PHPMailer\SMTP;
                       use PHPMailer\PHPMailer\Exception;
                      
                      
                      require '../app/vendor/autoload.php';
                        

               function sendMail($email,$name,$token,$bodyFlag,$password,$reason,$more_detail){   
                
                        // $flag =1 for forgot_password
                        // $flag =2 for send_password_via_email
                        // $flag =3 for verify_email

                        // //Server settings
                        $mail = new PHPMailer(true);
                        
                        try{
                        $mail->isSMTP();
                        // $mail->SMTPDebug = 1;                      //Enable verbose debug output
                        
                                                                //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'sobawitha@gmail.com';                     //SMTP username
                        $mail->Password   = 'wyyogqteedlqpolh'; 
    
                                                    //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                        //Recipients
                        $mail->setFrom('sobawitha@gmail.com','Sobawitha');
                        $mail->addAddress($email, $name);               //Name is optional
                    
                        $mail->isHTML(true);
                        $mail->CharSet = 'UTF-8';
                        
                    


                        if($bodyFlag == 1){
                        $mail->Subject ="Reset Password Notification";    
                        // $email_template = "
                        //     <h2>Hello</h2>
                        //     <h3> You are receiving this email because we received a password reset request for your account.</h3>
                        //     <br><br>
                        //     <a href='http://localhost/Sobawitha_MVC/Login/reset_password?token=$token&email=$email'>Click Here to Reset your Password </a>
                        // " ;
                        $email_template = "
                                        <html>
                                        <head>
                                        <title>Password Reset Request</title>
                                        </head>
                                        <body style='font-family: Arial, sans-serif;'>
                                        <div style='background-color: #f2f2f2; padding: 20px;'>
                            
                                        <span style=  'font-size: 1em; font-weight: bold;  text-transform: uppercase; letter-spacing: 0.1em; color: #4CAF50; margin-right: 0.2em;'>SOBA</span><span style ='font-size: 1em; font-weight: bold; text-transform: uppercase;  letter-spacing: 0.1em;  color: #000;'>WITHA</span>
                                        
                                         </div>
                                        <div style='padding: 20px;'>
                                        <h2>Hello $name,</h2>
                                        <p>You are receiving this email because we received a password reset request for your account.</p>
                                        <p>To reset your password, please click the button below:</p>
                                        <p><a href='http://localhost/Sobawitha/Login/reset_password?token=$token&email=$email' style='background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none;'>Reset Password</a></p>
                                        <p>If you did not request a password reset, please ignore this email.</p>
                                        <p>Thank you,</p>
                                        <p>The Sobawitha Team</p>
                                        </div>
                                        <div style='background-color: #f2f2f2; padding: 20px;'>
                                        <p>Follow us on <a href='https://twitter.com/Sobawitha' style='color: #4CAF50;'>Twitter</a> | Like us on <a href='https://www.facebook.com/Sobawitha' style='color: #4CAF50;'>Facebook</a></p>
                                        <p>You are receiving this email because you have an account with Sobawitha. If you have any questions or concerns, please contact us at <a href='mailto:support@sobawitha.com' style='color: #4CAF50;'>support@sobawitha.com</a>.
                                        </div>
                                        </body>
                                        </html>
                                        " ;
                        }else if($bodyFlag == 2){
                          $mail->Subject ="Login Access for Sobawitha";  
                          $email_template = "
                          <html>
                            <head>
                            <title>Login Access for Sobawitha</title>
                            </head>
                            <body style='font-family: Arial, sans-serif;'>
                            <div style='background-color: #f2f2f2; padding: 20px;'>

                            <span style=  'font-size: 1em; font-weight: bold;  text-transform: uppercase; letter-spacing: 0.1em; color: #4CAF50; margin-right: 0.2em;'>SOBA</span><span style ='font-size: 1em; font-weight: bold; text-transform: uppercase;  letter-spacing: 0.1em;  color: #000;'>WITHA</span>

                            </div>
                            <div style='padding: 20px;'>
                            <h2>Hello $name,</h2>
                            <p>You are receiving this email because you have registered for an account with Sobawitha.</p>
                            <p>Your password has been generated and is below. To access your account, please use the login credentials provided below.</p>
                            <p><b>As a security precaution, we recommend that you change your password at your earliest convenience. This will help to ensure the safety and security of your account.</b></p>
                            <p>Your username is: $email</p>
                            <p>Your password is: $password</p>
                             
                            
                            <p>If you did not register for an account, please ignore this email.</p>
                            <p>Thank you,</p>
                            <p>The Sobawitha Team</p>
                            </div>
                            <div style='background-color: #f2f2f2; padding: 20px;'>
                            <p>Follow us on <a href='https://twitter.com/Sobawitha' style='color: #4CAF50;'>Twitter</a> | Like us on <a href='https://www.facebook.com/Sobawitha' style='color: #4CAF50;'>Facebook</a></p>
                            <p>You are receiving this email because you request to register with Sobawitha. If you have any questions or concerns, please contact us at <a href='mailto:support@sobawitha.com' style='color: #4CAF50;'>support@sobawitha.com</a>.
                            </div>
                            </body>
                            </html>
                            " ;
                        }else if($bodyFlag == 3){
                          $mail->Subject = "Email Verification Code for Sobawitha";
                          
                          $email_template = "
                                <html>
                                <head>
                                <title>Email Verification Code for Sobawitha</title>
                                </head>
                                <body style='font-family: Arial, sans-serif;'>
                                <div style='background-color: #f2f2f2; padding: 20px;'>
                                    <span style='font-size: 1em; font-weight: bold; text-transform: uppercase; letter-spacing: 0.1em; color: #4CAF50; margin-right: 0.2em;'>SOBA</span><span style ='font-size: 1em; font-weight: bold; text-transform: uppercase; letter-spacing: 0.1em; color: #000;'>WITHA</span>
                                </div>
                                <div style='padding: 20px;'>
                                    <h2>Hello $name,</h2>
                                    <p>Thank you for registering with Sobawitha.</p>
                                    <p>To verify your email address and activate your account, please enter the following code on the verification page:</p>
                                    <h3 style='color: #4CAF50;'>$token</h3>
                                    <p>Please do not share this code with anyone.</p>
                                    <p>If you did not register for an account, please ignore this email.</p>
                                    <p>Thank you,</p>
                                    <p>The Sobawitha Team</p>
                                </div>
                                <div style='background-color: #f2f2f2; padding: 20px;'>
                                    <p>Follow us on <a href='https://twitter.com/Sobawitha' style='color: #4CAF50;'>Twitter</a> | Like us on <a href='https://www.facebook.com/Sobawitha' style='color: #4CAF50;'>Facebook</a></p>
                                    <p>You are receiving this email because you requested to register with Sobawitha. If you have any questions or concerns, please contact us at <a href='mailto:support@sobawitha.com' style='color: #4CAF50;'>support@sobawitha.com</a>.
                                </div>
                                </body>
                                </html>
                                ";
                        }else if($bodyFlag == 6){
                          $mail->Subject = "Ad Rejection Notice from Sobawitha";
                          
                          $email_template = "
                                <html>
                                <head>
                                <title></title>
                                </head>
                                <body style='font-family: Arial, sans-serif;'>
                                <div style='background-color: #f2f2f2; padding: 20px;'>
                                    <span style='font-size: 1em; font-weight: bold; text-transform: uppercase; letter-spacing: 0.1em; color: #4CAF50; margin-right: 0.2em;'>SOBA</span><span style ='font-size: 1em; font-weight: bold; text-transform: uppercase; letter-spacing: 0.1em; color: #000;'>WITHA</span>
                                </div>
                                <div style='padding: 20px;'>
                                    <h2>Hello $name,</h2>
                                    <p>We regret to inform you that your ad has been rejected due to the following reason:</p>
                                    <h3 style='color: #4CAF50;'>$reason</h3>
                                    <p>More details about the rejection: $more_detail</p>
                                    <p>Please consider the above feedback and make necessary changes before re-uploading your ad. If you have any questions or concerns, please contact us at <a href='mailto:support@sobawitha.com' style='color: #4CAF50;'>support@sobawitha.com</a>.
                                    </p>
                                    <p>Thank you for choosing Sobawitha.</p>
                                    <p>The Sobawitha Team</p>
                                </div>
                                <div style='background-color: #f2f2f2; padding: 20px;'>
                                    <p>Follow us on <a href='https://twitter.com/Sobawitha' style='color: #4CAF50;'>Twitter</a> | Like us on <a href='https://www.facebook.com/Sobawitha' style='color: #4CAF50;'>Facebook</a></p>
                                    <p>You are receiving this email because you have submitted an ad to Sobawitha. If you did not submit an ad, please ignore this email.</p>
                                </div>
                                </body>
                                </html>
                            ";

                          

                        }else if($bodyFlag == 7){
                          $mail->Subject = "Feedback Rejection Notice from Sobawitha";
                          
                          $email_template = "
                                <html>
                                <head>
                                <title></title>
                                </head>
                                <body style='font-family: Arial, sans-serif;'>
                                <div style='background-color: #f2f2f2; padding: 20px;'>
                                    <span style='font-size: 1em; font-weight: bold; text-transform: uppercase; letter-spacing: 0.1em; color: #4CAF50; margin-right: 0.2em;'>SOBA</span><span style ='font-size: 1em; font-weight: bold; text-transform: uppercase; letter-spacing: 0.1em; color: #000;'>WITHA</span>
                                </div>
                                <div style='padding: 20px;'>
                                    <h2>Hello $name,</h2>
                                    <p>We regret to inform you that your feedback has been rejected due to the following reason:</p>
                                    <h3 style='color: #4CAF50;'>$reason</h3>
                                    <p>More details about the rejection: $more_detail</p>
                                    <p>Please consider the above feedback and make necessary changes before resubmitting your feedback. If you have any questions or concerns, please contact us at <a href='mailto:support@sobawitha.com' style='color: #4CAF50;'>support@sobawitha.com</a>.
                                    </p>
                                    <p>Thank you for choosing Sobawitha.</p>
                                    <p>The Sobawitha Team</p>
                                </div>
                                <div style='background-color: #f2f2f2; padding: 20px;'>
                                    <p>Follow us on <a href='https://twitter.com/Sobawitha' style='color: #4CAF50;'>Twitter</a> | Like us on <a href='https://www.facebook.com/Sobawitha' style='color: #4CAF50;'>Facebook</a></p>
                                    <p>You are receiving this email because you have submitted an ad to Sobawitha. If you did not submit an ad, please ignore this email.</p>
                                </div>
                                </body>
                                </html>
                            ";


                        }else if($bodyFlag == 8){
                            $mail->Subject = "Asking Help from Sobawitha Team";

                            $email_template = "
                                <html>
                                <head>
                                <title></title>
                                </head>
                                <body style='font-family: Arial, sans-serif;'>
                                <div style='background-color: #f2f2f2; padding: 20px;'>
                                    <span style='font-size: 1em; font-weight: bold; text-transform: uppercase; letter-spacing: 0.1em; color: #4CAF50; margin-right: 0.2em;'>SOBA</span><span style ='font-size: 1em; font-weight: bold; text-transform: uppercase; letter-spacing: 0.1em; color: #000;'>WITHA</span>
                                </div>
                                <div style='padding: 20px;'>
                                    <h2>Hello Admin,</h2>
                                    <p>You have received a request for help from the following email:</p>
                                    <h3 style='color: #4CAF50;'>$name</h3>
                                    <p>Here's the help content:</p>
                                    <p><strong>$more_detail</strong></p>
                                    <p>Please assist the user as soon as possible. If you have any questions or concerns, please contact the user directly.</p>
                                    <p>Thank you for your attention.</p>
                                    <p>The Sobawitha Team</p>
                                </div>
                                <div style='background-color: #f2f2f2; padding: 20px;'>
                                    <p>Follow us on <a href='https://twitter.com/Sobawitha' style='color: #4CAF50;'>Twitter</a> | Like us on <a href='https://www.facebook.com/Sobawitha' style='color: #4CAF50;'>Facebook</a></p>
                                    <p>You are receiving this email because a user has requested help from Sobawitha.</p>
                                </div>
                                </body>
                                </html>
                            ";


                        }
                        $mail->Body  =$email_template;
                        $mail->send();
                        return true;

                    }catch(Exception $e){
                        echo "Message could not be sent: {$mail->ErrorInfo}";
                    }


                }

                function generateVerificationCode() {
                  $length = 10; // Length of the verification code
                  $characters = '0123456789'; // Characters to use for the verification code
                  $verificationCode = '';
                  for ($i = 0; $i < $length; $i++) {
                    $verificationCode .= $characters[rand(0, strlen($characters) - 1)];
                  }
                  return $verificationCode;
                }
                
?>