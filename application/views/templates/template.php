<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themes-lab.com/make/admin/layout1/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 May 2018 16:20:29 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/global/images/logo/new_logo.jpg" type="image/png">
    <title><?php echo $title; ?></title>
    <link href="<?= base_url(); ?>assets/global/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/global/css/theme.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/global/css/ui.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/admin/layout1/css/layout.css" rel="stylesheet">
    
    <!-- BEGIN PAGE STYLE -->
     <link href="<?= base_url(); ?>assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/global/plugins/input-text/style.min.css" rel="stylesheet">
    <!-- BEGIN PAGE STYLE -->
    <link href="<?= base_url(); ?>assets/global/plugins/metrojs/metrojs.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/global/plugins/maps-amcharts/ammap/ammap.css" rel="stylesheet">
     <link href="<?= base_url(); ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/global/plugins/select2/dist/css/select2.min.css" rel="stylesheet"/>
    <style>
        .noty_message{display: none;}
         .e-title{
            float: left;
    padding: 10px 20px;
    font-size: 20px;
        }
    </style>    <!-- END PAGE STYLE -->
    <script src="<?= base_url(); ?>assets/global/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <!-- THEME COLOR: Apply "color-blue" for blue color: #4A89DC -->
  <!-- BEGIN BODY -->
   <body class="fixed-topbar fixed-sidebar theme-sdtl color-default dashboard">
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <section>
      <?php  
        $login=$this->session->userdata('vendor_logged_in');
         // print_r($login);
         $email=$login['email']; 
         $company_name=$login['company_name']; 
         $company_id=$login['company_id'];
     ?>
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar">
        <div class="logopanel">
          <img src="<?= base_url();?>assets/global/images/logo/new_logo.jpg" style="width: 50px;margin-top: -12px;">
        </div>
        <div class="sidebar-inner">
          <div class="sidebar-top">
            
            <div class="userlogged clearfix">
              <div class="user-details">
                <h4><?= $company_name; ?></h4>
                <div class="dropdown user-login">
                  <button class="btn btn-xs dropdown-toggle btn-rounded" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" data-delay="300">
                  <i class="online"></i><span>Available</span><i class="fa fa-angle-down"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <ul class="nav nav-sidebar">
            <li class=" nav-active active"><a href="<?= site_url(''); ?>"><i class="icon-home"></i><span>Dashboard</span></a></li>
          
            <li class="nav-parent">
              <a href="#"><i class="fa fa-archive"></i><span>Profile </span><span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li><a href="<?= site_url('profile'); ?>">Basic Information</a></li>
                 <li><a href="<?= site_url('update/Performance'); ?>"> Capability Rating</a></li>
                <li><a href="<?= site_url('update/director'); ?>"> Directors</a></li>
                <li><a href="<?= site_url('update/contact'); ?>"> Contact Person</a></li>
                <li><a href="<?= site_url('update/equipment'); ?>">Equipments</a></li>
                <li><a href="<?= site_url('update/document'); ?>">Legal Documents</a></li>
                 <?php if( $supplier_data->status_verification !=2){ ?>
                 <li><a href="<?= site_url('profile/update_category'); ?>">Change Specialization</a></li>
                <?php } ?>
                
              </ul>
            </li>
            <li class="nav-parent">
              <a href="#"><i class="fa fa-table"></i><span>Quotes</span><span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li><a href="<?= site_url('quotes'); ?>"> Quote requests</a></li>
                <li><a href="<?= site_url('quotes/submit'); ?>"> Submitted Quotes</a></li>
              </ul>
            </li>
            
            <li><a href="<?= site_url('purchase_order'); ?>"><i class="fa fa-edit"></i><span> Purchase Order</span></a> </li>
            

             <li><a href="<?= site_url('profile/change_password'); ?>"><i class="fa fa-anchor"></i> Change password</a></li>

            <li><a href="<?= site_url('home/logout'); ?>"><i class="icon-power"></i><span> Logout</span></a> </li>
           
          </ul>
          
          <div class="sidebar-footer clearfix">
            <a class="pull-left footer-settings" href="#" data-rel="tooltip" data-placement="top" data-original-title="Settings">
            <i class="icon-settings"></i></a>
            <a class="pull-left btn-effect" href="<?= site_url('home/logout'); ?>" data-modal="modal-1" data-rel="tooltip" data-placement="top" data-original-title="Logout">
            <i class="icon-power"></i></a>
          </div>
        </div>
      </div>
      <!-- END SIDEBAR -->
      <div class="main-content">
        <!-- BEGIN TOPBAR -->
        <div class="topbar">
          <h6 class="e-title"><a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span class="fa fa-align-justify"></span></span></a> &nbsp;&nbsp; Living Faith Vendors Portal</h6>

          <div class="header-right">
            <ul class="header-menu nav navbar-nav">
            
              <!-- END USER DROPDOWN -->
              <!-- BEGIN NOTIFICATION DROPDOWN -->
             
              <!-- END NOTIFICATION DROPDOWN -->
              
              <!-- END MESSAGES DROPDOWN -->
              <!-- BEGIN USER DROPDOWN -->
              <li class="dropdown" id="user-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <i class="icon-user"></i>
                <span class="username">Welcome, <?= $company_name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="<?= site_url('home/logout'); ?>"><i class="icon-logout"></i><span>Logout</span></a>
                  </li>
                </ul>
              </li>
              <!-- END USER DROPDOWN -->
              <!-- CHAT BAR ICON -->
              
            </ul>
          </div>
          <!-- header-right -->
        </div>
        <!-- END TOPBAR -->
        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-thin">
         <div class="row">
        
        <?php echo $body; ?>
               
                </div>
             </div>
          <div class="footer">
            <div class="copyright">
              <p class="pull-left sm-pull-reset">
                 <span>Copyright © <?= date('Y'); ?> </span><span>Living Faith Church</span>.<span> All rights reserved.</span>
              </p>
              <p class="pull-right sm-pull-reset">
               
              </p>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT -->
       
      </div>
      <!-- END MAIN CONTENT -->
    </section>
  
    <!-- END PRELOADER -->
    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a> 
    <script src="<?= base_url(); ?>assets/global/plugins/jquery/jquery-3.1.0.min.js"></script>
    <script src="<?= base_url(); ?>assets/global/plugins/jquery/jquery-migrate-3.0.0.min.js"></script>
    <script src="<?= base_url(); ?>assets/global/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?= base_url(); ?>assets/global/plugins/gsap/main-gsap.min.js"></script>
    <script src="<?= base_url(); ?>assets/global/plugins/tether/js/tether.min.js"></script>
    <script src="<?= base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/global/plugins/appear/jquery.appear.js"></script>
    <script src="<?= base_url(); ?>assets/global/plugins/jquery-cookies/jquery.cookies.min.js"></script> <!-- Jquery Cookies, for theme -->
    <script src="<?= base_url(); ?>assets/global/plugins/jquery-block-ui/jquery.blockUI.min.js"></script> <!-- simulate synchronous behavior when using AJAX -->
    <script src="<?= base_url(); ?>assets/global/plugins/bootbox/bootbox.min.js"></script> <!-- Modal with Validation -->
    <script src="<?= base_url(); ?>assets/global/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> <!-- Custom Scrollbar sidebar -->
    <script src="<?= base_url(); ?>assets/global/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->
    <script src="<?= base_url(); ?>assets/global/plugins/charts-sparkline/sparkline.min.js"></script> <!-- Charts Sparkline -->
    <script src="<?= base_url(); ?>assets/global/plugins/retina/retina.min.js"></script> <!-- Retina Display -->
    <script src="<?= base_url(); ?>assets/global/plugins/select2/dist/js/select2.full.min.js"></script> <!-- Select Inputs -->
    <script src="<?= base_url(); ?>assets/global/plugins/icheck/icheck.min.js"></script> <!-- Checkbox & Radio Inputs -->
    <script src="<?= base_url(); ?>assets/global/plugins/backstretch/backstretch.min.js"></script> <!-- Background Image -->
    <script src="<?= base_url(); ?>assets/global/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> <!-- Animated Progress Bar -->
    <script src="<?= base_url(); ?>assets/global/js/builder.js"></script> <!-- Theme Builder -->
    <script src="<?= base_url(); ?>assets/global/js/sidebar_hover.js"></script> <!-- Sidebar on Hover -->
    <script src="<?= base_url(); ?>assets/global/js/application.js"></script> <!-- Main Application Script -->
    <script src="<?= base_url(); ?>assets/global/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
    <script src="<?= base_url(); ?>assets/global/js/widgets/notes.js"></script> <!-- Notes Widget -->
    <script src="<?= base_url(); ?>assets/global/js/quickview.js"></script> <!-- Chat Script -->
    <script src="<?= base_url(); ?>assets/global/js/pages/search.js"></script> <!-- Search Script -->
    <!-- BEGIN PAGE SCRIPT -->
    <script src="<?= base_url(); ?>assets/global/plugins/metrojs/metrojs.min.js"></script> <!-- Flipping Panel -->
    <script src="<?= base_url(); ?>assets/global/plugins/noty/jquery.noty.packaged.min.js"></script>  <!-- Notifications -->
    <script src="<?= base_url(); ?>assets/global/plugins/bootstrap-editable/js/bootstrap-editable.min.js"></script> <!-- Inline Edition X-editable -->
    <script src="<?= base_url(); ?>assets/global/plugins/bootstrap-context-menu/bootstrap-contextmenu.min.js"></script> <!-- Context Menu -->
    <script src="<?= base_url(); ?>assets/global/plugins/multidatepicker/multidatespicker.min.js"></script> <!-- Multi dates Picker -->
    <script src="<?= base_url(); ?>assets/global/plugins/charts-chartjs/Chart.min.js"></script>  <!-- ChartJS Chart -->
    <script src="<?= base_url(); ?>assets/global/plugins/charts-highstock/js/highstock.js"></script> <!-- financial Charts -->
    <script src="<?= base_url(); ?>assets/global/plugins/charts-highstock/js/modules/exporting.js"></script> <!-- Financial Charts Export Tool -->
    <script src="<?= base_url(); ?>assets/global/plugins/maps-amcharts/ammap/ammap.js"></script> <!-- Vector Map -->
    <script src="<?= base_url(); ?>assets/global/plugins/maps-amcharts/ammap/maps/js/worldLow.js"></script> <!-- Vector World Map  -->
    <script src="<?= base_url(); ?>assets/global/plugins/maps-amcharts/ammap/themes/black.js"></script> <!-- Vector Map Black Theme -->
    <script src="<?= base_url(); ?>assets/global/plugins/skycons/skycons.min.js"></script> <!-- Animated Weather Icons -->
    <script src="<?= base_url(); ?>assets/global/plugins/simple-weather/jquery.simpleWeather.js"></script> <!-- Weather Plugin -->
    <script src="<?= base_url(); ?>assets/global/js/widgets/todo_list.js"></script>
    <script src="<?= base_url(); ?>assets/global/js/widgets/widget_weather.js"></script>
    <script src="<?= base_url(); ?>assets/global/js/pages/dashboard.js"></script>
    <script src="<?= base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> <!-- >Bootstrap Date Picker -->
    
     <!-- BEGIN PAGE SCRIPT -->
     <script src="<?= base_url(); ?>assets/global/plugins/step-form-wizard/plugins/parsley/parsley.min.js"></script> <!-- OPTIONAL, IF YOU NEED VALIDATION -->
    <script src="<?= base_url(); ?>assets/global/plugins/step-form-wizard/js/step-form-wizard.js"></script> <!-- Step Form Validation -->
    <script src="<?= base_url(); ?>assets/global/plugins/step-form-wizard/js/reg.js"></script>
    <script src="<?= base_url(); ?>assets/global/js/pages/form_wizard.js"></script>
    <script src="<?= base_url(); ?>assets/admin/layout1/js/layout.js"></script>
    <script src="<?= base_url(); ?>assets/global/plugins/switchery/switchery.min.js"></script> <!-- IOS Switch -->
    <script src="<?= base_url(); ?>assets/global/plugins/bootstrap-tags-input/bootstrap-tagsinput.min.js"></script> <!-- Select Inputs -->
    <script src="<?= base_url(); ?>assets/global/plugins/dropzone/dropzone.min.js"></script>  <!-- Upload Image & File in dropzone -->
    <script src="<?= base_url(); ?>assets/global/js/pages/form_icheck.js"></script>  <!-- Change Icheck Color - DEMO PURPOSE - OPTIONAL -->
    <script src="<?= base_url(); ?>assets/global/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script> <!-- >Bootstrap Date Picker in Spanish (can be removed if not use) -->
     <!-- BEGIN PAGE SCRIPTS -->
    <script src="<?= base_url(); ?>assets/global/plugins/datatables/jquery.dataTables.min.js"></script> <!-- Tables Filtering, Sorting & Editing -->
    <script src="<?= base_url(); ?>assets/global/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/global/js/pages/table_dynamic.js"></script>
    
    
     <!-- BEGIN PAGE SCRIPTS -->
     
  </body>

<!-- Mirrored from themes-lab.com/make/admin/layout1/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 May 2018 16:22:57 GMT -->
</html>

