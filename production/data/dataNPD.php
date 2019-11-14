

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
            if(isset($postData['permitNo']) && isset($postData['vehicleNo']) && isset($postData['npdFromDate']) 
                && isset($postData['npdToDate']) && isset($postData['draftNo']) && isset($postData['draftDate'])
                && isset($postData['bankName']) && isset($postData['state']) && isset($postData['amount']) ) 
            {
                $permitNo=$postData['permitNo'];
                $vehicleNo=$postData['vehicleNo'];                
                $npdFromDate=date_format(date_create($postData['npdFromDate']),"Y-m-d");                
                $npdToDate=date_format(date_create($postData['npdToDate']),"Y-m-d"); 
                $draftNo=$postData['draftNo'];                
                $draftDate=date_format(date_create($postData['draftDate']),"Y-m-d");   
                $bankName=$postData['bankName'];
                $state=$postData['state']; 
                $amount=$postData['amount']; 
                $vehID="";
                $nphID="";

                

                $sql = "SELECT vehID FROM vehicle WHERE vehVehicleNo='$vehicleNo'";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $vehID=$row['vehID'];
                }

                $sql = "SELECT nphID FROM npheader WHERE nphPermitNo='$permitNo'";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $nphID=$row['nphID'];
                }

                if($vehID!="" && $nphID!="")
                {
                    $status=true;
                    $sql = "SELECT npdFromDate FROM npdetails,vehicle WHERE npdFromDate='$npdFromDate' AND npdToDate='$npdToDate' AND vehID=$vehID AND vehicle.vehID=greentax.vehID";
                    $result = mysqli_query($this->conn, $sql);
                    while ($row=mysqli_fetch_assoc($result)) {
                        $status=false;
                    }

                    if($status)
                    {
                        $status1=true;

                        $sql = "SELECT npdBankDraftNo FROM npdetails,vehicle WHERE vehicle.vehID=npdetails.vehID and npdBankDraftNo='$draftNo'";
                        $result = mysqli_query($this->conn, $sql);
                        while ($row=mysqli_fetch_assoc($result)) {  
                             $status1=false;
                        }
                        if($status1)
                        {
                            $sql = "INSERT INTO npdetails(stID,npdAmount,npdBankDraftNo,npdBankDraftDate,npdBankName,npdFromDate,npdToDate,nphID,vehID,npdRenewed) VALUES($state,$amount,'$draftNo','$draftDate','$bankName','$npdFromDate','$npdToDate',$nphID,$vehID,-1)";
                            $result = mysqli_query($this->conn, $sql);

                            $oldToDate="";
                            $sql1= "SELECT npdToDate FROM reminder WHERE vehID=$vehID";
                            $result1 = mysqli_query($this->conn, $sql1);
                            while ($row1=mysqli_fetch_assoc($result1)) {
                                $oldToDate=$row1['npdToDate'];
                            }

                            if($oldToDate!=""){
                                if(date("Y-m-d",strtotime($npdToDate))>date("Y-m-d",strtotime($oldToDate)))
                                {
                                    $sql1= "UPDATE reminder SET npdToDate='$npdToDate' WHERE vehID=$vehID";
                                    $result1 = mysqli_query($this->conn, $sql1);
                                }
                            }
                            
                           

                            header("Location: ../np.php?tab=2");
                        }else
                        {
                            header("Location: ../np.php?tab=2&errorCode=7");   
                        } 

                    }
                    else
                    {
                        header("Location: ../np.php?tab=2&errorCode=6");   
                    }               
                }
                else if($vehID=="" && $nphID!="")
                {
                    header("Location: ../np.php?tab=2&errorCode=1");
                }
                else if($vehID!="" && $nphID=="")
                {
                    header("Location: ../np.php?tab=2&errorCode=2");
                }
                else if($vehID=="" && $nphID=="")
                {
                    header("Location: ../np.php?tab=2&errorCode=3");
                }
                
                
                die();
            }
             
        }
           function getRecords() {
           $obj = array();
            $n=1;$i=0;
          $sql="SELECT `npdID`, `stID`, `npdAmount`, `npdBankDraftNo`, `npdBankDraftDate`, `npdBankName`, `npdFromDate`, `npdToDate`, `nphID`, vehicle.`vehID`, `npdRenewed`,vehVehicleNo FROM `npdetails`,vehicle WHERE vehicle.vehID=npdetails.vehID ORDER BY npdID DESC";
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
           
                
                
            
            while($row=mysqli_fetch_array($result)){
                 
                $id=$row['npdID'];      
                $obj[$i]['npdID']= $n;          
                $obj[$i]['npdAmount']=$row['npdAmount'];
                $obj[$i]['npdBankDraftNo']=$row['npdBankDraftNo'];
                $obj[$i]['npdBankDraftDate']=date_format(date_create($row['npdBankDraftDate']),"d-m-Y");
                $obj[$i]['npdBankName']=$row['npdBankName'];
                $obj[$i]['npdFromDate']=date_format(date_create($row['npdFromDate']),"d-m-Y");
                $obj[$i]['npdToDate']=date_format(date_create($row['npdToDate']),"d-m-Y");

                $obj[$i]['vehVehicleNo']=$row['vehVehicleNo'];
                           
               if($row['npdRenewed']==0){
                   $obj[$i]['npdRenewed']='Renewed';
                }else{
                    $obj[$i]['npdRenewed']='Not Renewed';   
                }
  
               /* $temp_vehID=$row['vehID'];
                $sql = "SELECT vehVehicleNo FROM vehicle WHERE vehID=$temp_vehID";
                $result1 = mysqli_query($this->conn, $sql);
                while ($row1=mysqli_fetch_assoc($result1)) {
                    $obj[$i]['vehVehicleNo']=$row1['vehVehicleNo'];
                }*/
               // if(mysqli_num_rows($result1)!=0){$obj[$i]['vehVehicleNo']="";}

                $temp_stID=$row['stID'];
                $sql = "SELECT  stState FROM state WHERE stID=$temp_stID";
                $result2 = mysqli_query($this->conn, $sql);
                while ($row2=mysqli_fetch_assoc($result2)) {
                    $obj[$i]['stState']=$row2['stState'];
                }
               // if(mysqli_num_rows($result2)!=0){$obj[$i]['stState']="";}

                $temp_nphID=$row['nphID'];
                $sql = "SELECT  nphPermitNo FROM npheader WHERE nphID=$temp_nphID";
                $result3 = mysqli_query($this->conn, $sql);
                while ($row3=mysqli_fetch_assoc($result3)) {
                    $obj[$i]['nphID']=$row['nphID'];
                     $obj[$i]['nphPermitNo']=$row3['nphPermitNo'];
                }
               // if(mysqli_num_rows($result3)!=0){$obj[$i]['nphPermitNo']="";}




                 $obj[$i]['action']="<span><a onclick='editForm(id=$id)'><i class='fa fa-edit pull-left' style='font-size: 20px;'></i></a><a  onclick='conform(id=$id)'><i class='fa fa-trash pull-right' style='font-size: 20px;'></a></span>";
                $n++;$i++;
           
            }
                  
                  // echo "<pre>"  ;
                  // echo print_r($obj);
         echo json_encode($obj); 
        }
       public function getEditableData() {
            $obj = array();
            $n=0;
            
           $sql="SELECT `npdID`, `stID`, `npdAmount`, `npdBankDraftNo`, `npdBankDraftDate`, `npdBankName`, `npdFromDate`, `npdToDate`, `nphID`, `vehID`, `npdRenewed` FROM `npdetails` where npdID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
               
             
                 $id=$row['npdID'];      
                $obj['npdID']= $n;          
                $obj['npdAmount']=$row['npdAmount'];
                $obj['npdBankDraftNo']=$row['npdBankDraftNo'];
                $obj['npdBankDraftDate']=date_format(date_create($row['npdBankDraftDate']),"d-m-Y");
                $obj['npdBankName']=$row['npdBankName'];
                $obj['npdFromDate']=date_format(date_create($row['npdFromDate']),"d-m-Y");
                $obj['npdToDate']=date_format(date_create($row['npdToDate']),"d-m-Y");
                           
               if($row['npdRenewed']==0){
                   $obj['npdRenewed']='Renewed';
                }else{
                    $obj['npdRenewed']='Not Renewed';   
                }
  
                $temp_vehID=$row['vehID'];
                $sql = "SELECT vehVehicleNo FROM vehicle WHERE vehID=$temp_vehID";
                $result1 = mysqli_query($this->conn, $sql);
                while ($row1=mysqli_fetch_assoc($result1)) {
                    $obj['vehVehicleNo']=$row1['vehVehicleNo'];
                }
               // if(mysqli_num_rows($result1)!=0){$obj[$i]['vehVehicleNo']="";}

                $temp_stID=$row['stID'];
                $sql = "SELECT  stState FROM state WHERE stID=$temp_stID";
                $result2 = mysqli_query($this->conn, $sql);
                while ($row2=mysqli_fetch_assoc($result2)) {
                    $obj['stState']=$row2['stState'];
                }
               // if(mysqli_num_rows($result2)!=0){$obj[$i]['stState']="";}

                $temp_nphID=$row['nphID'];
                $sql = "SELECT  nphPermitNo FROM npheader WHERE nphID=$temp_nphID";
                $result3 = mysqli_query($this->conn, $sql);
                while ($row3=mysqli_fetch_assoc($result3)) {
                   
                     $obj['nphPermitNo']=$row3['nphPermitNo'];
                }
    
            }
            echo json_encode($obj);        
                 
        }
      
        function update() {
           echo $vehicleNo=$_POST['vehVehicleNo'];
             echo $permitNo=$_POST['nphPermitNo'];
               echo $stID=$_POST['state'];
            $sql = "SELECT vehID FROM vehicle WHERE vehVehicleNo='$vehicleNo'";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $vehID=$row['vehID'];
                }

                $sql = "SELECT nphID FROM npheader WHERE nphPermitNo='$permitNo'";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $nphID=$row['nphID'];
                }
                
                if($row['npdRenewed']=='Renewed'){
                   $npdRenewed=0;
                }else{
                    $npdRenewed=-1;   
                }

            
            if($vehID!='' &&   $nphID!=''){
                echo   $sql = "Update npdetails set stID=" .$stID.", npdAmount=" . $_POST["npdAmount"].", npdBankDraftNo='" . $_POST["npdBankDraftNo"]."', npdBankDraftDate='" .date_format(date_create($_POST["npdBankDraftDate"]),"Y-m-d")."'
            , npdBankName='" . $_POST["npdBankName"]."', npdFromDate='" . date_format(date_create($_POST["npdFromDate"]),"Y-m-d")."', npdToDate='" . date_format(date_create($_POST["npdToDate"]),"Y-m-d")."',nphID=" . $nphID .",vehID=" . $vehID .",npdRenewed=".$_POST["npdRenewed"]." WHERE npdID=".$_POST["edit_id"];
              $result = mysqli_query($this->conn, $sql) or die("error to update employee data");

              $npdToDate=date_format(date_create($_POST["npdToDate"]),"Y-m-d");
                  $oldToDate="";
                        $sql1= "SELECT npdToDate FROM reminder WHERE vehID=$vehID";
                        $result1 = mysqli_query($this->conn, $sql1);
                        while ($row1=mysqli_fetch_assoc($result1)) {
                            $oldToDate=$row1['npdToDate'];
                        }

                        if($oldToDate!=""){
                            if(date("Y-m-d",strtotime($npdToDate))>date("Y-m-d",strtotime($oldToDate)))
                            {
                                $sql1= "UPDATE reminder SET npdToDate='$npdToDate' WHERE vehID=$vehID";
                                $result1 = mysqli_query($this->conn, $sql1);
                            }
                        }
                        
                    }
            
              
         header("Location: ../np.php?tab=2");
        }

        function delete() {
              
            $vehID="";
            $sql="SELECT vehID FROM `npdetails` WHERE npdID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql);  
            while( $row = mysqli_fetch_assoc($result) ) { 
            $vehID = $row['vehID'];
            }

            $sql="delete FROM `npdetails` WHERE npdID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");        

            $upDate="0000-00-00";
            $sql="SELECT npdToDate FROM `npdetails` WHERE vehID=$vehID ORDER BY npdToDate DESC";
            $result = mysqli_query($this->conn, $sql);
            while( $row = mysqli_fetch_assoc($result) ) { 
            $upDate = $row['npdToDate'];break;
            } 

            $sql1= "UPDATE reminder SET npdToDate='$upDate' WHERE vehID=$vehID";
            $result1 = mysqli_query($this->conn, $sql1);               



