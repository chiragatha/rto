

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
            if(isset($postData['name']) && isset($postData['telephone']) && isset($postData['contactPerson']) 
                && isset($postData['mobile']) ) 
            {
                $name=$postData['name'];
                $telephone=$postData['telephone'];                
                $contactPerson=$postData['contactPerson'];                
                $mobile=$postData['mobile'];

                $sql = "INSERT INTO insuranceco(insInsuranceCo,insTelephone,insContactPerson,insMobile) VALUES('$name','$telephone','$contactPerson','$mobile')";
                $result = mysqli_query($this->conn, $sql);

                header("Location: ../insuranceCompany.php");
                die();
            }
             
        }
         function getRecords() {
            $obj = array();
            $n=1;$i=0;
            $sql="SELECT * FROM `insuranceco` ORDER By insID DESC";
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
                $id=$row['insID'];
                $obj[$i]['insID']=$n;
                $obj[$i]['insInsuranceCo']=$row['insInsuranceCo'];
                $obj[$i]['insContactPerson']=$row['insContactPerson'];
                $obj[$i]['insMobile']=$row['insMobile'];
                $obj[$i]['insTelephone']=$row['insTelephone'];
                 $obj[$i]['action']="<span><a onclick='editForm(id=$id)'><i class='fa fa-edit pull-left' style='font-size: 20px;'></i></a><a  onclick='conform(id=$id)'><i class='fa fa-trash pull-right' style='font-size: 20px;'></a></span>";
                $n++;$i++;           
            }
                    
         echo json_encode($obj); 
        }

         public function getEditableData() {
            $obj = array();
            $n=0;
            $sql="SELECT * FROM `insuranceco`WHERE insID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
                $obj['insID']=$n;
                $obj['insInsuranceCo']=$row['insInsuranceCo'];
                $obj['insContactPerson']=$row['insContactPerson'];
                $obj['insMobile']=$row['insMobile'];
                $obj['insTelephone']=$row['insTelephone'];
            }
            echo json_encode($obj);        
                 
        }
      
        function update() {
           echo $sql = "Update `insuranceco` set insInsuranceCo='" . $_POST["insInsuranceCo"]."', insContactPerson='" . $_POST["insContactPerson"]."', insTelephone='" . $_POST["insTelephone"]."', insMobile='" . $_POST["insMobile"]."' WHERE insID=".$_POST["edit_id"];
            $result = mysqli_query($this->conn, $sql) or die("error to update  data");
           header("Location: ../insuranceCompany.php");
        }
        function delete() {
            $obj = array();
            $n=0;
            $sql="delete FROM `insuranceco` WHERE insID=".$_POST['id'];
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
    