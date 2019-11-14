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
        <?php echo $masterPageObj->getCountBar();?>  
            <div class="row">
                <div class="col-md-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Reminders <small>checkout recent updates</small></h2>
                      <ul class="nav panel_toolbox ">
                        <li><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                        </li>                     
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div  role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="tab1" role="tab" data-toggle="tab" aria-expanded="true">Today</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="tab2" data-toggle="tab" aria-expanded="false">New</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="tab3" data-toggle="tab" aria-expanded="false">Old</a>
                          </li>
                          
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="tab1">
                            <table id="datatable-buttons1" class="table table-striped table-bordered" style="" width="100%" height="100%">
                              <thead>
                                <tr>
                                  <th>Sr. No.</th>
                                  <th>RC Holder Name</th>
                                  <th>Vehicle Number</th>
                                  <th>Type</th>
                                </tr>
                              </thead>
                            </table> 
                            
                          </div>


                          <div role="tabpanel" class="tab-pane fade"  id="tab_content2" aria-labelledby="tab2">
                            
                              <table id="datatable-buttons2" class="table table-striped table-bordered" style="" width="100%" height="100%">
                              <thead>
                                <tr>
                                  <th>Sr. No.</th>
                                  <th>Due Date</th>
                                  <th>RC Holder Name</th>
                                  <th>Vehicle Number</th>
                                  <th>Type</th>
                                </tr>
                              </thead>
                            </table> 
                          </div>
                          <div role="tabpanel" class="tab-pane fade"  id="tab_content3" aria-labelledby="tab3">
                            
                              <table id="datatable-buttons3" class="table table-striped table-bordered" style="" width="100%" height="100%">
                              <thead>
                                <tr>
                                  <th>Sr. No.</th>
                                  <th>Due Date</th>
                                  <th>RC Holder Name</th>
                                  <th>Vehicle Number</th>
                                  <th>Type</th>
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
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons1").length) {
            $("#datatable-buttons1").DataTable({ "pageLength": 30,
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
                     }, title: 'Himmatbhai Atha & Co.'
                 
            }],
        "ajax": {
          "url": "data/dataReminders.php",
          "type": 'POST',
          "data": { 
                'action': 'today',
              },
          "dataSrc": ""
        },
        "columns": [
          { "data": "srNo" },
          { "data": "person" },
          { "data": "vehicleNo" },
          { "data": "type" }
                   
        ],
              responsive: true
            });
          }
        };
         handleDataTableButtons();
      });
     
    </script>

     <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons2").length) {
            $("#datatable-buttons2").DataTable({ "pageLength": 30,
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
                     }, title: 'Himmatbhai Atha & Co.'
                 
            }],
        "ajax": {
          "url": "data/dataReminders.php",
          "type": 'POST',
          "data": { 
                'action': 'new',
              },
          "dataSrc": ""
        },
        "columns": [
          { "data": "srNo" },
          { "data": "toDate" },
          { "data": "person" },
          { "data": "vehicleNo" },
          { "data": "type" }
                   
        ],
         "order": [[ 1, "desc" ]],
              responsive: true
            });
          }
        };
         handleDataTableButtons();
      });
     
    </script>

     <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons3").length) {
            $("#datatable-buttons3").DataTable({ "pageLength": 30,
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
                     }, title: 'Himmatbhai Atha & Co.'
                 
            }],
        "ajax": {
          "url": "data/dataReminders.php",
          "type": 'POST',
          "data": { 
                'action': 'old',
              },
          "dataSrc": ""
        },
        "columns": [
          { "data": "srNo" },
          { "data": "toDate" },
          { "data": "person" },
          { "data": "vehicleNo" },
          { "data": "type" }
                   
        ],
         "order": [[ 1, "desc" ]],
              responsive: true
            });
          }
        };
         handleDataTableButtons();
      });
     
    </script>