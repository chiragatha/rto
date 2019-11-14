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
                      <h2>Vehicle <small>add vehicle details</small></h2>
                      <ul class="nav panel_toolbox ">
                        <li><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                        </li>                     
                      </ul>
                      
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                      <form class="form-horizontal form-label-left input_mask" action="data/dataVehicle.php" method="post" id="frm_insert">
                      <input type="hidden" value="insert" name="action" id="action">
                      <div>
                        <div class="row form-group">
                          <div class="col-lg-6">
                            <div class="col-md-12 col-sm-12 col-xs-12">                              
                                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Vehicle Number" name="vehicleNo">
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                              </div>
                             
                            </div>
                          <div class="col-lg-6">
                             <div class="col-md-12 col-sm-8 col-xs-12">
                                <select class="form-control" name="insCompany">                          
                                      <?php echo $dbFunction->getCompanyNamesAsOptions();?>
                                </select>                             
                            </div>
                          </div>
                        </div>

                        <div class="row form-group">
                          <div class="col-lg-6">
                            <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class=" form-control has-feedback-left rcHolderFinder" id="rcname" placeholder="RC name"  name="rcname">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                             
                            </div>
                          <div class="col-lg-6">
                              <div class="col-md-12 col-sm-8 col-xs-12">
                                  <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Chassis Number" name="chassisNo">
                                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                   
                                  </div>
                          </div>
                        </div>

                        <div class="row form-group">
                                
                                <div class="col-lg-6">
                                  <div class="col-md-12 col-sm-12 col-xs-12">                              
                                    <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Engine Number" name="engineNo">
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                                </div>
                                <div class="col-lg-3">
                            <div class="col-md-12 col-sm-8 col-xs-12">
                             <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Model" name="model">
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="col-md-12 col-sm-12 col-xs-12">                              
                              <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Make & type of body" name="make">
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                          </div>
                              </div>

                       

                        <div class="row form-group">
                          <div class="col-lg-6">
                            <div class="col-md-12 col-sm-8 col-xs-12">
                              <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Hypothecation" name="hypothecation">
                              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" style="text-align: left;">Registration Date</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                      <input type="text" class="form-control has-feedback-left myDatePicker" id="single_cal1" placeholder="Date" aria-describedby="inputSuccess2Status" name="registrationDate">
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>
                          </div>
                        </div>

                                <div class="row form-group">
                                  <div class="col-lg-6">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-2 " style="text-align: left;">RMA Date </label>
                                        
                                    <div class="col-md-10 col-sm-10 col-xs-10 checkbox-inline">
                                     <input type="checkbox" name="rmaCheck" value="check" id="rmaCheck" />
                                        <input type="text" class="form-control has-feedback-left myDatePicker" id="rmaDate" placeholder="Date" aria-describedby="inputSuccess2Status2" name="rmaDate" style="margin-top:-7px" />
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true" value="00-00-0000"></span>
                                      <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                  
                                  <div class="col-lg-6">                            
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                     <input type="text" class="form-control has-feedback-left" id="rlw" placeholder="RLW" name="rlw">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                </div>

                                <div class="row form-group">
                                  <div class="col-lg-6">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                     <input type="text" class="form-control has-feedback-left" id="uw" placeholder="UW" name="uw">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="col-md-12 col-sm-12 col-xs-12">                              
                                      <input type="text" class="form-control has-feedback-left" id="pl" placeholder="PL" name="pl" readonly>
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                </div>


                              <div class="row form-group">
                                <div class="col-lg-12">
                                  <div class="col-md-12 col-sm-8 col-xs-12">
                                    <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Remarks" name="remarks">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                  </div>
                                </div>
                                
                                

                              </div>

                               

                      </div>

                      <div class="form-group">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-5">
                          <a href="vehicle.php" class="btn btn-primary">Reset</a>
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
                              echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! This ( ".$_REQUEST['chassisNo']." ) Chassis Number found with another vehicle ( " .$_REQUEST['vehicleNo']. " )</div>";
                              break;
                            case 2: 
                              echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! This Vehicle is already register with us. Please Eenter correct one.</div>";
                              break;
                            case 3: 
                              echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! This Vehicle is already register with us, And This ( ".$_REQUEST['chassisNo']." ) Chassis Number found with another vehicle ( " .$_REQUEST['vehicleNo']. " )</div>";
                              break;  
                            case 4: 
                              echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! chassis number and engine number could not be same";
                              break;
                              case 5: 
                              echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! This Engine No. is already register with us, Engine No. found with another vehicle ( " .$_REQUEST['vehicleNo']. " )</div>";
                              break;   

                              case 6: 
                              echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! Please Enter Correct RC Holder Name</div>";
                              break;     

                                  
                          }
                        }    
                      ?>   
                    </div>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Vehicle Records <small>manage vehicle details</small></h2>
                      <ul class="nav panel_toolbox ">
                        <li><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                        </li>                     
                      </ul>
                      
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="" width="100%" height="100%">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Vehicle Number</th>
                            <th>Company</th>
                            <th>RC Holder</th>
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
        <!-- /page content -->


        <div id="edit_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Vehicle Details</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_edit" action="data/dataVehicle.php">
                    <input type="hidden" value="update" name="action" id="action">
                    <input type="hidden" value="0" name="edit_id" id="edit_id">

                    <div class="form-group">
                     <label for="vehVehicleNo" class="control-label">Vehicle No:</label>
                      <input type="text" class="form-control" id="vehVehicleNo" name="vehVehicleNo"/>
                    </div>

                    <div class="form-group">
                      <label for="coCompany" class="control-label">Company:</label>
                      <!-- <input type="text" class="form-control" id="coCompany" name="coCompany"/> -->
                      <select class="form-control" id="coCompany" name="coCompany">                          
                                      <?php echo $dbFunction->getCompanyNamesAsOptions();?>
                                    </select>
                    </div>

                    <div class="form-group">
                      <label for="vehChassisNo" class="control-label">RC Holder</label><!-- 
                      <input type="text" class="form-control" id="vehRCholder" name="vehRCholder" readonly="" /> -->
                      <select class="form-control" id="vehRCholder" name="vehRCholder">                          
                                      <?php echo $dbFunction->getRCNamesAsOptions();?>
                                    </select>
                    </div>
                    
                       <div class="form-group">
                      <label for="vehChassisNo" class="control-label">Chassis No:</label>
                      <input type="text" class="form-control" id="vehChassisNo" name="vehChassisNo"/>
                    </div>
                    <div class="form-group">
                      <label for="vehEngineNo" class="control-label">Engine No:</label>
                      <input type="text" class="form-control" id="vehEngineNo" name="vehEngineNo"/>
                    </div>
                      <div class="form-group">
                      <label for="vehModel" class="control-label">Model:</label>
                      <input type="text" class="form-control" id="vehModel" name="vehModel"/>
                    </div>
                      <div class="form-group">
                      <label for="vehMake" class="control-label">Make:</label>
                      <input type="text" class="form-control" id="vehMake" name="vehMake"/>
                    </div>
                    <div class="form-group">
                      <label for="vehRegistrationDate" class="control-label">Registration Date:</label>
                      <input type="text" class="form-control" id="vehRegistrationDate" name="vehRegistrationDate"/>
                    </div>
                      <div class="form-group">
                      <label for="vehRMADate" class="control-label checkbox-inline"><input type="checkbox" name="rmaCheck" value="check" id="rmaCheck1" />RMA Date:</label>
                      <input type="text" class="form-control" id="vehRMADate" name="vehRMADate"/>
                    </div>
                    <div class="form-group">
                      <label for="vehHypothecation" class="control-label">Hypothecation:</label>
                      <input type="text" class="form-control" id="vehHypothecation" name="vehHypothecation"/>
                    </div>
                    <div class="form-group">
                      <label for="vehRLW" class="control-label">RLW:</label>
                      <input type="text" class="form-control" id="vehRLW" name="vehRLW"/>
                    </div>
                      <div class="form-group">
                      <label for="vehUW" class="control-label">UW:</label>
                      <input type="text" class="form-control" id="vehUW" name="vehUW"/>
                    </div>
                    <div class="form-group">
                      <label for="vehPL" class="control-label">PL:</label>
                      <input type="text" class="form-control" id="vehPL" name="vehPL" readonly/>
                    </div>
                     <div class="form-group">
                      <label for="vehRemarks" class="control-label">Remarks:</label>
                      <input type="text" class="form-control" id="vehRemarks" name="vehRemarks" />
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
          "url": "data/dataVehicle.php",
          "dataSrc": ""
        },
 
        "columns": [
          { "data": "vehID" },
          { "data": "vehVehicleNo" },
          { "data": "coCompany" },
          { "data": "vehRCname" },
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
          "url": "data/dataInsurance.php",
          "dataSrc": ""
        },

        "ajax": {
          "url": "data/dataVehicle.php",
          "dataSrc": ""
        },
 
        "columns": [
          { "data": "vehID" },
          { "data": "vehVehicleNo" },
          { "data": "coCompany" },
          { "data": "vehRCname" },
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

        $("#rmaDate").prop("readonly", true);
      $("#rmaDate").prop("disabled",true);

        $("#vehRMADate").prop("readonly", true);
      $("#vehRMADate").prop("disabled",true);
        
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
              url: 'data/dataVehicle.php',
              data: { 
                'id': id,
                'action': 'delete',
              },
              success: function(data){
                location.replace("vehicle.php");
              }
          });
      });
  }
  function editForm(id)
  {
    $('#edit_model').modal('show'); 
      $.ajax({
        type: 'POST',
        url: 'data/dataVehicle.php',
        data: { 
          'id': id,
          'action': 'view1',
        },
        success: function(data){
          console.log(data);
     

          var objJSON = JSON.parse(data);
            
          $("#vehVehicleNo").val(objJSON.vehVehicleNo);
          //$("#vehRCholder").val(objJSON.vehRCname);
          $("#vehChassisNo").val(objJSON.vehChassisNo);
          $("#vehEngineNo").val(objJSON.vehEngineNo);
          $("#vehModel").val(objJSON.vehModel);
          $("#vehMake").val(objJSON.vehMake);
          setDate('#vehRegistrationDate',objJSON.vehRegistrationDate);//$("#vehRegistrationDate").val(objJSON.vehRegistrationDate);
          setDate('#vehRMADate',objJSON.vehRMADate);//$("#vehRMADate").val(objJSON.vehRMADate);
          $("#vehHypothecation").val(objJSON.vehHypothecation);
          $("#vehRLW").val(objJSON.vehRLW);
           $("#vehUW").val(objJSON.vehRLW);
          $("#vehPL").val(objJSON.vehUW);
          $("#vehRemarks").val(objJSON.vehRemarks);
          //$("#coCompany").val(objJSON.coCompany);
          $("#edit_id").val(id);

          document.getElementById("coCompany").value=objJSON.coID;
          document.getElementById("vehRCholder").value=objJSON.rcID;
                
        }
    }); 
        
  }
