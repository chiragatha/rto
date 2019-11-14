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
                      <h2>National Permit <small>add national permit details</small></h2>
                      <ul class="nav panel_toolbox ">
                        <li><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                        </li>                     
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div  role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" <?php if(isset($_REQUEST['tab'])){echo "class=''";}else{echo "class='active'";}?>><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">National Permit</a>
                          </li>
                          <li role="presentation" <?php if(isset($_REQUEST['tab'])){echo "class='active'";}else{echo "class=''";}?>><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Authorisation Details</a>
                          </li>
                          
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" <?php if(isset($_REQUEST['tab'])){echo "class='tab-pane fade'";}else{echo "class='tab-pane fade active in'";}?> id="tab_content1" aria-labelledby="home-tab">
                            <form id="frm_insert" class="form-horizontal form-label-left input_mask" action="data/dataNPH.php" method="post">
                            <input type="hidden" value="insert" name="action" id="action">

                              <div> 

                                <div class="row form-group">
                                 <div class="col-lg-3">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class=" form-control has-feedback-left vehicleFinder" id="vehicleNo" placeholder="Vehicle Number"  name="vehicleNo">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class=" form-control has-feedback-left" id="rcname" placeholder="RC name"  name="rcname" readonly="">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                    <div class="col-lg-6">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class=" form-control has-feedback-left" id="companyname" placeholder="Company name"  name="companyname" readonly="">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                 
                                 
                                </div>

                                <div class="row form-group">
                                 
                                  <div class="col-lg-5">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Permit Number" name="permitNo">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>

                                  <div class="col-lg-3">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                      <input type="text" class="form-control has-feedback-left myDatePicker"  placeholder="Date" aria-describedby="inputSuccess2Status" name="nphFromDate" id="nphFromDate1">
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                  <div class="col-lg-4">                            
                                    <label class="control-label col-md-3 col-sm-1 col-xs-1" style="text-align: left;margin-left: 20px;margin-right: -20px;">To</label>
                                    <div class="col-md-9 col-sm-11 col-xs-11">
                                      <input type="text" class="form-control has-feedback-left"  placeholder="Date" aria-describedby="inputSuccess2Status2" name="nphToDate" id="nphToDate1" onclick="setDate1()">
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                 
                                </div>

                               

                              </div>                              


                              <div class="form-group">
                                <div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-5">
                                  <a href="np.php" class="btn btn-primary">Reset</a>
                                  <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                              </div>
                            </form>
                            <?php
                              if(isset($_REQUEST['errorCode']))
                              {
                                switch($_REQUEST['errorCode'])
                                {
                                  case 4: 
                                    echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! This Vehicle is not register with us. Please enter correct one.</div>";
                                    break; 
                                  case 5: 
                                    echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! Same details already exist.</div>";
                                    break;  
                                  case 8: 
                                    echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! Same permit No already exist.</div>";
                                    break;                                                      
                                        
                                }
                              }    
                            ?>   

                           

                          </div>






                          <div role="tabpanel" <?php if(isset($_REQUEST['tab'])){echo "class='tab-pane fade active in'";}else{echo "class='tab-pane fade'";}?>  id="tab_content2" aria-labelledby="profile-tab">
                            <form id="frm_insert1" class="form-horizontal form-label-left input_mask" action="data/dataNPD.php" method="post">
                              <input type="hidden" value="insert" name="action" id="action">



                              <div>                      
                                <div class="row form-group">
                                   <div class="col-lg-3">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class=" form-control has-feedback-left" id="vehicleNo1" placeholder="Vehicle Number"  name="vehicleNo" readonly="">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                  <div class="col-lg-3">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class=" form-control has-feedback-left" id="rcname1" placeholder="RC name"  name="rcname" readonly="">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                    <div class="col-lg-6">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class=" form-control has-feedback-left" id="companyname1" placeholder="Company name"  name="companyname1" readonly="">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                  
                                 
                                </div>

                                <div class="row form-group">
                                  
                                  <div class="col-lg-5">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class="form-control has-feedback-left nphFinder"  placeholder="Permit Number" name="permitNo" id="npdPermitNo">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>

                                  <div class="col-lg-3">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class="form-control has-feedback-left myDatePicker"  placeholder="Date" aria-describedby="inputSuccess2Status4" name="npdFromDate" id="npdFromDate3">
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                  <div class="col-lg-4">                            
                                    <label class="control-label col-md-3 col-sm-1 col-xs-1" style="text-align: left;margin-left: 20px;margin-right: -20px;">To</label>
                                    <div class="col-md-8 col-sm-11 col-xs-11">
                                      <input type="text" class="form-control has-feedback-left "  placeholder="Date" aria-describedby="inputSuccess2Status5" name="npdToDate" id="npdToDate3" onclick="setDate2()">
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status5" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                 
                                </div>

                               

                                <div class="row form-group">
                                  <div class="col-lg-6">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Transaction ID" name="draftNo">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">                            
                                    <label class="control-label col-md-3 col-sm-2 col-xs-2" style="text-align: left;">Draft Date</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                      <input type="text" class="form-control has-feedback-left myDatePicker"  placeholder="Date" aria-describedby="inputSuccess2Status6" name="draftDate">
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status6" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                </div>

                                <div class="row form-group">
                                  <div class="col-lg-6">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Bank Name" name="bankName">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="col-md-12 col-sm-12 col-xs-12">                              
                                      <select class="form-control" name="state">
                                        <?php echo $dbFunction->getStateNamesAsOptions();?>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row form-group">
                                  <div class="col-lg-6">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                       <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Amount" name="amount">
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="col-md-12 col-sm-12 col-xs-12">                              
                                      
                                    </div>
                                  </div>
                                </div>

                              </div>  


                              <div class="form-group">
                                <div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-5">
                                  <a href="np.php" class="btn btn-primary">Reset</a>
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
                                    echo "<div class='alert alert-warning' style='font-size:18px;'>Warning! This Vehicle is not register with us. Please enter correct one.</div>";
                                    break; 
                                  case 2: 
                                    echo "<div class='alert alert-warning' style='font-size:18px;'>Warning! Please enter correct permit number.</div>";
                                    break; 
                                  case 3: 
                                    echo "<div class='alert alert-warning' style='font-size:18px;'>Warning! Please enter correct permit number and vehicle number.</div>";
                                    break;
                                  case 6: 
                                    echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! Same details already exist.</div>";
                                    break;     
                                     case 7: 
                                    echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! Same Bank Draft No already exist.</div>";
                                    break;                          
                                        
                                }
                              }    
                            ?>   
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
                      <h2>National Permit Records<small>managenational permit details</small></h2>
                      <ul class="nav panel_toolbox ">
                        <li><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                        </li>                     
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation"  <?php if(isset($_REQUEST['tab'])){echo "class=''";}else{echo "class='active'";}?>><a href="#tab_content1_1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">National Permit Records</a>
                          </li>
                          <li role="presentation" <?php if(isset($_REQUEST['tab'])){echo "class='active'";}else{echo "class=''";}?>><a href="#tab_content2_1" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Authorisation Records</a>
                          </li>
                          
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" <?php if(isset($_REQUEST['tab'])){echo "class='tab-pane fade'";}else{echo "class='tab-pane fade active in'";}?> id="tab_content1_1" aria-labelledby="home-tab">

                                      <table id="datatable-buttons1" class="table table-striped table-bordered" style="" width="100%" height="100%">
                                      <thead>
                                      <tr>
                                     
                                      <th>ID</th>
                                      <th>Vehicle No</th>
                                      <th>Permit No</th>
                                      <th>Permit Date</th>
                                      <th>Expiry Date</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                      </tr>
                                      </thead>
                                      </table>  
                            
                          </div>


                          <div role="tabpanel" <?php if(isset($_REQUEST['tab'])){echo "class='tab-pane fade active in'";}else{echo "class='tab-pane fade'";}?> id="tab_content2_1" aria-labelledby="profile-tab">
                             <table id="datatable-buttons" class="table table-striped table-bordered" style="" width="100%" height="100%">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Vehicle No</th>
                            <th>Permit No</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Transaction ID</th>
                            <th>Bank Draft Date</th>
                            <th>Bank Name</th>
                            <th>State</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
         
                            
                          </tr>
                        </thead>
                      </table>  
                          </div>
                         
                        </div>
                      </div>

                      
                    </div>
                  </div>
                </div>
              </div>



            
        </div>
        <!-- /page content -->
  <div id="edit_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit NP Details</h4>
            </div>
          
            <div class="modal-body">
                 <form method="post" id="frm_edit" action="data/dataNPD.php" method="post">
                  <input type="hidden" value="update" name="action" id="action">
                  <input type="hidden" value="0" name="edit_id" id="edit_id">
                  <div class="form-group">
                    <label for="vehVehicleNo" class="control-label">Vehicle No:</label>
                    <input type="text" class="form-control vehicleFinder" id="vehVehicleNo" name="vehVehicleNo"/>
                  </div>
                  <div class="form-group">
                    <label for="nphPermitNo" class="control-label">Permit No:</label>
                    <input type="text" class="form-control nphFinder" id="nphPermitNo" name="nphPermitNo"/>
                  </div>
                  
                  <div class="form-group">
                    <label for="npdFromDate" class="control-label">From Date:</label>
                    <input type="text" class="form-control" id="npdFromDate" name="npdFromDate"/>
                  </div>
                  <div class="form-group">
                    <label for="npdToDate" class="control-label">To Date:</label>
                    <input type="text" class="form-control" id="npdToDate" name="npdToDate"/>
                  </div>
                     <div class="form-group">
                    <label for="npdBankDraftNo" class="control-label">Transaction ID:</label>
                    <input type="text" class="form-control" id="npdBankDraftNo" name="npdBankDraftNo"/>
                  </div>
                   <div class="form-group">
                    <label for="npdBankDraftDate" class="control-label">Bank Draft Date:</label>
                    <input type="text" class="form-control" id="npdBankDraftDate" name="npdBankDraftDate"/>
                  </div>
                  <div class="form-group">
                    <label for="npdBankName" class="control-label">Bank Name:</label>
                    <input type="text" class="form-control" id="npdBankName" name="npdBankName"/>
                  </div>

                  <div class="form-group">

                   <label for="stState" class="control-label">State:</label>
                   <select class="form-control" name="state">
                      <?php echo $dbFunction->getStateNamesAsOptions();?>
                    </select>
                  </div>
                     <div class="form-group">
                   <label for="npdAmount" class="control-label">Amount:</label>
                    <input type="text" class="form-control" id="npdAmount" name="npdAmount"/>
                  </div>
                     
                   <div class="form-group">
                    <label for="npdRenewed" class="control-label">Renewed:</label>
                    <!-- <input type="text" class="form-control" id="npdRenewed" name="npdRenewed"/> -->
                    <select class="form-control" id="npdRenewed" name="npdRenewed">                          
                      <?php  echo $dbFunction->getRenewedDropDown();?>
                    </select>
                  </div>
                              
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_edit" class="btn btn-primary">Save</button>
            </div>
      </form>
            </div>
        </div>
    </div>
