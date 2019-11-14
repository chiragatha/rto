<?php
include_once('mpdf60/mpdf.php');
$mpdf=new mPDF();
$mpdf->AddPage('L');
$mpdf->WriteHTML("<div style='float:left;width:15%;'>
						

						<p>To1,</p>
						<p>To2,</p>
						<p>To3,</p>
						<p>To4,</p>


					</div>
					<div style='float:left;width:15%;'>
						<p>To1,</p>
						<p>To2,</p>
						<p>To3,</p>
						<p>To4,</p>
					</div>
					<div style='float:left;width:15%;'>
						<p>To1,</p>
						<p>To2,</p>
						<p>To3,</p>
						<p>To4,</p>
					</div>
					<div style='float:left;width:15%;'>
						<p>To1,</p>
						<p>To2,</p>
						<p>To3,</p>
						<p>To4,</p>
					</div>
					<div style='float:left;width:15%;'>
						<p>To1,</p>
						<p>To2,</p>
						<p>To3,</p>
						<p>To4,</p>
					</div>
					<div style='width:25%;'>
						<p>To1,</p>
						<p>To2,</p>
						<p>To3,</p>
						<p>To4,</p>
					</div>");
$mpdf->Output(); 
?>

