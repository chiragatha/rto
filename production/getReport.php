<?php session_start();
  if(!isset($_SESSION['loginok']) ||$_SESSION['loginok']==false )
    header('location:../index.php?message=1');
 ?>

<?php

include_once 'data/databaseFunctions.php';
include_once 'data/dataReports.php';
include_once('mpdf60/mpdf.php');
$dbFunction;
$reports;
$ch;
$mpdf;

class ReportRender
{
	public function __construct()
	{
		$this->dbFunction=new DBFunctions();
		$this->reports= new ReportsClass();
		$this->ch=$_REQUEST['ch'];
		$this->mpdf=new mPDF();
	}

	public function main()
	{
		switch ($this->ch) {
			case 1:
				$this->mpdf->AddPage('L');
				$this->mpdf->WriteHTML("<p><h3>Himmatbhai Atha & Co.</h3></p>".$this->reports->getSimpleReportTableAsHtml());
				break;
			case 2:	
				$this->mpdf->AddPage('L');	
				$fromDate=$_REQUEST['from'];
				$toDate=$_REQUEST['to'];
				$this->mpdf->WriteHTML("<p><h3>Himmatbhai Atha & Co.</h3></p><p>Due dates from ".$fromDate." to ".$toDate."</p>".$this->reports->getDatewiseRportTableAsHtml($fromDate,$toDate));
				break;
			case 3:
				$fromDate=$_REQUEST['from'];
				$toDate=$_REQUEST['to'];
				$msg=$_REQUEST['msg'];
				$coID=$_REQUEST['coID'];
				$coIDArray=array();
				if($coID==0)
				{
					$coIDArray=$this->dbFunction->getCompanyIDs(date_format(date_create($fromDate),"Y-m-d"),date_format(date_create($toDate),"Y-m-d"));
				}
				else
				{
					$coIDArray[0]=$coID;
				}

				for($i=0;$i<sizeof($coIDArray);$i++){
					$this->mpdf->AddPage();
					$this->getCompanyWiseReportData($coIDArray[$i],$fromDate,$toDate,$msg);
				}				
				break;
			case 4:
				$repVehicleNo=$_REQUEST['repVehicleNo'];
				//echo $reports->getVehicleWiseReportTableAsHtml($repVehicleNo);
				$this->mpdf->WriteHTML("<p><h3>Himmatbhai Atha & Co.</h3></p>".$this->reports->getVehicleWiseReportTableAsHtml($repVehicleNo));
				break;
		}
		$this->mpdf->Output(); 
		exit;
	}

	function getCompanyWiseReportData($coID,$fromDate,$toDate,$msg)
	{

		$companyDetails=$this->dbFunction->getCompanyNameAndAddress($coID);

		/*echo "<pre>";
		print_r($companyDetails);*/
		//echo $this->reports->getCompanyWiseRportTableAsHtml($fromDate,$toDate,$coID);
		$pStyle="style='margin:0px'";
		$htmlContent ="
			<div>
				<div style='float:left;width:45%;'>
					<br /><br />

					<p ".$pStyle.">To,</p>
					<p ".$pStyle.">".$companyDetails['companyName']."</p>
					<p ".$pStyle.">".$companyDetails['contactPerson']."</p>
					<p ".$pStyle.">".$companyDetails['address']."</p>


				</div>

				<div style='float:right;text-align:right;width:50%;'>
					<p><b style='font-size:18px;'>ATHA - HIMATBHAI MANGALBHAI,</b></p>
					<p ".$pStyle.">Shop No. 10, Sunny House, D'souza Wadi,</p>
					<p ".$pStyle.">Shivaji Nagar, Wagle,</p>
					<p ".$pStyle.">Thane 400 640.</p>
					<p ".$pStyle.">Tel: 25821511</p>
					<p ".$pStyle.">Mobile: 9930222617</p>
					<p ".$pStyle.">Email: himathbhai2012@gmail.com</p>
				</div>

					
			</div>
			<br />
			<p ".$pStyle.">Dear Sir,</p>
			<br />
			<p ".$pStyle.">I am confident that you have been pleased with my service during the past years and I am looking forward to give you good service.</p>
			<br />
			<p ".$pStyle.">However, I would like to remind you that the following are about to expire.</p><br />
			".$this->reports->getCompanyWiseRportTableAsHtml($fromDate,$toDate,$coID)."<br />
			<p ".$pStyle.">Thanking you in advance for your consideration.</p>
			<p ".$pStyle.">Sincerely,</p>
			<br /><br /><br />
			<p ".$pStyle.">( Himatbhai Atha )</p>
			<br /><br />
			<p ".$pStyle.">Note: Submitting Insurance Policy is made compulsory, therefore, Kindly send the said Insurance Policy with Tax Payment.</p>";
		if($msg!="")
		{
			$htmlContent .="<br /><br /><p style='text-align:center;font-size:20px;'>".$msg."</p>";
			
		}
		$this->mpdf->WriteHTML($htmlContent);
	}
}


$reportRender=new ReportRender();
$reportRender->main();  

 ?>