</div>
   
 <div id="edit_model1" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit NP Header Details</h4>
            </div>
         
            <div class="modal-body">
                 <form method="post" id="frm_edit1" action="data/dataNPH.php" method="post">
                  <input type="hidden" value="update" name="action" id="action">
                  <input type="hidden" value="0" name="edit_id" id="edit_id1">
                   <div class="form-group">
                    <label for="vehVehicleNo" class="control-label">Vehicle No:</label>
                    <input type="text" class="form-control vehicleFinder" id="vehVehicleNo1" name="vehVehicleNo"/>
                  </div>
                  <div class="form-group">
                   <label for="nphPermitDate" class="control-label">Permit Date:</label>
                    <input type="text" class="form-control" id="nphPermitDate1" name="nphPermitDate"/>
                  </div>
                     <div class="form-group">
                   <label for="nphExpiryDate" class="control-label">Expiry Date:</label>
                    <input type="text" class="form-control" id="nphExpiryDate1" name="nphExpiryDate"/>
                  </div>
                   
                     <div class="form-group">
                    <label for="nphPermitNo" class="control-label">Permit No:</label>
                    <input type="text" class="form-control" id="nphPermitNo1" name="nphPermitNo"/>
                  </div>
                  <div class="form-group">
                    <label for="nphRenewed1" class="control-label">Renewed:</label>
                    <!-- <input type="text" class="form-control" id="nphRenewed1" name="nphRenewed"/> -->
                    <select class="form-control" id="nphRenewed1" name="nphRenewed1">                          
                      <?php  echo $dbFunction->getRenewedDropDown();?>
                    </select>
                  </div>
                              
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_edit" class="btn btn-primary">Save</button>
            </div>
      </form>
            </div>
        </div>
    </div>
