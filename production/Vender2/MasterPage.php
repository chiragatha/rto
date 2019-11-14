<?php
include 'data/connection.php'; 
include_once 'data/databaseFunctions.php';

class MasterPageClass 
{ 
  private $dbFunction;

  function __construct()
  {
    $this->dbFunction=new DBFunctions();
  }

  
  

  public function getSideNevBar()
  {
    return
    "<div class='col-md-3 left_col'>
          <div class='left_col scroll-view'>
            <div class='navbar nav_title' style='border: 0;'>
              <a href='index.php' class='site_title'><i class='fa fa-paw'></i> <span>RMS!</span></a>
            </div>

            <div class='clearfix'></div>

            <!-- menu profile quick info -->
            <div class='profile clearfix'>
              <div class='profile_pic'>
                <img src='images/user.png' alt='...'' class='img-circle profile_img'>
              </div>
              <div class='profile_info'>
                <span>Welcome,</span>
                <h2>".$_SESSION['name']."</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id='sidebar-menu' class='main_menu_side hidden-print main_menu'>
              <div class='menu_section'>
                <ul class='nav side-menu'>
                 <!--< li><a href='index.php'><i class='fa fa-home'></i> Home</a>                    
                  </li>-->

                  <li><a href='index.php'><i class='fa fa-clone'></i>Company</a></li>

                  <li><a href='rcHolder.php'><i class='fa fa-clone'></i>RC Holder</span></a></li>

                  <li><a href='vehicle.php'><i class='fa fa-clone'></i>Vehicles</span></a></li>

                  <li><a href='tax.php'><i class='fa fa-clone'></i>Tax</span></a></li>

                  <li><a href='permit.php'><i class='fa fa-clone'></i>Permit</span></a></li>

                  <li><a href='passing.php'><i class='fa fa-clone'></i>Passing</span></a></li>

                  <li><a href='np.php'><i class='fa fa-clone'></i>National Permit</span></a></li>

                  <li><a href='insurance.php'><i class='fa fa-clone'></i>Insurance</a></li>

                  <li><a href='greenTax.php'><i class='fa fa-clone'></i>Green Tax</span></a></li>

                  <li><a href='report.php'><i class='fa fa-clone'></i>Reports</span></a></li>

                  <li><a href='toNoc.php'><i class='fa fa-clone'></i>T.O./NOC</span></a></li>

                  <li><a href='email.php'><i class='fa fa-clone'></i>Email</span></a></li>

                  <!-- <li><a href='insuranceCompany.php'><i class='fa fa-clone'></i> Insurance Company</a>                    
                  </li> -->
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu --> 

          </div>
        </div>";
  }

  public function getTopBar()
  {
    $reminderData=$this->dbFunction->getReminders();
    $reminderCount=$reminderData[0];
    $reminderStr=$reminderData[1];

    return
    "<!-- top navigation -->
        <div class='top_nav'>
          <div class='nav_menu'>
            <nav>
              <div class='nav toggle'>
                <a id='menu_toggle'><i class='fa fa-bars'></i></a>
              </div>

              <ul class='nav navbar-nav navbar-right'>

                <li class=''>
                  
                  <a  href='data/logout.php' title='Logout'>
                    <span class='glyphicon glyphicon-off' aria-hidden='true'></span>
                  </a>
                  
                </li>

                <li>
                  <a href='#' class='user-profile dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                    <img src='images/user.png' alt=''>".$_SESSION['name']."
                  </a>
                </li>
                
                <li role='presentation' class='dropdown'>
                  <a href='javascript:;' class='dropdown-toggle info-number' data-toggle='dropdown' aria-expanded='false'>
                    <i class='fa fa-envelope-o'></i>
                    <span class='badge bg-green'>".$reminderCount."</span>
                  </a>
                  <ul id='menu1' class='dropdown-menu list-unstyled msg_list' role='menu'>
                    <!--<li>
                      <a>
                        <span class='glyphicon glyphicon-bell' style=' font-size: 15px;top:3px;margin-right:4px;'aria-hidden='true'></span>
                        <span ><b>Insurance</b> due on 1/1/1 of Vehicle MH 12 123</span>
                      </a>
                    </li>-->
                    <!--<li>
                      <a>
                        <span class='image'><img src='images/bell.png' alt='reminder' /></span>
                        <span>
                          <span>Insurance</span>
                          <span class='time'>1/1/1</span>
                        </span>
                        <span class='message'>
                          Name: Prathamesh Sukale Vehicle MH 12 1234
                        </span>
                      </a>
                    </li>-->
                    ".$reminderStr."
                    <li>
                      <div class='text-center'>
                        <a href='reminders.php'>
                          <strong>See All Alerts</strong>
                          <i class='fa fa-angle-right'></i>
                        </a>
                      </div>
                    </li>
                    
              </ul>
            </nav>
          </div>

        </div>
        <!-- /top navigation -->";
  }

