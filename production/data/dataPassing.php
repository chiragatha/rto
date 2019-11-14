

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
            if(isset($postData['vehicleNo']) && isset($postData['pasFromDate']) && isset($postData['pasToDate']) ) 
            {
                $vehicleNo=$postData['vehicleNo'];
                $pasFromDate=date_format(date_create($postData['pasFromDate']),"Y-m-d");                
                $pasToDate=date_format(date_create($postData['pasToDate']),"Y-m-d");  
                $vehID="";

                $sql = "SELECT vehID FROM vehicle WHERE vehVehicleNo='$vehicleNo'";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $vehID=$row['vehID'];
                }

                if($vehID!="")
                {
                    $status=true;
                    $sql = "SELECT pasFromDate FROM passing,vehicle WHERE pasFromDate='$pasFromDate' AND pasToDate='$pasToDate' AND vehID=$vehID AND vehicle.vehID=passing.vehID";
                    $result = mysqli_query($this->conn, $sql);
                    while ($row=mysqli_fetch_assoc($result)) {
                        $status=false;
                    }

                    if($status)
                    {
                                               
                        $sql = "INSERT INTO passing(pasFromDate,pasToDate,vehID,pasRenewed) VALUES('$pasFromDate','$pasToDate',$vehID,-1)";
                        $result = mysqli_query($this->conn, $sql);

                        $oldToDate="";
                        $sql1= "SELECT pasToDate FROM reminder WHERE vehID=$vehID";
                        $result1 = mysqli_query($this->conn, $sql1);
                        while ($row1=mysqli_fetch_assoc($result1)) {
                            $oldToDate=$row1['pasToDate'];
                        }

                        if($oldToDate!=""){
                            if(date("Y-m-d",strtotime($pasToDate))>date("Y-m-d",strtotime($oldToDate)))
                            {
                                $sql1= "UPDATE reminder SET pasToDate='$pasToDate' WHERE vehID=$vehID";
                                $result1 = mysqli_query($this->conn, $sql1);
                            }
                        }


                        
                        header("Location: ../passing.php");  
                    }
                    else
                    {
                        header("Location: ../passing.php?errorCode=2");
                    }           
                }
                else
                {
                    header("Location: ../passing.php?errorCode=1");
                }
                               
                die();
            }
             
        }

         function getRecords() {
            $obj = array();
            $n=1;$i=0;
            $sql="SELECT pasID, pasFromDate, pasToDate, vehVehicleNo , pasRenewed FROM passing,vehicle WHERE vehicle.vehID=passing.vehID ORDER BY passing.pasID DESC";
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
                $id=$row['pasID'];                
                $obj[$i]['pasID']=$n;
                $obj[$i]['pasFromDate']=date_format(date_create($row['pasFromDate']),"d-m-Y");
                $obj[$i]['pasToDate']=date_format(date_create($row['pasToDate']),"d-m-Y");
                $obj[$i]['vehVehicleNo']=$row['vehVehicleNo'];
                if($row['pasRenewed']==0){
                      $obj[$i]['pasRenewed']='Renewed';
                }else{
                      $obj[$i]['pasRenewed']='Not Renewed';
                }
              
                  $obj[$i]['action']="<span><a onclick='editForm(id=$id)'><i class='fa fa-edit pull-left' style='font-size: 20px;'></i></a><a  onclick='conform(id=$id)'><i class='fa fa-trash pull-right' style='font-size: 20px;'></a></span>";
                $n++;$i++;
           
            }
                    
         echo json_encode($obj); 
        }
        public function getEditableData() {
            $obj = array();
            $n=0;
           $sql="SELECT pasID, pasFromDate, pasToDate, vehVehicleNo , pasRenewed FROM passing,vehicle WHERE vehicle.vehID=passing.vehID and pasID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
                $obj['pasID']=$n;
               
                $obj['pasFromDate']=date_format(date_create($row['pasFromDate']),"d-m-Y");
                $obj['pasToDate']=date_format(date_create($row['pasToDate']),"d-m-Y");
                $obj['vehVehicleNo']=$row['vehVehicleNo'];
               if($row['pasRenewed']==0){
                      $obj['pasRenewed']='Renewed';
                }else{
                      $obj['pasRenewed']='Not Renewed';
                }
    
            }
            echo json_encode($obj);        
                 
        }
      
        function update() {
           $sql1="SELECT `vehID`FROM `vehicle` WHERE `vehVehicleNo`='" . $_POST["vehVehicleNo"]."'";
            $queryRecords1 = mysqli_query($this->conn, $sql1) or die("error to fetch data");
            while( $row = mysqli_fetch_assoc($queryRecords1) ) { 
                $vehID = $row['vehID'];
            } 
            if($vehID!=''){
            $sql = "Update passing set pasFromDate='" . date_format(date_create($_POST["pasFromDate"]),"Y-m-d")."', pasToDate='" . date_format(date_create($_POST["pasToDate"]),"Y-m-d")."', vehID=" . $vehID .", pasRenewed=" . $_POST['pasRenewed'] ." WHERE pasID=".$_POST["edit_id"];
                 $result = mysqli_query($this->conn, $sql) or die("error to update employee data");

                 $pasToDate=date_format(date_create($_POST["pasToDate"]),"Y-m-d");
                    $oldToDate="";
                        $sql1= "SELECT pasToDate FROM reminder WHERE vehID=$vehID";
                        $result1 = mysqli_query($this->conn, $sql1);
                        while ($row1=mysqli_fetch_assoc($result1)) {
                            $oldToDate=$row1['pasToDate'];
                        }

                        if($oldToDate!=""){
                            if(date("Y-m-d",strtotime($pasToDate))>date("Y-m-d",strtotime($oldToDate)))
                            {
                                $sql1= "UPDATE reminder SET pasToDate='$pasToDate' WHERE vehID=$vehID";
                                $result1 = mysqli_query($this->conn, $sql1);
                            }
                        }
            }
            
              
            header("Location: ../passing.php");
        }

        function delete() {              
                
                $vehID="";
                $sql="SELECT vehID FROM `passing` WHERE pasID=".$_POST['id'];
                $result = mysqli_query($this->conn, $sql);  
                while( $row = mysqli_fetch_assoc($result) ) { 
                $vehID = $row['vehID'];
                }

                $sql="delete FROM `passing` WHERE pasID=".$_POST['id'];
                $result = mysqli_query($this->conn, $sql) or die("error to update location data");            

                $upDate="0000-00-00";
                $sql="SELECT pasToDate FROM `passing` WHERE vehID=$vehID ORDER BY pasToDate DESC";
                $result = mysqli_query($this->conn, $sql);
                while( $row = mysqli_fetch_assoc($result) ) { 
                $upDate = $row['pasToDate'];break;
                } 

                $sql1= "UPDATE reminder SET pasToDate='$upDate' WHERE vehID=$vehID";
                $result1 = mysqli_query($this->conn, $sql1);                
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
    