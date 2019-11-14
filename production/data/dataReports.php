
<?php
	include_once("connection.php");	

	class ReportsClass 
	{
		protected $conn;

		function __construct() {
            $db = new dbObj();
            $this->conn = $db->getConnection();
        }

        function __destruct() {
            $this->conn->close();
        }
        function getSimpleReportTable()
        {
            $tableHTML="<table id='t1' class='table table-striped table-bordered' width='100%'' height='100%''>
                        <thead>
                          <tr>
                            <th>Vehicle No</th>
                            <th>Tax</th>
                            <th>Insurance</th>
                            <th>Passing</th>
                            <th>Permit</th>
                            <th>NP</th>
                            <th>NP-Auth</th>
                            <th>Green Tax</th>
                          </tr>
                        </thead><tbody>";

            $sql="SELECT company.coID,coTitle, coCompany,vehVehicleNo,taxToDate, insuToDate, pasToDate, perToDate,nphToDate, npdToDate,gToDate FROM vehicle,company,reminder WHERE company.coID=vehicle.coID and vehicle.vehID=reminder.vehID AND ((taxToDate <>'0000-00-00') or (insuToDate <>'0000-00-00') or (pasToDate <>'0000-00-00') or (nphToDate <>'0000-00-00') or (npdToDate <>'0000-00-00') or (gToDate <>'0000-00-00')) ORDER BY company.coID";
            $result = mysqli_query($this->conn, $sql);
            $i=0;
            $data=array();
            while($row = mysqli_fetch_array($result))
            { 
   //           echo "<pre>";
            // print_r($row);   
                $data[$i]['coID']=$row["coID"];
                $data[$i]['coTitle']= $row["coTitle"];
                $data[$i]['coCompany']= $row["coCompany"];
                $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];
                $data[$i]['taxToDate']= ($row["taxToDate"]=='0000-00-00' ? '' : date_format(date_create($row["taxToDate"]),"d-m-Y"));
                $data[$i]['insuToDate']= ($row["insuToDate"]=='0000-00-00' ? '' : date_format(date_create($row["insuToDate"]),"d-m-Y"));
                $data[$i]['pasToDate']= ($row["pasToDate"]=='0000-00-00' ? '' : date_format(date_create($row["pasToDate"]),"d-m-Y"));
                $data[$i]['perToDate']= ($row["perToDate"]=='0000-00-00' ? '' : date_format(date_create($row["perToDate"]),"d-m-Y"));
                $data[$i]['nphToDate']= ($row["nphToDate"]=='0000-00-00' ? '' : date_format(date_create($row["nphToDate"]),"d-m-Y")); 
                $data[$i]['npdToDate']= ($row["npdToDate"]=='0000-00-00' ? '' : date_format(date_create($row["npdToDate"]),"d-m-Y")); 
                $data[$i]['gToDate']= ($row["gToDate"]=='0000-00-00' ? '' : date_format(date_create($row["gToDate"]),"d-m-Y")); 
                $i++;

           
            }

            for($i=0;$i<sizeof($data);$i++)
            {
                if($i==0)
                {
                    $oldCoID=$data[$i]['coID'];
                    $tableHTML .= "
                        <tr style='background:lightgray'>
                        <td style='color:black'>".$data[$i]['coTitle']." ".$data[$i]['coCompany']."</td>
                        <td visible='false'></td>
                        <td visible='false'></td>
                        <td visible='false'></td>
                        <td visible='false'></td>
                        <td visible='false'></td>
                        <td  visible='false'></td>
                           <td  visible='false'></td>
                       
                        </tr>
                        <tr>
                            <td style='background:none'>".$data[$i]['vehVehicleNo']."</td>
                            <td>".$data[$i]['taxToDate']."</td>
                            <td>".$data[$i]['insuToDate']."</td>
                            <td>".$data[$i]['pasToDate']."</td>
                            <td>".$data[$i]['perToDate']."</td>
                            <td>".$data[$i]['nphToDate']."</td>
                            <td>".$data[$i]['npdToDate']."</td>
                            <td>".$data[$i]['gToDate']."</td>
                        </tr>
                    "; 
                }
                else
                {
                    if($oldCoID==$data[$i]['coID'])
                    {
                        $tableHTML .= "
                            <tr>
                                <td style='background:none'>".$data[$i]['vehVehicleNo']."</td>
                                <td>".$data[$i]['taxToDate']."</td>
                                <td>".$data[$i]['insuToDate']."</td>
                                <td>".$data[$i]['pasToDate']."</td>
                                <td>".$data[$i]['perToDate']."</td>
                                <td>".$data[$i]['nphToDate']."</td>
                                <td>".$data[$i]['npdToDate']."</td>
                                <td>".$data[$i]['gToDate']."</td>
                            </tr>
                        "; 
                    }
                    else
                    {
                        $oldCoID=$data[$i]['coID'];
                        $tableHTML .= "
                            <tr style='background:lightgray'>
                            <td style='color:black'>".$data[$i]['coTitle']." ".$data[$i]['coCompany']."</td>
                            <td visible='false'></td>
                            <td visible='false'></td>
                            <td visible='false'></td>
                            <td visible='false'></td>
                            <td visible='false'></td>
                            <td  visible='false'></td>
                               <td  visible='false'></td>
                           
                            </tr>
                            <tr>
                                <td style='background:none'>".$data[$i]['vehVehicleNo']."</td>
                                <td>".$data[$i]['taxToDate']."</td>
                                <td>".$data[$i]['insuToDate']."</td>
                                <td>".$data[$i]['pasToDate']."</td>
                                <td>".$data[$i]['perToDate']."</td>
                                <td>".$data[$i]['nphToDate']."</td>
                                <td>".$data[$i]['npdToDate']."</td>
                                <td>".$data[$i]['gToDate']."</td>
                            </tr>
                        "; 
                    }
                }

                
            }

            $tableHTML .="</tbody></table>";

            return $tableHTML;
        }



