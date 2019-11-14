<?php session_start();
  if(!isset($_SESSION['loginok']) ||$_SESSION['loginok']==false )
    header('location:../index.php?message=1');
 ?>
 <?php 
  include_once 'Vender2/MasterPage.php';
  $masterPageObj=new MasterPageClass();
?>
<!DOCTYPE html>
<html lang="en">
  <?php echo $masterPageObj->getHeadTag();?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- sidebar navigation -->
        <?php echo $masterPageObj->getSideNevBar();?>
        <!-- topbar navigation -->
        <?php echo $masterPageObj->getTopBar();?>
        

        <!-- page content -->
        <div class="right_col" role="main">     



            
        </div>
        <!-- /page content -->

        <!-- Footer -->
        <?php  echo $masterPageObj->getFooter();?>        
      </div>
    </div>

    <!-- jQuery Section -->
	 <?php  echo $masterPageObj->getjQuerySection();?>
  </body>
</html>
