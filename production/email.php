
<?php session_start();
  if(!isset($_SESSION['loginok']) ||$_SESSION['loginok']==false )
    header('location:../index.php?message=1');
 ?>
 <?php 
  include_once 'Vender2/MasterPage.php';
  include_once 'data/databaseFunctions.php';
  $masterPageObj=new MasterPageClass();
  $dbFunction=new DBFunctions();
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

            <?php echo $masterPageObj->getCountBar();?>   
            <div class="row">
                <div class="col-md-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Email <small>send email to clients</small></h2>
                      <ul class="nav panel_toolbox ">
                        <li><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                        </li>                     
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                      <form action="data/dataEmail.php" method="post">
                      <input type="hidden" value="sendMail" name="action" id="action">
                      <div>
                        <div class="row form-group">
                          <div class="col-lg-6">
                            <div class="col-md-12 col-sm-8 col-xs-12">
                              <select class="form-control" name="emailCompany" id="emailCompany">                          
                                      <?php echo $dbFunction->getCompanyNamesAsOptions();?>
                                    </select>
                             
                            </div>
                           
                          </div>
                          <div class="col-lg-6">
                             <div class="col-md-12 col-sm-8 col-xs-12">
                            <select class="form-control" name="emailVehicle" id="emailVehicle">                          
                                      <?php echo $dbFunction->getVehicleNoByComapnyAsOptions(1);?>
                                    </select>
                             
                            </div>
                          </div>
                        </div>
                        </div>

                         <div class="form-group">
                                <div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-5">
                                  <a href="email.php" class="btn btn-primary">Reset</a>
                                  <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                              </div>

                        

                       


                      </form>

                     <?php
                        if(isset($_REQUEST['errorCode']))
                        {
                          switch($_REQUEST['errorCode'])
                          {
                            case 1: 
                              echo "<div class='alert alert-success' style='margin-top:30px;font-size:18px;'>Success! Email has been sent successfully.</div>";
                              break; 
                            case 2: 
                              echo "<div class='alert alert-danger' style='margin-top:30px;font-size:18px;'>Fail! Failed to send email.</div>";
                              break;  
                            case 3: 
                              echo "<div class='alert alert-info' style='margin-top:30px;font-size:18px;'>Info! Email not found.</div>";
                              break;                          
                                  
                          }
                        }    
                      ?>

                      

                    </div>
                    
                  </div>
                </div>
              </div>


              
        </div>
        <!-- /page content -->
        

        <!-- Delete Confirm Modal --> 
        <?php  echo $masterPageObj->getDeleteConfirmModal();?> 

        <!-- Footer -->
        <?php  echo $masterPageObj->getFooter();?>        
      </div>
    </div>
    

    <!-- jQuery Section -->
	 <?php  echo $masterPageObj->getjQuerySection();?>

  </body>
</html>

<script type="text/javascript">
  $('#emailCompany').change(function() {
    var id = $(this).val(); //get the current value's option
    $.ajax({
        type:'POST',
        url:'data/dataEmail.php',
        data:{'id':id},
        success:function(data){
            $("#emailVehicle").html(data);
        }
    });
});
</script>

