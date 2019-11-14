

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

        


        function updateTO(){
            $obj=array();
             $sql="SELECT `vehID`, `vehVehicleNo`, `vehChassisNo`, `vehEngineNo`, `vehModel`, `vehMake`, `vehRegistrationDate`, `vehRMADate`, `vehHypothecation`, `vehRLW`, `vehUW`, `vehPL`, `vehRemarks`, `coID`,rcID FROM `todetails` WHERE vehID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
                $vehID=$row['vehID'];
                $vehicleNo=$row['vehVehicleNo'];
                $vehChassisNo=$row['vehChassisNo'];
                $vehEngineNo=$row['vehEngineNo'];
                $vehModel=$row['vehModel'];
                $vehMake=$row['vehMake'];
                $vehRegistrationDate=date_format(date_create($row['vehRegistrationDate']),"Y-m-d");
                $vehRMADate=date_format(date_create($row['vehRMADate']),"Y-m-d");
                $vehHypothecation=$row['vehHypothecation'];
                $vehRLW=$row['vehRLW'];
                $vehUW=$row['vehUW'];
                $vehPL=$row['vehPL'];
                $coID=$row['coID'];
                $rcID=$row['rcID'];
                $vehRemarks=$row['vehRemarks'];

                $sql = "INSERT INTO vehicle(vehID,vehVehicleNo,vehChassisNo,vehEngineNo,vehModel,vehMake,vehRegistrationDate,vehRMADate,vehHypothecation,vehRLW,vehUW,vehPL,vehRemarks,coID,rcID) VALUES($vehID,'$vehicleNo','$vehChassisNo','$vehEngineNo','$vehModel','$vehMake','$vehRegistrationDate','$vehRMADate','$vehHypothecation',$vehRLW,$vehUW,$vehPL,'$vehRemarks',$coID,$rcID)";                
                $result = mysqli_query($this->conn, $sql);
    
            }
            

            $sql="delete FROM `todetails` WHERE vehID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
        }


        function updateNOC(){
            $obj=array();
             $sql="SELECT `vehID`, `vehVehicleNo`, `vehChassisNo`, `vehEngineNo`, `vehModel`, `vehMake`, `vehRegistrationDate`, `vehRMADate`, `vehHypothecation`, `vehRLW`, `vehUW`, `vehPL`, `vehRemarks`, `coID`,rcID FROM `nocdetails` WHERE vehID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
                $vehID=$row['vehID'];
                $vehicleNo=$row['vehVehicleNo'];
                $vehChassisNo=$row['vehChassisNo'];
                $vehEngineNo=$row['vehEngineNo'];
                $vehModel=$row['vehModel'];
                $vehMake=$row['vehMake'];
                $vehRegistrationDate=date_format(date_create($row['vehRegistrationDate']),"Y-m-d");
                $vehRMADate=date_format(date_create($row['vehRMADate']),"Y-m-d");
                $vehHypothecation=$row['vehHypothecation'];
                $vehRLW=$row['vehRLW'];
                $vehUW=$row['vehUW'];
                $vehPL=$row['vehPL'];
                $coID=$row['coID'];
                $rcID=$row['rcID'];
                $vehRemarks=$row['vehRemarks'];

                $sql = "INSERT INTO vehicle(vehID,vehVehicleNo,vehChassisNo,vehEngineNo,vehModel,vehMake,vehRegistrationDate,vehRMADate,vehHypothecation,vehRLW,vehUW,vehPL,vehRemarks,coID,rcID) VALUES($vehID,'$vehicleNo','$vehChassisNo','$vehEngineNo','$vehModel','$vehMake','$vehRegistrationDate','$vehRMADate','$vehHypothecation',$vehRLW,$vehUW,$vehPL,'$vehRemarks',$coID,$rcID)";                
                $result = mysqli_query($this->conn, $sql);
    
            }
            

            $sql="delete FROM `nocdetails` WHERE vehID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
        }

        function getTO(){
            $obj = array();
            $n=1;$i=0;
            $sql="SELECT `vehID`, `vehVehicleNo`, `vehChassisNo`, `vehEngineNo`, `vehModel`, `vehMake`, `vehRegistrationDate`, `vehRMADate`, `vehHypothecation`, `vehRLW`, `vehUW`, `vehPL`, `vehRemarks`, `coCompany`,rcID FROM `todetails`,company WHERE todetails.coID=company.coID ORDER BY toID DESC";
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
              
                $id=$row['vehID'];                
                $obj[$i]['vehID']=$n;
                $obj[$i]['vehVehicleNo']=$row['vehVehicleNo'];
                $obj[$i]['vehChassisNo']=$row['vehChassisNo'];
                $obj[$i]['vehEngineNo']=$row['vehEngineNo'];
                $obj[$i]['vehModel']=$row['vehModel'];
                $obj[$i]['vehMake']=$row['vehMake'];
                $obj[$i]['vehRegistrationDate']=($row['vehRegistrationDate']=='0000-00-00' ? '' : date_format(date_create($row['vehRegistrationDate']),"d-m-Y"));
                $obj[$i]['vehRMADate']=($row['vehRMADate']=='0000-00-00' ? '' : date_format(date_create($row['vehRMADate']),"d-m-Y"));
                $obj[$i]['vehHypothecation']=$row['vehHypothecation'];
                $obj[$i]['vehRLW']=$row['vehRLW'];
                $obj[$i]['vehUW']=$row['vehUW'];
                $obj[$i]['vehPL']=$row['vehPL'];
                $obj[$i]['coCompany']=$row['coCompany'];
                $obj[$i]['rcID']=$row['rcID'];
                $obj[$i]['vehRemarks']=$row['vehRemarks'];
                $obj[$i]['action']="<span><a onclick='conformTO(id=$id)'><i class='fa fa-undo pull-left' style='font-size: 20px;'></i></a></span>";
                $n++;$i++;
           
            }      
            echo json_encode($obj); 
        }
         function getNOC(){
            $obj = array();
            $n=1;$i=0;
            $sql="SELECT `vehID`, `vehVehicleNo`, `vehChassisNo`, `vehEngineNo`, `vehModel`, `vehMake`, `vehRegistrationDate`, `vehRMADate`, `vehHypothecation`, `vehRLW`, `vehUW`, `vehPL`, `vehRemarks`, `coCompany`,rcID FROM `nocdetails`,company WHERE nocdetails.coID=company.coID ORDER BY nocID DESC";
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
              
                $id=$row['vehID'];                
                $obj[$i]['vehID']=$n;
                $obj[$i]['vehVehicleNo']=$row['vehVehicleNo'];
                $obj[$i]['vehChassisNo']=$row['vehChassisNo'];
                $obj[$i]['vehEngineNo']=$row['vehEngineNo'];
                $obj[$i]['vehModel']=$row['vehModel'];
                $obj[$i]['vehMake']=$row['vehMake'];
                $obj[$i]['vehRegistrationDate']=date_format(date_create($row['vehRegistrationDate']),"d-m-Y");
                $obj[$i]['vehRMADate']=date_format(date_create($row['vehRMADate']),"d-m-Y");
                $obj[$i]['vehHypothecation']=$row['vehHypothecation'];
                $obj[$i]['vehRLW']=$row['vehRLW'];
                $obj[$i]['vehUW']=$row['vehUW'];
                $obj[$i]['vehPL']=$row['vehPL'];
                $obj[$i]['coCompany']=$row['coCompany'];
                $obj[$i]['rcID']=$row['rcID'];
                $obj[$i]['vehRemarks']=$row['vehRemarks'];
                $obj[$i]['action']="<span><a onclick='conformNOC(id=$id)'><i class='fa fa-undo pull-left' style='font-size: 20px;'></i></a></span>";
                $n++;$i++;           
            }
            echo json_encode($obj); 

        }
      
}
     // $dbClass=new DataClass();
     // echo $dbClass->getTo(1);
$action = isset($_POST['action']) != '' ? $_POST['action'] : '';
   

    switch($action) {
     case 'getRecordsTO':
            $obj = new DataClass();
            $obj->getTO();
            break;
    case 'getRecordsNOC':
            $obj = new DataClass();
             $obj->getNOC();
            break;
    case 'updateTO':
            $obj = new DataClass();
            $obj->UpdateTO();
            break;
    case 'updateNOC':
            $obj = new DataClass();
            $obj->UpdateNOC();
            break;
     
    }
?>
       