<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require_once("connection.php");
    require_once("../PHPMailer/src/Exception.php");
    require_once("../PHPMailer/src/PHPMailer.php");
    require_once("../PHPMailer/src/SMTP.php");

    
    //Load Composer's autoloader
    // require_once("../PHPMailer/vendor/autoload.php");
    // require 'C:/xampp/php/PEAR/vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
   
    
   
    try {
        
        if(isset($_POST['assign'])) {

        
            
            $var_teacher_id = $_POST['teacher_id'];
            $var_fullname  = $_POST['fullname'];
            $var_teacher_dept = $_POST['dept'];
            $var_teacher_email = $_POST['teacher_email'];
            $var_class = $_POST['class'];
            $var_time = $_POST['time'];
            $var_description = "Hello Mr. " . $var_fullname . "The depertment of examination is informed you that from the starting of examination until the end you will admnister the exam at " . $var_class . " at " . $var_time . " time";
            $var_subject = $var_description;
            $var_date = date('Y-m-d');


            //Server settings
            $mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true));
            $mail->SMTPDebug = 4;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = "sumaituniversity72@gmail.com";                     //SMTP username
            $mail->Password   = 'exam12345';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


                //Recipients
            $mail->setFrom('abdulhalimhafidh5@gmail.com');
            $mail->addAddress($var_teacher_email);     //Add a recipient
                          //Name is optional
            

            $SqlQuery = "INSERT INTO mail_table VALUES (?,?,?,?,?)";
            $statement = $conn->prepare($SqlQuery);
            $result = $statement->execute(array(null, $var_teacher_id, $var_teacher_email, $var_subject, $var_date));


                if($result == true) {
                    $SqlAssigned = "INSERT INTO teacher_assigned_details VALUES (?,?,?,?)";
                    $statement2 = $conn->prepare($SqlAssigned);
                    $result2 = $statement2->execute(array(null, $var_teacher_id, $var_class, $var_time));

                    if ($result2 == true) {

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Assignment For admnistering Exam';
                        $mail->Body    = $var_subject;
                        
                        if($mail->send()){
                            ?>
                            <script>
                             alert("Assigned Successefully");
                            window.location.href = "../teacher.php"; 
                             </script> 
                         <?php
                        }
                        else {
                            echo "error: " .$mail->ErrorInfo;;
                        }


                       
                    } else {
                        ?>
                           <script>
                            alert("Assigned not Successefully");
                           window.location.href = "../teacher.php"; 
                            </script> 
                        <?php
                    }
                }

        }

    } catch (PDOException $e) {
        echo "Error: " .$e->getMessage();
    }
?>   