</div>
   <!-- Delete Confirm Modal --> 
        <?php  echo $masterPageObj->getDeleteConfirmModal();?> 

        <div id='confirm1' class='modal fade'>
          <div class='modal-dialog'>
              <div class='modal-content'>
                <div class='modal-header' style='border: none;'>                      
                  <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                  <h4 class='modal-title'>Delete Record ?<p id='npdCount' style="font-size: 14px;"></p></h4>
                </div>

                <div class='modal-footer' style='border: none;'>
                  <button type='button' data-dismiss='modal' class='btn btn-primary' id='delete'>Delete</button>
                  <button type='button' data-dismiss='modal' class='btn'>Cancel</button>
                </div>
              </div>
          </div>
        </div>


        <!-- Footer -->
        <?php  echo $masterPageObj->getFooter();?>        
      </div>
    </div>

    <!-- jQuery Section -->
	 <?php  echo $masterPageObj->getjQuerySection();?>



  </body>
</html>




<script>
  $(document).ready(function() {
    $('input.nphFinder').typeahead({
        name: 'nphFinder',
        remote: 'data/searchNph.php?query=%QUERY'
      });
  })
</script>

<script>
      $(document).ready(function() {
        var uid= '<?php echo $_SESSION['uid'] ;?>';
     
        if(uid==1){

              var handleDataTableButtons = function() {
              if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({ "pageLength": 30,
                  dom: "Bfrtip",
                  buttons: [ {
                    extend: 'print',
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' )
                            .css('background','white');
  
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                          $(win.document.body).find( 'table' )
                         .find('td:last-child, th:last-child').remove();
                         }, title: 'Himmatbhai Atha & Co.'
                     
                }],
        "ajax": {
         "url": "data/dataNPD.php",
          "dataSrc": ""
        },
        "columns": [
          { "data": "npdID" },       
          { "data": "vehVehicleNo" }, 
          { "data": "nphPermitNo" }, 
          { "data": "npdFromDate" },
          { "data": "npdToDate" },
          { "data": "npdBankDraftNo" },
          { "data": "npdBankDraftDate" },        
          { "data": "npdBankName" },
          { "data": "stState" },    
          { "data": "npdAmount" },  
          { "data": "npdRenewed" },   
      
          { "data": "action" }
                   
        ],
                  responsive: true
                });
              }
            };
          }else{
         
            var handleDataTableButtons = function() {
              if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({ "pageLength": 30,
                  dom: "Bfrtip",
                  buttons: [ {
                    extend: 'print',
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' )
                            .css('background','white');
                           
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                          $(win.document.body).find( 'table' )
                         .find('td:last-child, th:last-child').remove();
                         }, title: 'Himmatbhai Atha & Co.'
                     
                }],
        "ajax": {
        "url": "data/dataNPD.php",
          "dataSrc": ""
        },
        "columns": [
         { "data": "npdID" },       
          { "data": "vehVehicleNo" }, 
          { "data": "nphPermitNo" }, 
          { "data": "npdFromDate" },
          { "data": "npdToDate" },
          { "data": "npdBankDraftNo" },
          { "data": "npdBankDraftDate" },        
          { "data": "npdBankName" },
          { "data": "stState" },    
          { "data": "npdAmount" },  
          { "data": "npdRenewed" },   
        
          { "data": "action",  "visible": false }
                   
        ],
                  responsive: true
                });
              }
            };
         }
        handleDataTableButtons();
        
      });
     
    </script>
