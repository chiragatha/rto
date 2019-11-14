
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
            if(isset($postData['permitNo']) && isset($postData['vehicleNo']) && isset($postData['nphFromDate']) 
                && isset($postData['nphToDate']) ) 
            {
                $permitNo=$postData['permitNo'];
                $vehicleNo=$postData['vehicleNo'];                
                $nphFromDate=date_format(date_create($postData['nphFromDate']),"Y-m-d");                
                $nphToDate=date_format(date_create($postData['nphToDate']),"Y-m-d");  
                $vehID="";              

                $sql = "SELECT vehID FROM vehicle WHERE vehVehicleNo='$vehicleNo'";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $vehID=$row['vehID'];
                }

                if($vehID!="")
                {
                    $status=true;
                    $sql = "SELECT nphPermitDate FROM npheader,vehicle WHERE nphPermitDate='$nphFromDate' AND nphExpiryDate='$nphToDate' AND vehID=$vehID AND vehicle.vehID=npheader.vehID";
                    $result = mysqli_query($this->conn, $sql);
                    while ($row=mysqli_fetch_assoc($result)) {
                        $status=false;
                    }

                    if($status)
                    {
                        $status1=true;

                        $sql = "SELECT nphPermitNo FROM npheader,vehicle WHERE vehicle.vehID=npheader.vehID and nphPermitNo='$permitNo'";
                        $result = mysqli_query($this->conn, $sql);
                        while ($row=mysqli_fetch_assoc($result)) {  
                             $status1=false;
                        }
                        if($status1)
                        {
                            $sql = "INSERT INTO npheader(nphPermitNo,nphPermitDate,nphExpiryDate,vehID,nphRenewed) VALUES('$permitNo','$nphFromDate','$nphToDate',$vehID,-1)";
                            $result = mysqli_query($this->conn, $sql);

                            $oldToDate="";
                            $sql1= "SELECT nphToDate FROM reminder WHERE vehID=$vehID";
                            $result1 = mysqli_query($this->conn, $sql1);
                            while ($row1=mysqli_fetch_assoc($result1)) {
                                $oldToDate=$row1['nphToDate'];
                            }

                            if($oldToDate!=""){
                                if(date("Y-m-d",strtotime($nphToDate))>date("Y-m-d",strtotime($oldToDate)))
                                {
                                    $sql1= "UPDATE reminder SET nphToDate='$nphToDate' WHERE vehID=$vehID";
                                    $result1 = mysqli_query($this->conn, $sql1);
                                }
                            }

                            header("Location: ../np.php");    
                        }else
                        {
                            //echo "_e2_";
                            header("Location: ../np.php?errorCode=8");   
                        }    
                    }
                    else
                    {
                        //echo "_e2_";
                        header("Location: ../np.php?errorCode=5");   
                    }     
                }
                else
                {
                    header("Location: ../np.php?errorCode=4");
                }
                
                                
                die();
            }
             
        }
         function getRecords() {
           $obj = array();
            $n=1;$i=0;
             $sql="SELECT `nphID`, `nphPermitNo`, `nphPermitDate`, `nphExpiryDate`, vehVehicleNo, `nphRenewed` FROM `npheader`,vehicle where vehicle.vehID=npheader.vehID ORDER BY nphID DESC";
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){

                $npdCount=0;
                $sql1="SELECT count(nphID) as npdNo FROM `npdetails` where nphID=".$row['nphID'];
                $result1 = mysqli_query($this->conn, $sql1) or die("error to update location data");
                while($row1=mysqli_fetch_array($result1)){
                    $npdCount=$row1['npdNo'];
                }
                 
                $id=$row['nphID'];      
                $obj[$i]['nphID']=$n;          
                $obj[$i]['nphPermitNo']=$row['nphPermitNo'];
                $obj[$i]['nphPermitDate']=date_format(date_create($row['nphPermitDate']),"d-m-Y");
                $obj[$i]['nphExpiryDate']=date_format(date_create($row['nphExpiryDate']),"d-m-Y");
                $obj[$i]['vehVehicleNo']=$row['vehVehicleNo'];
                if($row['nphRenewed']==0){
                   $obj[$i]['nphRenewed']='Renewed';
                }else{
                    $obj[$i]['nphRenewed']='Not Renewed';   
                }
                 $obj[$i]['action']="<span><a onclick='editForm1(id=$id)'><i class='fa fa-edit pull-left' style='font-size: 20px;'></i></a><a  onclick='conform1(id=$id,npdCount=$npdCount)'><i class='fa fa-trash pull-right' style='font-size: 20px;'></a></span>";
                $n++;$i++;
           
            }
                  
                  /*echo "<pre>"  ;
                  echo print_r($obj);*/
         echo json_encode($obj); 
        }
        public function getEditableData() {
            $obj = array();
          
            
             $sql="SELECT `nphID`, `nphPermitNo`, `nphPermitDate`, `nphExpiryDate`,vehVehicleNo, `nphRenewed` FROM `npheader`,vehicle where vehicle.vehID=npheader.vehID and nphID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
               
             
                 
                $obj['nphID']=$row['nphID'];          
                $obj['nphPermitNo']=$row['nphPermitNo'];
                $obj['nphPermitDate']=date_format(date_create($row['nphPermitDate']),"d-m-Y");
                $obj['nphExpiryDate']=date_format(date_create($row['nphExpiryDate']),"d-m-Y");
                $obj['vehVehicleNo']=$row['vehVehicleNo'];
                if($row['nphRenewed']==0){
                   $obj['nphRenewed']='Renewed';
                }else{
                    $obj['nphRenewed']='Not Renewed';   
                }
    
            }
            echo json_encode($obj);        
                 
        }
      
        function update() {
            $vehVehicleNo=$_POST['vehVehicleNo'];
            
           $sql = "SELECT vehID FROM vehicle WHERE vehVehicleNo='$vehVehicleNo'";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $vehID=$row['vehID'];
                }

              
                if($_POST['nphRenewed']=='Renewed'){
                   $nphRenewed=0;
                }else{
                    $nphRenewed=-1;   
                }

            
            if($vehID!=''){
                 $sql = "Update npheader set nphPermitNo='" . $_POST["nphPermitNo"]."', nphPermitDate='" . date_format(date_create($_POST["nphPermitDate"]),"Y-m-d")."', nphExpiryDate='" . date_format(date_create($_POST["nphExpiryDate"]),"Y-m-d")."',vehID=$vehID,nphRenewed=" . $nphRenewed .",nphRenewed=".$_POST["nphRenewed1"]." WHERE nphID=".$_POST["edit_id"];
                 $result = mysqli_query($this->conn, $sql) or die("error to update employee data");

                 $nphToDate=date_format(date_create($_POST["nphExpiryDate"]),"Y-m-d");
                  $oldToDate="";
                        $sql1= "SELECT nphToDate FROM reminder WHERE vehID=$vehID";
                        $result1 = mysqli_query($this->conn, $sql1);
                        while ($row1=mysqli_fetch_assoc($result1)) {
                            $oldToDate=$row1['nphToDate'];
                        }

                        if($oldToDate!=""){
                            if(date("Y-m-d",strtotime($nphToDate))>date("Y-m-d",strtotime($oldToDate)))
                            {
                                $sql1= "UPDATE reminder SET nphToDate='$nphToDate' WHERE vehID=$vehID";
                                $result1 = mysqli_query($this->conn, $sql1);
                            }
                        }

                    }
            
              
           header("Location: ../np.php");
        }

        function delete() {
              
            $vehID="";
            $sql="SELECT vehID FROM `npheader` WHERE nphID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql);  
            while( $row = mysqli_fetch_assoc($result) ) { 
            $vehID = $row['vehID'];
            }

            $sql="delete FROM `npheader` WHERE nphID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");

            $sql="delete FROM `npdetails` WHERE nphID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");        

            $upDate="0000-00-00";
            $sql="SELECT nphExpiryDate FROM `npheader` WHERE vehID=$vehID ORDER BY nphExpiryDate DESC";
            $result = mysqli_query($this->conn, $sql);
            while( $row = mysqli_fetch_assoc($result) ) { 
            $upDate = $row['nphExpiryDate'];break;
            } 

            $sql1= "UPDATE reminder SET nphToDate='$upDate' WHERE vehID=$vehID";
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