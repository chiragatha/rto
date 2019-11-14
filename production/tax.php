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
                      <h2>Tax <small>add tax details</small></h2>
                      <ul class="nav panel_toolbox ">
                        <li><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                        </li>                     
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                      <form id="frm_insert" class="form-horizontal form-label-left input_mask" action="data/dataTax.php" method="post">
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
                                      <input type="text" class=" form-control has-feedback-left" id="rcname" placeholder="RC name"  name="rcname"  readonly="">
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
                              <div class="col-md-12 col-sm-8 col-xs-12">
                                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Tax Receipt Number" name="taxReceNo">
                                                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>
                             <div class="col-lg-6">
                              <label class="control-label col-md-3 col-sm-2 col-xs-2" style="text-align: left;">Receipt Date</label>
                              <div class="col-md-9 col-sm-9 col-xs-9">                              
                               <input type="text" class="form-control has-feedback-left myDatePicker" placeholder="Date" aria-describedby="inputSuccess2Status2" name="taxRecepDate">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>

                          <div class="row form-group">
                           
                            <div class="col-lg-6">
                              <label class="control-label col-md-3 col-sm-2 col-xs-2" style="text-align: left;">From Date</label>
                              <div class="col-md-9 col-sm-9 col-xs-9">
                               <input type="text" id="taxFromDate1" class="form-control has-feedback-left myDatePicker" placeholder="Date" aria-describedby="inputSuccess2Status2" name="taxFromDate">
                                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                    <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                              </div>
                            </div>
                             <div class="col-lg-6">
                              <label class="control-label col-md-3 col-sm-2 col-xs-2" style="text-align: left;">To Date</label>
                              <div class="col-md-9 col-sm-9 col-xs-9">
                               <input type="text" id="taxToDate1" class="form-control has-feedback-left"  placeholder="Date" aria-describedby="inputSuccess2Status2" name="taxToDate" onclick="setDate1()">
                                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                    <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>

                         

                          <div class="row form-group">

                            <div class="col-lg-4">                            
                              <div class="col-md-12 col-sm-8 col-xs-12">
                               <input type="text" class="form-control has-feedback-left" id="amount" placeholder="Amount" name="amount">
                                                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>

                            <div class="col-lg-4">
                              <div class="col-md-12 col-sm-8 col-xs-12">
                               <input type="text" class="form-control has-feedback-left" id="penalty" placeholder="Penalty" name="penalty">
                                                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <div class="col-md-12 col-sm-8 col-xs-12">
                               <input type="text" class="form-control has-feedback-left" id="total" placeholder="Total" name="total" readonly>
                                                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>
                          </div>

                          
                        </div>
                        <div class="form-group">
                          <div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-5">
                            <a href="tax.php" class="btn btn-primary">Reset</a>
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
                              echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! Same Receipt No already exist.</div>";
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
                      <h2>Tax <small>manage tax details</small></h2>
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
                            <th>Receipt Number</th>
                            <th>Receipt Date</th> 
                            <th>From Date</th>
                            <th>To Date</th>                           
                            <th>Amount</th>
                            <th>Penalty</th>
                            <th>Total</th>
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
                <h4 class="modal-title">Edit Permit</h4>
              </div>

              <div class="modal-body">
                <form method="post" id="frm_edit" action="data/dataTax.php">
                  <input type="hidden" value="update" name="action" id="action">
                  <input type="hidden" value="0" name="edit_id" id="edit_id">
                  <div class="form-group">
                    <label for="vehVehicleNo" class="control-label">Vehicle No:</label>
                    <input type="text" class="form-control vehicleFinder" id="vehVehicleNo" name="vehVehicleNo"/>
                  </div>
                  <div class="form-group">
                    <label for="taxReceiptNo" class="control-label">Receipt No:</label>
                    <input type="text" class="form-control" id="taxReceiptNo" name="taxReceiptNo"/>
                  </div>
                  <div class="form-group">
                    <label for="taxReceiptDate" class="control-label">ReceiptDate:</label>
                    <input type="text" class="form-control" id="taxReceiptDate" name="taxReceiptDate"/>
                  </div>
                     
                 
                     <div class="form-group">
                    <label for="taxFromDate" class="control-label">From Date:</label>
                    <input type="text" class="form-control" id="taxFromDate" name="taxFromDate"/>
                  </div>
                     <div class="form-group">
                    <label for="taxToDate" class="control-label">To Date:</label>
                    <input type="text" class="form-control" id="taxToDate" name="taxToDate"/>
                  </div>
                   <div class="form-group">
                    <label for="taxAmount" class="control-label">Amount:</label>
                    <input type="text" class="form-control" id="taxAmount" name="taxAmount"/>
                  </div>
                   <div class="form-group">
                    <label for="taxPenalty" class="control-label">Penalty:</label>
                    <input type="text" class="form-control" id="taxPenalty" name="taxPenalty"/>
                  </div>
                    <div class="form-group">
                    <label for="taxPenalty" class="control-label">Total:</label>
                    <input type="text" class="form-control" id="total1" name="total1" readonly/>
                  </div>
                  <div class="form-group">
                  <label for="taxRenewed" class="control-label">Status:</label>
                  <!-- <input type="text" class="form-control" id="taxRenewed" name="taxRenewed"/> -->
                  <select class="form-control" id="taxRenewed" name="taxRenewed">                          
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
          "url": "data/dataTax.php",
          "dataSrc": ""
        },

        "columns": [
         { "data": "taxID" },
          { "data": "vehVehicleNo" },
          { "data": "taxReceiptNo" },
          { "data": "taxReceiptDate" },
          { "data": "taxFromDate" },
          { "data": "taxToDate" },
          { "data": "taxAmount" },
          { "data": "taxPenalty" }, 
          { "data": "total" },        
          { "data": "taxRenewed" },
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
          "url": "data/dataTax.php",
          "dataSrc": ""
        },

        "columns": [
         { "data": "taxID" },
          { "data": "vehVehicleNo" },
          { "data": "taxReceiptNo" },
          { "data": "taxReceiptDate" },
          { "data": "taxFromDate" },
          { "data": "taxToDate" },
          { "data": "taxAmount" },
          { "data": "taxPenalty" }, 
          { "data": "total" },              
          { "data": "taxRenewed" },
          { "data": "action" ,"visible": false }
                   
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
              url: 'data/dataTax.php',
              data: { 
                'id': id,
                'action': 'delete',
              },
              success: function(data){
                location.replace("tax.php");
              }
          });
      });
  }
  function editForm(id)
  {      
    $('#edit_model').modal('show'); 
      $.ajax({
        type: 'POST',
        url: 'data/dataTax.php',
        data: { 
          'id': id,
          'action': 'view1',
        },
        success: function(data){
          console.log(data);
     

          var objJSON = JSON.parse(data);
           
          $("#taxReceiptNo").val(objJSON.taxReceiptNo);
          setDate('#taxReceiptDate',objJSON.taxReceiptDate);//$("#taxReceiptDate").val(objJSON.taxReceiptDate);
          $("#taxAmount").val(objJSON.taxAmount);
          setDate('#taxFromDate',objJSON.taxFromDate);//$("#taxFromDate").val(objJSON.taxFromDate);
          //setDate('#taxToDate',objJSON.taxToDate);//$("#taxToDate").val(objJSON.taxToDate);
          $("#taxPenalty").val(objJSON.taxPenalty);
          $("#vehVehicleNo").val(objJSON.vehVehicleNo);
          //$("#taxRenewed").val(objJSON.taxRenewed);
          $("#edit_id").val(id);

 var total =  parseFloat(objJSON.taxAmount)+ parseFloat(objJSON.taxPenalty);
      
        $('#total1').val(total);
          if(objJSON.taxRenewed=="Not Renewed")
          {
            document.getElementById("taxRenewed").selectedIndex=1;
          }
          else{
            document.getElementById("taxRenewed").selectedIndex=0;
          }



          $('#taxToDate').datepicker({
                format: "dd-mm-yyyy",
                todayHighlight: true,
                startDate: objJSON.taxFromDate,
                autoclose: true
            });

            $('#taxToDate').datepicker('setDate', objJSON.taxToDate);
          
          
          
                
        }
    }); 
//setDate2();

       
  }
     $('#taxAmount').on('input change keydown keypress keyup mousedown click mouseup', function() {
               if ($('#taxAmount').val()!='' && $('#taxPenalty').val()=='') {
              var total = parseFloat($('#taxAmount').val());
              }
              else  if($('#taxAmount').val()!='' && $('#taxPenalty').val()!=''){
                var total = parseFloat($('#taxAmount').val())+parseFloat($('#taxPenalty').val());
              }
        $('#total1').val(total);
        
    });
     $('#taxPenalty').on('input change keydown keypress keyup mousedown click mouseup', function() {
      if ($('#taxAmount').val()!='' && $('#taxPenalty').val()=='') {
              var total = parseFloat($('#taxAmount').val());
              }
              else  if($('#taxAmount').val()!='' && $('#taxPenalty').val()!=''){
                var total = parseFloat($('#taxAmount').val())+parseFloat($('#taxPenalty').val());
              }
        $('#total1').val(total);
        
    });




    $('#amount').on('input change keydown keypress keyup mousedown click mouseup', function() {
        if ($('#amount').val()!='' && $('#penalty').val()=='') {
              var total = parseFloat($('#amount').val());
              }
              else  if($('#amount').val()!='' && $('#penalty').val()!=''){
                var total = parseFloat($('#amount').val())+parseFloat($('#penalty').val());
              }
        $('#total').val(total);
        
    });
    
     $('#penalty').on('input change keydown keypress keyup mousedown click mouseup', function() {
      if ($('#amount').val()!='' && $('#penalty').val()=='') {
              var total = parseFloat($('#amount').val());
              }
              else  if ($('#amount').val()!='' && $('#penalty').val()!=''){
                var total = parseFloat($('#amount').val())+parseFloat($('#penalty').val());
              }
        $('#total').val(total);
        
    });
  </script>

<script>
    function setDate1()
  {  
      
     var tempDate = document.getElementById('taxFromDate1').value;
   
      if(tempDate!=''){
            $('#taxToDate1').datepicker({
                format: "dd-mm-yyyy",
                todayHighlight: true,
                startDate: tempDate,
                autoclose: true
            });

            $('#taxToDate1').datepicker('setDate', tempDate);
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