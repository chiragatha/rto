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
                      <h2>Insurance Company <small>add insurance company(s)</small></h2>
                      <ul class="nav panel_toolbox ">
                        <li><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                        </li>                     
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                      <form class="form-horizontal form-label-left input_mask" id="frm_insert3" action="data/dataInsuranceCompany.php" method="post">
                        <input type="hidden" value="insert" name="action" id="action">

                        <div class="row form-group">
                                  <div class="col-lg-6">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Name" name="name">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="col-md-12 col-sm-12 col-xs-12">                              
                                     <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Telephone" name="telephone">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                </div>

                                <div class="row form-group">
                                  <div class="col-lg-6">
                                    <div class="col-md-12 col-sm-8 col-xs-12">
                                      <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Contact Person" name="contactPerson">
                                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="col-md-12 col-sm-12 col-xs-12">                              
                                     <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Mobile" name="mobile">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                </div>
                     

                      

                      <div class="form-group">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-5">
                            <a href="insurance.php" class="btn btn-default">Back</a>
                            <a href="insuranceCompany.php" class="btn btn-primary">Reset</a>
                            <button type="submit" class="btn btn-success">Submit</button>

                        </div>
                      </div>

                      </form>





                      
                    </div>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Insurance Company <small>add insurance company(s)</small></h2>
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
                            <th>Insurance Company</th>
                            <th>Telephone</th>
                            <th>Contact Person</th>
                            <th>Mobile</th>
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
                 <form method="post" id="frm_edit3" action="data/dataInsuranceCompany.php" method="post">
                  <input type="hidden" value="update" name="action" id="action">
                  <input type="hidden" value="0" name="edit_id" id="edit_id">
                     <div class="form-group">
                   <label for="insInsuranceCo" class="control-label">Insurance Company:</label>
                    <input type="text" class="form-control" id="insInsuranceCo" name="insInsuranceCo"/>
                  </div>
                     
          <div class="form-group">
                    <label for="insTelephone" class="control-label">Telephone:</label>
                    <input type="text" class="form-control" id="insTelephone" name="insTelephone"/>
                  </div>

                  <div class="form-group">
                    <label for="insContactPerson" class="control-label">Contact Person:</label>
                    <input type="text" class="form-control" id="insContactPerson" name="insContactPerson"/>
                  </div>

                  <div class="form-group">
                    <label for="insMobile" class="control-label">Mobile:</label>
                    <input type="text" class="form-control" id="insMobile" name="insMobile"/>
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
   

   <!--conform popup-->
        <div id="confirm" class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" style="border: none;">                      
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Delete Record ?</h4>
                </div>

                <div class="modal-footer" style="border: none;">
                  <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
                  <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                </div>
              </div>
          </div>
        </div>
          <!--conform-->   

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

        if(uid==1)
        {
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
          "url": "data/dataInsuranceCompany.php",
          "dataSrc": ""
        },
        "columns": [
          { "data": "insID" },
          { "data": "insInsuranceCo" },
          { "data": "insContactPerson" },
          { "data": "insMobile" },
          { "data": "insTelephone" },
          { "data": "action" },
                   
        ],
              responsive: true
            });
          }
        };
        }
        else
        {
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
          "url": "data/dataInsuranceCompany.php",
          "dataSrc": ""
        },
        "columns": [
          { "data": "insID" },
          { "data": "insInsuranceCo" },
          { "data": "insContactPerson" },
          { "data": "insMobile" },
          { "data": "insTelephone" },
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
              url: 'data/dataInsuranceCompany.php',
              data: { 
                'id': id,
                'action': 'delete',
              },
              success: function(data){
                location.replace("insuranceCompany.php");
              }
          });
      });
  }
  function editForm(id)
  {
    $('#edit_model').modal('show'); 
      $.ajax({
        type: 'POST',
        url: 'data/dataInsuranceCompany.php',
        data: { 
          'id': id,
          'action': 'view1',
        },
        success: function(data){
          console.log(data);
     

          var objJSON = JSON.parse(data);
          
          $("#insInsuranceCo").val(objJSON.insInsuranceCo);
          $("#insContactPerson").val(objJSON.insContactPerson);
          $("#insTelephone").val(objJSON.insTelephone);
          $("#insMobile").val(objJSON.insMobile);
          $("#edit_id").val(id);
                
        }
    }); 
  }
</script>