/*


                $sql="delete FROM `npdetails` WHERE npdID=".$_POST['id'];
                $result = mysqli_query($this->conn, $sql) or die("error to update location data");*/
        }


        

        function getRC_COMP_VEH($postData)
        {
            $response=array();
            $response['vehNo']="";
            $response['rcname']="";
            $response['coname']="";

            $vehID="";
            $coID="";
            $rcID="";

            $sql = "SELECT vehID FROM npheader WHERE nphPermitNo='".$postData['ggg']."'";
            //$sql = "SELECT vehID FROM npheader WHERE nphPermitNo='894'";
            $result = mysqli_query($this->conn, $sql);
            while ($row=mysqli_fetch_assoc($result)) {
               $vehID=$row['vehID'];
            }

            if($vehID!="")
            {
                $sql = "SELECT coID,vehVehicleNo,rcID FROM vehicle WHERE vehID=$vehID";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $coID=$row['coID'];
                    $rcID=$row['rcID'];
                    $response['vehNo']=$row['vehVehicleNo'];
                }

                $sql = "SELECT  rcTitle, rcName FROM `rcholder` WHERE rcID=$rcID";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $response['rcname']=$row['rcTitle']." ".$row['rcName'];
                }

                $sql = "SELECT  CONCAT(`coTitle`, ' ' ,`coCompany`) as coname FROM `company` WHERE coID=$coID";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $response['coname']=$row['coname'];
                }
            }
            else
            {
                $response['vehNo']="";$response['rcname']="";$response['coname']="";
            }

            
           

            //if(sizeof($response)<=0){$response['vehNo']="";$response['rcname']="";$response['coname']="";}

            echo json_encode($response);
            
            die();

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
     case 'getRC_COMP_VEH':
            $postData=$_POST;
            $obj->getRC_COMP_VEH($postData);
            break;
     default:
            $obj->getRecords();
    }
?>