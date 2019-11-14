

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
            if(isset($postData['insPolicyNo']) && isset($postData['insCompany']) && isset($postData['insFromDate']) 
                && isset($postData['insToDate']) && isset($postData['vehicleNo'])) 
            {
                

                $insPolicyNo=$postData['insPolicyNo'];
                $insCompany=$postData['insCompany'];
                $insFromDate=date_format(date_create($postData['insFromDate']),"Y-m-d");
                $insToDate=date_format(date_create($postData['insToDate']),"Y-m-d");
                $vehicleNo=$postData['vehicleNo'];

                $vehID="";

                
                $sql = "SELECT vehID FROM vehicle WHERE vehVehicleNo='$vehicleNo'";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $vehID=$row['vehID'];
                }
                
                if($vehID!="")
                {
                    $status=true;
                    $sql = "SELECT insuFromDate FROM insurance,vehicle WHERE insuFromDate='$insFromDate' AND insuToDate='$insToDate' AND insurance.vehID=$vehID AND vehicle.vehID=insurance.vehID";
                    $result = mysqli_query($this->conn, $sql);
                    while ($row=mysqli_fetch_assoc($result)) {
                        $status=false;
                    }

                    if($status)
                    {
                        $status1=true;
                        $sql = "SELECT insuPolicyNo FROM insurance,vehicle WHERE vehicle.vehID=insurance.vehID and insuPolicyNo='$insuPolicyNo'";
                        $result = mysqli_query($this->conn, $sql);
                        while ($row=mysqli_fetch_assoc($result)) {  
                             $status1=false;
                        }

                        if($status1)
                        {
                            $sql = "INSERT INTO insurance(insuPolicyNo,insuFromDate,insuToDate,insID,vehID,insuRenewed) VALUES('$insPolicyNo','$insFromDate','$insToDate',$insCompany,$vehID,-1)";
                                $result = mysqli_query($this->conn, $sql);   


                                $oldToDate="";
                                $sql1= "SELECT insuToDate FROM reminder WHERE vehID=$vehID";
                                $result1 = mysqli_query($this->conn, $sql1);
                                while ($row1=mysqli_fetch_assoc($result1)) {
                                    $oldToDate=$row1['insuToDate'];
                                }

                                if($oldToDate!=""){
                                    if(date("Y-m-d",strtotime($insToDate))>date("Y-m-d",strtotime($oldToDate)))
                                    {
                                        $sql1= "UPDATE reminder SET insuToDate='$insToDate' WHERE vehID=$vehID";
                                        $result1 = mysqli_query($this->conn, $sql1); 
                                    }
                                }

                                header("Location: ../insurance.php");  
                        }
                        else
                        {
                            header("Location: ../insurance.php?errorCode=3");   
                        } 
                    }else
                    {
                        //echo "_e2_";
                        header("Location: ../insurance.php?errorCode=2");   
                    }              
                }
                else
                {
                    header("Location: ../insurance.php?errorCode=1");
                }
                

                die();
            }
             
        }

        function getRecords() {
            $obj = array();
            $n=1;$i=0;
            $sql="SELECT insuID,insuPolicyNo,insuFromDate,insuToDate,insInsuranceCo,vehVehicleNo,insuRenewed FROM insurance,vehicle,insuranceco WHERE insurance.`vehID`=`vehicle`.`vehID` and `insuranceco`.`insID`=`insurance`.`insID` ORDER BY insuID DESC";
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
                 
                $id=$row['insuID'];
                
                $obj[$i]['insuID']=$n;
                $obj[$i]['insuPolicyNo']=$row['insuPolicyNo'];
                $obj[$i]['insuFromDate']=date_format(date_create($row['insuFromDate']),"d-m-Y");
                $obj[$i]['insuToDate']=date_format(date_create($row['insuToDate']),"d-m-Y");
                  $obj[$i]['insInsuranceCo']=$row['insInsuranceCo'];
                $obj[$i]['vehVehicleNo']=$row['vehVehicleNo'];
                if($row['insuRenewed']==0){
                   $obj[$i]['insuRenewed']='Renewed';
                }else{
                    $obj[$i]['insuRenewed']='Not Renewed';   
                }
                 $obj[$i]['action']="<span><a onclick='editForm(id=$id)'><i class='fa fa-edit pull-left' style='font-size: 20px;'></i></a><a  onclick='conform(id=$id)'><i class='fa fa-trash pull-right' style='font-size: 20px;'></a></span>";
                $n++;$i++;
           
            }
                    
         echo json_encode($obj); 
        }
        public function getEditableData() {
            $obj = array();
            $n=0;
           $sql="SELECT insuID,insuPolicyNo,insuFromDate,insuToDate,insInsuranceCo,vehVehicleNo,insuRenewed FROM insurance,vehicle,insuranceco WHERE insurance.`vehID`=`vehicle`.`vehID` and `insuranceco`.`insID`=`insurance`.`insID` and insuID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
                $obj['insuID']=$n;
                $obj['insuPolicyNo']=$row['insuPolicyNo'];
                $obj['insuFromDate']=date_format(date_create($row['insuFromDate']),"d-m-Y");
                $obj['insuToDate']=date_format(date_create($row['insuToDate']),"d-m-Y");
                $obj['insInsuranceCo']=$row['insInsuranceCo'];
                $obj['vehVehicleNo']=$row['vehVehicleNo'];
                if($row['insuRenewed']==0){
                   $obj['insuRenewed']='Renewed';
                }else{
                    $obj['insuRenewed']='Not Renewed';   
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
            $sql2="SELECT `insID` FROM `insuranceco` WHERE `insInsuranceCo`='" . $_POST["insInsuranceCo"]."'";

            $queryRecords2 = mysqli_query($this->conn, $sql2) or die("error to fetch data");


            while( $row = mysqli_fetch_assoc($queryRecords2) ) { 
                $insID = $row['insID'];

            } 

            if($vehID!='' && $insID!='' ){
                   $sql = "Update `insurance` set insuPolicyNo='" . $_POST["insuPolicyNo"]."', insuFromDate='" . date_format(date_create($_POST["insuFromDate"]),"Y-m-d")."', insuToDate='" . date_format(date_create($_POST["insuToDate"]),"Y-m-d")."', vehID=" . $vehID. ", insID=" . $insID .", insuRenewed=" . $_POST['insuRenewed'] ." WHERE insuID=".$_POST["edit_id"];
                    $result = mysqli_query($this->conn, $sql) or die("error to update  data");



                   $insToDate=date_format(date_create($_POST["insuToDate"]),"Y-m-d");             
         


                        $oldToDate="";
                        $sql1= "SELECT insuToDate FROM reminder WHERE vehID=$vehID";
                        $result1 = mysqli_query($this->conn, $sql1);
                        while ($row1=mysqli_fetch_assoc($result1)) {
                            $oldToDate=$row1['insuToDate'];
                        }

                        if($oldToDate!=""){
                            if(date("Y-m-d",strtotime($insToDate))>date("Y-m-d",strtotime($oldToDate)))
                            {
                                $sql1= "UPDATE reminder SET insuToDate='$insToDate' WHERE vehID=$vehID";
                                $result1 = mysqli_query($this->conn, $sql1); 
                            }
                        }
                    }
            
              
            header("Location: ../insurance.php");
        }

        function delete() {
              
            $vehID="";
            $sql="SELECT vehID FROM `insurance` WHERE insuID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql);  
            while( $row = mysqli_fetch_assoc($result) ) { 
            $vehID = $row['vehID'];
            }

            $sql="delete FROM `insurance` WHERE insuID=".$_POST['id'];
                $result = mysqli_query($this->conn, $sql) or die("error to update location data");         

            $upDate="0000-00-00";
            $sql="SELECT insuToDate FROM `insurance` WHERE vehID=$vehID ORDER BY insuToDate DESC";
            $result = mysqli_query($this->conn, $sql);
            while( $row = mysqli_fetch_assoc($result) ) { 
            $upDate = $row['insuToDate'];break;
            } 

            $sql1= "UPDATE reminder SET insuToDate='$upDate' WHERE vehID=$vehID";
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
    