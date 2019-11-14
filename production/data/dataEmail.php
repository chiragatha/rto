<?php
	include_once("connection.php");	
    require '../phpmailer/PHPMailerAutoload.php';
	
	class DataClass 
    {
        protected $conn;
        function __construct() {
            $db = new dbObj();
            $this->conn = $db->getConnection();
        }

        function __destruct() {
            $this->conn->close();
        }

        public function getVehicles($coID)
        {
            $sql = "SELECT vehVehicleNo FROM vehicle WHERE coID=$coID";
            $result = mysqli_query($this->conn,$sql);

            $options="";
            $i=0;
            while ($row = mysqli_fetch_array($result)) {
                if($i==0){$options="<option value='" . $row['vehVehicleNo'] ."'>" . $row['vehVehicleNo']."</option>";$i++;}
                else{$options .= "<option value='" . $row['vehVehicleNo'] ."'>" . $row['vehVehicleNo']."</option>";}
            }

            echo $options;
             
        }

        public function sendMail($vehVehicleNo,$coID)
        {

            $email="";
            $sql = "SELECT coEmail FROM company WHERE coID=$coID";
            $result = mysqli_query($this->conn,$sql);
            while ($row = mysqli_fetch_array($result)) {
                $email=$row['coEmail'];
            }
            if($email!="")
            {
                $fromEmail='rtoprojectmail@gmail.com';
                $toEmail=$email;
                $mail = new PHPMailer;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; 
                $mail->SMTPAuth = true;                      
                $mail->Username = $fromEmail;        
                $mail->Password = 'rtoproject123';                          
                $mail->SMTPSecure = 'tls';                            
                $mail->Port = 587;                                   

                $mail->From = $fromEmail;
                $mail->FromName = 'RTO System';
                $mail->addAddress( $toEmail);   

                $mail->isHTML(true);      

                $mail->Subject = "Vehicle Documents : ".$vehVehicleNo;
                $mail->Body    = 'Please find scanned documents in attachedments.';


               /* if (file_exists($filename)) {
                    $mail->addAttachment('../testfile.txt');
                }*/ 

                $attachedments = glob("../../SCANNED/".$vehVehicleNo."/*.pdf");
                
                for($i=0;$i<sizeof($attachedments);$i++)
                {                    
                    $mail->addAttachment($attachedments[$i]);
                }

                if($mail->send()) {
                    //echo "_2_";
                    header("Location: ../email.php?errorCode=1");
                } else {
                    //echo "_3_";
                    header("Location: ../email.php?errorCode=2");
                }
            }
            else
            { 
                    //echo "_4_";    
                header("Location: ../email.php?errorCode=3");
            }
            //echo "_5_";
            die();
        }
        
        
}
    $action = isset($_POST['action']) != '' ? $_POST['action'] : '';
    $obj = new DataClass();

    switch($action) {
     case 'sendMail':
            $obj->sendMail($_POST['emailVehicle'],$_POST['emailCompany']);
            break;
     default:
        $obj->getVehicles($_POST['id']);
    }
?>
	