<script>
      $(document).ready(function() {
        var uid= '<?php echo $_SESSION['uid'] ;?>';
     
        if(uid==1){

              var handleDataTableButtons1 = function() {
              if ($("#datatable-buttons1").length) {
                $("#datatable-buttons1").DataTable({ "pageLength": 30,
                  dom: "Bfrtip",
                  buttons: [ {
                    extend: 'print',
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' )
                            .css('background','white');
  
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                          $(win.document.body).find( 'table' )
                         .find('td:last-child, th:last-child').remove();
                         }, title: 'Himmatbhai Atha & Co.'
                     
                }],
        "ajax": {
        "url": "data/dataNPH.php",
          "dataSrc": ""
        },

       "columns": [
          { "data": "nphID" },      
          { "data": "vehVehicleNo" },
          { "data": "nphPermitNo" },
          { "data": "nphPermitDate" },
          { "data": "nphExpiryDate" },  
          { "data": "nphRenewed" },    
          { "data": "action" }
                   
        ],
                  responsive: true
                });
              }
            };
          }else{
         
            var handleDataTableButtons1 = function() {
              if ($("#datatable-buttons1").length) {
                $("#datatable-buttons1").DataTable({ "pageLength": 30,
                  dom: "Bfrtip",
                  buttons: [ {
                    extend: 'print',
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' )
                            .css('background','white');
                         
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                          $(win.document.body).find( 'table' )
                         .find('td:last-child, th:last-child').remove();
                         }, title: 'Himmatbhai Atha & Co.'
                     
                }],
        "ajax": {
       "url": "data/dataNPH.php",
          "dataSrc": ""
        },

       "columns": [
          { "data": "nphID" },       
          { "data": "vehVehicleNo" },
          { "data": "nphPermitNo" },
          { "data": "nphPermitDate" },
          { "data": "nphExpiryDate" }, 
          { "data": "nphRenewed" },    
          { "data": "action",  "visible": false }
                   
        ],
                  responsive: true
                });
              }
            };
         }
        handleDataTableButtons1();
        setDate1();
        setDate2();
      });
     
    </script>



   <script>
  function conform(id)
  {
      $('#confirm').modal({
            backdrop: 'static',
            keyboard: false
          })
          .one('click', '#delete', function(e) {
           $.ajax({
              type: 'POST',
              url: 'data/dataNPD.php',
              data: {  
                'id': id,
                'action': 'delete',
              },
              success: function(data){
                location.replace("np.php?tab=2");
              }
          });
      });
  }
  function editForm(id)
  {

    $('#edit_model').modal('show'); 
      $.ajax({
        type: 'POST',
        url: 'data/dataNPD.php',
        data: { 
          'id': id,
          'action': 'view1',
        },
        success: function(data){
          console.log(data);
     

          var objJSON = JSON.parse(data);
             
          $("#npdAmount").val(objJSON.npdAmount);
          $("#npdBankDraftNo").val(objJSON.npdBankDraftNo);
          setDate('#npdBankDraftDate',objJSON.npdBankDraftDate);//$("#npdBankDraftDate").val(objJSON.npdBankDraftDate);
          $("#npdBankName").val(objJSON.npdBankName);
          setDate('#npdFromDate',objJSON.npdFromDate);//$("#npdFromDate").val(objJSON.npdFromDate);
          setDate('#npdToDate',objJSON.npdToDate);//$("#npdToDate").val(objJSON.npdToDate);
          //$("#npdRenewed").val(objJSON.npdRenewed);
          $("#nphPermitNo").val(objJSON.nphPermitNo);
          $("#vehVehicleNo").val(objJSON.vehVehicleNo);
          $("#stState").val(objJSON.stState);
          $("#edit_id").val(id);

          if(objJSON.npdRenewed=="Not Renewed")
          {
            document.getElementById("npdRenewed").selectedIndex=1;
          }
          else{
            document.getElementById("npdRenewed").selectedIndex=0;
          }
          $('#npdToDate').datepicker({
                format: "dd-mm-yyyy",
                todayHighlight: true,
                startDate: objJSON.npdFromDate,
                autoclose: true
            });

            $('#npdToDate').datepicker('setDate', objJSON.npdToDate);
        }
    }); 
  }
  </script>


  <script>
  function conform1(id,npdCount)
  {
    console.log(npdCount);
    if(npdCount>0)
    {
       $("#npdCount").text("This record is link with "+npdCount+" NP-Authorization records.If you delete this then NP-Authorization record will be remove.");
    }
   
      $('#confirm1').modal({
            backdrop: 'static',
            keyboard: false
          })
          .one('click', '#delete', function(e) {
           $.ajax({
              type: 'POST',
              url: 'data/dataNPH.php',
              data: { 
                'id': id,
                'action': 'delete',
              },
              success: function(data){
                location.replace("np.php");
              }
          });
      });
  }
  function editForm1(id)
  {
    console.log(id);
    $('#edit_model1').modal('show'); 
      $.ajax({
        type: 'POST',
        url: 'data/dataNPH.php',
        data: { 
          'id': id,
          'action': 'view1',
        },
        success: function(data){
          console.log(data);
     

          var objJSON = JSON.parse(data);
         
          $("#nphPermitNo1").val(objJSON.nphPermitNo);
          setDate('#nphPermitDate1',objJSON.nphPermitDate);//$("#nphPermitDate").val(objJSON.nphPermitDate);
        //  setDate('#nphExpiryDate1',objJSON.nphExpiryDate);//$("#nphExpiryDate").val(objJSON.nphExpiryDate);
          $("#vehVehicleNo1").val(objJSON.vehVehicleNo);
          //$("#nphRenewed1").val(objJSON.nphRenewed);
         $("#edit_id1").val(objJSON.nphID);

         if(objJSON.nphRenewed=="Not Renewed")
          {
            document.getElementById("nphRenewed1").selectedIndex=1;
          }
          else{
            document.getElementById("nphRenewed1").selectedIndex=0;
          }
           $('#nphExpiryDate1').datepicker({
                format: "dd-mm-yyyy",
                todayHighlight: true,
                startDate: objJSON.nphPermitDate,
                autoclose: true
            });

            $('#nphExpiryDate1').datepicker('setDate', objJSON.nphExpiryDate);
                
        }
    }); 
  }
  </script>
 <script>
    function setDate1()
  {  
      
     var tempDate = document.getElementById('nphFromDate1').value;
   
      if(tempDate!=''){
            $('#nphToDate1').datepicker({
                format: "dd-mm-yyyy",
                todayHighlight: true,
                startDate: tempDate,
                autoclose: true
            });

            $('#nphToDate1').datepicker('setDate', tempDate);
      }
   
  }
   
