

<?php
	include_once("connection.php");	
	
	class DataClass 
    {
        protected $conn;
        protected $data = array();
        public $postData;
        function __construct() {
            $db = new dbObj();
            $this->conn = $db->getConnection();
        }

        function __destruct() {
            $this->conn->close();
        }

        public function insert($postData)
        {
            if(isset($postData['title']) && isset($postData['name']) && isset($postData['address']) &&
                isset($postData['telephone']) && isset($postData['receAddress']) && isset($postData['receTelephone']) &&
                isset($postData['mobile']) && isset($postData['fax']) && isset($postData['email']) ) 
            {
                $title=$postData['title'];
                $name=$postData['name'];                
                $address=$postData['address'];                
                $telephone=$postData['telephone'];
                $receAddress=$postData['receAddress'];
                $receTelephone=$postData['receTelephone'];                
                $mobile=$postData['mobile'];                
                $fax=$postData['fax'];
                $email=$postData['email'];
                
                $sql = "INSERT INTO rcholder(rcTitle,rcName,rcRCAddress,rcTelephone,rcResiAddress,rcResiTelephone,rcMobile,rcFax,rcEmailID) VALUES('$title','$name','$address','$telephone','$receAddress','$receTelephone','$mobile','$fax','$email')";
                    $result = mysqli_query($this->conn, $sql);

                    header("Location: ../rcHolder.php");            

                
                die();
            }
             
        }

          function getRecords() {
            $obj = array();
            $n=1;$i=0;
            $sql="SELECT rcID, rcTitle, rcName,rcRCAddress, rcTelephone,rcResiAddress, rcResiTelephone,rcMobile , rcFax,rcEmailID FROM rcholder  ORDER BY rcID DESC";
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
                 
                $id=$row['rcID'];

                    $obj[$i]['rcID']=$n;
                    $obj[$i]['rcTitle']=$row['rcTitle'];
                    $obj[$i]['rcName']=$row['rcName'];
                    $obj[$i]['rcRCAddress']=$row['rcRCAddress'];
                    $obj[$i]['rcTelephone']=$row['rcTelephone'];
                    $obj[$i]['rcResiAddress']=$row['rcResiAddress'];
                    $obj[$i]['rcResiTelephone']=$row['rcResiTelephone'];
                    $obj[$i]['rcMobile']=$row['rcMobile'];
                    $obj[$i]['rcFax']=$row['rcFax'];
                    $obj[$i]['rcEmailID']=$row['rcEmailID'];
            
                 $obj[$i]['action']="<span><a onclick='editForm(id=$id)'><i class='fa fa-edit pull-left' style='font-size: 20px;'></i></a><a  onclick='conform(id=$id)'><i class='fa fa-trash pull-right' style='font-size: 20px;'></a></span>";
                $n++;$i++;
           
            }
                    
         echo json_encode($obj); 
        }
        public function getEditableData() {
            $obj = array();
            $n=0;
           $sql="SELECT rcID, rcTitle, rcName,rcRCAddress, rcTelephone,rcResiAddress, rcResiTelephone,rcMobile , rcFax,rcEmailID FROM rcholder WHERE rcID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
               
                $obj['rcID']=$n;
                    $obj['rcTitle']=$row['rcTitle'];
                    $obj['rcName']=$row['rcName'];
                    $obj['rcRCAddress']=$row['rcRCAddress'];
                    $obj['rcTelephone']=$row['rcTelephone'];
                    $obj['rcResiAddress']=$row['rcResiAddress'];
                    $obj['rcResiTelephone']=$row['rcResiTelephone'];
                    $obj['rcMobile']=$row['rcMobile'];
                    $obj['rcFax']=$row['rcFax'];
                    $obj['rcEmailID']=$row['rcEmailID'];
                
    
            }
            echo json_encode($obj);        
                 
        }
      
        function update() {
           $sql = "Update rcholder set rcTitle='" . $_POST["rcTitle"]."', rcName='" . $_POST["rcName"]."',rcRCAddress='". $_POST["rcRCAddress"]."', rcTelephone='" . $_POST["rcTelephone"]."', rcResiAddress='" . $_POST["rcResiAddress"]."'
                , rcResiTelephone='" . $_POST["rcResiTelephone"]."', rcMobile='" . $_POST["rcMobile"]."',rcFax='" . $_POST["rcFax"]."',rcEmailID='" . $_POST["rcEmailID"]."' WHERE rcID=".$_POST["edit_id"];
                 $result = mysqli_query($this->conn, $sql) or die("error to update employee data");
            
              
            header("Location: ../rcholder.php");
        }

        function delete() {
                $sql="delete FROM `rcholder` WHERE rcID=".$_POST['id'];
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
    