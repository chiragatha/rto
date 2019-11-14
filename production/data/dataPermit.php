

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
            if(isset($postData['permitNo']) && isset($postData['vehicleNo']) && isset($postData['perFromDate']) 
                && isset($postData['perToDate']) ) 
            {
                $permitNo=$postData['permitNo'];
                $vehicleNo=$postData['vehicleNo'];                
                $perFromDate=date_format(date_create($postData['perFromDate']),"Y-m-d");                
                $perToDate=date_format(date_create($postData['perToDate']),"Y-m-d");

                $vehID="";
                $sql = "SELECT vehID FROM vehicle WHERE vehVehicleNo='$vehicleNo'";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $vehID=$row['vehID'];
                }

                if($vehID!="")
                {

                    $status=true;
                    $sql = "SELECT perFromDate FROM permit,vehicle WHERE perFromDate='$perFromDate' AND perToDate='$perToDate' AND vehID=$vehID AND vehicle.vehID=permit.vehID";
                    $result = mysqli_query($this->conn, $sql);
                    while ($row=mysqli_fetch_assoc($result)) {
                        $status=false;
                    }

                    if($status)
                    {
                        $status1=true;

                        $sql = "SELECT perPermitNo FROM tax,vehicle WHERE vehicle.vehID=permit.vehID and perPermitNo='$permitNo'";
                        $result = mysqli_query($this->conn, $sql);
                        while ($row=mysqli_fetch_assoc($result)) {  
                             $status1=false;
                        }
                        if($status1)
                        {
                            $sql = "INSERT INTO permit(perPermitNo,perFromDate,perToDate,vehID,perRenewed) VALUES('$permitNo','$perFromDate','$perToDate',$vehID,-1)";
                            $result = mysqli_query($this->conn, $sql);

                            $oldToDate="";
                            $sql1= "SELECT perToDate FROM reminder WHERE vehID=$vehID";
                            $result1 = mysqli_query($this->conn, $sql1);
                            while ($row1=mysqli_fetch_assoc($result1)) {
                                $oldToDate=$row1['perToDate'];
                            }

                            if($oldToDate!=""){
                                if(date("Y-m-d",strtotime($perToDate))>date("Y-m-d",strtotime($oldToDate)))
                                {
                                     $sql1= "UPDATE reminder SET perToDate='$perToDate' WHERE vehID=$vehID";
                                    $result1 = mysqli_query($this->conn, $sql1);
                                }
                            }

                           
                            

                            header("Location: ../permit.php"); 
                        }else
                        {
                            header("Location: ../permit.php?errorCode=3");
                        }    
                    }
                    else
                    {
                        header("Location: ../permit.php?errorCode=2");
                    }            
                }
                else
                {
                    header("Location: ../permit.php?errorCode=1");
                }               

                
                die();
            }
             
        }

         function getRecords() {
            $obj = array();
            $n=1;$i=0;
            $sql="SELECT perID, perPermitNo, perFromDate,perToDate, vehVehicleNo , perRenewed FROM permit,vehicle WHERE vehicle.vehID=permit.vehID ORDER BY perID DESC";
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
                 
                $id=$row['perID'];
                
                $obj[$i]['perID']=$n;
                $obj[$i]['vehVehicleNo']=$row['vehVehicleNo'];
                $obj[$i]['perPermitNo']=$row['perPermitNo'];
                $obj[$i]['perFromDate']=date_format(date_create($row['perFromDate']),"d-m-Y");
                $obj[$i]['perToDate']=date_format(date_create($row['perToDate']),"d-m-Y");
               if($row['perRenewed']==0){
                   $obj[$i]['perRenewed']='Renewed';
                }else{
                    $obj[$i]['perRenewed']='Not Renewed';   
                }
                  $obj[$i]['action']="<span><a onclick='editForm(id=$id)'><i class='fa fa-edit pull-left' style='font-size: 20px;'></i></a><a  onclick='conform(id=$id)'><i class='fa fa-trash pull-right' style='font-size: 20px;'></a></span>";
                $n++;$i++;
           
            }
                    
         echo json_encode($obj); 
        }
        public function getEditableData() {
            $obj = array();
            $n=0;
           $sql="SELECT perID, perPermitNo, perFromDate,perToDate, vehVehicleNo , perRenewed FROM permit,vehicle WHERE vehicle.vehID=permit.vehID  and perID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
               
                $obj['perID']=$n;
                $obj['vehVehicleNo']=$row['vehVehicleNo'];
                $obj['perPermitNo']=$row['perPermitNo'];
                $obj['perFromDate']=date_format(date_create($row['perFromDate']),"d-m-Y");
                $obj['perToDate']=date_format(date_create($row['perToDate']),"d-m-Y");
                if($row['perRenewed']==0){
                    $obj['perRenewed']='Renewed';
                }else{
                    $obj['perRenewed']='Not Renewed';   
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
                   $sql = "Update permit set perPermitNo='" . $_POST["perPermitNo"]."', perFromDate='" . date_format(date_create($_POST["perFromDate"]),"Y-m-d")."', perToDate='" . date_format(date_create($_POST["perToDate"]),"Y-m-d")."',vehID=" . $vehID .",perRenewed=".$_POST["perRenewed"]." WHERE perID=".$_POST["edit_id"];
                 $result = mysqli_query($this->conn, $sql) or die("error to update employee data");

                 $perToDate=date_format(date_create($_POST["perToDate"]),"Y-m-d");
               
                        $oldToDate="";
                        $sql1= "SELECT perToDate FROM reminder WHERE vehID=$vehID";
                        $result1 = mysqli_query($this->conn, $sql1);
                        while ($row1=mysqli_fetch_assoc($result1)) {
                            $oldToDate=$row1['perToDate'];
                        }

                        if($oldToDate!=""){
                            if(date("Y-m-d",strtotime($perToDate))>date("Y-m-d",strtotime($oldToDate)))
                            {
                                 $sql1= "UPDATE reminder SET perToDate='$perToDate' WHERE vehID=$vehID";
                                $result1 = mysqli_query($this->conn, $sql1);
                            }
                        }
                    }
            
              
            header("Location: ../permit.php");
        }

        function delete() {

            $vehID="";
            $sql="SELECT vehID FROM `permit` WHERE perID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql);  
            while( $row = mysqli_fetch_assoc($result) ) { 
            $vehID = $row['vehID'];
            }

            $sql="delete FROM `permit` WHERE perID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");          

            $upDate="0000-00-00";
            $sql="SELECT perToDate FROM `permit` WHERE vehID=$vehID ORDER BY perToDate DESC";
            $result = mysqli_query($this->conn, $sql);
            while( $row = mysqli_fetch_assoc($result) ) { 
            $upDate = $row['perToDate'];break;
            } 

            $sql1= "UPDATE reminder SET perToDate='$upDate' WHERE vehID=$vehID";
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
    