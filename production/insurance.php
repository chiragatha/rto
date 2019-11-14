
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
                      <h2>Insurance <small>add insurance details</small></h2>
                      <ul class="nav panel_toolbox ">
                        <li><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                        </li>                     
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                      <form id="frm_insert2" class="form-horizontal form-label-left input_mask" action="data/dataInsurance.php" method="post">

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
                                  
                                  <div class="col-lg-6">
                                    <div class="col-md-12 col-sm-12 col-xs-12">                              
                                     <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Insurance Policy Number" name="insPolicyNo">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>

                                  <div class="col-lg-6">
                                    <div class="col-md-9 col-sm-10 col-xs-10">                              
                                     <select class="form-control" name="insCompany" >                          
                                      <?php echo $dbFunction->getInsuranceCompanyNamesAsOptions();?>
                                      </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">  
                                      <a href="insuranceCompany.php" >
                                        <button type="submit" form="formMIC" class="btn btn-default" >Manage</button>
                                      </a>                                  
                                      
                                    </div>
                                  </div>

                                </div>


                                <div class="row form-group">
                                  
                                  <div class="col-lg-6">     
                                   <label class="control-label col-md-3 col-sm-2 col-xs-2" style="text-align: left;">From Date</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                      <input type="text" class="form-control has-feedback-left myDatePicker"  placeholder="From Date" aria-describedby="inputSuccess2Status" id="insFromDate1" name="insFromDate">
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <label class="control-label col-md-3 col-sm-2 col-xs-2" style="text-align: left;">To Date</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                      <input type="text" class="form-control has-feedback-left "  placeholder="To Date" aria-describedby="inputSuccess2Status2" id="insToDate1" name="insToDate" onclick="setDate1()">
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                </div>


                                

                              </div>  

                              <div class="form-group">
                                <div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-5">
                                  <a href="insurance.php" class="btn btn-primary">Reset</a>
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
                              echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! Same Policy No already exist.</div>";
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
                      <h2>Insurance Records<small>manage insurance details</small></h2>
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
                            <th>Vehicle No</th>
                            <th>Policy No</th>
                            <th>Insurance Company</th>
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
                <h4 class="modal-title">Edit Insurance Details</h4>
              </div>
              <div class="modal-body">
                <form method="post" id="frm_edit2" action="data/dataInsurance.php">
                  <input type="hidden" value="update" name="action" id="action">
                  <input type="hidden" value="0" name="edit_id" id="edit_id">     
                   <div class="form-group">
                    <label for="vehVehicleNo" class="control-label">Vehicle Number:</label>
                    <input type="text" class="form-control vehicleFinder" id="vehVehicleNo" name="vehVehicleNo"/>
                    
                  </div>                                        
                  <div class="form-group">
                    <label for="insuPolicyNo" class="control-label">Policy No:</label>
                    <input type="text" class="form-control" id="insuPolicyNo" name="insuPolicyNo"/>
                  </div>
                  <div class="form-group">
                    <label for="insInsuranceCo" class="control-label">Insurance Company:</label>
                    <select class="form-control" name="insInsuranceCo">                          
                      <?php echo $dbFunction->getInsuranceCompanyNamesSameValueAsOptions();?>
                    </select>
                    <!-- <label for="insInsuranceCo" class="control-label">InsuranceCo:</label>
                    <input type="text" class="form-control" id="insInsuranceCo" name="insInsuranceCo"/> -->
                  </div>
                  <div class="form-group">
                    <label for="insuFromDate" class="control-label">From Date:</label>
                    <input type="text" class="form-control" id="insuFromDate" name="insuFromDate"/>
                  </div>
                  <div class="form-group">
                    <label for="insuFromDate" class="control-label">To Date:</label>
                    <input type="text" class="form-control" id="insuToDate" name="insuToDate"/>
                    
                  </div>

                 

                  <div class="form-group">
                    <label for="renewedDropDown" class="control-label">Renewed:</label>
                    <select class="form-control" id="insuRenewed" name="insuRenewed">                          
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
          "url": "data/dataInsurance.php",
          "dataSrc": ""
        },

        "columns": [
          { "data": "insuID" },
          { "data": "vehVehicleNo" },
          { "data": "insuPolicyNo" },
          { "data": "insInsuranceCo" },
          { "data": "insuFromDate" },
          { "data": "insuToDate" },
           { "data": "insuRenewed" },
          { "data": "action" },
                   
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

        "columns": [
               { "data": "insuID" },
          { "data": "vehVehicleNo" },
          { "data": "insuPolicyNo" },
          { "data": "insInsuranceCo" },
          { "data": "insuFromDate" },
          { "data": "insuToDate" },
           { "data": "insuRenewed" },
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
              url: 'data/dataInsurance.php',
              data: { 
                'id': id,
                'action': 'delete',
              },
              success: function(data){
                location.replace("insurance.php");
              }
          });
      });
  }
  function editForm(id)
  {
    $('#edit_model').modal('show'); 
      $.ajax({
        type: 'POST',
        url: 'data/dataInsurance.php',
        data: { 
          'id': id,
          'action': 'view1',
        },
        success: function(data){
          console.log(data);
     

          var objJSON = JSON.parse(data);
          console.log(objJSON.insuFromDate);
           
          $("#insuPolicyNo").val(objJSON.insuPolicyNo);
          setDate('#insuFromDate',objJSON.insuFromDate);//$("#insuFromDate").val(objJSON.insuFromDate);
          //setDate('#insuToDate',objJSON.insuToDate);//$("#insuToDate").val(objJSON.insuToDate);
          $("#insInsuranceCo").val(objJSON.insInsuranceCo);
          $("#vehVehicleNo").val(objJSON.vehVehicleNo);
          //$("#insuRenewed").val(objJSON.insuRenewed);
          $("#edit_id").val(id);

          if(objJSON.insuRenewed=="Not Renewed")
          {
            document.getElementById("insuRenewed").selectedIndex=1;
          }
          else{
            document.getElementById("insuRenewed").selectedIndex=0;
          }
           $('#insuToDate').datepicker({
                format: "dd-mm-yyyy",
                todayHighlight: true,
             startDate: objJSON.insuFromDate,
                autoclose: true
            });

            $('#insuToDate').datepicker('setDate', objJSON.insuToDate);     
        }
    }); 
  }
  </script>

      

   <script>
    function setDate1()
  {  
     var tempDate = document.getElementById('insFromDate1').value;
    //  var tempDate= document.getElementById("insFromDate").value();
 
      if(tempDate!=''){
            $('#insToDate1').datepicker({
                format: "dd-mm-yyyy",
                todayHighlight: true,
             startDate: tempDate,
                autoclose: true
            });

            $('#insToDate1').datepicker('setDate', tempDate);
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