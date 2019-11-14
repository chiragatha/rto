
<?php
	include_once("connection.php");	
	
	class DataClass 
    {
        protected $conn;
        function __construct() {
            $db = new dbObj();
            $this->conn = $db->getConnection();
        }

        function __destruct() {
            $this->conn->close();
        }

        
        
        function getTodaysRecords() {
            $today=date("Y-m-d");
            $sql="SELECT `vehVehicleNo`,rcTitle,rcName, `taxToDate`, `insuToDate`, `pasToDate`, `perToDate`, `npdToDate`, `gToDate` FROM reminder,vehicle,rcholder WHERE reminder.vehID=vehicle.vehID AND rcholder.rcID=rcholder.rcID AND (taxToDate='$today' OR insuToDate='$today' OR pasToDate='$today' OR perToDate='$today' OR npdToDate='$today' OR gToDate='$today')";
            $result = mysqli_query($this->conn,$sql);
            $data1=array();
            $i=0;
            while ($row = mysqli_fetch_array($result)) {
                if($row['taxToDate']==$today)
                {
                    $data1[$i]['srNo']=$i+1;
                    $data1[$i]['vehicleNo']=$row['vehVehicleNo'];
                    $data1[$i]['type']="Tax";
                    $data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
                    $data1[$i]['toDate']=$row['taxToDate'];
                    $i++;
                }
                
                if($row['insuToDate']==$today)
                {
                    $data1[$i]['srNo']=$i+1;
                    $data1[$i]['vehicleNo']=$row['vehVehicleNo'];
                    $data1[$i]['type']="Insurance";
                    $data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
                    $data1[$i]['toDate']=$row['insuToDate'];
                    $i++;
                }
                if($row['pasToDate']==$today)
                {
                    $data1[$i]['srNo']=$i+1;
                    $data1[$i]['vehicleNo']=$row['vehVehicleNo'];
                    $data1[$i]['type']="Passing";
                    $data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
                    $data1[$i]['toDate']=$row['pasToDate'];
                    $i++;
                }

                if($row['perToDate']==$today)
                {
                    $data1[$i]['srNo']=$i+1;
                    $data1[$i]['vehicleNo']=$row['vehVehicleNo'];
                    $data1[$i]['type']="Permit";
                    $data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
                    $data1[$i]['toDate']=$row['perToDate'];
                    $i++;
                }
                
                if($row['npdToDate']==$today)
                {
                    $data1[$i]['srNo']=$i+1;
                    $data1[$i]['vehicleNo']=$row['vehVehicleNo'];
                    $data1[$i]['type']="Natioal Permit";
                    $data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
                    $data1[$i]['toDate']=$row['npdToDate'];
                    $i++;
                }
                if($row['gToDate']==$today)
                {
                    $data1[$i]['srNo']=$i+1;
                    $data1[$i]['vehicleNo']=$row['vehVehicleNo'];
                    $data1[$i]['type']="Green Tax";
                    $data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
                    $data1[$i]['toDate']=$row['gToDate'];
                    $i++;
                }
            }

            


            /*echo "<pre>";
            print_r($data1);*/



            echo json_encode($data1);

        }

        function getOldRecords() {
            $today=date("Y-m-d");
            $sql="SELECT `vehVehicleNo`,rcTitle,rcName, `taxToDate`, `insuToDate`, `pasToDate`, `perToDate`, `npdToDate`, `gToDate` FROM reminder,vehicle,rcholder WHERE reminder.vehID=vehicle.vehID AND rcholder.rcID=rcholder.rcID AND (taxToDate<'$today' OR insuToDate<'$today' OR pasToDate<'$today' OR perToDate<'$today' OR npdToDate<'$today' OR gToDate<'$today')";
            $result = mysqli_query($this->conn,$sql);
            $data1=array();
            $i=0;
            while ($row = mysqli_fetch_array($result)) {
                if($row['taxToDate']<$today)
                {
                    $data1[$i]['srNo']=$i+1;
                    $data1[$i]['vehicleNo']=$row['vehVehicleNo'];
                    $data1[$i]['type']="Tax";
                    $data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
                    $data1[$i]['toDate']=$row['taxToDate'];
                    $i++;
                }
                
                if($row['insuToDate']<$today)
                {
                    $data1[$i]['srNo']=$i+1;
                    $data1[$i]['vehicleNo']=$row['vehVehicleNo'];
                    $data1[$i]['type']="Insurance";
                    $data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
                    $data1[$i]['toDate']=$row['insuToDate'];
                    $i++;
                }
                if($row['pasToDate']<$today)
                {
                    $data1[$i]['srNo']=$i+1;
                    $data1[$i]['vehicleNo']=$row['vehVehicleNo'];
                    $data1[$i]['type']="Passing";
                    $data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
                    $data1[$i]['toDate']=$row['pasToDate'];
                    $i++;
                }

                if($row['perToDate']<$today)
                {
                    $data1[$i]['srNo']=$i+1;
                    $data1[$i]['vehicleNo']=$row['vehVehicleNo'];
                    $data1[$i]['type']="Permit";
                    $data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
                    $data1[$i]['toDate']=$row['perToDate'];
                    $i++;
                }
                
                if($row['npdToDate']<$today)
                {
                    $data1[$i]['srNo']=$i+1;
                    $data1[$i]['vehicleNo']=$row['vehVehicleNo'];
                    $data1[$i]['type']="Natioal Permit";
                    $data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
                    $data1[$i]['toDate']=$row['npdToDate'];
                    $i++;
                }
                if($row['gToDate']<$today)
                {
                    $data1[$i]['srNo']=$i+1;
                    $data1[$i]['vehicleNo']=$row['vehVehicleNo'];
                    $data1[$i]['type']="Green Tax";
                    $data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
                    $data1[$i]['toDate']=$row['gToDate'];
                    $i++;
                }
            }


            /*echo "<pre>";
            print_r($sorted);*/

            echo json_encode($data1);

        }

        function getNewRecords() {
            $today=date("Y-m-d");
            $sql="SELECT `vehVehicleNo`,rcTitle,rcName, `taxToDate`, `insuToDate`, `pasToDate`, `perToDate`, `npdToDate`, `gToDate` FROM reminder,vehicle,rcholder WHERE reminder.vehID=vehicle.vehID AND rcholder.rcID=rcholder.rcID AND (taxToDate>'$today' OR insuToDate>'$today' OR pasToDate>'$today' OR perToDate>'$today' OR npdToDate>'$today' OR gToDate>'$today')";
            $result = mysqli_query($this->conn,$sql);
            $data1=array();
            $i=0;
            while ($row = mysqli_fetch_array($result)) {
                if($row['taxToDate']>$today)
                {
                    $data1[$i]['srNo']=$i+1;
                    $data1[$i]['vehicleNo']=$row['vehVehicleNo'];
                    $data1[$i]['type']="Tax";
                    $data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
                    $data1[$i]['toDate']=$row['taxToDate'];
                    $i++;
                }
                
                if($row['insuToDate']>$today)
                {
                    $data1[$i]['srNo']=$i+1;
                    $data1[$i]['vehicleNo']=$row['vehVehicleNo'];
                    $data1[$i]['type']="Insurance";
                    $data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
                    $data1[$i]['toDate']=$row['insuToDate'];
                    $i++;
                }
                if($row['pasToDate']>$today)
                {
                    $data1[$i]['srNo']=$i+1;
                    $data1[$i]['vehicleNo']=$row['vehVehicleNo'];
                    $data1[$i]['type']="Passing";
                    $data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
                    $data1[$i]['toDate']=$row['pasToDate'];
                    $i++;
                }

                if($row['perToDate']>$today)
                {
                    $data1[$i]['srNo']=$i+1;
                    $data1[$i]['vehicleNo']=$row['vehVehicleNo'];
                    $data1[$i]['type']="Permit";
                    $data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
                    $data1[$i]['toDate']=$row['perToDate'];
                    $i++;
                }
                
                if($row['npdToDate']>$today)
                {
                    $data1[$i]['srNo']=$i+1;
                    $data1[$i]['vehicleNo']=$row['vehVehicleNo'];
                    $data1[$i]['type']="Natioal Permit";
                    $data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
                    $data1[$i]['toDate']=$row['npdToDate'];
                    $i++;
                }
                if($row['gToDate']>$today)
                {
                    $data1[$i]['srNo']=$i+1;
                    $data1[$i]['vehicleNo']=$row['vehVehicleNo'];
                    $data1[$i]['type']="Green Tax";
                    $data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
                    $data1[$i]['toDate']=$row['gToDate'];
                    $i++;
                }
            }


            /*echo "<pre>";
            print_r($data1);*/

            echo json_encode($data1);

        }

        /*function bubbleSortDesc(array $arr) {
           $sorted = false;
           while (false === $sorted) {
               $sorted = true;
               for ($i = 0; $i < count($arr) - 1; ++$i) {
                   $currentS = $arr[$i]['srNo'];
                   $currentV = $arr[$i]['vehicleNo'];
                   $currentT = $arr[$i]['type'];
                   $currentP = $arr[$i]['person'];
                   $currentTo = $arr[$i]['toDate'];
                   $currentC = $arr[$i]['cDate'];


                   $nextS    = $arr[$i + 1]['srNo'];
                   $nextV    = $arr[$i + 1]['vehicleNo'];
                   $nextT    = $arr[$i + 1]['type'];
                   $nextP    = $arr[$i + 1]['person'];
                   $nextTo   = $arr[$i + 1]['toDate'];
                   $nextC    = $arr[$i + 1]['cDate'];


                   if ($nextC > $currentC) {
                       $arr[$i]['srNo']     = $nextS;
                       $arr[$i + 1]['srNo'] = $currentS;

                       $arr[$i]['vehicleNo']     = $nextV;
                       $arr[$i + 1]['vehicleNo'] = $currentV;

                       $arr[$i]['type']     = $nextT;
                       $arr[$i + 1]['type'] = $currentT;

                       $arr[$i]['person']     = $nextP;
                       $arr[$i + 1]['person'] = $currentP;

                       $arr[$i]['toDate']     = $nextTo;
                       $arr[$i + 1]['toDate'] = $currentTo;

                       $arr[$i]['cDate']     = $nextC;
                       $arr[$i + 1]['cDate'] = $currentC;

                       $sorted      = false;
                   }
               }
           }
           return $arr;
        }*/
        
}

  	
	$action = isset($_POST['action']) != '' ? $_POST['action'] : '';
	$obj = new DataClass();    
    $postData=$_POST;

	switch($action) {
     case 'today' :
            $obj->getTodaysRecords($postData);
            break;
	 case 'new':
            $obj->getNewRecords($postData);
            break;
     case 'old':
            $obj->getOldRecords($postData);
            break;
	 default:
            $obj->getTodaysRecords($postData);
	}
?>
	