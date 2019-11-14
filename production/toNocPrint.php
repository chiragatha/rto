<?php session_start();
  if(!isset($_SESSION['loginok']) ||$_SESSION['loginok']==false )
    header('location:../index.php?message=1');
 ?>
<?php
include_once 'data/dataToNocHtml.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src='../vendors/jquery/dist/jquery.min.js'></script> 
	<script>
		$( document ).ready(function() {
		    window.print();
		});     
	</script>
</head>
<body >

<?php
$ch=(!empty($_POST['ch'])? $_POST['ch'] : "");
$vehVehicleNo=(!empty($_POST['vehVehicleNo'])? $_POST['vehVehicleNo'] : "");
if($vehVehicleNo!="")
{
	switch ($ch) {
		case 1:	
			$dbClass=new DataClassHTML();
			echo $case1Html = $dbClass->getToOrNOC($vehVehicleNo,"T.O");						
			break;
		case 2:				
			$dbClass=new DataClassHTML();
			echo $case2Html = $dbClass->getToOrNOC($vehVehicleNo,"aaa");						
			break;
	}	
}
else
{
	 header("Location: toNoc.php?errorCode=1");
}

 ?>
</body>
</html>