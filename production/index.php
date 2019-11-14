<?php session_start();
  if(!isset($_SESSION['loginok']) ||$_SESSION['loginok']==false )
    header('location:../index.php?message=1');
 ?>
<?php 
  include 'Vender2/MasterPage.php';
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
       <div class="right_col" role="main" >   
            
          <?php echo $masterPageObj->getCountBar();?>
          <div class="row">
                <div class="col-md-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Company <small>add company details</small></h2>
                      <ul class="nav panel_toolbox ">
                        <li><a class="collapse-link "><i class="fa fa-chevron-up"></i></a>
                        </li>                     
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                      <form id="frm_insert" class="form-horizontal form-label-left input_mask" action="data/dataCompany.php" method="post">
                       <input type="hidden" value="insert" name="action" id="action">

                       <div>
                        <div class="row form-group">
                            <div class="col-lg-3">
                              <div class="col-md-12 col-sm-8 col-xs-12">
                               <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Title" name="title">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>
                            <div class="col-lg-9">
                              <div class="col-md-12 col-sm-8 col-xs-12">
                                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Company Name" name="name">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>
                          </div>

                           <div class="row form-group">
                            <div class="col-lg-6">
                              <div class="col-md-12 col-sm-8 col-xs-12">
                               <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Address" name="address">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="col-md-12 col-sm-8 col-xs-12">
                                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Telephone/Mobile" name="telephone">
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
                              <div class="col-md-12 col-sm-8 col-xs-12">
                                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Mobile" name="fax">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>
                          </div>

                           <div class="row form-group">
                            <div class="col-lg-6">
                              <div class="col-md-12 col-sm-8 col-xs-12">
                               <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Email" name="email">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="col-md-12 col-sm-8 col-xs-12">
                                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Remarks" name="remarks">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                              </div>
                            </div>
                          </div>
                       </div>
                      

                      <div class="form-group">
                        <div class="col-md-5 col-sm-5 col-xs-5 col-md-offset-5">
                          <button class="btn btn-primary" type="reset">Reset</button>
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
                              echo "<div class='alert alert-danger' style='font-size:18px;'>Warning! Please enter correct details.</div>";
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
                      <h2>Company Records<small>manage compamy details</small></h2>
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
                            <th>Company</th>
                            <th>Address</th>
                            <th>Telephone</th>
                            <th>ContactPerson</th>
                            <th>Mobile</th>
                            <th>Email</th>
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
                <h4 class="modal-title">Edit Company</h4>
              </div>

              <div class="modal-body">
                <form method="post" id="frm_edit" action="data/dataCompany.php">
                  <input type="hidden" value="update" name="action" id="action">
                  <input type="hidden" value="0" name="edit_id" id="edit_id">
                  <div class="form-group">
                    <label for="name" class="control-label">Title:</label>
                    <input type="text" class="form-control" id="coTitle" name="coTitle"/>
                  </div>
                  <div class="form-group">
                    <label for="salary" class="control-label">Name:</label>
                    <input type="text" class="form-control" id="coCompany" name="coCompany"/>
                  </div>
                  <div class="form-group">
                    <label for="salary" class="control-label">Address:</label>
                    <input type="text" class="form-control" id="coHOAddress" name="coHOAddress"/>
                  </div>
                              <div class="form-group">
                              <label for="salary" class="control-label">Telephone:</label>
                              <input type="text" class="form-control" id="coTelephone" name="coTelephone"/>
                            </div>
                              <div class="form-group">
                              <label for="salary" class="control-label">Contact Person:</label>
                              <input type="text" class="form-control" id="coContactPerson" name="coContactPerson"/>
                            </div>
                          <div class="form-group">
                              <label for="salary" class="control-label">Fax:</label>
                              <input type="text" class="form-control" id="coFax" name="coFax"/>
                            </div>
                              <div class="form-group">
                              <label for="salary" class="control-label">Email:</label>
                              <input type="text" class="form-control" id="coEmail" name="coEmail"/>
                            </div>
                            <div class="form-group">
                              <label for="salary" class="control-label">Remark:</label>
                              <input type="text" class="form-control" id="coRemarks" name="coRemarks"/>
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
      //  alert(uid);
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
              "url": "data/dataCompany.php",
              "dataSrc": ""
            },
            "columns": [
              { "data": "coID" },
              { "data": "coTitle" },
              { "data": "coCompany" },
              { "data": "coHOAddress" },
              { "data": "coTelephone" },
              { "data": "coContactPerson" },
              { "data": "coFax" },
              { "data": "coEmail" },
              { "data": "coRemarks" },
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
              "url": "data/dataCompany.php",
              "dataSrc": ""
            },
            "columns": [
              { "data": "coID" },
              { "data": "coTitle" },
              { "data": "coCompany" },
              { "data": "coHOAddress" },
              { "data": "coTelephone" },
              { "data": "coContactPerson" },
              { "data": "coFax" },
              { "data": "coEmail" },
              { "data": "coRemarks" },
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
              url: 'data/dataCompany.php',
              data: { 
                'id': id,
                'action': 'delete',
              },
              success: function(data){
                location.replace("index.php");
              }
          });
      });
  }
  function editForm(id)
  {
    $('#edit_model').modal('show'); 
      $.ajax({
        type: 'POST',
        url: 'data/dataCompany.php',
        data: { 
          'id': id,
          'action': 'view1',
        },
        success: function(data){
          console.log(data);
     

          var objJSON = JSON.parse(data);
           
          $("#coTitle").val(objJSON.coTitle);
          $("#coCompany").val(objJSON.coCompany);
          $("#coHOAddress").val(objJSON.coHOAddress);
          $("#coTelephone").val(objJSON.coTelephone);
          $("#coContactPerson").val(objJSON.coContactPerson);
          $("#coFax").val(objJSON.coFax);
          $("#coEmail").val(objJSON.coEmail);
          $("#coRemarks").val(objJSON.coRemarks);
          $("#edit_id").val(id);
                
        }
    }); 
  }
  </script>