  public function getCountBar()
  {
    $counts=$this->dbFunction->getCountsFromDatabase();

    /*return "<div class='row tile_count' style='margin-bottom:0px;'>
            <div class='col-md-2 col-sm-4 col-xs-6 tile_stats_count'>
              <span class='count_top'><i class='fa fa-bar-chart-o'></i> Total Vehicles</span>
              <div class='count'>".$counts['vehicles']."</div>
            </div>
            <div class='col-md-2 col-sm-4 col-xs-6 tile_stats_count'>
              <span class='count_top'><i class='fa fa-bar-chart-o'></i> Total Insurance</span>
              <div class='count'>".$counts['insurance']."</div>
            </div>
            <div class='col-md-2 col-sm-4 col-xs-6 tile_stats_count'>
              <span class='count_top'><i class='fa fa-bar-chart-o'></i> Total National Permits</span>
              <div class='count'>".$counts['npheader']."</div>
            </div>
            <div class='col-md-2 col-sm-4 col-xs-6 tile_stats_count'>
              <span class='count_top'><i class='fa fa-bar-chart-o'></i> Total Passings</span>
              <div class='count'>".$counts['passing']."</div>
            </div>
            <div class='col-md-2 col-sm-4 col-xs-6 tile_stats_count'>
              <span class='count_top'><i class='fa fa-bar-chart-o'></i> Total Permits</span>
              <div class='count'>".$counts['permit']."</div>
            </div>
            <div class='col-md-2 col-sm-4 col-xs-6 tile_stats_count'>
              <span class='count_top'><i class='fa fa-bar-chart-o'></i> Total Tax</span>
              <div class='count'>".$counts['tax']."</div>
            </div>
          </div>
          <!-- /top tiles -->";*/
  }

  public function getDeleteConfirmModal()
  {
    return 
      "
        <div id='confirm' class='modal fade'>
          <div class='modal-dialog'>
              <div class='modal-content'>
                <div class='modal-header' style='border: none;'>                      
                  <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                  <h4 class='modal-title'>Delete Record ?</h4>
                </div>

                <div class='modal-footer' style='border: none;'>
                  <button type='button' data-dismiss='modal' class='btn btn-primary' id='delete'>Delete</button>
                  <button type='button' data-dismiss='modal' class='btn'>Cancel</button>
                </div>
              </div>
          </div>
        </div>
      ";
  }

  


  public function getFooter()
  {
    return
    "<!-- footer content -->
        <footer>
          <div class='pull-right'>
            © 2017, rto.com
          </div>
          <div class='clearfix'></div>
        </footer>
        <!-- /footer content -->";
  }

  public function getHeadTag()
  {
    return
    "<head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

        <title>RTO Management System </title>

        <!-- Bootstrap -->
       
        
        <link href='../vendors/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
        <!-- Font Awesome -->
        <link href='../vendors/font-awesome/css/font-awesome.min.css' rel='stylesheet'>
        <!-- NProgress -->
        <link href='../vendors/nprogress/nprogress.css' rel='stylesheet'>
        <!-- iCheck -->
        <link href='../vendors/iCheck/skins/flat/green.css' rel='stylesheet'>
      
        <!-- bootstrap-progressbar -->
        <link href='../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css' rel='stylesheet'>
        <!-- JQVMap -->
        <link href='../vendors/jqvmap/dist/jqvmap.min.css' rel='stylesheet'/>
        <!-- bootstrap-daterangepicker -->
        <link href='../vendors/bootstrap-daterangepicker/daterangepicker.css' rel='stylesheet'>

        <!-- Custom Theme Style -->
        <link href='../build/css/custom.min.css' rel='stylesheet'>
        <link href='../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css' rel='stylesheet'>
   
  
    <link href='../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css' rel='stylesheet'>
        <style>     

        .tt-dropdown-menu {
            width: 484px;
            margin-top: 5px;
            padding: 8px 12px;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px 8px 8px 8px;
            font-size: 18px;
            color: #111;
            background-color: #F1F1F1;
        }
    </style>
    </head>";
  }