</script>
 <script>
    function setDate2()
  {  

      
     var tempDate = document.getElementById('npdFromDate3').value;
  
      if(tempDate!=''){
            $('#npdToDate3').datepicker({
                format: "dd-mm-yyyy",
                todayHighlight: true,
                startDate: tempDate,
                autoclose: true
            });

            $('#npdToDate3').datepicker('setDate', tempDate);
      }
   
  }
   
</script>


  <script type="text/javascript">
    $('#vehicleNo').on('input change keydown keypress keyup mousedown click mouseup', function() { 
        var a=document.getElementById('vehicleNo').value;
        $.ajax({
              type: 'POST',
              url: 'data/dataGreenTax.php',
              data: { 
                'vehicleNo': a,
                'action': 'getRC',
              },
              success: function(data){
               var objJSON = JSON.parse(data);
               document.getElementById('rcname').value=objJSON.name;
              
              }
          });
});
  </script>

    <script type="text/javascript">
    $('#vehicleNo1').on('input change keydown keypress keyup mousedown click mouseup', function() { 
        var a=document.getElementById('vehicleNo1').value;
        $.ajax({
              type: 'POST',
              url: 'data/dataGreenTax.php',
              data: { 
                'vehicleNo': a,
                'action': 'getRC',
              },
              success: function(data){
               var objJSON = JSON.parse(data);
               document.getElementById('rcname1').value=objJSON.name;
              
              }
          });
});
  </script>
      <script type="text/javascript">
    $('#vehicleNo').on('input change keydown keypress keyup mousedown click mouseup', function() { 
    
        var a=document.getElementById('vehicleNo').value;
        
        $.ajax({
              type: 'POST',
              url: 'data/dataGreenTax.php',
              data: { 
                'vehicleNo': a,
                'action': 'getComName',
              },
              success: function(data){
               var objJSON = JSON.parse(data);
              
               document.getElementById('companyname').value=objJSON.name;
              
              }
          });
});
  </script>
     <script type="text/javascript">
    $('#vehicleNo1').on('input change keydown keypress keyup mousedown click mouseup', function() { 
    
        var a=document.getElementById('vehicleNo1').value;
        
        $.ajax({
              type: 'POST',
              url: 'data/dataGreenTax.php',
              data: { 
                'vehicleNo': a,
                'action': 'getComName',
              },
              success: function(data){
               var objJSON = JSON.parse(data);
              
               document.getElementById('companyname1').value=objJSON.name;
              
              }
          });
});
  </script>



    <script type="text/javascript">
    $('#npdPermitNo').on('input change keydown keypress keyup mousedown click mouseup', function() { 
      
         var a=document.getElementById('npdPermitNo').value;
         if(a!='')
         {
          $.ajax({
                type: 'POST',
                url: 'data/dataNPD.php',
                data: { 
                  'ggg': a,
                  'action': 'getRC_COMP_VEH',
                },
                success: function(data){
                 var objJSON = JSON.parse(data);
                 document.getElementById('vehicleNo1').value=objJSON.vehNo;
                 document.getElementById('rcname1').value=objJSON.rcname;
                 document.getElementById('companyname1').value=objJSON.coname;
                
                }
            });
         }
         
});
  </script>