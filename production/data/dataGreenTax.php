

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
            if(isset($postData['receiptNo']) && isset($postData['receiptDate'])  &&
                isset($postData['gFromDate']) && isset($postData['gToDate']) && isset($postData['vehicleNo'])
                && isset($postData['amount']) && isset($postData['penalty'])) 
            {
            

                $receiptNo=$postData['receiptNo'];
                $vehicleNo=$postData['vehicleNo'];
                $receiptDate=date_format(date_create($postData['receiptDate']),"Y-m-d");
                $gFromDate=date_format(date_create($postData['gFromDate']),"Y-m-d");
                $gToDate=date_format(date_create($postData['gToDate']),"Y-m-d");
                $amount=$postData['amount'];
                $penalty=$postData['penalty'];
                $vehID="";
                $vehRegDate="";

                $sql = "SELECT vehID,vehRegistrationDate FROM vehicle WHERE vehVehicleNo='$vehicleNo'";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $vehID=$row['vehID'];
                    $vehRegDate=date_create($row['vehRegistrationDate']); 
                    echo  $row['vehRegistrationDate'];
                }

                $date1=date_create(date('Y-m-d'));
                $diff=date_diff($date1,$vehRegDate);  

                echo $dYear=$diff->y;
                echo $dMonth=$diff->m;
                echo $dDay=$diff->d;

                $dateStatus=false;
                if($dYear>8){$dateStatus=true;}
                else if($dYear==8)
                {
                    if($dMonth>0){$dateStatus=true;}
                    else if($dMonth==0){if($dDay>0){$dateStatus=true;}}
                }

                if($dateStatus)
                    echo "Yes";
                else
                    echo "no";

                if($vehID!="")
                {
                    if($dateStatus)
                    {
                        $status=true;
                        //$sql = "SELECT fromDate FROM greentax WHERE fromDate='$gFromDate' AND toDate='$gToDate'";
                        $sql = "SELECT fromDate FROM greentax,vehicle WHERE fromDate='$gFromDate' AND toDate='$gToDate' AND greentax.vehID=$vehID AND vehicle.vehID=greentax.vehID";
                        $result = mysqli_query($this->conn, $sql);
                        while ($row=mysqli_fetch_assoc($result)) {
                            $status=false;
                        }

                        if($status)
                        {
                            $status1=true;
                            $sql = "SELECT receiptNo FROM greentax,vehicle WHERE vehicle.vehID=greentax.vehID and receiptNo='$receiptNo' ";
                            $result = mysqli_query($this->conn, $sql);
                            while ($row=mysqli_fetch_assoc($result)) {  
                                 $status1=false;
                            }
                            if($status1)
                            {
                                $sql = "INSERT INTO greentax(receiptNo,vehID,receiptDate,fromDate,toDate,amount,penalty,gRenewed) VALUES('$receiptNo',$vehID,'$receiptDate','$gFromDate','$gToDate',$amount,'$penalty',-1)";
                                $result = mysqli_query($this->conn, $sql);

                                $oldToDate="";
                                $sql1= "SELECT gToDate FROM reminder WHERE vehID=$vehID";
                                $result1 = mysqli_query($this->conn, $sql1);
                                while ($row1=mysqli_fetch_assoc($result1)) {
                                    $oldToDate=$row1['gToDate'];
                                }

                                if($oldToDate!=""){
                                    if(date("Y-m-d",strtotime($gToDate))>date("Y-m-d",strtotime($oldToDate)))
                                    {
                                        $sql1= "UPDATE reminder SET gToDate='$gToDate' WHERE vehID=$vehID";
                                        $result1 = mysqli_query($this->conn, $sql1); 
                                    }
                                }

                               header("Location: ../greenTax.php");
                            }else
                            {
                                //echo "_e2_";
                                header("Location: ../greenTax.php?errorCode=4");   
                            }
                        }
                        else
                        {
                            //echo "_e2_";
                            header("Location: ../greenTax.php?errorCode=3");   
                        }
                    }
                    else
                    {
                        header("Location: ../greenTax.php?errorCode=2");
                    }
                             
                }
                else
                {
                    header("Location: ../greenTax.php?errorCode=1");
                }
                
                die();
            }
             
        }
 function getRecords() {
           $obj = array();
            $n=1;$i=0;
          $sql="SELECT `gID`, `receiptNo`, vehVehicleNo, `receiptDate`, `fromDate`, `toDate`, `amount`, `penalty`, `gRenewed` FROM `greentax`,vehicle where vehicle.vehID=greentax.vehID  ORDER BY gID DESC";
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
           
                
                
            
            while($row=mysqli_fetch_array($result)){
                 
                $id=$row['gID'];      
                $obj[$i]['gID']= $n;          
                $obj[$i]['receiptNo']=$row['receiptNo'];
                $obj[$i]['vehVehicleNo']=$row['vehVehicleNo'];
                $obj[$i]['receiptDate']=date_format(date_create($row['receiptDate']),"d-m-Y");
                $obj[$i]['fromDate']=date_format(date_create($row['fromDate']),"d-m-Y");
                $obj[$i]['toDate']=date_format(date_create($row['toDate']),"d-m-Y");
                 $obj[$i]['amount']=$row['amount'];
                  $obj[$i]['penalty']=$row['penalty'];
                $obj[$i]['total']=($row['amount']+$row['penalty']);

                           
               if($row['gRenewed']==0){
                   $obj[$i]['gRenewed']='Renewed';
                }else{
                    $obj[$i]['gRenewed']='Not Renewed';   
                }
  
               




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
            
           $sql="SELECT `gID`, `receiptNo`, vehVehicleNo, `receiptDate`, `fromDate`, `toDate`, `amount`, `penalty`, `gRenewed` FROM `greentax`,vehicle where vehicle.vehID=greentax.vehID and gID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
               
             
                $id=$row['gID'];      
                $obj['gID']= $id;          
                $obj['receiptNo']=$row['receiptNo'];
                $obj['vehVehicleNo']=$row['vehVehicleNo'];
                $obj['receiptDate']=date_format(date_create($row['receiptDate']),"d-m-Y");
                $obj['fromDate']=date_format(date_create($row['fromDate']),"d-m-Y");
                $obj['toDate']=date_format(date_create($row['toDate']),"d-m-Y");
                 $obj['amount']=$row['amount'];
                  $obj['penalty']=$row['penalty'];

                           
               if($row['gRenewed']==0){
                   $obj['gRenewed']='Renewed';
                }else{
                    $obj['gRenewed']='Not Renewed';   
                }
    
            }
            echo json_encode($obj);        
                 
        }
      
        function update() {
           
       $vehicleNo=$_POST['vehVehicleNo'];
            
            $sql = "SELECT vehID FROM vehicle WHERE vehVehicleNo='$vehicleNo'";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $vehID=$row['vehID'];
                }

              
                if($row['gRenewed']=='Renewed'){
                   $gRenewed=0;
                }else{
                    $gRenewed=-1;   
                }

            
            if($vehID!=''){
               $sql = "Update greentax set receiptNo='" .$_POST['receiptNo']."', receiptDate='" . date_format(date_create($_POST["receiptDate"]),"Y-m-d")."', fromDate='" . date_format(date_create($_POST["fromDate"]),"Y-m-d")."', toDate='" . date_format(date_create($_POST["toDate"]),"Y-m-d")."'
            , amount='" . $_POST["amount"]."', penalty='" . $_POST["penalty"]."',vehID=" . $vehID .",gRenewed=".$_POST["gRenewed"]." WHERE gID=".$_POST["edit_id"];
              $result = mysqli_query($this->conn, $sql) or die("error to update employee data");

              $toDate=date_format(date_create($_POST["toDate"]),"Y-m-d");
                 $oldToDate="";
                            $sql1= "SELECT gToDate FROM reminder WHERE vehID=$vehID";
                            $result1 = mysqli_query($this->conn, $sql1);
                            while ($row1=mysqli_fetch_assoc($result1)) {
                                $oldToDate=$row1['gToDate'];
                            }

                            if($oldToDate!=""){
                                if(date("Y-m-d",strtotime($toDate))>date("Y-m-d",strtotime($oldToDate)))
                                {
                                    $sql1= "UPDATE reminder SET gToDate='$toDate' WHERE vehID=$vehID";
                                    $result1 = mysqli_query($this->conn, $sql1); 
                                }
                            }

                    }
            
              
        header("Location: ../greenTax.php");
        }

        function delete() {
              
            $vehID="";
            $sql="SELECT vehID FROM `greentax` WHERE gID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql);  
            while( $row = mysqli_fetch_assoc($result) ) { 
            $vehID = $row['vehID'];
            }

            $sql="delete FROM `greentax` WHERE gID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");         

            $upDate="0000-00-00";
            $sql="SELECT toDate FROM `greentax` WHERE vehID=$vehID ORDER BY toDate DESC";
            $result = mysqli_query($this->conn, $sql);
            while( $row = mysqli_fetch_assoc($result) ) { 
            $upDate = $row['toDate'];break;
            } 

            $sql1= "UPDATE reminder SET gToDate='$upDate' WHERE vehID=$vehID";
            $result1 = mysqli_query($this->conn, $sql1);              
        }

        function getRCHolderName($postData)
        {

                $vehicleNo=$postData['vehicleNo'];
                $rcID="";

                $sql = "SELECT rcID FROM vehicle WHERE vehVehicleNo='$vehicleNo'";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                    $rcID=$row['rcID'];
                }

                $response=array();
                $response['name']="";
                if($rcID!="")
                {
                    $response=array();
                    $sql = "SELECT  rcTitle, rcName FROM `rcholder` WHERE rcID=$rcID";
                    $result = mysqli_query($this->conn, $sql);

                    while ($row=mysqli_fetch_assoc($result)) {
                        $response['name']=$row['rcTitle']." ".$row['rcName'];
                    }

                    

                    /*echo "<br><pre>";
                    print_r($response);*/
                }

                if(sizeof($response)<=0){$response['name']="";}

                echo json_encode($response);
                
                die();

        }

        function getCompanyName($postData)
        {

                $vehicleNo=$postData['vehicleNo'];
                $coID="";

                 $sql = "SELECT coID FROM vehicle WHERE vehVehicleNo='$vehicleNo'";
                $result = mysqli_query($this->conn, $sql);
                while ($row=mysqli_fetch_assoc($result)) {
                   $coID=$row['coID'];
                }

                $response=array();
                $response['name']="";
                if($coID!="")
                {
                    $response=array();
                    $sql = "SELECT  `coTitle`, `coCompany` FROM `company` WHERE coID=$coID";
                    $result = mysqli_query($this->conn, $sql);

                    while ($row=mysqli_fetch_assoc($result)) {
                        $response['name']=$row['coTitle']." ".$row['coCompany'];
                    }

                    

                    /*echo "<br><pre>";
                    print_r($response);*/
                }

                if(sizeof($response)<=0){$response['name']="";}

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
    case 'getRC' :
            $postData=$_POST;
            $obj->getRCHolderName($postData);
            break;
    case 'getComName' :
            $postData=$_POST;
            $obj->getCompanyName($postData);
            break;
     default:
            $obj->getRecords();
    }
?>