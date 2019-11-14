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
                      <h2>RC Holder <small>add RC holder details</small></h2>
                      <ul class="nav panel_toolbox ">
                        <li><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                        </li>                     
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                      <form id="frm_insert1" class="form-horizontal form-label-left input_mask" action="data/dataRCHolder.php" method="post">
                      <input type="hidden" value="insert" name="action" id="action">
                     
                      <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback" style="padding-right: 20px;">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Title" name="title">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-9 col-sm-6 col-xs-12 form-group has-feedback" style="padding-right: 20px">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Name" name="name">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                       <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback" style="padding-right: 20px;">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Address" name="address">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" style="padding-right: 20px;">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Mobile" name="mobile">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" style="padding-right: 20px;">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Email" name="email">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>



                     <!--  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" style="padding-right: 20px">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Telephone" name="telephone">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" style="padding-right: 20px;">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Residential Address" name="receAddress">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" style="padding-right: 20px">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Residential Telephone" name="receTelephone">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>                      

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" style="padding-right: 20px">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Fax" name="fax">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div> -->

                       

                        <input type="hidden" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Telephone" name="telephone">
                        <input type="hidden" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Residential Address" name="receAddress">
                        <input type="hidden" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Residential Telephone" name="receTelephone">
                        <input type="hidden" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Fax" name="fax">
                       

                      

                       

                      <div class="form-group">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-5">
                          <a class="btn btn-primary" href="rcHolder.php">Reset</a>
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
                      <h2>RC Holder <small>manage RC holder details</small></h2>
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
                                      <th>Title</th>
                                      <th>Name</th>
                                      <th>Address</th>
                                      <th>Telephone</th>
                                      <th>Residential Address</th>
                                      <th>Residential Telephone</th>
                                      <th>Mobile</th>
                                      <th>Fax</th>
                                      <th>Email ID</th>                                      
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
                <h4 class="modal-title">Edit RC Holder Details</h4>
              </div>

              <div class="modal-body">
                <form method="post" id="frm_edit1" action="data/dataRCHolder.php">
                  <input type="hidden" value="update" name="action" id="action">
                  <input type="hidden" value="0" name="edit_id" id="edit_id">
                 
                  <div class="form-group">
                    <label for="rcTitle" class="control-label">Title:</label>
                    <input type="text" class="form-control" id="rcTitle" name="rcTitle"/>
                  </div>
                  <div class="form-group">
                    <label for="rcName" class="control-label">Name:</label>
                    <input type="text" class="form-control" id="rcName" name="rcName"/>
                  </div>
                     <div class="form-group">
                    <label for="rcRCAddress" class="control-label">Address:</label>
                    <input type="text" class="form-control" id="rcRCAddress" name="rcRCAddress"/>
                  </div>
                   
                  <div class="form-group">
                  <label for="rcMobile" class="control-label">Mobile:</label>
                  <input type="text" class="form-control" id="rcMobile" name="rcMobile"/>
                </div>
                    
                    <div class="form-group">
                  <label for="rcEmailID" class="control-label">Email ID:</label>
                  <input type="text" class="form-control" id="rcEmailID" name="rcEmailID"/>
                     
                </div>

                <div class="form-group">
                  <input type="hidden" class="form-control" id="rcTelephone" name="rcTelephone"/>                
                <input type="hidden" class="form-control" id="rcResiAddress" name="rcResiAddress"/>
                <input type="hidden" class="form-control" id="rcResiTelephone" name="rcResiTelephone" />
                <input type="hidden" class="form-control" id="rcFax" name="rcFax"/>
                     
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
         "url": "data/dataRCHolder.php",
          "dataSrc": ""
        },
 
        "columns": [
           { "data": "rcID" },
          { "data": "rcTitle" },
          { "data": "rcName" },
          { "data": "rcRCAddress" },
          { "data": "rcTelephone" ,  "visible": false},
          { "data": "rcResiAddress" ,  "visible": false},
          { "data": "rcResiTelephone" ,  "visible": false},
          { "data": "rcMobile" },
          { "data": "rcFax" ,  "visible": false},
          { "data": "rcEmailID" },
          
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
         "url": "data/dataRCHolder.php",
          "dataSrc": ""
        },
 
        "columns": [
           { "data": "rcID" },
          { "data": "rcTitle" },
          { "data": "rcName" },
          { "data": "rcRCAddress" },
          { "data": "rcTelephone" ,  "visible": false},
          { "data": "rcResiAddress" ,  "visible": false},
          { "data": "rcResiTelephone" ,  "visible": false},
          { "data": "rcMobile" },
          { "data": "rcFax" ,  "visible": false},
          { "data": "rcEmailID" },
          
         
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
  function conform(id)
  {
      $('#confirm').modal({
            backdrop: 'static',
            keyboard: false
          })
          .one('click', '#delete', function(e) {
           $.ajax({
              type: 'POST',
              url: 'data/dataRCHolder.php',
              data: { 
                'id': id,
                'action': 'delete',
              },
              success: function(data){
                location.replace("rcHolder.php");
              }
          });
      });
  }
  function editForm(id)
  {
    $('#edit_model').modal('show'); 
      $.ajax({
        type: 'POST',
        url: 'data/dataRCHolder.php',
        data: { 
          'id': id,
          'action': 'view1',
        },
        success: function(data){
          console.log(data);
     

          var objJSON = JSON.parse(data);
           
          $("#rcTitle").val(objJSON.rcTitle);
          $("#rcName").val(objJSON.rcName);
          $("#rcRCAddress").val(objJSON.rcRCAddress);
          $("#rcTelephone").val(objJSON.rcTelephone);
          $("#rcResiAddress").val(objJSON.rcResiAddress);
          $("#rcResiTelephone").val(objJSON.rcResiTelephone);
          $("#rcMobile").val(objJSON.rcMobile);
          $("#rcFax").val(objJSON.rcFax);
          $("#rcEmailID").val(objJSON.rcEmailID);
          $("#edit_id").val(id);
                
        }
    }); 
  }
  </script>