
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
                      <h2>Green Tax <small>add green tax details</small></h2>
                      <ul class="nav panel_toolbox ">
                        <li><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                        </li>                     
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                      <form id="frm_insert" class="form-horizontal form-label-left input_mask" action="data/dataGreenTax.php" method="post">
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
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Receipt Number" name="receiptNo">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <label class="control-label col-md-3 col-sm-2 col-xs-2" style="text-align: left;">Receipt Date</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                      <input type="text" class="form-control has-feedback-left myDatePicker" placeholder="Receipt Date" aria-describedby="inputSuccess2Status2" name="receiptDate">
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                </div>

                                <div class="row form-group">
                                  
                                  <div class="col-lg-6">                                    
                                    <label class="control-label col-md-3 col-sm-2 col-xs-2" style="text-align: left;">From Date</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                      <input type="text" class="form-control has-feedback-left myDatePicker" placeholder="From Date" aria-describedby="inputSuccess2Status" name="gFromDate">
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <label class="control-label col-md-3 col-sm-2 col-xs-2" style="text-align: left;">To Date</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                      <input type="text" class="form-control has-feedback-left myDatePicker"  placeholder="To Date" aria-describedby="inputSuccess2Status2" name="gToDate">
                                      <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                      <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                    </div>
                                  </div>
                                </div>

                                <div class="row form-group">

                                   <div class="col-lg-4">                            
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class="form-control has-feedback-left" placeholder="Amount" name="amount" id="amount1">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                  <div class="col-lg-4">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class="form-control has-feedback-left" placeholder="Penalty" name="penalty" id="penalty1">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                  <div class="col-lg-4">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class="form-control has-feedback-left"  placeholder="Total" name="total" id="total1" readonly="readonly">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                </div>

                              </div>  

                              <div class="form-group">
                                <div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-5">
                                  <a href="greenTax.php" class="btn btn-primary">Reset</a>
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
                              echo "<div class='alert alert-info' style='font-size:18px;'>Warning! This Vehicle is not register with us. Please Eenter correct one.</div>";
                              break; 
                            case 2: 
                              echo "<div class='alert alert-info' style='font-size:18px;'>Warning! Green Tax is not applicable for this vehicle until 8 years from its registration</div>";
                              break;
                            case 3: 
                              echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! Same details already exist.</div>";
                              break;
                             case 4: 
                              echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! Same receipt No already exist.</div>";
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
                      <h2>Green Tax Records<small>manage green tax details</small></h2>
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
                            <th>Receipt No</th>
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
                <h4 class="modal-title">Edit Green Tax Details</h4>
            </div>
            <div class="modal-body">
          
                 <form method="post" id="frm_edit" action="data/dataGreenTax.php" method="post">
                  <input type="hidden" value="update" name="action" id="action">
                  <input type="hidden"  name="edit_id" id="edit_id">
                  <div class="form-group">
                    <label for="vehVehicleNo" class="control-label">Vehicle No:</label>
                    <input type="text" class="vehicleFinder form-control   " id="vehVehicleNo" name="vehVehicleNo"/>
                  </div>
                     <div class="form-group">
                   <label for="receiptNo" class="control-label">Receipt No:</label>
                    <input type="text" class="form-control" id="receiptNo" name="receiptNo"/>
                  </div>
                     
                  <div class="form-group">
                    <label for="receiptDate" class="control-label">Receipt Date:</label>
                    <input type="text" class="form-control" id="receiptDate" name="receiptDate"/>
                  </div>
                   <div class="form-group">
                    <label for="fromDate" class="control-label">From Date:</label>
                    <input type="text" class="form-control" id="fromDate" name="fromDate"/>
                  </div>

                   <div class="form-group">
                    <label for="toDate" class="control-label">To Date:</label>
                    <input type="text" class="form-control" id="toDate" name="toDate"/>
                  </div>
                  <div class="form-group">
                    <label for="amount" class="control-label">Amount:</label>
                    <input type="text" class="form-control" id="amount" name="amount"/>
                  </div>
                  <div class="form-group">
                    <label for="penalty" class="control-label">Penalty:</label>
                    <input type="text" class="form-control" id="penalty" name="penalty"/>
                  </div>

                  <div class="form-group">
                    <label for="taxPenalty" class="control-label">Total:</label>
                    <input type="text" class="form-control" id="total" name="total" readonly="readonly"/>
                  </div>

                    
                 <div class="form-group">
                    <label for="gRenewed" class="control-label">status:</label>
                    <!-- <input type="text" class="form-control" id="gRenewed" name="gRenewed"/> -->
                    <select class="form-control" id="gRenewed" name="gRenewed">                          
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

      <script>
      $(document).ready(function() {
           var uid= '<?php echo $_SESSION['uid'] ;?>';
     
        if(uid==1){
               console.log("bye");
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
//                        .prepend(
//                            ' <h4 class="modal-title">Edit News Feeds Deatils</h4>'
//                        );
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                      $(win.document.body).find( 'table' )
                     .find('td:last-child, th:last-child').remove();
                     }, title: 'Himmatbhai Atha & Co.'
                 
            }],
        "ajax": {
          "url": "data/dataGreenTax.php",
          "dataSrc": ""
        },
           
        "columns": [
          { "data": "gID" },
          { "data": "vehVehicleNo" }, 
          { "data": "receiptNo" },        
          { "data": "receiptDate" },
          { "data": "fromDate" },
          { "data": "toDate" },
          { "data": "amount" },
          { "data": "penalty" },
          { "data": "total" },      
          { "data": "gRenewed" },        
        
          { "data": "action" }
                   
        ],
              responsive: true
            });
          }
        };
        }else{
            console.log("hi");
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
//                        .prepend(
//                            ' <h4 class="modal-title">Edit News Feeds Deatils</h4>'
//                        );
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                      $(win.document.body).find( 'table' )
                     .find('td:last-child, th:last-child').remove();
                     }, title: 'Himmatbhai Atha & Co.'
                 
            }],
        "ajax": {
          "url": "data/dataGreenTax.php",
          "dataSrc": ""
        },
           
        "columns": [
          { "data": "gID" },
          { "data": "vehVehicleNo" }, 
          { "data": "receiptNo" },       
          { "data": "receiptDate" },
           { "data": "fromDate" },
          { "data": "toDate" },
          { "data": "amount" },
          { "data": "penalty" },
          { "data": "total" },      
          { "data": "gRenewed" },        
        
         { "data": "action" ,"visible": false }
                   
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
  function conform(id)
  {
      $('#confirm').modal({
            backdrop: 'static',
            keyboard: false
          })
          .one('click', '#delete', function(e) {
           $.ajax({
              type: 'POST',
              url: 'data/dataGreenTax.php',
              data: { 
                'id': id,
                'action': 'delete',
              },
              success: function(data){
                location.replace("greenTax.php");
              }
          });
      });
  }
  function editForm(id)
  {
    console.log(id);
    $('#edit_model').modal('show'); 
      $.ajax({
        type: 'POST',
        url: 'data/dataGreenTax.php',
        data: { 
          'id': id,
          'action': 'view1',
        },
        success: function(data){
          console.log(data);
     

          var objJSON = JSON.parse(data);
            
          $("#receiptNo").val(objJSON.receiptNo);
          $("#vehVehicleNo").val(objJSON.vehVehicleNo);
          setDate('#receiptDate',objJSON.receiptDate);//$("#receiptDate").val(objJSON.receiptDate);
          setDate('#toDate',objJSON.toDate);//$("#toDate").val(objJSON.toDate);
          setDate('#fromDate',objJSON.fromDate);//$("#fromDate").val(objJSON.fromDate);
          $("#amount").val(objJSON.amount);
          //$("#gRenewed").val(objJSON.gRenewed);
          $("#penalty").val(objJSON.penalty);
          $("#edit_id").val(objJSON.gID);
        var total = parseFloat($('#amount').val())+parseFloat($('#penalty').val());
       //alert(total);
        $('#total').val(total)
          if(objJSON.gRenewed=="Not Renewed")
          {
            document.getElementById("gRenewed").selectedIndex=1;
          }
          else{
            document.getElementById("gRenewed").selectedIndex=0;
          }
                
        }
    }); 
  }
  
  $('#amount1').on('input change keydown keypress keyup mousedown click mouseup', function() {
               if ($('input:text').is(":empty")) {
                   var total = parseFloat($('#amount1').val())+ 0;
               }else{
                  var total = parseFloat($('#amount1').val())+ parseFloat($('#penalty1').val()); 
               }
      
       //alert(total);
        $('#total1').val(total)
        
    });
     $('#penalty1').on('input change keydown keypress keyup mousedown click mouseup', function() {
         
      var total =  parseFloat($('#amount1').val())+ parseFloat($('#penalty1').val());
       //alert(total);
        $('#total1').val(total)
        
    });





    $('#amount').on('input change keydown keypress keyup mousedown click mouseup', function(){
        if ($('input:text').is(":empty")) {
              var total = parseFloat($('#amount').val())+0;
              }else{
      var total = parseFloat($('#amount').val())+parseFloat($('#penalty').val());
       //alert(total);
              }
        $('#total').val(total)
        
    });
     $('#penalty').on('input change keydown keypress keyup mousedown click mouseup', function() {
      var total = parseFloat($('#amount').val())+parseFloat($('#penalty').val());
       //alert(total);
        $('#total').val(total)
        
    });

    //   $('#vehicleNo').keyup(function() {
      
    //     /*$.ajax({
    //       type: "POST",
    //       url: "data/dataGreenTax.php",
    //       data: { action: "getRC", vehicleNo: $('vehicleNo').val() }
    //     }).done(function( msg ) {
    //       alert( "Data Saved: " + msg );
    //     });*/

    //     var a=document.getElementById('vehicleNo').value;
    //     //alert(a);

    //     $.ajax({
    //           type: 'POST',
    //           url: 'data/dataGreenTax.php',
    //           data: { 
    //             'vehicleNo': a,
    //             'action': 'getRC',
    //           },
    //           success: function(data){
    //            alert(data );
    //           }
    //       });
       
      
        
    // });
      
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