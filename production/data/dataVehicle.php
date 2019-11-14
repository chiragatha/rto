

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
            
            if(isset($postData['vehicleNo']) && isset($postData['chassisNo']) && isset($postData['engineNo']) && 
                isset($postData['model']) && isset($postData['make']) && isset($postData['hypothecation']) && 
                isset($postData['registrationDate']) &&  isset($postData['rlw']) && 
                isset($postData['uw']) && isset($postData['pl']) && isset($postData['remarks']) &&
                isset($postData['insCompany']) && isset($postData['rcname'])) 
            {
                $vehicleNo=$postData['vehicleNo'];
                $chassisNo=$postData['chassisNo'];                
                $engineNo=$postData['engineNo'];                
                $model=$postData['model'];
                $make=$postData['make'];
                $hypothecation=$postData['hypothecation']; 
                $rcname=$postData['rcname'];                
                $registrationDate=date_format(date_create($postData['registrationDate']),"Y-m-d");    
                if(isset($postData['rmaCheck'])){
                    
                     $rmaDate=date_format(date_create($postData['rmaDate']),"Y-m-d");
                    
                }else{
                    
                      $rmaDate="00-00-0000"; 
                }
                
              
                $rlw=$postData['rlw'];
                $uw=$postData['uw'];                
                $pl=$postData['pl'];                
                $remarks=$postData['remarks'];
                $insCompany=$postData['insCompany'];

                $vehID="";
                $sql = "SELECT vehID FROM vehicle WHERE vehVehicleNo='$vehicleNo'";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $vehID=$row['vehID'];
                }

                $chassisVehID="";
                $sql = "SELECT vehVehicleNo FROM vehicle WHERE vehChassisNo='$chassisNo'";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $chassisVehID=$row['vehVehicleNo'];
                }

                $engineVehID="";
                $sql = "SELECT vehVehicleNo FROM vehicle WHERE vehEngineNo='$engineNo'";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $engineVehID=$row['vehVehicleNo'];
                }

                $rcID="";
                $sql = "SELECT rcID FROM rcholder WHERE CONCAT(rcTitle, ' ', rcName)='$rcname'";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $rcID=$row['rcID'];
                }
                if($rcID!="")
                {
                    if($chassisNo!=$engineNo)
                    {
                        if($engineVehID=="")
                        {
                            if($vehID=="" && $chassisVehID=="")
                            {
                                echo $sql = "INSERT INTO vehicle(vehVehicleNo,vehChassisNo,vehEngineNo,vehModel,vehMake,vehRegistrationDate,vehRMADate,vehHypothecation,vehRLW,vehUW,vehPL,vehRemarks,coID,rcID) VALUES('$vehicleNo','$chassisNo','$engineNo','$model','$make','$registrationDate','$rmaDate','$hypothecation',$rlw,$uw,$pl,'$remarks',$insCompany,$rcID)";
                               $result = mysqli_query($this->conn, $sql);

                               try
                               {mkdir("../../SCANNED/".$vehicleNo);}
                               catch(Exception $e){};

                               $vehID1="";
                                $sql1 = "SELECT vehID FROM vehicle WHERE vehVehicleNo='$vehicleNo'";
                                $result1 = mysqli_query($this->conn, $sql1);
                                while ($row=mysqli_fetch_assoc($result1)) {
                                    $vehID1=$row['vehID'];
                                }


                                $sql = "INSERT INTO `reminder`(`vehID`) VALUES ($vehID1)";
                                $result = mysqli_query($this->conn, $sql);

                               header("Location: ../vehicle.php");            
                            }
                            else if($vehID=="" && $chassisVehID!="")
                            {
                                header("Location: ../vehicle.php?errorCode=1&vehicleNo=$chassisVehID&chassisNo=$chassisNo");
                            }
                            else if($vehID!="" && $chassisVehID=="")
                            {
                                header("Location: ../vehicle.php?errorCode=2");
                            }
                            else if($vehID!="" && $chassisVehID!="")
                            {
                                header("Location: ../vehicle.php?errorCode=3&vehicleNo=$chassisVehID&chassisNo=$chassisNo");
                            }
                        }
                        else
                        {
                            header("Location: ../vehicle.php?errorCode=5&vehicleNo=$engineVehID");
                        }
                        
                    }
                    else
                    {
                        header("Location: ../vehicle.php?errorCode=4");
                    }
                }
                else
                {
                    header("Location: ../vehicle.php?errorCode=6");
                }

                

                

                
                die();
            }
             
        }
        function getRecords() {
            $obj = array();
            $n=1;$i=0;
            $sql="SELECT `vehID`, `vehVehicleNo`, `vehChassisNo`, `vehEngineNo`, `vehModel`, `vehMake`, `vehRegistrationDate`, `vehRMADate`, `vehHypothecation`, `vehRLW`, `vehUW`, `vehPL`, `vehRemarks`,CONCAT(coTitle, ' ', coCompany) as coCompany,CONCAT(rcTitle, ' ', rcName) as 'full_name' FROM `vehicle`,company,rcholder WHERE vehicle.coID=company.coID AND  vehicle.rcID=rcholder.rcID ORDER BY `vehID` DESC";
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
              
                $id=$row['vehID'];                
                $obj[$i]['vehID']=$n;
                $obj[$i]['vehVehicleNo']=$row['vehVehicleNo'];
                $obj[$i]['vehRCname']=$row['full_name'];
                $obj[$i]['vehChassisNo']=$row['vehChassisNo'];
                $obj[$i]['vehEngineNo']=$row['vehEngineNo'];
                $obj[$i]['vehModel']=$row['vehModel'];
                $obj[$i]['vehMake']=$row['vehMake'];
                $obj[$i]['vehRegistrationDate']=date_format(date_create($row['vehRegistrationDate']),"d-m-Y");
                $obj[$i]['vehRMADate']= ($row['vehRMADate']=='0000-00-00' ? '' : date_format(date_create($row['vehRMADate']),"d-m-Y"));
                $obj[$i]['vehHypothecation']=$row['vehHypothecation'];
                $obj[$i]['vehRLW']=$row['vehRLW'];
                $obj[$i]['vehUW']=$row['vehUW'];
                $obj[$i]['vehPL']=$row['vehPL'];
                $obj[$i]['coCompany']=$row['coCompany'];
                $obj[$i]['vehRemarks']=$row['vehRemarks'];
                 $obj[$i]['action']="<span><a onclick='editForm(id=$id)'><i class='fa fa-edit pull-left' style='font-size: 20px;'></i></a><a  onclick='conform(id=$id)'><i class='fa fa-trash pull-right' style='font-size: 20px;'></a></span>";
                $n++;$i++;
           
            }
                    
         echo json_encode($obj); 
        }
        public function getEditableData() {/*
            $obj = array();
            $n=0;
           $sql="SELECT `vehID`, `vehVehicleNo`, `vehChassisNo`, `vehEngineNo`, `vehModel`, `vehMake`, `vehRegistrationDate`, `vehRMADate`, `vehHypothecation`, `vehRLW`, `vehUW`, `vehPL`, `vehRemarks`, `coCompany` FROM `vehicle`,company WHERE vehicle.coID=company.coID and vehID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
                $obj['vehID']=$n;
                $obj['vehVehicleNo']=$row['vehVehicleNo'];
                $obj['vehChassisNo']=$row['vehChassisNo'];
                $obj['vehEngineNo']=$row['vehEngineNo'];
                $obj['vehModel']=$row['vehModel'];
                $obj['vehMake']=$row['vehMake'];
                $obj['vehRegistrationDate']=date_format(date_create($row['vehRegistrationDate']),"d-m-Y");
                $obj['vehRMADate']=date_format(date_create($row['vehRMADate']),"d-m-Y");
                $obj['vehHypothecation']=$row['vehHypothecation'];
                $obj['vehRLW']=$row['vehRLW'];
                $obj['vehUW']=$row['vehUW'];
                $obj['vehPL']=$row['vehPL'];
                $obj['coCompany']=$row['coCompany'];
                $obj['vehRemarks']=$row['vehRemarks'];
    
            }
            echo json_encode($obj);        */


            $obj = array();
            $n=0;
           $sql="SELECT `vehID`, `vehVehicleNo`, `vehChassisNo`, `vehEngineNo`, `vehModel`, `vehMake`, `vehRegistrationDate`, `vehRMADate`, `vehHypothecation`, `vehRLW`, `vehUW`, `vehPL`, `vehRemarks`, `coID`,CONCAT(rcTitle, ' ', rcName) as 'full_name',rcholder.rcID FROM `vehicle`,rcholder WHERE vehicle.rcID=rcholder.rcID AND vehID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
                $obj['vehID']=$n;
                $obj['vehVehicleNo']=$row['vehVehicleNo'];
                $obj['vehRCname']=$row['full_name'];
                $obj['rcID']=$row['rcID'];
                $obj['vehChassisNo']=$row['vehChassisNo'];
                $obj['vehEngineNo']=$row['vehEngineNo'];
                $obj['vehModel']=$row['vehModel'];
                $obj['vehMake']=$row['vehMake'];
                $obj['vehRegistrationDate']=date_format(date_create($row['vehRegistrationDate']),"d-m-Y");
                $obj['vehRMADate']=($row['vehRMADate']=='0000-00-00' ? '' : date_format(date_create($row['vehRMADate']),"d-m-Y"));
                $obj['vehHypothecation']=$row['vehHypothecation'];
                $obj['vehRLW']=$row['vehRLW'];
                $obj['vehUW']=$row['vehUW'];
                $obj['vehPL']=$row['vehPL'];
                $obj['coID']=$row['coID'];
                $obj['vehRemarks']=$row['vehRemarks'];
    
            }
            echo json_encode($obj);        
                 
        }
      
        function update() {
           /*$sql1="SELECT `coID`FROM `company` WHERE `coCompany`='" . $_POST["coCompany"]."'";
            $queryRecords1 = mysqli_query($this->conn, $sql1) or die("error to fetch data");
            while( $row = mysqli_fetch_assoc($queryRecords1) ) { 
                $coID = $row['coID'];
            } 
            if($coID!=''){*/

           

             if(isset($_POST['rmaCheck'])){
                
                    $rmaDate=date_format(date_create($_POST['vehRMADate']),"Y-m-d");
                    
                }else{
                
                     $rmaDate="00-00-0000"; 
                }


                echo $sql = "Update `vehicle` set vehVehicleNo='" . $_POST["vehVehicleNo"]."', vehChassisNo='" . $_POST["vehChassisNo"]."', vehEngineNo='" . $_POST["vehEngineNo"]."', vehModel='" . $_POST["vehModel"]."', vehMake='" . $_POST["vehMake"] ."', vehRegistrationDate='" . date_format(date_create($_POST["vehRegistrationDate"]),"Y-m-d") . "', vehRMADate='" . $rmaDate . "', vehHypothecation='" . $_POST["vehHypothecation"] .  "', vehRLW='" . $_POST["vehRLW"] .  "', vehUW='" . $_POST["vehUW"] .  "', vehRemarks='" . $_POST["vehRemarks"] .  "', coID=" . $_POST["coCompany"] .", rcID=" . $_POST["vehRCholder"] ." WHERE vehID='".$_POST["edit_id"]."'";
                    $result = mysqli_query($this->conn, $sql) or die("error to update  data");
     
            //}
            
           header("Location: ../vehicle.php");
        }

        function delete() {
              
                $obj = array();
                $n=0;
                $sql="delete FROM `vehicle` WHERE vehID=".$_POST['id'];
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
    