$('#rmaCheck').click(function() {
    var value= $('#rmaCheck').prop('checked');
    
       
    if(value ==true){
             $("#rmaDate").prop("readonly", false);
     $("#rmaDate").prop("disabled",false);
     
       //  $("#rmaCheck").prop( "checked",false);
        
     
    }else{
   $("#rmaDate").prop("readonly", true);
      $("#rmaDate").prop("disabled",true);
     
         // $("#rmaCheck").prop( "checked",true);vehRMADate
    }
    
  
});


       $('#rmaCheck1').click(function() {
    var value= $('#rmaCheck1').prop('checked');
    
       
    if(value ==true){
             
          $("#vehRMADate").prop("readonly", false);
      $("#vehRMADate").prop("disabled",false);
       //  $("#rmaCheck").prop( "checked",false);
        
     
    }else{
   
        $("#vehRMADate").prop("readonly", true);
      $("#vehRMADate").prop("disabled",true);
         // $("#rmaCheck").prop( "checked",true);vehRMADate
    }
    
  
});

       $('#uw').keyup(function() {
      var pl = ($('#rlw').val()-$('#uw').val());
       //alert(pl);
        $('#pl').val(pl)
        
    });
       $('#vehRLW').keyup(function() {
      var pl = ($('#vehRLW').val()-$('#vehUW').val());
       //alert(pl);
        $('#vehPL').val(pl)
        
    });
        $('#vehUW').keyup(function() {
      var pl = ($('#vehRLW').val()-$('#vehUW').val());
       //alert(pl);
        $('#vehPL').val(pl)
        
    });
  </script>

  