  public function getjQuerySection()
  {
    return
    "<!-- jQuery -->
      
      <script src='../vendors/jquery/dist/jquery.min.js'></script> 
      <!-- Bootstrap -->
      <script src='js/typeahead.js'></script>
      <script src='../vendors/bootstrap/dist/js/bootstrap.min.js'></script>
      <!-- FastClick -->
      <script src='../vendors/fastclick/lib/fastclick.js'></script>
      <!-- NProgress -->
      <script src='../vendors/nprogress/nprogress.js'></script>
      <!-- Chart.js -->
      <script src='../vendors/Chart.js/dist/Chart.min.js'></script>
      <!-- gauge.js -->
      <script src='../vendors/gauge.js/dist/gauge.min.js'></script>
      <!-- bootstrap-progressbar -->
      <script src='../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js'></script>
      <!-- iCheck -->
      <script src='../vendors/iCheck/icheck.min.js'></script>
      <!-- Skycons -->
      <script src='../vendors/skycons/skycons.js'></script>
      <!-- Flot -->
      <script src='../vendors/Flot/jquery.flot.js'></script>
      <script src='../vendors/Flot/jquery.flot.pie.js'></script>
      <script src='../vendors/Flot/jquery.flot.time.js'></script>
      <script src='../vendors/Flot/jquery.flot.stack.js'></script>
      <script src='../vendors/Flot/jquery.flot.resize.js'></script>
      <!-- Flot plugins -->
      <script src='../vendors/flot.orderbars/js/jquery.flot.orderBars.js'></script>
      <script src='../vendors/flot-spline/js/jquery.flot.spline.min.js'></script>
      <script src='../vendors/flot.curvedlines/curvedLines.js'></script>
      <!-- DateJS -->
      <script src='../vendors/DateJS/build/date.js'></script>
      <!-- JQVMap -->
      <script src='../vendors/jqvmap/dist/jquery.vmap.js'></script>
      <script src='../vendors/jqvmap/dist/maps/jquery.vmap.world.js'></script>
      <script src='../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js'></script>
      <!-- bootstrap-daterangepicker -->
      <script src='../vendors/moment/min/moment.min.js'></script>
      <script src='../vendors/bootstrap-daterangepicker/daterangepicker.js'></script>


      <!-- Custom Theme Scripts -->
      <script src='../build/js/new_custom.js'></script>

      
      

        <!-- Datatables -->
        <link href='../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css' rel='stylesheet'>  
        <link href='../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css' rel='stylesheet'>
        <script src='../vendors/datatables.net/js/jquery.dataTables.min.js'></script>  
        <script src='../vendors/datatables.net-buttons/js/dataTables.buttons.min.js'></script>
        <script src='../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js'></script>    
        <script src='../vendors/datatables.net-buttons/js/buttons.print.min.js'></script>     
        <script src='../vendors/datatables.net-responsive/js/dataTables.responsive.min.js'></script>
        <script src='../vendors/datatables.net-buttons/js/dataTables.buttons.min.js'></script>

        <!-- MyDatePicker : add class as 'myDatePicker' -->
        <script src='custom/myDatePicker.js'></script>
        <script src='custom/bootstrap-datepicker.js'></script>
        <link rel='stylesheet' href='custom/bootstrap-datepicker.min.css' />

        <!-- Vehicle Finder : add class as 'vehicleFinder' -->
        <script src='custom/vehicleFinder.js'></script>

        <!-- rcholder Finder : add class as 'rcHolderFinder' -->
        <script src='custom/rcHolderFinder.js'></script>

        <!-- Date Setter : function setDate() ---- parameter - elementID,date -->
        <script src='custom/dateSetter.js'></script>

        

        <script src='js/buttons.html5.min.js'></script>
        <script src='js/jszip.min.js'></script>
        <script src='js/pdfmake.min.js'></script>
        <script src='js/vfs_fonts.js'></script>
        <script src='js/validation.js'></script>
        <link rel='stylesheet' href='custom/bootstrapValidator.min.css'/>
        <script type='text/javascript' src='custom/bootstrapValidator.min.js'> </script>
          ";




  }
}

/*$m=new MasterPageClass();
echo $m->getCountBar();*/

?>



