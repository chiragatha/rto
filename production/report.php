<?php session_start();
  if(!isset($_SESSION['loginok']) ||$_SESSION['loginok']==false )
    header('location:../index.php?message=1');
 ?>
 <?php  
  include_once 'Vender2/MasterPage.php';
  include_once 'data/databaseFunctions.php';
  include_once 'data/dataReports.php';
  $masterPageObj=new MasterPageClass();
  $dbFunction=new DBFunctions();
  $reports= new ReportsClass();
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
                      <h2>Reports <small>view due date details</small></h2>
                      <ul class="nav panel_toolbox ">
                        <li><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                        </li>                     
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                      <!--<form id="frm_insert2" class="form-horizontal form-label-left input_mask" action="" method="post">
                      <div> 

                              <div class="row form-group">
                      <div class="col-lg-6">
                        <label class="control-label col-md-3 col-sm-2 col-xs-2" style="text-align: left;">From Date</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control has-feedback-left <?php if(!isset($_POST['submitData']))
                         {echo 'myDatePicker';}?>"  id="perFromDate1" placeholder="From Date" aria-describedby="inputSuccess2Status" name="repFromDate" 
                         <?php if(isset($_POST['submitData']))
                         {echo "value='".$_POST['repFromDate']."'";}?>>
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                          <span id="inputSuccess2Status" class="sr-only">(success)</span>
                        </div>
                      </div>
                      <div class="col-lg-6">                            
                        <label class="control-label col-md-3 col-sm-2 col-xs-2" style="text-align: left;">To Date</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control has-feedback-left myDatePicker"  id="perToDate1" placeholder="To Date" aria-describedby="inputSuccess2Status2" name="repToDate" onclick="setDate1()">
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                          <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                        </div>
                      </div>
                    </div>

                                

                    </div>  

                    <div class="form-group">
                      <div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-5">
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" name="submitData" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                      
                </form>-->
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" <?php if(isset($_POST['submitData']))
                                      {echo "class='active'";}else if(!isset($_POST['submitData']) && !isset($_POST['submitData1'])&& !isset($_POST['submitData2'])){echo "class='active'";}else{echo "class=''";}?>><a href="#tab_content1" id="tab1" role="tab" data-toggle="tab" aria-expanded="true">Simple Reports</a>
                        </li>
                        <li role="presentation" <?php if(isset($_POST['submitData1']))
                                      {echo "class='active'";}?>><a href="#tab_content2" role="tab" id="tab2" data-toggle="tab" aria-expanded="false">Company Wise Reports</a>
                        </li>

                        <li role="presentation" <?php if(isset($_POST['submitData2']))
                                      {echo "class='active'";}?>><a href="#tab_content3" role="tab" id="tab3" data-toggle="tab" aria-expanded="false">Vehicle Wise Reports</a>
                        </li>
                      
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" <?php if(isset($_POST['submitData']))
                                      {echo "class='tab-pane fade active in'";}else if(!isset($_POST['submitData']) &&  !isset($_POST['submitData1']) &&  !isset($_POST['submitData2'])){echo "class='tab-pane fade active in'";}else{ echo "class='tab-pane fade'"; }?> id="tab_content1" aria-labelledby="tab1">
                            <form id="frm_insert2" class="form-horizontal form-label-left input_mask" action="" method="post">
                              <div> 

                                <div class="row form-group">
                                  <div class="col-lg-5">
                                    <label class="control-label col-md-3 col-sm-2 col-xs-2" style="text-align: left;">From Date</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                      <input type="text" class="form-control has-feedback-left <?php if(!isset($_POST['submitData']))
                                      {echo 'myDatePicker';}else{echo 'myDatePicker1';}?>"  id="repFromDate1" placeholder="From Date" aria-describedby="inputSuccess2Status" name="repFromDate" <?php if(isset($_POST['submitData']))
                                      {echo "value='".$_POST['repFromDate']."'";echo "onclick='setMyDate1()'";
                                      }?>>
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                  <div class="col-lg-5">                            
                                    <label class="control-label col-md-3 col-sm-2 col-xs-2" style="text-align: left;">To Date</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                      <input type="text" class="form-control has-feedback-left <?php if(!isset($_POST['submitData']))
                                      {echo 'myDatePicker';}?>"  id="repToDate1" placeholder="To Date" aria-describedby="inputSuccess2Status2" name="repToDate" onclick="setDate1()" <?php if(isset($_POST['submitData']))
                                      {echo "value='".$_POST['repToDate']."'";}?>>
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                    </div>
                                  </div>

                                   <div class="col-lg-2">                            
                                    <div class="form-group">
                                      <div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-5">                                 
                                        <button type="submit" name="submitData" class="btn btn-success">Submit</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              </div>  
                                                     
                            </form>
                        </div>

                        <div role="tabpanel" <?php if(isset($_POST['submitData1']))
                                      {echo "class='tab-pane fade active in'";}else if(!isset($_POST['submitData']) &&  !isset($_POST['submitData1']) &&  !isset($_POST['submitData2'])){echo "class='tab-pane fade'";}else{ echo "class='tab-pane fade'"; }?>  id="tab_content2" aria-labelledby="tab2">
                            <form id="frm_insert2" class="form-horizontal form-label-left input_mask" action="" method="post">
                              <div> 

                                <div class="row form-group">
                                  <div class="col-lg-6">
                                    <label class="control-label col-md-3 col-sm-2 col-xs-2" style="text-align: left;">From Date</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                      <input type="text" class="form-control has-feedback-left <?php if(!isset($_POST['submitData1']))
                                      {echo 'myDatePicker';}?>"  id="repFromDate2" placeholder="From Date" aria-describedby="inputSuccess2Status" name="repFromDate1" 
                                      <?php if(isset($_POST['submitData1']))
                                      {echo "value='".$_POST['repFromDate1']."'";}?>>
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">                            
                                    <label class="control-label col-md-3 col-sm-2 col-xs-2" style="text-align: left;">To Date</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                      <input type="text" class="form-control has-feedback-left <?php if(!isset($_POST['submitData1']))
                                      {echo 'myDatePicker';}?>"  id="repToDate2" placeholder="To Date" aria-describedby="inputSuccess2Status2" name="repToDate1" onclick="setDate1()" <?php if(isset($_POST['submitData1']))
                                      {echo "value='".$_POST['repToDate1']."'";}?>>
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                </div>

                                <div class="row form-group">
                                  <div class="col-lg-6">                            
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <select class="form-control" name="repCompany">  
                                        <option value="0">All Companies</option>                        
                                        <?php echo $dbFunction->getCompanyNamesAsOptions();?>
                                      </select>                               
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class=" form-control has-feedback-left" id="inputSuccess2" placeholder="Message"  name="msg">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>

                                  
                                </div>

                                <div class="form-group">
                                      <div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-5">                                 
                                        <button type="submit" name="submitData1" class="btn btn-success">Submit</button>
                                      </div>
                                    </div>

                              </div>  
                                                     
                            </form>
                        </div>

                        <div role="tabpanel" <?php if(isset($_POST['submitData2']))
                                      {echo "class='tab-pane fade active in'";}else if(!isset($_POST['submitData']) &&  !isset($_POST['submitData1']) &&  !isset($_POST['submitData2'])){echo "class='tab-pane fade'";}else{ echo "class='tab-pane fade'"; }?> id="tab_content3" aria-labelledby="tab3">

                             <form id="frm_insert4" class="form-horizontal form-label-left input_mask" action="" method="post">
                              <div>
                                <div class="row form-group">
                                  <div class="col-lg-6">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <label>Company Name</label>
                                     
                                    </div>
                                   
                                  </div>
                                  <div class="col-lg-6">
                                     <div class="col-md-12 col-sm-8 col-xs-12">                                   
                                    <label>Vehicle No.</label>
                                     
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="row form-group">
                                  <div class="col-lg-6">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <select class="form-control" name="repCompany" id="repCompany">                          
                                              <?php echo $dbFunction->getCompanyNamesAsOptions();?>
                                            </select>
                                     
                                    </div>
                                   
                                  </div>
                                  <div class="col-lg-6">
                                     <div class="col-md-12 col-sm-8 col-xs-12">
                                    <select class="form-control" name="repVehicleNo" id="repVehicle">                          
                                              <?php echo $dbFunction->getVehicleNoByComapnyAsOptions(1);?>
                                            </select>
                                     
                                    </div>
                                  </div>
                                </div>
                                </div>

                                 <div class="form-group">
                                        <div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-5">
                                          <button type="submit" name="submitData2" class="btn btn-success">Submit</button>
                                        </div>
                                      </div>
                              </form>
                        </div>
                       
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="row">
               <div class="col-md-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Reports <small>view due date details</small></h2>
                      <ul class="nav panel_toolbox ">
                        <li><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                        </li>                     
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                        

                        <?php

                     

                         if(isset($_POST['submitData']))
                         {
                            echo "<a target='_blank' href='getReport.php?ch=2&from=".$_POST['repFromDate']."&to=".$_POST['repToDate']."' class='btn btn-default' >PDF</a>";
                            echo $reports->getDatewiseRportTable($_POST['repFromDate'],$_POST['repToDate']);

                            //echo "<script>setDate('#repFromDate',".$_POST['repFromDate'].")</script>";
                         }else if(isset($_POST['submitData1']))
                         {
                            if($_POST['repCompany']==0)
                            {
                                echo "<a target='_blank' href='getReport.php?ch=3&from=".$_POST['repFromDate1']."&to=".$_POST['repToDate1']."&coID=".$_POST['repCompany']."&msg=".$_POST['msg']."' class='btn btn-default' >PDF</a>";
                                echo $reports->getDatewiseRportTable($_POST['repFromDate1'],$_POST['repToDate1']);
                            }
                            else
                            {
                                echo "<a target='_blank' href='getReport.php?ch=3&from=".$_POST['repFromDate1']."&to=".$_POST['repToDate1']."&coID=".$_POST['repCompany']."&msg=".$_POST['msg']."' class='btn btn-default' >PDF</a>";
                                echo $reports->getCompanywiseRportTable($_POST['repFromDate1'],$_POST['repToDate1'],$_POST['repCompany']);
                            }
                            

                            //echo "<script>setDate('#repFromDate',".$_POST['repFromDate'].")</script>";
                         }
                         else if(isset($_POST['submitData2']))
                         {
                            echo "<a target='_blank' href='getReport.php?ch=4&repVehicleNo=".$_POST['repVehicleNo']."' class='btn btn-default' >PDF</a>";
                            echo $reports->getVehicleWiseReportTable($_POST['repVehicleNo']);

                            //echo "<script>setDate('#repFromDate',".$_POST['repFromDate'].")</script>";
                         }
                         else
                          {
                            
                            echo "<a target='_blank' href='getReport.php?ch=1' class='btn btn-default' >PDF</a>";
                            echo $reports->getSimpleReportTable();
                           
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

  function setMyDate1()
  { 
    
    var a='<?php if(isset($_POST["repFromDate"])){echo $var=$_POST["repFromDate"] ;}?>'; 

    setDate('#repFromDate1',a);
  }
</script>


<script type="text/javascript">
  $('#repCompany').change(function() {
    var id = $(this).val(); //get the current value's option
    $.ajax({
        type:'POST',
        url:'data/dataEmail.php',
        data:{'id':id},
        success:function(data){
            $("#repVehicle").html(data);
        }
    });
});
</script>






