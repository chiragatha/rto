

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
            if( isset($postData['taxReceNo']) && isset($postData['taxRecepDate']) &&isset($postData['taxFromDate']) 
                && isset($postData['taxToDate']) && isset($postData['amount']) && isset($postData['penalty'])
                && isset($postData['vehicleNo'])) 
            {

                $taxReceNo=$postData['taxReceNo'];
                $taxRecepDate=date_format(date_create($postData['taxRecepDate']),"Y-m-d");
                $taxFromDate=date_format(date_create($postData['taxFromDate']),"Y-m-d");
                $taxToDate=date_format(date_create($postData['taxToDate']),"Y-m-d");
                $amount=$postData['amount'];
                $penalty=$postData['penalty'];
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
                   echo $sql = "SELECT taxFromDate FROM tax,vehicle WHERE taxFromDate='$taxFromDate' AND taxToDate='$taxToDate' AND tax.vehID=$vehID AND vehicle.vehID=tax.vehID";
                    
                    $result = mysqli_query($this->conn, $sql);
                    while ($row=mysqli_fetch_assoc($result)) {
                        $status=false;
                    }
                    if($status)
                    {
                        $status1=true;

                        $sql = "SELECT taxReceiptNo FROM tax,vehicle WHERE vehicle.vehID=tax.vehID and taxReceiptNo='$taxReceNo'";
                        $result = mysqli_query($this->conn, $sql);
                        while ($row=mysqli_fetch_assoc($result)) {  
                             $status1=false;
                        }
                        if($status1)
                        {
                            $sql = "INSERT INTO tax(taxReceiptNo,taxReceiptDate,taxAmount,taxFromDate,taxToDate,taxPenalty,vehID,taxRenewed) VALUES('$taxReceNo','$taxRecepDate',$amount,'$taxFromDate','$taxToDate','$penalty',$vehID,-1)";
                            $result = mysqli_query($this->conn, $sql);

                            $oldToDate="";
                            $sql1= "SELECT taxToDate FROM reminder WHERE vehID=$vehID";
                            $result1 = mysqli_query($this->conn, $sql1);
                            while ($row1=mysqli_fetch_assoc($result1)) {
                                $oldToDate=$row1['taxToDate'];
                            }

                            if($oldToDate!=""){
                                if(date("Y-m-d",strtotime($taxToDate))>date("Y-m-d",strtotime($oldToDate)))
                                {
                                    $sql1= "UPDATE reminder SET taxToDate='$taxToDate' WHERE vehID=$vehID";
                                    $result1 = mysqli_query($this->conn, $sql1);

                                }
                            }
                            
                           header("Location: ../tax.php"); 
                       }else
                        {
                            //echo "_e2_";
                            header("Location: ../tax.php?errorCode=3");   
                        }   
                    }
                    else
                    {
                        //echo "_e2_";
                        header("Location: ../tax.php?errorCode=2");   
                    }             
                }
                else
                {
                    header("Location: ../tax.php?errorCode=1");
                }
                die();
            }
             
        }
           function getRecords() {
            $obj = array();
            $n=1;$i=0;
            $sql="SELECT taxID, taxReceiptNo, taxReceiptDate,taxAmount, taxFromDate,taxToDate, taxPenalty,vehVehicleNo , taxRenewed FROM tax,vehicle WHERE vehicle.vehID=tax.vehID ORDER BY taxID DESC";
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
                 
                $id=$row['taxID'];
                
                $obj[$i]['taxID']=$n;
                $obj[$i]['taxReceiptNo']=$row['taxReceiptNo'];
                $obj[$i]['taxReceiptDate']=date_format(date_create($row['taxReceiptDate']),"d-m-Y");
                $obj[$i]['taxAmount']=$row['taxAmount'];
                $obj[$i]['taxFromDate']=date_format(date_create($row['taxFromDate']),"d-m-Y");
                $obj[$i]['taxToDate']=date_format(date_create($row['taxToDate']),"d-m-Y");
                $obj[$i]['taxPenalty']=$row['taxPenalty'];
                $obj[$i]['total']=($row['taxAmount']+$row['taxPenalty']);
                $obj[$i]['vehVehicleNo']=$row['vehVehicleNo'];
               if($row['taxRenewed']==0){
                   $obj[$i]['taxRenewed']='Renewed';
                }else{
                    $obj[$i]['taxRenewed']='Not Renewed';   
                }
                  $obj[$i]['action']="<span><a onclick='editForm(id=$id)'><i class='fa fa-edit pull-left' style='font-size: 20px;'></i></a><a  onclick='conform(id=$id)'><i class='fa fa-trash pull-right' style='font-size: 20px;'></a></span>";
                $n++;$i++;
           
            }
                    
         echo json_encode($obj); 
        }
        public function getEditableData() {
            $obj = array();
            $n=0;
           $sql="SELECT taxID, taxReceiptNo, taxReceiptDate,taxAmount, taxFromDate,taxToDate, taxPenalty,vehVehicleNo , taxRenewed FROM tax,vehicle WHERE vehicle.vehID=tax.vehID  and taxID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            while($row=mysqli_fetch_array($result)){
               
               $obj['taxID']=$n;
                $obj['taxReceiptNo']=$row['taxReceiptNo'];
                $obj['taxReceiptDate']=date_format(date_create($row['taxReceiptDate']),"d-m-Y");
                $obj['taxAmount']=$row['taxAmount'];
                $obj['taxFromDate']=date_format(date_create($row['taxFromDate']),"d-m-Y");
                $obj['taxToDate']=date_format(date_create($row['taxToDate']),"d-m-Y");
                $obj['taxPenalty']=$row['taxPenalty'];
                $obj['vehVehicleNo']=$row['vehVehicleNo'];
               if($row['taxRenewed']==0){
                   $obj['taxRenewed']='Renewed';
                }else{
                    $obj['taxRenewed']='Not Renewed';   
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
                  $sql = "Update tax set taxReceiptNo='" . $_POST["taxReceiptNo"]."', taxReceiptDate='" . date_format(date_create($_POST['taxReceiptDate']),"Y-m-d")."', taxAmount='" . $_POST["taxAmount"]."', taxFromDate='" . date_format(date_create($_POST['taxFromDate']),"Y-m-d")."'
            , taxToDate='" . date_format(date_create($_POST['taxToDate']),"Y-m-d")."', taxPenalty='" . $_POST["taxPenalty"]."',vehID=" . $vehID .",taxRenewed=".$_POST["taxRenewed"]." WHERE taxID=".$_POST["edit_id"];
                 $result = mysqli_query($this->conn, $sql) or die("error to update employee data");

                 


                    $oldToDate="";
                   echo $taxToDate=date_format(date_create($_POST['taxToDate']),"Y-m-d");
                        $sql1= "SELECT taxToDate FROM reminder WHERE vehID=$vehID";
                        $result1 = mysqli_query($this->conn, $sql1);
                        while ($row1=mysqli_fetch_assoc($result1)) {
                            $oldToDate=$row1['taxToDate'];
                        }

                        if($oldToDate!=""){
                            if(date("Y-m-d",strtotime($taxToDate))>date("Y-m-d",strtotime($oldToDate)))
                            {
                            echo    $sql1= "UPDATE reminder SET taxToDate='$taxToDate' WHERE vehID=$vehID";
                                $result1 = mysqli_query($this->conn, $sql1);

                            }
                        }
                    
                    }
            
              
            header("Location: ../tax.php");
        }

        function delete() {

            $vehID="";
            $sql="SELECT vehID FROM `tax` WHERE taxID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql);  
            while( $row = mysqli_fetch_assoc($result) ) { 
            $vehID = $row['vehID'];
            }

            $sql="delete FROM `tax` WHERE taxID=".$_POST['id'];
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");          

            $upDate="0000-00-00";
            $sql="SELECT taxToDate FROM `tax` WHERE vehID=$vehID ORDER BY taxToDate DESC";
            $result = mysqli_query($this->conn, $sql);
            while( $row = mysqli_fetch_assoc($result) ) { 
            $upDate = $row['taxToDate'];break;
            } 

            $sql1= "UPDATE reminder SET taxToDate='$upDate' WHERE vehID=$vehID";
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
    