<?php
	include_once("connection.php");	
	
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

        public function insert($postData)
        {
            if( isset($postData['name']) && isset($postData['title']) && isset($postData['telephone'])
                && isset($postData['contactPerson'])) 
            {
                $title=$postData['title'];
                $name=$postData['name'];
                $address=$postData['address'];
                $telephone=$postData['telephone'];
                $contactPerson=$postData['contactPerson'];
                $fax=$postData['fax'];
                $email=$postData['email'];
                $remarks=$postData['remarks'];
                $sql = "INSERT INTO company(coTitle,coCompany,coHOAddress,coTelephone,coContactPerson,coFax,coEmail,coRemarks) VALUES('$title','$name','$address','$telephone','$contactPerson','$fax','$email','$remarks')";

                $result = mysqli_query($this->conn, $sql);
                header("Location: ../index.php");
                
            }
            else
            {
                header("Location: ../index.php?errorCode=1");
            }
            die();
             
        }
        
        function getRecords() {
            $obj = array();
            $n=1;$i=0;
            $sql="SELECT * FROM `company` ORDER BY coID DESC";
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
                
                $id=$row['coID'];
                
                $obj[$i]['coID']=$n;
                $obj[$i]['coTitle']=$row['coTitle'];
                $obj[$i]['coCompany']=$row['coCompany'];
                $obj[$i]['coHOAddress']=$row['coHOAddress'];
                $obj[$i]['coTelephone']=$row['coTelephone'];
                $obj[$i]['coContactPerson']=$row['coContactPerson'];
                $obj[$i]['coFax']=$row['coFax'];
                $obj[$i]['coEmail']=$row['coEmail'];
                $obj[$i]['coRemarks']=$row['coRemarks'];
                  $obj[$i]['action']="<span><a onclick='editForm(id=$id)'><i class='fa fa-edit pull-left' style='font-size: 20px;'></i></a><a  onclick='conform(id=$id)'><i class='fa fa-trash pull-right' style='font-size: 20px;'></a></span>";
                $n++;$i++;
           
            }
                    
         echo json_encode($obj); 
        }
        public function getEditableData() {
        
            $obj = array();
            $n=0;
            $sql="SELECT * FROM `company` WHERE coID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
                 $obj['coTitle']=$row['coTitle'];
                $obj['coCompany']=$row['coCompany'];
                $obj['coHOAddress']=$row['coHOAddress'];
                $obj['coTelephone']=$row['coTelephone'];
                $obj['coContactPerson']=$row['coContactPerson'];
                $obj['coFax']=$row['coFax'];
                $obj['coEmail']=$row['coEmail'];
                $obj['coRemarks']=$row['coRemarks'];
            
            }
            echo json_encode($obj);        
        }
      
        function update() {
           date_default_timezone_set('Asia/Calcutta');
            $date = date('Y-m-d H:i:s');
            $obj = array();
            $n=0;
               
            
                
             $sql = "Update company set coTitle='" . $_POST["coTitle"]."', coCompany='" . $_POST["coCompany"]."', coHOAddress='" . $_POST["coHOAddress"]."', coTelephone='" . $_POST["coTelephone"] ."', coContactPerson='" . $_POST["coContactPerson"] . "', coFax='" . $_POST["coFax"] . "', coEmail='" . $_POST["coEmail"] .  "' WHERE coID='".$_POST["edit_id"]."'";
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            header("Location: ../index.php");
        }

        function delete() {
              
                $obj = array();
                $n=0;
                $sql="delete FROM `company` WHERE coID=".$_POST['id'];
                $result = mysqli_query($this->conn, $sql) or die("error to update location data");
        }
}

  	
	  $action = isset($_POST['action']) != '' ? $_POST['action'] : '';
	$obj = new DataClass();

	switch($action) {
     case 'insert' :
            $postData=$_POST;
            $obj->insert($postData);
            break;
	case 'update':
            $obj->Update();
            break;
     case 'view1':
            $obj->getEditableData();
            break;
	 case 'delete':           
            $obj->delete();
            break;
	 default:
            $obj->getRecords();
	}
?>
	