<?php
	include_once("connection.php");	

	class DBFunctions 
	{
		protected $conn;

		function __construct() {
            $db = new dbObj();
            $this->conn = $db->getConnection();
        }

        function __destruct() {
            $this->conn->close();
        }

        public function getInsuranceCompanyNamesAsOptions()
        {
        	$sql = "SELECT insID,insInsuranceCo FROM insuranceco ORDER BY insInsuranceCo";
			$result = mysqli_query($this->conn,$sql);

			$options="";
			$i=0;
			while ($row = mysqli_fetch_array($result)) {
				if($i==0){$options="<option value='" . $row['insID'] ."'>" . $row['insInsuranceCo'] ."</option>";$i++;}
				else{$options .= "<option value='" . $row['insID'] ."'>" . $row['insInsuranceCo'] ."</option>";}

			    //echo "<option value='" . $row['username'] ."'>" . $row['username'] ."</option>";
			}

			return $options;
			/*echo $options;*/

		}


		public function getInsuranceCompanyNamesSameValueAsOptions()
        {
        	$sql = "SELECT insInsuranceCo FROM insuranceco  ORDER BY insInsuranceCo";
			$result = mysqli_query($this->conn,$sql);

			$options="";
			$i=0;
			while ($row = mysqli_fetch_array($result)) {
				if($i==0){$options="<option value='" . $row['insInsuranceCo'] ."'>" . $row['insInsuranceCo'] ."</option>";$i++;}
				else{$options .= "<option value='" . $row['insInsuranceCo'] ."'>" . $row['insInsuranceCo'] ."</option>";}

			    //echo "<option value='" . $row['username'] ."'>" . $row['username'] ."</option>";
			}

			return $options;
			/*echo $options;*/

		}

		public function getCompanyNamesAsOptions()
        {
        	$sql = "SELECT coID,coTitle,coCompany FROM company  ORDER BY CONCAT(coTitle, ' ', coCompany)";
			$result = mysqli_query($this->conn,$sql);

			$options="";
			$i=0;
			while ($row = mysqli_fetch_array($result)) {
				if($i==0){$options="<option value='" . $row['coID'] ."'>" . $row['coTitle']." ". $row['coCompany'] ."</option>";$i++;}
				else{$options .= "<option value='" . $row['coID'] ."'>" . $row['coTitle'] ." ". $row['coCompany'] ."</option>";}

			    //echo "<option value='" . $row['username'] ."'>" . $row['username'] ."</option>";
			}

			return $options;
			//echo $options;

		}

		public function getCompanyIDs($fromdate,$todate)
        {
        	$sql = "SELECT distinct company.coID FROM vehicle,company,reminder WHERE company.coID=vehicle.coID and vehicle.vehID=reminder.vehID and (( taxToDate BETWEEN '$fromdate' AND '$todate') or (insuToDate BETWEEN '$fromdate' AND '$todate') or (perToDate BETWEEN '$fromdate' AND '$todate') or (pasToDate BETWEEN '$fromdate' AND '$todate') or (nphToDate BETWEEN '$fromdate' AND '$todate')  or (npdToDate BETWEEN '$fromdate' AND '$todate') or (gToDate BETWEEN '$fromdate' AND '$todate')) group by company.coID,vehicle.vehID";
			$result = mysqli_query($this->conn,$sql);

			$response=array();
			$i=0;
			while ($row = mysqli_fetch_array($result)) {
				$response[$i]=$row['coID'];
				$i++;				
			}

			return $response;

		}

		public function getRCNamesAsOptions()
        {
        	$sql = "SELECT rcID,rcTitle,rcName FROM rcholder  ORDER BY CONCAT(rcTitle, ' ', rcName)";
			$result = mysqli_query($this->conn,$sql);

			$options="";
			$i=0;
			while ($row = mysqli_fetch_array($result)) {
				if($i==0){$options="<option value='" . $row['rcID'] ."'>" . $row['rcTitle']." ". $row['rcName'] ."</option>";$i++;}
				else{$options .= "<option value='" . $row['rcID'] ."'>" . $row['rcTitle'] ." ". $row['rcName'] ."</option>";}

			    //echo "<option value='" . $row['username'] ."'>" . $row['username'] ."</option>";
			}

			return $options;
			//echo $options;

		}

		public function getVehicleNoByComapnyAsOptions($coID1)
        {
        	$sql = "SELECT coID,coTitle,coCompany FROM company  ORDER BY CONCAT(coTitle, ' ', coCompany)";
			$result = mysqli_query($this->conn,$sql);

			$coID="1";
			$i=0;
			while ($row = mysqli_fetch_array($result)) {
				if($i==0){$coID=  $row['coID'];$i++;}
			    //echo "<option value='" . $row['username'] ."'>" . $row['username'] ."</option>";
			}

        	$sql = "SELECT vehVehicleNo FROM vehicle WHERE coID=$coID ORDER BY vehVehicleNo";
			$result = mysqli_query($this->conn,$sql);

			$options="";
			$i=0;
			while ($row = mysqli_fetch_array($result)) {
				if($i==0){$options="<option value='" . $row['vehVehicleNo'] ."'>" . $row['vehVehicleNo']."</option>";$i++;}
				else{$options .= "<option value='" . $row['vehVehicleNo'] ."'>" . $row['vehVehicleNo']."</option>";}
			}

			return $options;
		}

		public function getStateNamesAsOptions()
        {
        	$sql = "SELECT stID,stState FROM state ORDER BY stState";
			$result = mysqli_query($this->conn,$sql);

			$options="";
			$i=0;
			while ($row = mysqli_fetch_array($result)) {
				if($i==0){$options="<option value='" . $row['stID'] ."'>" . $row['stState'] ."</option>";$i++;}
				else{$options .= "<option value='" . $row['stID'] ."'>" .  $row['stState'] ."</option>";}

			    //echo "<option value='" . $row['username'] ."'>" . $row['username'] ."</option>";
			}

			return $options;
			//echo $options;

		}



		public function getRenewedDropDown()
		{
		    return 
		      " <option value='0'>Renewed</option>
		        <option value='-1'>Not Renewed</option>
		      ";
		}

		public function getCountsFromDatabase()
		{
		          $sql= "SELECT  
		                  (SELECT COUNT(*) FROM vehicle) AS count1,
		                  (SELECT COUNT(*) FROM insurance) AS count2, 
		                  (SELECT COUNT(*) FROM npheader) AS count3,
		                  (SELECT COUNT(*) FROM passing) AS count4,
		                  (SELECT COUNT(*) FROM permit) AS count5,
		                  (SELECT COUNT(*) FROM tax) AS count6
		                FROM dual";
		    $result=mysqli_query($this->conn, $sql) or die("error to fetch tot employees data");

		    $counts = array();
		    while ($row = mysqli_fetch_array($result)) {
		      $counts['vehicles']=$row[0];
		      $counts['insurance']=$row[1];
		      $counts['npheader']=$row[2];
		      $counts['passing']=$row[3];
		      $counts['permit']=$row[4];
		      $counts['tax']=$row[5];
		    }

		    //echo "<pre>";
		    //print_r($counts);
		    return $counts;
		}

		public function getReminders()
		{
			$today=date("Y-m-d");
			$sql="SELECT `vehVehicleNo`,rcTitle,rcName, `taxToDate`, `insuToDate`, `pasToDate`, `perToDate`, `npdToDate`, `gToDate` FROM reminder,vehicle,rcholder WHERE reminder.vehID=vehicle.vehID AND vehicle.rcID=rcholder.rcID AND (taxToDate='$today' OR insuToDate='$today' OR pasToDate='$today' OR perToDate='$today' OR npdToDate='$today' OR gToDate='$today') LIMIT 4";
			$result = mysqli_query($this->conn,$sql);
			$data1=array();
			$i=0;
			while ($row = mysqli_fetch_array($result)) {
				if($row['taxToDate']==$today)
				{
					$data1[$i]['vehicleNo']=$row['vehVehicleNo'];
					$data1[$i]['type']="Tax";
					$data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
					$data1[$i]['toDate']=$row['taxToDate'];
					$i++;
				}
				
				if($row['insuToDate']==$today)
				{
					$data1[$i]['vehicleNo']=$row['vehVehicleNo'];
					$data1[$i]['type']="Insurance";
					$data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
					$data1[$i]['toDate']=$row['insuToDate'];
					$i++;
				}
				if($row['pasToDate']==$today)
				{
					$data1[$i]['vehicleNo']=$row['vehVehicleNo'];
					$data1[$i]['type']="Passing";
					$data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
					$data1[$i]['toDate']=$row['pasToDate'];
					$i++;
				}

				if($row['perToDate']==$today)
				{
					$data1[$i]['vehicleNo']=$row['vehVehicleNo'];
					$data1[$i]['type']="Permit";
					$data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
					$data1[$i]['toDate']=$row['perToDate'];
					$i++;
				}
				
				if($row['npdToDate']==$today)
				{
					$data1[$i]['vehicleNo']=$row['vehVehicleNo'];
					$data1[$i]['type']="National Permit";
					$data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
					$data1[$i]['toDate']=$row['npdToDate'];
					$i++;
				}
				if($row['gToDate']==$today)
				{
					$data1[$i]['vehicleNo']=$row['vehVehicleNo'];
					$data1[$i]['type']="Green Tax";
					$data1[$i]['person']=$row['rcTitle']." ".$row['rcName'];
					$data1[$i]['toDate']=$row['gToDate'];
					$i++;
				}
			}

			$output = array_slice($data1, 0, 4);

			/*echo "<pre>";
			print_r($data1);	*/

			$remStr="";

			for($j=0;$j<sizeof($output);$j++)
			{
				$remStr .="<li>
                      <a href='reminders.php'>
                        <span class='image'><img src='images/bell.png' alt='reminder' /></span>
                        <span>
                          <span>".$output[$j]['type']."</span>
                          <span class='time'>".$output[$j]['toDate']."</span>
                        </span>
                        <span class='message'>
                          Name: ".$output[$j]['person']." 
                          Vehicle: ".$output[$j]['vehicleNo']."
                        </span>
                      </a>
                    </li>";
			}

			$response=array();
			$response[0]=sizeof($output);
			$response[1]=$remStr;	

			/*echo "<pre>";
			print_r($response);	*/

			return $response;


		}

		function getCompanyNameAndAddress($coID)
		{
			$sql = "SELECT coTitle,coCompany,coHOAddress,coContactPerson FROM company WHERE coID=$coID";
			$result = mysqli_query($this->conn,$sql);

			$response=array();
			while ($row = mysqli_fetch_array($result)) {

				$response['companyName']=$row['coTitle']." ".$row['coCompany'];
				$response['contactPerson']=$row['coContactPerson'];
				$response['address']=$row['coHOAddress'];
				
			}

			return $response;
		}

		
		

	
}
	// $dbf=new DBFunctions();
	// echo $dbf->getSimpleReportTable();





?>