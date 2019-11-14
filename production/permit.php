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
                      <h2>Permit <small>add permit details</small></h2>
                      <ul class="nav panel_toolbox ">
                        <li><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                        </li>                     
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                      <form id="frm_insert" class="form-horizontal form-label-left input_mask" action="data/dataPermit.php" method="post">
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
                                    <div class="col-md-12 col-sm-12 col-xs-12">                              
                                     <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Permit Number" name="permitNo">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>

                                  <div class="col-lg-3">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                      <input type="text" class="form-control has-feedback-left myDatePicker"  id="perFromDate1" placeholder="From Date" aria-describedby="inputSuccess2Status" name="perFromDate">
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                  <div class="col-lg-4">                            
                                    <label class="control-label col-md-3 col-sm-1 col-xs-1" style="text-align: left;margin-left: 20px;margin-right: -20px;">To</label>
                                    <div class="col-md-9 col-sm-11 col-xs-11">
                                      <input type="text" class="form-control has-feedback-left"  id="perToDate1" placeholder="To Date" aria-describedby="inputSuccess2Status2" name="perToDate" onclick="setDate1()">
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                </div>

                               
                        </div>

                      <div class="form-group">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-5">
                          <a href="permit.php" class="btn btn-primary">Reset</a>
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
                              echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! This Vehicle is not register with us. Please Eenter correct one.</div>";
                              break;    
                            case 2: 
                              echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! Same details already exist.</div>";
                              break;  
                             case 3: 
                              echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! Same Permit No already exist.</div>";
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
                      <h2>Permit Records <small>manage permit details</small></h2>
                      <ul class="nav panel_toolbox ">
                        <li><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                        </li>                     
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                       <table id="datatable-buttons" class="table table-striped table-bordered" style="" width="100%" height="100%">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>VehicleNo</th>
                            <th>Permit No</th>
                            <th>From Date</th>
                            <th>To Date</th>
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
        <!-- /page content -->



        <div id="edit_model" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">                      
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Permit Details</h4>
              </div>

              <div class="modal-body">
                <form method="post" id="frm_edit" action="data/dataPermit.php">
                  <input type="hidden" value="update" name="action" id="action">
                  <input type="hidden" value="0" name="edit_id" id="edit_id">
                  <div class="form-group">
                    <label for="vehVehicleNo" class="control-label">Vehicle No:</label>
                    <input type="text" class="form-control vehicleFinder" id="vehVehicleNo" name="vehVehicleNo"/>
                  </div>
                  <div class="form-group">
                    <label for="perPermitNo" class="control-label">Permit No:</label>
                    <input type="text" class="form-control" id="perPermitNo" name="perPermitNo"/>
                  </div>
                  <div class="form-group">
                    <label for="perFromDate" class="control-label">From Date:</label>
                    <input type="text" class="form-control" id="perFromDate" name="perFromDate"/>
                  </div>
                  <div class="form-group">
                    <label for="perToDate" class="control-label">To Date:</label>
                    <input type="text" class="form-control" id="perToDate" name="perToDate"/>
                  </div>
                     
                  <div class="form-group">
                  <label for="perRenewed" class="control-label">Renewed:</label>
                  <!-- <input type="text" class="form-control" id="perRenewed" name="perRenewed"/> -->
                  <select class="form-control" id="perRenewed" name="perRenewed">                          
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
          "url": "data/dataPermit.php",
          "dataSrc": ""
        },

        "columns": [
          { "data": "perID" },
          { "data": "vehVehicleNo" },
          { "data": "perPermitNo" },
          { "data": "perFromDate" },       
            { "data": "perToDate" },         
          { "data": "perRenewed" },        
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
          "url": "data/dataPermit.php",
          "dataSrc": ""
        },

        "columns": [
            { "data": "perID" },
          { "data": "vehVehicleNo" },
          { "data": "perPermitNo" },
          { "data": "perFromDate" },       
            { "data": "perToDate" },         
          { "data": "perRenewed" },
        { "data": "action",  "visible": false }
                   
        ],
              responsive: true
            });
          }
        };
    }
         handleDataTableButtons();
         setDate1();
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
              url: 'data/dataPermit.php',
              data: { 
                'id': id,
                'action': 'delete',
              },
              success: function(data){
                location.replace("permit.php");
              }
          });
      });
  }
  function editForm(id)
  {
    $('#edit_model').modal('show'); 
      $.ajax({
        type: 'POST',
        url: 'data/dataPermit.php',
        data: { 
          'id': id,
          'action': 'view1',
        },
        success: function(data){
          console.log(data);
              
          var objJSON = JSON.parse(data);
          $("#vehVehicleNo").val(objJSON.vehVehicleNo);
          $("#perPermitNo").val(objJSON.perPermitNo);
          setDate('#perFromDate',objJSON.perFromDate);//$("#perFromDate").val(objJSON.perFromDate);
         // setDate('#perToDate',objJSON.perToDate);//$("#perToDate").val(objJSON.perToDate);
          //$("#perRenewed").val(objJSON.perRenewed);
          $("#edit_id").val(id);
          if(objJSON.perRenewed=="Not Renewed")
          {
            document.getElementById("perRenewed").selectedIndex=1;
          }
          else{
            document.getElementById("perRenewed").selectedIndex=0;
          }
          $('#perToDate').datepicker({
              format: "dd-mm-yyyy",
              todayHighlight: true,
              startDate: objJSON.perFromDate,
              autoclose: true
          });

          $('#perToDate').datepicker('setDate', objJSON.perToDate);


            //  $('#perToDate').datepicker({
            //     format: "dd-mm-yyyy",
            //     todayHighlight: true,
            //     startDate: objJSON.perFromDate,
            //     autoclose: true
            // });

            // $('#perToDate').datepicker('setDate', objJSON.perToDate);    
        }
    }); 
  }
  </script>
<script>
    function setDate1()
  {  
      
     var tempDate = document.getElementById('perFromDate1').value;
   
      if(tempDate!=''){
            $('#perToDate1').datepicker({
                format: "dd-mm-yyyy",
                todayHighlight: true,
                startDate: tempDate,
                autoclose: true
            });

            $('#perToDate1').datepicker('setDate', tempDate);
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