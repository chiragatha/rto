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
                      <h2>T.O/NOC <small>add T.O/NOC details</small></h2>
                      <ul class="nav panel_toolbox ">
                        <li><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                        </li>                     
                      </ul>
                      
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">

                        <li role="presentation" class='active'><a href="#tab_content1" role="tab" id="tab1" data-toggle="tab" aria-expanded="false">T.O</a>
                        </li>
                        <li role="presentation" ><a href="#tab_content2" role="tab" id="tab2" data-toggle="tab" aria-expanded="false">NOC</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class='tab-pane fade active in'  id="tab_content1" aria-labelledby="tab1">
                            <form target="_blank" action="toNocPrint.php" method="post">
                              <input type="hidden" value="1" name="ch" id="action">
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
                                      <select class="form-control" name="coComapny" id="emailCompany">                          
                                              <?php echo $dbFunction->getCompanyNamesAsOptions();?>
                                            </select>
                                     
                                    </div>
                                   
                                  </div>
                                  <div class="col-lg-6">
                                     <div class="col-md-12 col-sm-8 col-xs-12">
                                    <select class="form-control" name="vehVehicleNo" id="emailVehicle">                          
                                              <?php echo $dbFunction->getVehicleNoByComapnyAsOptions(1);?>
                                            </select>
                                     
                                    </div>
                                  </div>
                                </div>
                                </div>

                                 <div class="form-group">
                                        <div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-5">
                                          <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                      </div>
                              </form>

                           

                            
                        </div>

                        <div role="tabpanel" class='tab-pane fade' id="tab_content2" aria-labelledby="tab2">
                            <form target="_blank" action="toNocPrint.php" method="post">
                              <input type="hidden" value="2" name="ch" id="action">
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
                                      <select class="form-control" name="coComapny" id="emailCompany1">                          
                                              <?php echo $dbFunction->getCompanyNamesAsOptions();?>
                                            </select>
                                     
                                    </div>
                                   
                                  </div>
                                  <div class="col-lg-6">
                                     <div class="col-md-12 col-sm-8 col-xs-12">
                                    <select class="form-control" name="vehVehicleNo" id="emailVehicle1">                          
                                              <?php echo $dbFunction->getVehicleNoByComapnyAsOptions(1);?>
                                            </select>
                                     
                                    </div>
                                  </div>
                                </div>
                                </div>

                                 <div class="form-group">
                                        <div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-5">
                                          <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                      </div>
                              </form>

                        </div>

                        <?php
                        if(isset($_REQUEST['errorCode']))
                        {
                          switch($_REQUEST['errorCode'])
                          {
                            
                            case 1: 
                              echo "<div class='alert alert-danger' style='margin-top:30px;font-size:18px;'>Fail! Please choose vehicle Number.</div>";
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


              <div class="row">
                <div class="col-md-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>T.O/NOC Records <small>manage T.O/NOC details</small></h2>
                      <ul class="nav panel_toolbox ">
                        <li><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                        </li>                     
                      </ul>
                      
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">

                        <li role="presentation" class='active'><a href="#tab_content3" role="tab" id="tab3" data-toggle="tab" aria-expanded="false">T.O</a>
                        </li>
                        <li role="presentation" ><a href="#tab_content4" role="tab" id="tab4" data-toggle="tab" aria-expanded="false">NOC</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class='tab-pane fade active in'  id="tab_content3" aria-labelledby="tab1">
                            <table id="datatable-buttons" class="table table-striped table-bordered" style="" width="100%" height="100%">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                   <th>Company</th>
                                  <th>Vehicle Number</th>
                                  <th>Chassis Number</th>
                                  <th>Engine Number</th>
                                  <th>Model</th>
                                  <th>Make</th>
                                  <th>Registration Date</th>
                                  <th>RMA Date</th>
                                  <th>Hypothecation</th>
                                  <th>RLW</th>
                                  <th>UW</th>
                                  <th>PL</th>
                                  <th>Remarks</th>
                                 
                                  <th>Action</th>
                                </tr>
                              </thead>
                            </table> 
                        </div>

                        <div role="tabpanel" class='tab-pane fade' id="tab_content4" aria-labelledby="tab2">
                             <table id="datatable-buttons1" class="table table-striped table-bordered" style="" width="100%" height="100%">
                        <thead>
                          <tr>
                            <th>ID</th>
                             <th>Company</th>
                            <th>Vehicle Number</th>
                            <th>Chassis Number</th>
                            <th>Engine Number</th>
                            <th>Model</th>
                            <th>Make</th>
                            <th>Registration Date</th>
                            <th>RMA Date</th>
                            <th>Hypothecation</th>
                            <th>RLW</th>
                            <th>UW</th>
                            <th>PL</th>
                            <th>Remarks</th>
                           
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


        <!-- Delete Confirm Modal --> 
        <?php  echo "
        <div id='confirmTO' class='modal fade'>
          <div class='modal-dialog'>
              <div class='modal-content'>
                <div class='modal-header' style='border: none;'>                      
                  <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                  <h4 class='modal-title'>Undo T.O. ?</h4>
                </div>

                <div class='modal-footer' style='border: none;'>
                  <button type='button' data-dismiss='modal' class='btn btn-primary' id='delete'>Yes</button>
                  <button type='button' data-dismiss='modal' class='btn'>No</button>
                </div>
              </div>
          </div>
        </div>
      ";?> 
      <?php  echo "
        <div id='confirmNOC' class='modal fade'>
          <div class='modal-dialog'>
              <div class='modal-content'>
                <div class='modal-header' style='border: none;'>                      
                  <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                  <h4 class='modal-title'>Undo NOC ?</h4>
                </div>

                <div class='modal-footer' style='border: none;'>
                  <button type='button' data-dismiss='modal' class='btn btn-primary' id='delete'>Yes</button>
                  <button type='button' data-dismiss='modal' class='btn'>No</button>
                </div>
              </div>
          </div>
        </div>
      ";?> 




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
            "type": 'POST',
            "url": 'data/dataToNoc.php',
            "data": { 
              'action': 'getRecordsTO',
            },
              "dataSrc": ""
            },
 
        "columns": [
          { "data": "vehID" },
          { "data": "coCompany" },
          { "data": "vehVehicleNo" },
          { "data": "vehChassisNo" },
          { "data": "vehEngineNo" },
          { "data": "vehModel" },
          { "data": "vehMake" },
          { "data": "vehRegistrationDate" },
          { "data": "vehRMADate" },
          { "data": "vehHypothecation" },
          { "data": "vehRLW" },
          { "data": "vehUW" },
          { "data": "vehPL" },
          { "data": "vehRemarks" },
         
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
            "type": 'POST',
            "url": 'data/dataToNoc.php',
            "data": { 
              'action': 'getRecordsTO',
            },
              "dataSrc": ""
            },
 
        "columns": [
          { "data": "vehID" },
           { "data": "coCompany" },
          { "data": "vehVehicleNo" },
          { "data": "vehChassisNo" },
          { "data": "vehEngineNo" },
          { "data": "vehModel" },
          { "data": "vehMake" },
          { "data": "vehRegistrationDate" },
          { "data": "vehRMADate" },
          { "data": "vehHypothecation" },
          { "data": "vehRLW" },
          { "data": "vehUW" },
          { "data": "vehPL" },
          { "data": "vehRemarks" },
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
            "type": 'POST',
            "url": 'data/dataToNoc.php',
            "data": { 
              'action': 'getRecordsNOC',
            },
              "dataSrc": ""
            },
 
        "columns": [
          { "data": "vehID" },
          { "data": "coCompany" },
          { "data": "vehVehicleNo" },
          { "data": "vehChassisNo" },
          { "data": "vehEngineNo" },
          { "data": "vehModel" },
          { "data": "vehMake" },
          { "data": "vehRegistrationDate" },
          { "data": "vehRMADate" },
          { "data": "vehHypothecation" },
          { "data": "vehRLW" },
          { "data": "vehUW" },
          { "data": "vehPL" },
          { "data": "vehRemarks" },
         
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
            "type": 'POST',
            "url": 'data/dataToNoc.php',
            "data": { 
              'action': 'getRecordsNOC',
            },
              "dataSrc": ""
            },
 
        "columns": [
          { "data": "vehID" },
           { "data": "coCompany" },
          { "data": "vehVehicleNo" },
          { "data": "vehChassisNo" },
          { "data": "vehEngineNo" },
          { "data": "vehModel" },
          { "data": "vehMake" },
          { "data": "vehRegistrationDate" },
          { "data": "vehRMADate" },
          { "data": "vehHypothecation" },
          { "data": "vehRLW" },
          { "data": "vehUW" },
          { "data": "vehPL" },
          { "data": "vehRemarks" },
          { "data": "action",  "visible": false }
         
        ],
                  responsive: true
                });
              }
            };
         }
        handleDataTableButtons1();
        
      });
     
    </script>
   <script>
  function conformTO(id)
  {
      $('#confirmTO').modal({
            backdrop: 'static',
            keyboard: false
          })
          .one('click', '#delete', function(e) {
           $.ajax({
              type: 'POST',
              url: 'data/dataToNOC.php',
              data: { 
                'id': id,
                'action': 'updateTO',
              },
              success: function(data){
                location.replace("toNoc.php");
              }
          });
      });
  }

  </script>

     <script>
  function conformNOC(id)
  {
      $('#confirmNOC').modal({
            backdrop: 'static',
            keyboard: false
          })
          .one('click', '#delete', function(e) {
           $.ajax({
              type: 'POST',
              url: 'data/dataToNOC.php',
              data: { 
                'id': id,
                'action': 'updateNOC',
              },
              success: function(data){
                location.replace("toNoc.php");
              }
          });
      });
  }

  </script>

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

<script type="text/javascript">
  $('#emailCompany1').change(function() {
    var id = $(this).val(); //get the current value's option
    $.ajax({
        type:'POST',
        url:'data/dataEmail.php',
        data:{'id':id},
        success:function(data){
            $("#emailVehicle1").html(data);
        }
    });
});
</script>