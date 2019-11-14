

<?php
	include_once("connection.php");	
	
	class DataClassHTML 
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

        

        function getToOrNOC($vehVehicleNo,$type)
        {
            $vehID="";
            $sql = "SELECT vehID FROM vehicle WHERE vehVehicleNo='$vehVehicleNo'";
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
                 if($type=='T.O')
                                    {
                                        $htmlContent .= "(T.O.)";
                                    }
                                    else
                                    {
                                        $htmlContent .= "(NOC)";
                                    }
                    
                $htmlContent .=' Complete details for vehicle no. '.$vehVehicleNo.'</h5>  
                <table style="width:100%;font-size:13px;" border="1">
                  <tr >
                    <td rowspan="3" style="width:20%">Company Name & Address: <br/> '.$coCompany.'
                            <br/>';
                            if($type=='T.O')
                                    {
                                        $htmlContent .= $coHOAddress;
                                    }
                                    else
                                    {
                                        $htmlContent .= " ";
                                    }
                            
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
                if($type=='T.O')
                {
                   $this->insertTO($vehID);
                }
                else
                {
                    $this->insertNOC($vehID);
                }
                return  $htmlContent;
            }
            else
            {
                return "Data Not found..! may be because of some data is missing..!";
            }
        }

        function insertTO($vehID){
            $sql="SELECT `vehID`, `vehVehicleNo`, `vehChassisNo`, `vehEngineNo`, `vehModel`, `vehMake`, `vehRegistrationDate`, `vehRMADate`, `vehHypothecation`, `vehRLW`, `vehUW`, `vehPL`, `vehRemarks`, `coID`,rcID FROM `vehicle` WHERE vehID=".$vehID;
                $result = mysqli_query($this->conn, $sql);
                if($row=mysqli_fetch_array($result)){
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

                    $sql = "INSERT INTO todetails(vehID,vehVehicleNo,vehChassisNo,vehEngineNo,vehModel,vehMake,vehRegistrationDate,vehRMADate,vehHypothecation,vehRLW,vehUW,vehPL,vehRemarks,coID,rcID) VALUES($vehID,'$vehicleNo','$vehChassisNo','$vehEngineNo','$vehModel','$vehMake','$vehRegistrationDate','$vehRMADate','$vehHypothecation',$vehRLW,$vehUW,$vehPL,'$vehRemarks',$coID,$rcID)";                
                    $result = mysqli_query($this->conn, $sql);   

                      
                }          

                $sql="delete FROM `vehicle` WHERE vehID=".$vehID;
                $result = mysqli_query($this->conn, $sql);

                 //header("Location: ../toNoc.php");  
            
        }


        function insertNOC($vehID){

             $sql="SELECT `vehID`, `vehVehicleNo`, `vehChassisNo`, `vehEngineNo`, `vehModel`, `vehMake`, `vehRegistrationDate`, `vehRMADate`, `vehHypothecation`, `vehRLW`, `vehUW`, `vehPL`, `vehRemarks`, `coID`,rcID FROM `vehicle` WHERE vehID=".$vehID;
            $result = mysqli_query($this->conn, $sql) or die("error to update location data");
            if($row=mysqli_fetch_array($result)){
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

                 $sql = "INSERT INTO nocdetails(vehID,vehVehicleNo,vehChassisNo,vehEngineNo,vehModel,vehMake,vehRegistrationDate,vehRMADate,vehHypothecation,vehRLW,vehUW,vehPL,vehRemarks,coID,rcID) VALUES($vehID,'$vehicleNo','$vehChassisNo','$vehEngineNo','$vehModel','$vehMake','$vehRegistrationDate','$vehRMADate','$vehHypothecation',$vehRLW,$vehUW,$vehPL,'$vehRemarks',$coID,$rcID)";                
                $result = mysqli_query($this->conn, $sql);

                
    
            }
            

            $sql="delete FROM `vehicle` WHERE vehID=".$vehID;
            $result = mysqli_query($this->conn, $sql);

            //header("Location: ../toNoc.php");  
        }      
}
?>
       