function getSimpleReportTableAsHtml()
        {
            $tableCss=" style='width: 100%;
                        max-width: 100%;
                        margin-bottom: 20px;
                        background-color: transparent;
                        border-spacing: 0;
                        
                        display: table;
                        border: 1px solid #ddd;'
                        ";
            $tdCss="style='border: 1px solid gray;'";
            $tableHTML="<table width='100%' height='100%' ".$tableCss.">
                        <thead>
                          <tr>
                            <th ".$tdCss.">Vehicle No</th>
                            <th ".$tdCss.">Tax</th>
                            <th ".$tdCss.">Insurance</th>
                            <th ".$tdCss.">Passing</th>
                            <th ".$tdCss.">Permit</th>
                            <th ".$tdCss.">NP</th>
                            <th ".$tdCss.">NP-Auth</th>
                            <th ".$tdCss.">Green Tax</th>

                          </tr>
                        </thead><tbody>";

            $sql="SELECT company.coID,coTitle, coCompany,vehVehicleNo,taxToDate, insuToDate, pasToDate, perToDate,nphToDate, npdToDate,gToDate FROM vehicle,company,reminder WHERE company.coID=vehicle.coID and vehicle.vehID=reminder.vehID AND ((taxToDate <>'0000-00-00') or (insuToDate <>'0000-00-00') or (pasToDate <>'0000-00-00') or (nphToDate <>'0000-00-00') or (npdToDate <>'0000-00-00') or (gToDate <>'0000-00-00'))   ORDER BY company.coID";
            $result = mysqli_query($this->conn, $sql);
            $i=0;
            $data=array();
            while($row = mysqli_fetch_array($result))
            { 
   //           echo "<pre>";
            // print_r($row);   
                $data[$i]['coID']=$row["coID"];
                $data[$i]['coTitle']= $row["coTitle"];
                $data[$i]['coCompany']= $row["coCompany"];
                $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];
                $data[$i]['taxToDate']= ($row["taxToDate"]=='0000-00-00' ? '' : date_format(date_create($row["taxToDate"]),"d-m-Y"));
                $data[$i]['insuToDate']= ($row["insuToDate"]=='0000-00-00' ? '' : date_format(date_create($row["insuToDate"]),"d-m-Y"));
                $data[$i]['pasToDate']= ($row["pasToDate"]=='0000-00-00' ? '' : date_format(date_create($row["pasToDate"]),"d-m-Y"));
                $data[$i]['perToDate']= ($row["perToDate"]=='0000-00-00' ? '' : date_format(date_create($row["perToDate"]),"d-m-Y"));
                $data[$i]['nphToDate']= ($row["nphToDate"]=='0000-00-00' ? '' : date_format(date_create($row["nphToDate"]),"d-m-Y")); 
                $data[$i]['npdToDate']= ($row["npdToDate"]=='0000-00-00' ? '' : date_format(date_create($row["npdToDate"]),"d-m-Y")); 
                $data[$i]['gToDate']= ($row["gToDate"]=='0000-00-00' ? '' : date_format(date_create($row["gToDate"]),"d-m-Y")); 
                $i++;

           
            }

            for($i=0;$i<sizeof($data);$i++)
            {
                if($i==0)
                {
                    $oldCoID=$data[$i]['coID'];
                    $tableHTML .= "
                        <tr style='background:lightgray;'>
                        <td style='background:lightgray;color:black;' colospan='7' >".$data[$i]['coTitle']." ".$data[$i]['coCompany']."</td>
                        </tr>
                        
                        <tr>
                            <td ".$tdCss.">".$data[$i]['vehVehicleNo']."</td>
                            <td ".$tdCss.">".$data[$i]['taxToDate']."</td>
                            <td ".$tdCss.">".$data[$i]['insuToDate']."</td>
                            <td ".$tdCss.">".$data[$i]['pasToDate']."</td>
                            <td ".$tdCss.">".$data[$i]['perToDate']."</td>
                            <td ".$tdCss.">".$data[$i]['nphToDate']."</td>
                            <td ".$tdCss.">".$data[$i]['npdToDate']."</td>
                            <td ".$tdCss.">".$data[$i]['gToDate']."</td>
                        </tr>
                    "; 
                }
                else
                {
                    if($oldCoID==$data[$i]['coID'])
                    {
                        $tableHTML .= "
                            <tr>
                                <td ".$tdCss.">".$data[$i]['vehVehicleNo']."</td>
                                <td ".$tdCss.">".$data[$i]['taxToDate']."</td>
                                <td ".$tdCss.">".$data[$i]['insuToDate']."</td>
                                <td ".$tdCss.">".$data[$i]['pasToDate']."</td>
                                <td ".$tdCss.">".$data[$i]['perToDate']."</td>
                                <td ".$tdCss.">".$data[$i]['nphToDate']."</td>
                                <td ".$tdCss.">".$data[$i]['npdToDate']."</td>
                                <td ".$tdCss.">".$data[$i]['gToDate']."</td>
                            </tr>
                        "; 
                    }
                    else
                    {
                        $oldCoID=$data[$i]['coID'];
                        $tableHTML .= "
                            <tr style='background:lightgray;'>
                            <td style='background:lightgray;color:black;' colospan='7' >".$data[$i]['coTitle']." ".$data[$i]['coCompany']."</td>
                            </tr>
                            <tr>
                                <td ".$tdCss.">".$data[$i]['vehVehicleNo']."</td>
                                <td ".$tdCss.">".$data[$i]['taxToDate']."</td>
                                <td ".$tdCss.">".$data[$i]['insuToDate']."</td>
                                <td ".$tdCss.">".$data[$i]['pasToDate']."</td>
                                <td ".$tdCss.">".$data[$i]['perToDate']."</td>
                                <td ".$tdCss.">".$data[$i]['nphToDate']."</td>
                                <td ".$tdCss.">".$data[$i]['npdToDate']."</td>
                                <td ".$tdCss.">".$data[$i]['gToDate']."</td>
                            </tr>
                        "; 
                    }
                }
            }
            $tableHTML .="</tbody></table>";
            return $tableHTML;
        }

        function getDatewiseRportTable($fromdate,$todate){
            
            $data=array();
            $i=0;
            $fromdate=date_format(date_create($fromdate),"Y-m-d");
            $todate=date_format(date_create($todate),"Y-m-d");
            $fDate=date('Y-m-d',strtotime($fromdate));
            $tDate=date('Y-m-d',strtotime($todate));
            $sql="SELECT coTitle, coCompany,vehVehicleNo,taxToDate, insuToDate, pasToDate, perToDate,nphToDate, npdToDate,gToDate FROM vehicle,company,reminder WHERE company.coID=vehicle.coID and vehicle.vehID=reminder.vehID and (( taxToDate BETWEEN '$fromdate' AND '$todate') or (insuToDate BETWEEN '$fromdate' AND '$todate') or (perToDate BETWEEN '$fromdate' AND '$todate') or (pasToDate BETWEEN '$fromdate' AND '$todate') or (nphToDate BETWEEN '$fromdate' AND '$todate') or (npdToDate BETWEEN '$fromdate' AND '$todate') or (gToDate BETWEEN '$fromdate' AND '$todate')) group by company.coID,vehicle.vehID";
            $result = mysqli_query($this->conn, $sql);

            while($row = mysqli_fetch_array($result))
            { 
                $taxDate=date('Y-m-d',strtotime($row['taxToDate']));
                $insuDate=date('Y-m-d',strtotime($row['insuToDate']));
                $pasDate=date('Y-m-d',strtotime($row['pasToDate']));
                $perDate=date('Y-m-d',strtotime($row['perToDate']));
                $nphDate=date('Y-m-d',strtotime($row['nphToDate']));
                $npdDate=date('Y-m-d',strtotime($row['npdToDate']));
                $gToDate=date('Y-m-d',strtotime($row['gToDate']));

                if($taxDate>=$fDate && $taxDate<=$tDate)
                {
                     
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];
                    $data[$i]['toDate']= $row["taxToDate"];
                    $data[$i]['type']= 1;                       
                    $i++;
                }

                if($insuDate>=$fDate && $insuDate<=$tDate)
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                       
                    $data[$i]['toDate']= $row["insuToDate"];
                    $data[$i]['type']= 2;
                    $i++;
                }

                if($pasDate>=$fDate && $pasDate<=$tDate)                
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["pasToDate"];                    
                    $data[$i]['type']= 3;
                    $i++;
                }

                if($perDate>=$fDate && $perDate<=$tDate)            
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["perToDate"];
                    $data[$i]['type']= 4;                      
                    $i++;
                }


                if($nphDate>=$fDate && $nphDate<=$tDate)                 
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];                    
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["nphToDate"]; 
                    $data[$i]['type']= 5;
                    $i++;
                 } 

                if($npdDate>=$fDate && $npdDate<=$tDate)                 
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];                    
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["npdToDate"]; 
                    $data[$i]['type']= 6;
                    $i++;
                 }  

                if($gToDate>=$fDate && $gToDate<=$tDate)                 
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];                    
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["gToDate"]; 
                    $data[$i]['type']= 7;
                    $i++;
                 }               

            }

            //echo json_encode($data);

            $dataSize=sizeof($data);
            $response=array();
            for($i=0,$k=0;$i<$dataSize;$i++)
            {
                    
                if($i==0){
                    $vno=$data[$i]['vehVehicleNo'];
                    $response[$k]['vehVehicleNo']=$data[$i]['vehVehicleNo'];
                    $response[$k]['cname']=$data[$i]['cname'];
                    $response[$k]['taxToDate']=$response[$k]['insuToDate']=$response[$k]['pasToDate']="";
                    $response[$k]['perToDate']=$response[$k]['nphToDate']=$response[$k]['npdToDate']=$response[$k]['gToDate']="";

                    switch ($data[$i]['type']) {
                        case '1':
                            $response[$k]['taxToDate']=$data[$i]['toDate'];break;
                        case '2':
                            $response[$k]['insuToDate']=$data[$i]['toDate'];break;
                        case '3':
                            $response[$k]['pasToDate']=$data[$i]['toDate'];break;
                        case '4':
                            $response[$k]['perToDate']=$data[$i]['toDate'];break;
                        case '5':
                            $response[$k]['nphToDate']=$data[$i]['toDate'];break;
                        case '6':
                            $response[$k]['npdToDate']=$data[$i]['toDate'];break;
                        case '7':
                            $response[$k]['gToDate']=$data[$i]['toDate'];break;
                        }
                    //$k++;
                }

                if($vno==$data[$i]['vehVehicleNo']){

                    switch ($data[$i]['type']) {
                        case '1':
                            $response[$k]['taxToDate']=$data[$i]['toDate'];break;
                        case '2':
                            $response[$k]['insuToDate']=$data[$i]['toDate'];break;
                        case '3':
                            $response[$k]['pasToDate']=$data[$i]['toDate'];break;
                        case '4':
                            $response[$k]['perToDate']=$data[$i]['toDate'];break;
                        case '5':
                            $response[$k]['nphToDate']=$data[$i]['toDate'];break;
                        case '6':
                            $response[$k]['npdToDate']=$data[$i]['toDate'];break;
                        case '7':
                            $response[$k]['gToDate']=$data[$i]['toDate'];break;
                        }
                    
                }else{
                    $vno=$data[$i]['vehVehicleNo'];                 
                    $k++;
                    $response[$k]['vehVehicleNo']=$data[$i]['vehVehicleNo'];
                    $response[$k]['cname']=$data[$i]['cname'];
                    $response[$k]['taxToDate']=$response[$k]['insuToDate']=$response[$k]['pasToDate']="";
                    $response[$k]['perToDate']=$response[$k]['nphToDate']=$response[$k]['npdToDate']=$response[$k]['gToDate']="";

                    switch ($data[$i]['type']) {
                        case '1':
                            $response[$k]['taxToDate']=$data[$i]['toDate'];break;
                        case '2':
                            $response[$k]['insuToDate']=$data[$i]['toDate'];break;
                        case '3':
                            $response[$k]['pasToDate']=$data[$i]['toDate'];break;
                        case '4':
                            $response[$k]['perToDate']=$data[$i]['toDate'];break;
                       case '5':
                            $response[$k]['nphToDate']=$data[$i]['toDate'];break;
                        case '6':
                            $response[$k]['npdToDate']=$data[$i]['toDate'];break;
                        case '7':
                            $response[$k]['gToDate']=$data[$i]['toDate'];break;
                        }
                    
                }

            }

            //echo json_encode($response);

        $tableHTML="<table id='t1' class='table table-striped table-bordered' width='100%'' height='100%''>
                        <thead>
                          <tr>
                            <th>Vehicle No</th>
                            <th>Tax</th>
                            <th>Insurance</th>
                            <th>Passing</th>
                            <th>Permit</th>
                            <th>NP</th>
                            <th>NP-Auth</th>
                            <th>Green Tax</th>
                          </tr>
                        </thead><tbody>";
                        $cname="";
        for($k=0;$k<sizeof($response);$k++){
            if($k==0){
                $cname=$response[$k]['cname'];

                $tableHTML .= " <tr style='background:lightgray' >
                <td  style='color:black'>".$cname."</td>
                <td visible='false'></td>
                <td visible='false'></td>
                <td visible='false'></td>
                <td visible='false'></td>
                <td  visible='false'></td>
                <td  visible='false'></td>
                <td  visible='false'></td>                
                </tr>";
            }

            if($cname==$response[$k]['cname']){
                $tableHTML .= " <tr>
                    <td style='background:none'>".$response[$k]['vehVehicleNo']."</td>
                    <td>".$a=($response[$k]['taxToDate']=='' ? '' : date_format(date_create($response[$k]['taxToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['insuToDate']=='' ? '' : date_format(date_create($response[$k]['insuToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['pasToDate']=='' ? '' : date_format(date_create($response[$k]['pasToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['perToDate']=='' ? '' : date_format(date_create($response[$k]['perToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['nphToDate']=='' ? '' : date_format(date_create($response[$k]['nphToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['npdToDate']=='' ? '' : date_format(date_create($response[$k]['npdToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['gToDate']=='' ? '' : date_format(date_create($response[$k]['gToDate']),"d-m-Y"))."</td>
                </tr>
                "; 
            }else{
                $cname=$response[$k]['cname'];
                $tableHTML .= " <tr style='background:lightgray'>
                        <td  style='color:black' >".$cname."</td>
                <td visible='false'></td>
                <td visible='false'></td>
                <td visible='false'></td>
                <td visible='false'></td>
                <td  visible='false'></td>
                <td  visible='false'></td>
                <td  visible='false'></td>
                        </tr>";
                  $tableHTML .= " <tr>
                    <td style='background:none'>".$response[$k]['vehVehicleNo']."</td>
                    <td>".$a=($response[$k]['taxToDate']=='' ? '' : date_format(date_create($response[$k]['taxToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['insuToDate']=='' ? '' : date_format(date_create($response[$k]['insuToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['pasToDate']=='' ? '' : date_format(date_create($response[$k]['pasToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['perToDate']=='' ? '' : date_format(date_create($response[$k]['perToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['nphToDate']=='' ? '' : date_format(date_create($response[$k]['nphToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['npdToDate']=='' ? '' : date_format(date_create($response[$k]['npdToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['gToDate']=='' ? '' : date_format(date_create($response[$k]['gToDate']),"d-m-Y"))."</td>
                </tr>
                "; 
            }                
        }
             $tableHTML .="</tbody></table>";

   //          echo "<pre>";
            // print_r($data);  

            // echo "<pre>";
            // print_r($response);  
           return  $tableHTML;
        }
        
        function getDatewiseRportTableAsHtml($fromdate,$todate){
            
            $data=array();
            $i=0;
            $fromdate=date_format(date_create($fromdate),"Y-m-d");
            $todate=date_format(date_create($todate),"Y-m-d");
            $fDate=date('Y-m-d',strtotime($fromdate));
            $tDate=date('Y-m-d',strtotime($todate));
            $sql="SELECT coTitle, coCompany,vehVehicleNo,taxToDate, insuToDate, pasToDate, perToDate,nphToDate, npdToDate,gToDate FROM vehicle,company,reminder WHERE company.coID=vehicle.coID and vehicle.vehID=reminder.vehID and (( taxToDate BETWEEN '$fromdate' AND '$todate') or (insuToDate BETWEEN '$fromdate' AND '$todate') or (perToDate BETWEEN '$fromdate' AND '$todate') or (pasToDate BETWEEN '$fromdate' AND '$todate')  or (nphToDate BETWEEN '$fromdate' AND '$todate') or (npdToDate BETWEEN '$fromdate' AND '$todate') or (gToDate BETWEEN '$fromdate' AND '$todate')) group by company.coID,vehicle.vehID";
            $result = mysqli_query($this->conn, $sql);

            while($row = mysqli_fetch_array($result))
            { 
                $taxDate=date('Y-m-d',strtotime($row['taxToDate']));
                $insuDate=date('Y-m-d',strtotime($row['insuToDate']));
                $pasDate=date('Y-m-d',strtotime($row['pasToDate']));
                $perDate=date('Y-m-d',strtotime($row['perToDate']));
                $nphDate=date('Y-m-d',strtotime($row['nphToDate']));
                $npdDate=date('Y-m-d',strtotime($row['npdToDate']));
                $gToDate=date('Y-m-d',strtotime($row['gToDate']));

                if($taxDate>=$fDate && $taxDate<=$tDate)
                {
                     
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];
                    $data[$i]['toDate']= $row["taxToDate"];
                    $data[$i]['type']= 1;                       
                    $i++;
                }

                if($insuDate>=$fDate && $insuDate<=$tDate)
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                       
                    $data[$i]['toDate']= $row["insuToDate"];
                    $data[$i]['type']= 2;
                    $i++;
                }

                if($pasDate>=$fDate && $pasDate<=$tDate)                
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["pasToDate"];                    
                    $data[$i]['type']= 3;
                    $i++;
                }

                if($perDate>=$fDate && $perDate<=$tDate)            
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["perToDate"];
                    $data[$i]['type']= 4;                      
                    $i++;
                }

                if($nphDate>=$fDate && $nphDate<=$tDate)                 
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];                    
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["nphToDate"]; 
                    $data[$i]['type']= 5;
                    $i++;
                 }  

                if($npdDate>=$fDate && $npdDate<=$tDate)                 
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];                    
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["npdToDate"]; 
                    $data[$i]['type']= 6;
                    $i++;
                 }  

                if($gToDate>=$fDate && $gToDate<=$tDate)                
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];                    
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["gToDate"]; 
                    $data[$i]['type']= 7;
                    $i++;
                 }               

            }

            $dataSize=sizeof($data);
            $response=array();
            for($i=0,$k=0;$i<$dataSize;$i++)
            {
                    
                if($i==0){
                    $vno=$data[$i]['vehVehicleNo'];
                    $response[$k]['vehVehicleNo']=$data[$i]['vehVehicleNo'];
                    $response[$k]['cname']=$data[$i]['cname'];
                    $response[$k]['taxToDate']=$response[$k]['insuToDate']=$response[$k]['pasToDate']="";
                    $response[$k]['perToDate']=$response[$k]['nphToDate']=$response[$k]['npdToDate']=$response[$k]['gToDate']="";

                    switch ($data[$i]['type']) {
                        case '1':
                            $response[$k]['taxToDate']=$data[$i]['toDate'];break;
                        case '2':
                            $response[$k]['insuToDate']=$data[$i]['toDate'];break;
                        case '3':
                            $response[$k]['pasToDate']=$data[$i]['toDate'];break;
                        case '4':
                            $response[$k]['perToDate']=$data[$i]['toDate'];break;
                        case '5':
                            $response[$k]['nphToDate']=$data[$i]['toDate'];break;
                        case '6':
                            $response[$k]['npdToDate']=$data[$i]['toDate'];break;
                        case '7':
                            $response[$k]['gToDate']=$data[$i]['toDate'];break;
                        }
                    //$k++;
                }

                if($vno==$data[$i]['vehVehicleNo']){

                    switch ($data[$i]['type']) {
                        case '1':
                            $response[$k]['taxToDate']=$data[$i]['toDate'];break;
                        case '2':
                            $response[$k]['insuToDate']=$data[$i]['toDate'];break;
                        case '3':
                            $response[$k]['pasToDate']=$data[$i]['toDate'];break;
                        case '4':
                            $response[$k]['perToDate']=$data[$i]['toDate'];break;
                        case '5':
                            $response[$k]['nphToDate']=$data[$i]['toDate'];break;
                        case '6':
                            $response[$k]['npdToDate']=$data[$i]['toDate'];break;
                        case '7':
                            $response[$k]['gToDate']=$data[$i]['toDate'];break;
                        }
                    
                }else{
                    $vno=$data[$i]['vehVehicleNo'];                 
                    $k++;
                    $response[$k]['vehVehicleNo']=$data[$i]['vehVehicleNo'];
                    $response[$k]['cname']=$data[$i]['cname'];
                    $response[$k]['taxToDate']=$response[$k]['insuToDate']=$response[$k]['pasToDate']="";
                    $response[$k]['perToDate']=$response[$k]['nphToDate']=$response[$k]['npdToDate']=$response[$k]['gToDate']="";

                    switch ($data[$i]['type']) {
                        case '1':
                            $response[$k]['taxToDate']=$data[$i]['toDate'];break;
                        case '2':
                            $response[$k]['insuToDate']=$data[$i]['toDate'];break;
                        case '3':
                            $response[$k]['pasToDate']=$data[$i]['toDate'];break;
                        case '4':
                            $response[$k]['perToDate']=$data[$i]['toDate'];break;
                        case '5':
                            $response[$k]['nphToDate']=$data[$i]['toDate'];break;
                        case '6':
                            $response[$k]['npdToDate']=$data[$i]['toDate'];break;
                        case '7':
                            $response[$k]['gToDate']=$data[$i]['toDate'];break;
                        }
                    
                }

            }
            $tableCss=" style='width: 100%;
                        max-width: 100%;
                        margin-bottom: 20px;
                        background-color: transparent;
                        border-spacing: 0;
                        
                        display: table;
                        border: 1px solid #ddd;'
                        ";
            $tdCss="style='border: 1px solid gray;'";
        $tableHTML="<table  width='100%' height='100%' ".$tableCss.">
                        <thead>
                          <tr>
                            <th ".$tdCss.">Vehicle No</th>
                            <th ".$tdCss.">Tax</th>
                            <th ".$tdCss.">Insurance</th>
                            <th ".$tdCss.">Passing</th>
                            <th ".$tdCss.">Permit</th>
                            <th ".$tdCss.">NP</th>
                            <th ".$tdCss.">NP-Auth</th>
                            <th ".$tdCss.">Green Tax</th>
                          </tr>
                        </thead><tbody>";
                        $cname="";
        for($k=0;$k<sizeof($response);$k++){
            if($k==0){
                $cname=$response[$k]['cname'];

                $tableHTML .= " <tr style='background:lightgray' >
                <td  style='background:lightgray;color:black' colospan='7' >".$cname."</td>
            
                
                </tr>";
            }

            if($cname==$response[$k]['cname']){
                 $tableHTML .= " <tr>
                    <td  ".$tdCss.">".$response[$k]['vehVehicleNo']."</td>
                    <td   ".$tdCss.">".$a=($response[$k]['taxToDate']=='' ? '' : date_format(date_create($response[$k]['taxToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['insuToDate']=='' ? '' : date_format(date_create($response[$k]['insuToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['pasToDate']=='' ? '' : date_format(date_create($response[$k]['pasToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['perToDate']=='' ? '' : date_format(date_create($response[$k]['perToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['nphToDate']=='' ? '' : date_format(date_create($response[$k]['nphToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['npdToDate']=='' ? '' : date_format(date_create($response[$k]['npdToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['gToDate']=='' ? '' : date_format(date_create($response[$k]['gToDate']),"d-m-Y"))."</td>
                </tr>
                "; 
            }else{
                $cname=$response[$k]['cname'];
                $tableHTML .= " <tr style='background:lightgray'>
                        <td  style='background:lightgray;color:black'  colospan='7'>".$cname."</td>
                         
                        </tr>";
                 $tableHTML .= " <tr>
                    <td  ".$tdCss.">".$response[$k]['vehVehicleNo']."</td>
                    <td   ".$tdCss.">".$a=($response[$k]['taxToDate']=='' ? '' : date_format(date_create($response[$k]['taxToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['insuToDate']=='' ? '' : date_format(date_create($response[$k]['insuToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['pasToDate']=='' ? '' : date_format(date_create($response[$k]['pasToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['perToDate']=='' ? '' : date_format(date_create($response[$k]['perToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['nphToDate']=='' ? '' : date_format(date_create($response[$k]['nphToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['npdToDate']=='' ? '' : date_format(date_create($response[$k]['npdToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['gToDate']=='' ? '' : date_format(date_create($response[$k]['gToDate']),"d-m-Y"))."</td>
                </tr>
                "; 
            }                
        }
             $tableHTML .="</tbody></table>";

   //          echo "<pre>";
            // print_r($data);  

            // echo "<pre>";
            // print_r($response);  
           return  $tableHTML;
        }       

        function getCompanyWiseRportTable($fromdate,$todate,$coID){
            
            $data=array();
            $i=0;
            $fromdate=date_format(date_create($fromdate),"Y-m-d");
            $todate=date_format(date_create($todate),"Y-m-d");
            $fDate=date('Y-m-d',strtotime($fromdate));
            $tDate=date('Y-m-d',strtotime($todate));
            $sql="SELECT coTitle, coCompany,vehVehicleNo,taxToDate, insuToDate, pasToDate, perToDate,nphToDate, npdToDate,gToDate FROM vehicle,company,reminder WHERE company.coID=vehicle.coID and vehicle.vehID=reminder.vehID and company.coID = $coID and  (( taxToDate BETWEEN '$fromdate' AND '$todate') or (insuToDate BETWEEN '$fromdate' AND '$todate') or (perToDate BETWEEN '$fromdate' AND '$todate') or (pasToDate BETWEEN '$fromdate' AND '$todate')  or (nphToDate BETWEEN '$fromdate' AND '$todate') or (npdToDate BETWEEN '$fromdate' AND '$todate') or (gToDate BETWEEN '$fromdate' AND '$todate')) group by company.coID,vehicle.vehID";
            $result = mysqli_query($this->conn, $sql);

            while($row = mysqli_fetch_array($result))
            { 
                $taxDate=date('Y-m-d',strtotime($row['taxToDate']));
                $insuDate=date('Y-m-d',strtotime($row['insuToDate']));
                $pasDate=date('Y-m-d',strtotime($row['pasToDate']));
                $perDate=date('Y-m-d',strtotime($row['perToDate']));
                $nphDate=date('Y-m-d',strtotime($row['nphToDate']));
                $npdDate=date('Y-m-d',strtotime($row['npdToDate']));
                $gToDate=date('Y-m-d',strtotime($row['gToDate']));

                if($taxDate>=$fDate && $taxDate<=$tDate)
                {
                     
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];
                    $data[$i]['toDate']= $row["taxToDate"];
                    $data[$i]['type']= 1;                       
                    $i++;
                }

                if($insuDate>=$fDate && $insuDate<=$tDate)
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                       
                    $data[$i]['toDate']= $row["insuToDate"];
                    $data[$i]['type']= 2;
                    $i++;
                }

                if($pasDate>=$fDate && $pasDate<=$tDate)                
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["pasToDate"];                    
                    $data[$i]['type']= 3;
                    $i++;
                }

                if($perDate>=$fDate && $perDate<=$tDate)            
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["perToDate"];
                    $data[$i]['type']= 4;                      
                    $i++;
                }

                if($nphDate>=$fDate && $nphDate<=$tDate)                 
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];                    
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["nphToDate"]; 
                    $data[$i]['type']= 5;
                    $i++;
                 }  

                if($npdDate>=$fDate && $npdDate<=$tDate)                 
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];                    
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["npdToDate"]; 
                    $data[$i]['type']= 6;
                    $i++;
                 }  

                if($gToDate>=$fDate && $gToDate<=$tDate)                 
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];                    
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["gToDate"]; 
                    $data[$i]['type']= 7;
                    $i++;
                 }               

            }

            $dataSize=sizeof($data);
            $response=array();
            for($i=0,$k=0;$i<$dataSize;$i++)
            {
                    
                if($i==0){
                    $vno=$data[$i]['vehVehicleNo'];
                    $response[$k]['vehVehicleNo']=$data[$i]['vehVehicleNo'];
                    $response[$k]['cname']=$data[$i]['cname'];
                    $response[$k]['taxToDate']=$response[$k]['insuToDate']=$response[$k]['pasToDate']="";
                    $response[$k]['perToDate']=$response[$k]['nphToDate']=$response[$k]['npdToDate']=$response[$k]['gToDate']="";

                    switch ($data[$i]['type']) {
                        case '1':
                            $response[$k]['taxToDate']=$data[$i]['toDate'];break;
                        case '2':
                            $response[$k]['insuToDate']=$data[$i]['toDate'];break;
                        case '3':
                            $response[$k]['pasToDate']=$data[$i]['toDate'];break;
                        case '4':
                            $response[$k]['perToDate']=$data[$i]['toDate'];break;
                        case '5':
                            $response[$k]['nphToDate']=$data[$i]['toDate'];break;
                        case '6':
                            $response[$k]['npdToDate']=$data[$i]['toDate'];break;
                        case '7':
                            $response[$k]['gToDate']=$data[$i]['toDate'];break;
                        }
                    //$k++;
                }

                if($vno==$data[$i]['vehVehicleNo']){

                    switch ($data[$i]['type']) {
                        case '1':
                            $response[$k]['taxToDate']=$data[$i]['toDate'];break;
                        case '2':
                            $response[$k]['insuToDate']=$data[$i]['toDate'];break;
                        case '3':
                            $response[$k]['pasToDate']=$data[$i]['toDate'];break;
                        case '4':
                            $response[$k]['perToDate']=$data[$i]['toDate'];break;
                        case '5':
                            $response[$k]['nphToDate']=$data[$i]['toDate'];break;
                        case '6':
                            $response[$k]['npdToDate']=$data[$i]['toDate'];break;
                        case '7':
                            $response[$k]['gToDate']=$data[$i]['toDate'];break;
                        }
                    
                }else{
                    $vno=$data[$i]['vehVehicleNo'];                 
                    $k++;
                    $response[$k]['vehVehicleNo']=$data[$i]['vehVehicleNo'];
                    $response[$k]['cname']=$data[$i]['cname'];
                    $response[$k]['taxToDate']=$response[$k]['insuToDate']=$response[$k]['pasToDate']="";
                    $response[$k]['perToDate']=$response[$k]['nphToDate']=$response[$k]['npdToDate']=$response[$k]['gToDate']="";

                    switch ($data[$i]['type']) {
                        case '1':
                            $response[$k]['taxToDate']=$data[$i]['toDate'];break;
                        case '2':
                            $response[$k]['insuToDate']=$data[$i]['toDate'];break;
                        case '3':
                            $response[$k]['pasToDate']=$data[$i]['toDate'];break;
                        case '4':
                            $response[$k]['perToDate']=$data[$i]['toDate'];break;
                        case '5':
                            $response[$k]['nphToDate']=$data[$i]['toDate'];break;
                        case '6':
                            $response[$k]['npdToDate']=$data[$i]['toDate'];break;
                        case '7':
                            $response[$k]['gToDate']=$data[$i]['toDate'];break;
                        }
                    
                }

            }

        $tableHTML="<table id='t1' class='table table-striped table-bordered' width='100%'' height='100%''>
                        <thead>
                          <tr>
                            <th>Vehicle No</th>
                            <th>Tax</th>
                            <th>Insurance</th>
                            <th>Passing</th>
                            <th>Permit</th>
                            <th>NP</th>
                            <th>NP-Auth</th>
                            <th>Green Tax</th>
                          </tr>
                        </thead><tbody>";
                        $cname="";
        for($k=0;$k<sizeof($response);$k++){
            if($k==0){
                $cname=$response[$k]['cname'];

                $tableHTML .= " <tr style='background:lightgray' >
                <td  style='color:black'>".$cname."</td>
                <td visible='false'></td>
                <td visible='false'></td>
                <td visible='false'></td>
                <td visible='false'></td>
                <td  visible='false'></td>
                <td  visible='false'></td>
                <td  visible='false'></td>

                
                </tr>";
            }

            if($cname==$response[$k]['cname']){
                $tableHTML .= " <tr>
                    <td style='background:none'>".$response[$k]['vehVehicleNo']."</td>
                    <td>".$a=($response[$k]['taxToDate']=='' ? '' : date_format(date_create($response[$k]['taxToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['insuToDate']=='' ? '' : date_format(date_create($response[$k]['insuToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['pasToDate']=='' ? '' : date_format(date_create($response[$k]['pasToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['perToDate']=='' ? '' : date_format(date_create($response[$k]['perToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['nphToDate']=='' ? '' : date_format(date_create($response[$k]['nphToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['npdToDate']=='' ? '' : date_format(date_create($response[$k]['npdToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['gToDate']=='' ? '' : date_format(date_create($response[$k]['gToDate']),"d-m-Y"))."</td>
                </tr>
                "; 
            }else{
                $cname=$response[$k]['cname'];
                $tableHTML .= " <tr style='background:lightgray'>
                        <td  style='color:black' >".$cname."</td>
                <td visible='false'></td>
                <td visible='false'></td>
                <td visible='false'></td>
                <td visible='false'></td>
                <td  visible='false'></td>
                <td  visible='false'></td>
                <td  visible='false'></td>
                        </tr>";
                $tableHTML .= " <tr>
                    <td style='background:none'>".$response[$k]['vehVehicleNo']."</td>
                    <td>".$a=($response[$k]['taxToDate']=='' ? '' : date_format(date_create($response[$k]['taxToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['insuToDate']=='' ? '' : date_format(date_create($response[$k]['insuToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['pasToDate']=='' ? '' : date_format(date_create($response[$k]['pasToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['perToDate']=='' ? '' : date_format(date_create($response[$k]['perToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['nphToDate']=='' ? '' : date_format(date_create($response[$k]['nphToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['npdToDate']=='' ? '' : date_format(date_create($response[$k]['npdToDate']),"d-m-Y"))."</td>
                    <td>".$a=($response[$k]['gToDate']=='' ? '' : date_format(date_create($response[$k]['gToDate']),"d-m-Y"))."</td>
                </tr>
                "; 
            }                
        }
             $tableHTML .="</tbody></table>";

   //          echo "<pre>";
            // print_r($data);  

            // echo "<pre>";
            // print_r($response);  
           return  $tableHTML;
        }
        
        function getCompanyWiseRportTableAsHtml($fromdate,$todate,$coID){
            
            $data=array();
            $i=0;
            $fromdate=date_format(date_create($fromdate),"Y-m-d");
            $todate=date_format(date_create($todate),"Y-m-d");
            $fDate=date('Y-m-d',strtotime($fromdate));
            $tDate=date('Y-m-d',strtotime($todate));
            $sql="SELECT coTitle, coCompany,vehVehicleNo,taxToDate, insuToDate, pasToDate, perToDate,nphToDate, npdToDate,gToDate FROM vehicle,company,reminder WHERE company.coID=vehicle.coID and vehicle.vehID=reminder.vehID and company.coID = $coID and (( taxToDate BETWEEN '$fromdate' AND '$todate') or (insuToDate BETWEEN '$fromdate' AND '$todate') or (perToDate BETWEEN '$fromdate' AND '$todate') or (pasToDate BETWEEN '$fromdate' AND '$todate') or (nphToDate BETWEEN '$fromdate' AND '$todate')  or (npdToDate BETWEEN '$fromdate' AND '$todate') or (gToDate BETWEEN '$fromdate' AND '$todate')) group by company.coID,vehicle.vehID";
            $result = mysqli_query($this->conn, $sql);

            while($row = mysqli_fetch_array($result))
            { 
                $taxDate=date('Y-m-d',strtotime($row['taxToDate']));
                $insuDate=date('Y-m-d',strtotime($row['insuToDate']));
                $pasDate=date('Y-m-d',strtotime($row['pasToDate']));
                $perDate=date('Y-m-d',strtotime($row['perToDate']));
                $nphDate=date('Y-m-d',strtotime($row['nphToDate']));
                $npdDate=date('Y-m-d',strtotime($row['npdToDate']));
                $gToDate=date('Y-m-d',strtotime($row['gToDate']));

                if($taxDate>=$fDate && $taxDate<=$tDate)
                {
                     
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];
                    $data[$i]['toDate']= $row["taxToDate"];
                    $data[$i]['type']= 1;                       
                    $i++;
                }

                if($insuDate>=$fDate && $insuDate<=$tDate)
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                       
                    $data[$i]['toDate']= $row["insuToDate"];
                    $data[$i]['type']= 2;
                    $i++;
                }

                if($pasDate>=$fDate && $pasDate<=$tDate)                
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["pasToDate"];                    
                    $data[$i]['type']= 3;
                    $i++;
                }

                if($perDate>=$fDate && $perDate<=$tDate)            
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["perToDate"];
                    $data[$i]['type']= 4;                      
                    $i++;
                }

                if($nphDate>=$fDate && $nphDate<=$tDate)                 
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];                    
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["nphToDate"]; 
                    $data[$i]['type']= 5;
                    $i++;
                 } 

                if($npdDate>=$fDate && $npdDate<=$tDate)                 
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];                    
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["npdToDate"]; 
                    $data[$i]['type']= 6;
                    $i++;
                 }  
                 if($gToDate>=$fDate && $gToDate<=$tDate)                
                {
                    $data[$i]['cname']= $row["coTitle"]." ".$row["coCompany"];                    
                    $data[$i]['vehVehicleNo']= $row["vehVehicleNo"];                        
                    $data[$i]['toDate']= $row["gToDate"]; 
                    $data[$i]['type']= 7;
                    $i++;
                 }               

            }

            $dataSize=sizeof($data);
            $response=array();
            for($i=0,$k=0;$i<$dataSize;$i++)
            {
                    
                if($i==0){
                    $vno=$data[$i]['vehVehicleNo'];
                    $response[$k]['vehVehicleNo']=$data[$i]['vehVehicleNo'];
                    $response[$k]['cname']=$data[$i]['cname'];
                    $response[$k]['taxToDate']=$response[$k]['insuToDate']=$response[$k]['pasToDate']="";
                    $response[$k]['perToDate']=$response[$k]['nphToDate']=$response[$k]['npdToDate']=$response[$k]['gToDate']="";

                    switch ($data[$i]['type']) {
                        case '1':
                            $response[$k]['taxToDate']=$data[$i]['toDate'];break;
                        case '2':
                            $response[$k]['insuToDate']=$data[$i]['toDate'];break;
                        case '3':
                            $response[$k]['pasToDate']=$data[$i]['toDate'];break;
                        case '4':
                            $response[$k]['perToDate']=$data[$i]['toDate'];break;
                        case '5':
                            $response[$k]['nphToDate']=$data[$i]['toDate'];break;
                        case '6':
                            $response[$k]['npdToDate']=$data[$i]['toDate'];break;
                        case '7':
                            $response[$k]['gToDate']=$data[$i]['toDate'];break;
                        }
                    //$k++;
                }

                if($vno==$data[$i]['vehVehicleNo']){

                    switch ($data[$i]['type']) {
                        case '1':
                            $response[$k]['taxToDate']=$data[$i]['toDate'];break;
                        case '2':
                            $response[$k]['insuToDate']=$data[$i]['toDate'];break;
                        case '3':
                            $response[$k]['pasToDate']=$data[$i]['toDate'];break;
                        case '4':
                            $response[$k]['perToDate']=$data[$i]['toDate'];break;
                        case '5':
                            $response[$k]['nphToDate']=$data[$i]['toDate'];break;
                        case '6':
                            $response[$k]['npdToDate']=$data[$i]['toDate'];break;
                        case '7':
                            $response[$k]['gToDate']=$data[$i]['toDate'];break;
                    }
                    
                }else{
                    $vno=$data[$i]['vehVehicleNo'];                 
                    $k++;
                    $response[$k]['vehVehicleNo']=$data[$i]['vehVehicleNo'];
                    $response[$k]['cname']=$data[$i]['cname'];
                    $response[$k]['taxToDate']=$response[$k]['insuToDate']=$response[$k]['pasToDate']="";
                    $response[$k]['perToDate']=$response[$k]['nphToDate']=$response[$k]['npdToDate']=$response[$k]['gToDate']="";

                    switch ($data[$i]['type']) {
                        case '1':
                            $response[$k]['taxToDate']=$data[$i]['toDate'];break;
                        case '2':
                            $response[$k]['insuToDate']=$data[$i]['toDate'];break;
                        case '3':
                            $response[$k]['pasToDate']=$data[$i]['toDate'];break;
                        case '4':
                            $response[$k]['perToDate']=$data[$i]['toDate'];break;
                        case '5':
                            $response[$k]['nphToDate']=$data[$i]['toDate'];break;
                        case '6':
                            $response[$k]['npdToDate']=$data[$i]['toDate'];break;
                        case '7':
                            $response[$k]['gToDate']=$data[$i]['toDate'];break;
                        }
                    
                }

            }
            $tableCss=" style='width: 100%;
                        max-width: 100%;
                        margin-bottom: 20px;
                        background-color: transparent;
                        border-spacing: 0;
                        
                        display: table;
                        border: 1px solid #ddd;'
                        ";
            $tdCss="style='border: 1px solid gray;'";
        $tableHTML="<table  width='100%' height='100%' ".$tableCss.">
                        <thead>
                          <tr>
                            <th ".$tdCss.">Vehicle No</th>
                            <th ".$tdCss.">Tax</th>
                            <th ".$tdCss.">Insurance</th>
                            <th ".$tdCss.">Passing</th>
                            <th ".$tdCss.">Permit</th>
                            <th ".$tdCss.">NP</th>
                            <th ".$tdCss.">NP-Auth</th>
                            <th ".$tdCss.">Green Tax</th>
                          </tr>
                        </thead><tbody>";
                        $cname="";
        for($k=0;$k<sizeof($response);$k++){
            if($k==0){
                $cname=$response[$k]['cname'];

                $tableHTML .= " <tr style='background:lightgray' >
                <td  style='background:lightgray;color:black' colospan='7' >".$cname."</td>
            
                
                </tr>";
            }

            if($cname==$response[$k]['cname']){
                $tableHTML .= " <tr>
                    <td  ".$tdCss.">".$response[$k]['vehVehicleNo']."</td>
                    <td   ".$tdCss.">".$a=($response[$k]['taxToDate']=='' ? '' : date_format(date_create($response[$k]['taxToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['insuToDate']=='' ? '' : date_format(date_create($response[$k]['insuToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['pasToDate']=='' ? '' : date_format(date_create($response[$k]['pasToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['perToDate']=='' ? '' : date_format(date_create($response[$k]['perToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['nphToDate']=='' ? '' : date_format(date_create($response[$k]['nphToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['npdToDate']=='' ? '' : date_format(date_create($response[$k]['npdToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['gToDate']=='' ? '' : date_format(date_create($response[$k]['gToDate']),"d-m-Y"))."</td>
                </tr>
                "; 
            }else{
                $cname=$response[$k]['cname'];
                $tableHTML .= " <tr style='background:lightgray'>
                        <td  style='background:lightgray;color:black'  colospan='7'>".$cname."</td>
                         
                        </tr>";
               $tableHTML .= " <tr>
                    <td  ".$tdCss.">".$response[$k]['vehVehicleNo']."</td>
                    <td   ".$tdCss.">".$a=($response[$k]['taxToDate']=='' ? '' : date_format(date_create($response[$k]['taxToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['insuToDate']=='' ? '' : date_format(date_create($response[$k]['insuToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['pasToDate']=='' ? '' : date_format(date_create($response[$k]['pasToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['perToDate']=='' ? '' : date_format(date_create($response[$k]['perToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['nphToDate']=='' ? '' : date_format(date_create($response[$k]['nphToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['npdToDate']=='' ? '' : date_format(date_create($response[$k]['npdToDate']),"d-m-Y"))."</td>
                    <td  ".$tdCss.">".$a=($response[$k]['gToDate']=='' ? '' : date_format(date_create($response[$k]['gToDate']),"d-m-Y"))."</td>
                </tr>
                "; 
            }
                
        }

            
           
             $tableHTML .="</tbody></table>";

   //          echo "<pre>";
            // print_r($data);  

            // echo "<pre>";
            // print_r($response);  
           return  $tableHTML;
        } 


        function getVehicleWiseReportTable($repVehicle)
        {
            $vehID="";
            $sql = "SELECT vehID FROM vehicle WHERE vehVehicleNo='$repVehicle'";
            $result = mysqli_query($this->conn, $sql);
            while ($row=mysqli_fetch_assoc($result)) {
                $vehID=$row['vehID'];
            }


            $tableHTML ="<table id='t1' class='table table-striped table-bordered' width='100%'' height='100%''>
                        <thead>
                          <tr>
                            <th>Vehicle No</th>
                            <th>Tax</th>
                            <th>Insurance</th>
                            <th>Passing</th>
                            <th>Permit</th>
                            <th>NP</th>
                            <th>NP-Auth</th>
                            <th>Green Tax</th>
                          </tr>
                        </thead><tbody>";

            $sql="SELECT coTitle, coCompany,vehVehicleNo,taxToDate, insuToDate, pasToDate, perToDate,nphToDate, npdToDate,gToDate FROM vehicle,company,reminder WHERE company.coID=vehicle.coID and vehicle.vehID=reminder.vehID AND reminder.vehID=$vehID AND ((taxToDate <>'0000-00-00') or (insuToDate <>'0000-00-00') or (pasToDate <>'0000-00-00') or (nphToDate <>'0000-00-00') or (npdToDate <>'0000-00-00') or (gToDate <>'0000-00-00'))";
            $result = mysqli_query($this->conn, $sql);
            while($row = mysqli_fetch_array($result))
            { 
   //           echo "<pre>";
            // print_r($row);   

                $coTitle= $row["coTitle"];
                $coCompany= $row["coCompany"];
                $vehVehicleNo= $row["vehVehicleNo"];
                $taxToDate= $row["taxToDate"];
                $insuToDate= $row["insuToDate"];
                $pasToDate= $row["pasToDate"];
                $perToDate= $row["perToDate"];
                $nphToDate= $row["nphToDate"];
                $npdToDate= $row["npdToDate"]; 
                 $gToDate= $row["gToDate"]; 
            $tableHTML .= "
            <tr style='background:lightgray'>
            <td style='color:black'>".$coTitle." ".$coCompany."</td>
            <td visible='false'></td>
            <td visible='false'></td>
            <td visible='false'></td>
            <td visible='false'></td>
            <td visible='false'></td>
            <td  visible='false'></td>
            <td  visible='false'></td>           
            </tr>
            <tr>
                <td style='background:none'>".$vehVehicleNo."</td>
                <td>".$a=($taxToDate=='0000-00-00' ? '' : date_format(date_create($taxToDate),"d-m-Y"))."</td>
                <td>".$a=($insuToDate=='0000-00-00' ? '' : date_format(date_create($insuToDate),"d-m-Y"))."</td>
                <td>".$a=($pasToDate=='0000-00-00' ? '' : date_format(date_create($pasToDate),"d-m-Y"))."</td>
                <td>".$a=($perToDate=='0000-00-00' ? '' : date_format(date_create($perToDate),"d-m-Y"))."</td>
                <td>".$a=($nphToDate=='0000-00-00' ? '' : date_format(date_create($nphToDate),"d-m-Y"))."</td>
                <td>".$a=($npdToDate=='0000-00-00' ? '' : date_format(date_create($npdToDate),"d-m-Y"))."</td>
                <td>".$a=($gToDate=='0000-00-00' ? '' : date_format(date_create($gToDate),"d-m-Y"))."</td>
            </tr>

            "; 
            }

            $tableHTML .="</tbody></table>";

            return $tableHTML;
        }     


        function getVehicleWiseReportTableAsHtml($repVehicle)
        {
            $vehID="";
            $sql = "SELECT vehID FROM vehicle WHERE vehVehicleNo='$repVehicle'";
            $result = mysqli_query($this->conn, $sql);
            while ($row=mysqli_fetch_assoc($result)) {
                $vehID=$row['vehID'];
            }

            $flag=false;

            $sql="SELECT vehVehicleNo,vehChassisNo,vehEngineNo, vehModel, vehMake, vehRegistrationDate, vehRMADate,vehHypothecation, vehRLW, vehUW, vehPL, vehRemarks, coTitle, coCompany, coHOAddress,rcTitle,rcName, rcRCAddress FROM vehicle,company,rcholder WHERE rcholder.rcID=vehicle.rcID and vehicle.vehID=$vehID  and vehicle.coID=company.coID GROUP BY vehicle.vehID";
                    $result = mysqli_query($this->conn, $sql);
                    if(mysqli_num_rows($result)>0)
                    {
                        $flag=true;
                        if($row = mysqli_fetch_array($result))
                        { 
                            $vehVehicleNo=$row['vehVehicleNo'];
                            $vehChassisNo=$row['vehChassisNo'];
                            $vehEngineNo=$row['vehEngineNo'];
                            $vehModel=$row['vehModel'];
                            $vehMake=$row['vehMake'];
                            $vehRegistrationDate=($row['vehRegistrationDate']=='0000-00-00' ? '' : date_format(date_create($row['vehRegistrationDate']),"d-m-Y"));
                            $vehRMADate=($row['vehRMADate']=='0000-00-00' ? '' : date_format(date_create($row['vehRMADate']),"d-m-Y"));
                            $vehHypothecation=$row['vehHypothecation'];
                            $vehRLW=$row['vehRLW'];
                            $vehUW=$row['vehUW'];
                            $vehPL=$row['vehPL'];

                            $coCompany=$row['coTitle'].' '.$row['coCompany'];
                            $coHOAddress=$row['coHOAddress'];
                            $rcRCAddress=$row['rcRCAddress'];
                            $rcName=$row['rcTitle'].' '.$row['rcName'];
                            $vehRemarks=$row['vehRemarks'];
                        }
                    }

                    if($flag)
                    {
                        

                        $vehVehicleNo="";
                            $sql = "SELECT vehVehicleNo FROM vehicle WHERE vehID=$vehID";
                            $result = mysqli_query($this->conn, $sql);
                            while ($row=mysqli_fetch_assoc($result)) {
                                $vehVehicleNo=$row['vehVehicleNo'];
                            }

                        $cTax=$cInsu=$cPas=$cPer=$cNph=$cNpd=$cGt=$cMax=0;
                        $htmlTax=$htmlInsu=$htmlPas=$htmlPer=$htmlNph=$htmlNpd=$htmlGt="";
                        $response=array();

                        $innerDivCss="style='width:14.28%;display: inline-block; *display: inline;vertical-align: top;float:left;font-size:12px;'";
                        $deepDivCss="style='border: 1px solid black;border-width: 0 0 1px 0;height:125px;padding:6px 0px;word-wrap: break-word;font-size:12px;'";
                        $deepDivCss1="style='border: 1px solid black;border-width: 0 1px 1px 0;height:130px;padding:6px 10px
                        ;word-wrap: break-word;font-size:12px;'";

                        $sql="SELECT taxID,tax.vehID, taxReceiptNo, taxReceiptDate, taxAmount, taxFromDate, taxToDate, taxPenalty, taxRenewed ,YEAR(taxFromDate) as year , ('tax') as type FROM tax,vehicle WHERE tax.vehID=vehicle.vehID AND tax.vehID=$vehID ORDER BY taxFromDate DESC";            
                        $result=mysqli_query($this->conn,$sql);

                        $i=0;
                        while ($row=mysqli_fetch_assoc($result) ){
                            $response[]=$row; 
                            $htmlTax .='<div '.$deepDivCss.'>'.$response[$i]['taxAmount'].'<br/>
                                            '.$response[$i]['taxPenalty'].'<br/>
                                            '.$response[$i]['taxReceiptNo'].'<br/>
                                            '.($response[$i]['taxReceiptDate']=='' ? '' : date_format(date_create($response[$i]['taxReceiptDate']),"d-m-Y")).'<br/>  
                                            '.($response[$i]['taxFromDate']=='' ? '' : date_format(date_create($response[$i]['taxFromDate']),"d-m-Y")).' TO '
                                             .($response[$i]['taxToDate']=='' ? '' : date_format(date_create($response[$i]['taxToDate']),"d-m-Y")).'
                                            </div>';  
                                $cTax++;
                                $i++;             
                        }
                        unset($response);



                       $sql="SELECT `insuPolicyNo`, insurance.`vehID`, `insuFromDate`, `insuToDate`, insInsuranceCo, `insuRenewed`,YEAR(insuFromDate) as year , ('insu') as type FROM insurance,insuranceco,vehicle WHERE insurance.vehID=vehicle.vehID AND insurance.vehID=$vehID and insuranceco.`insID`=insurance.`insID` ORDER BY insuFromDate DESC";
                        $result=mysqli_query($this->conn,$sql);

                        $i=0;
                        while ($row=mysqli_fetch_assoc($result) ){
                            $response[]=$row;
                            $htmlInsu .='<div '.$deepDivCss.'>'.$response[$i]['insInsuranceCo'].'<br/>
                                                '.$response[$i]['insuPolicyNo'].'<br/>
                                                '.($response[$i]['insuFromDate']=='' ? '' : date_format(date_create($response[$i]['insuFromDate']),"d-m-Y")).' TO '
                                                .($response[$i]['insuToDate']=='' ? '' : date_format(date_create($response[$i]['insuToDate']),"d-m-Y")).'
                                            </div>'; 
                            $cInsu++; 
                            $i++;               
                        }
                        unset($response);


                       
                        $sql="SELECT  `pasID`, `pasFromDate`, `pasToDate`, passing.`vehID`, `pasRenewed`,YEAR(pasFromDate) as year , ('pas') as type FROM passing,vehicle WHERE passing.vehID=vehicle.vehID AND passing.vehID=$vehID ORDER BY pasFromDate DESC";
                        $result=mysqli_query($this->conn,$sql);
                        $i=0;
                        while ($row=mysqli_fetch_assoc($result) ){
                            $response[]=$row; 
                            $htmlPas .='<div '.$deepDivCss.'>'.($response[$i]['pasFromDate']=='' ? '' : date_format(date_create($response[$i]['pasFromDate']),"d-m-Y")).' TO '.
                            ($response[$i]['pasToDate']=='' ? '' : date_format(date_create($response[$i]['pasToDate']),"d-m-Y")).'</div>'; 
                            $cPas++;  
                            $i++;            
                        }
                        unset($response);


                        $sql="SELECT  `perID`, `perPermitNo`, `perFromDate`, `perToDate`, permit.`vehID`, `perRenewed`,YEAR(perFromDate) as year , ('per') as type FROM permit,vehicle WHERE permit.vehID=vehicle.vehID AND permit.vehID=$vehID ORDER BY perFromDate DESC";
                        $result=mysqli_query($this->conn,$sql);
                        $i=0;
                        while ($row=mysqli_fetch_assoc($result) ){
                            $response[]=$row;     
                            $htmlPer .='<div '.$deepDivCss.'>'.$response[$i]['perPermitNo'].'<br/>
                                        '.($response[$i]['perFromDate']=='' ? '' : date_format(date_create($response[$i]['perFromDate']),"d-m-Y")).' TO '.
                                        ($response[$i]['perToDate']=='' ? '' : date_format(date_create($response[$i]['perToDate']),"d-m-Y")).'
                                        </div>';  
                                $cPer++;   
                                $i++;       
                        }
                        unset($response);

                        $sql="SELECT `nphPermitNo`, `nphPermitDate`, `nphExpiryDate` FROM `npheader`,vehicle WHERE npheader.vehID=vehicle.vehID AND npheader.vehID=$vehID ORDER BY nphPermitDate DESC";
                        $result=mysqli_query($this->conn,$sql);
                        $i=0;
                        while ($row=mysqli_fetch_assoc($result) ){
                            $response[]=$row;     
                            $htmlNph .='<div '.$deepDivCss.'>'.$response[$i]['nphPermitNo'].'<br/>
                                        '.($response[$i]['nphPermitDate']=='' ? '' : date_format(date_create($response[$i]['nphPermitDate']),"d-m-Y")).' TO '.
                                        ($response[$i]['nphExpiryDate']=='' ? '' : date_format(date_create($response[$i]['nphExpiryDate']),"d-m-Y")).'
                                    </div>';  
                                $cNph++;   
                                $i++;     
                        }
                        unset($response);


                        $sql="SELECT `stState`, `npdAmount`, `npdBankDraftNo`, `npdBankDraftDate`, `npdBankName`, `npdFromDate`, `npdToDate`, npdetails.`vehID`, `npdRenewed` FROM `npdetails`,state,vehicle WHERE npdetails.vehID=vehicle.vehID AND npdetails.stID=state.stID and npdetails.vehID=$vehID ORDER BY npdFromDate DESC";
                        $result=mysqli_query($this->conn,$sql);
                        $i=0;
                        while ($row=mysqli_fetch_assoc($result) ){
                            $response[]=$row;   
                            $htmlNpd .='<div '.$deepDivCss.'>'.$response[$i]['stState'].'<br/>
                                                '.($response[$i]['npdFromDate']=='' ? '' : date_format(date_create($response[$i]['npdFromDate']),"d-m-Y")).' TO '.
                                                  ($response[$i]['npdToDate']=='' ? '' : date_format(date_create($response[$i]['npdToDate']),"d-m-Y")).'<br/>
                                                '.$response[$i]['npdBankName'].'<br/>
                                                '.$response[$i]['npdBankDraftNo'].'<br/>  
                                                '.($response[$i]['npdBankDraftDate']=='' ? '' : date_format(date_create($response[$i]['npdBankDraftDate']),"d-m-Y")).'<br/> 
                                                '.$response[$i]['npdAmount'].'<br/>  
                                               
                                                </div>';  
                                    $cNpd++; 
                                    $i++;           
                        }
                        unset($response);

                        $sql="SELECT `receiptNo`,`receiptDate`, `fromDate`, `toDate`, `amount`, `penalty` FROM greenTax,vehicle WHERE greenTax.vehID=vehicle.vehID AND greenTax.vehID=$vehID ORDER BY fromDate DESC";
                        $result=mysqli_query($this->conn,$sql);
                        $i=0;
                        while ($row=mysqli_fetch_assoc($result) ){
                            $response[]=$row;  
                            $htmlGt .='<div '.$deepDivCss.'>'.$response[$i]['amount'].'<br/>
                                    '.$response[$i]['penalty'].'<br/>
                                    '.$response[$i]['receiptNo'].'<br/>
                                    '.($response[$i]['receiptDate']=='' ? '' : date_format(date_create($response[$i]['receiptDate']),"d-m-Y")).'<br/>  
                                    '.($response[$i]['fromDate']=='' ? '' : date_format(date_create($response[$i]['fromDate']),"d-m-Y")).' TO '.
                                    ($response[$i]['toDate']=='' ? '' : date_format(date_create($response[$i]['toDate']),"d-m-Y")).'
                                    </div>';    
                                    $cGt++;    
                                    $i++;         
                        }
                        unset($response);

                         // echo "<pre>";
                       // print_r($response);

                        $cMax=max($cTax,$cInsu,$cPas,$cPer,$cNph,$cNpd,$cGt); 

                        for($j=0;$j<($cMax-$cTax);$j++){$htmlTax .="<div ".$deepDivCss."></div>";}
                        for($j=0;$j<($cMax-$cInsu);$j++){$htmlInsu .="<div ".$deepDivCss."></div>";}
                        for($j=0;$j<($cMax-$cPas);$j++){$htmlPas .="<div ".$deepDivCss."></div>";}
                        for($j=0;$j<($cMax-$cPer);$j++){$htmlPer .="<div ".$deepDivCss."></div>";}
                        for($j=0;$j<($cMax-$cNph);$j++){$htmlNph .="<div ".$deepDivCss."></div>";}
                        for($j=0;$j<($cMax-$cNpd);$j++){$htmlNpd .="<div ".$deepDivCss."></div>";}
                        for($j=0;$j<($cMax-$cGt);$j++){$htmlGt .="<div ".$deepDivCss."></div>";}

                        $headerDiv="style='border: 1px solid black;border-width: 0 1px 1px 0;text-align:center;padding:4px;font-size:12px;'";
                        $htmlContent ='<div>
                        <h5 style="color: red">';
                            
                        $htmlContent .=' Complete details for vehicle no. '.$vehVehicleNo.'</h5>  
                        <table style="width:100%;font-size:13px;" border="1">
                          <tr >
                            <td rowspan="3" style="width:20%">Company Name & Address: <br/> '.$coCompany.'
                                    <br/>'.$coHOAddress;
                                    
                            $htmlContent .='</td>
                            <td >Chassis:  '.$vehChassisNo.'</td>
                            <td  colspan="4">Engi ne: '.$vehEngineNo.'</td>
                          </tr>
                          <tr>
                            <td>Make: '.$vehMake.'</td>
                            <td colspan="4">Model : '.$vehModel.'</td>
                          </tr>
                          <tr>
                            <td>Reg. Dt. :  '.$vehRegistrationDate.'</td>
                            <td rowspan="5" colspan="4" valign="top">HPA:  '.$vehHypothecation.'</td>
                          </tr>
                          <tr>
                            <td rowspan="4">RC Holder Name & Address:<br/>
                            '.$rcName.'<br/>
                            '.$rcRCAddress.'
                            </td>
                            
                            <td>RMA Dt. :'.$vehRMADate.'</td>
                          </tr>
                          <tr>
                           <td>RLW:  '.$vehRLW.'</td>
                          </tr>
                          <tr>
                            <td>UW: '.$vehUW.'</td>
                          </tr>
                          <tr>
                           <td>PL:  '.$vehPL.'</td>
                          </tr>
                          <tr>
                           <td colspan="6" style="text-align: left;" height="50" valign="top">Remarks: '.$vehRemarks.'</td>
                          </tr>
                          </table>';

                          $taxHeaderHtml="<div ".$headerDiv.">TAX</div><div ".$deepDivCss1.">AMOUNT & PENALTY<br/>
                            RECEIPT NO  <br/>
                            RECEIPT DATE <br/>  
                            FROM DT & TO DT</div>";

                        $insuHeaderHtml="<div ".$headerDiv.">INSURANCE</div><div ".$deepDivCss1.">INSURANCE CO.<br/>
                            POLICY NO.<br/>
                            FROM DT & TO DT</div>";

                        $pasHeaderHtml="<div ".$headerDiv.">PASSING</div><div ".$deepDivCss1.">FROM DT & TO DT</div>";

                        $perHeaderHtml="<div ".$headerDiv.">PERMIT</div><div ".$deepDivCss1.">PERMIT NO<br/>
                            FROM DT & TO DT</div>";

                         $nphHeaderHtml="<div ".$headerDiv.">NP</div><div ".$deepDivCss1.">PERMIT NO.<br/>
                            FROM DT & TO DT</div>";

                        $npdHeaderHtml="<div ".$headerDiv.">NP-AUTH</div><div ".$deepDivCss1.">NAME OF THE STATE<br/>
                            FROM DT & TO DT<br/>
                            NAME OF THE BANK<br/>  
                            DRAFT NO.<br/>  
                            DRAFT DATE</div>";

                        $gtHeaderHtml="<div ".$headerDiv.">GREEN TAX</div><div  ".$deepDivCss1.">AMOUNT & PENALTY<br/>
                            RECEIPT NO  <br/>
                            RECEIPT DATE <br/>  
                            FROM DT & TO DT</div>";

                        $htmlContent .="<div style='width:100%;border: 1px solid black;border-width: 0 1px 0 1px;'>";
                        $htmlContent .= "<div ".$innerDivCss.">".$taxHeaderHtml.$htmlTax."</div>";
                        $htmlContent .= "<div ".$innerDivCss.">".$insuHeaderHtml.$htmlInsu."</div>";
                        $htmlContent .= "<div ".$innerDivCss.">".$pasHeaderHtml.$htmlPas."</div>";
                        $htmlContent .= "<div ".$innerDivCss.">".$perHeaderHtml.$htmlPer."</div>";
                        $htmlContent .= "<div ".$innerDivCss.">".$nphHeaderHtml.$htmlNph."</div>";
                        $htmlContent .= "<div ".$innerDivCss.">".$npdHeaderHtml.$htmlNpd."</div>";
                        $htmlContent .= "<div style='width:14.28%;display: inline-block; *display: inline;vertical-align: top;'>".$gtHeaderHtml.$htmlGt."</div>";
                        $htmlContent .="</div></div>";
                        return  $htmlContent;
                    }
                    else
                    {
                        return "Data Not found..! may be because of some data is missing..!";
                    }
                    

            $tableHTML .= $htmlContent;

            return $tableHTML;
        } 
    }
?>