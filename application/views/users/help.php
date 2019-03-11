<!DOCTYPE html>
<html lang="en">
  
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Living Faith vendor Portal">
    <meta name="author" content="themes-lab">
   <link rel="shortcut icon" href="<?= base_url(); ?>assets/global/images/logo/new_logo.jpg" type="image/png">
    <title>Vendor's Registration Portal</title>
    <link href="<?= base_url(); ?>assets/global/css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/global/css/theme.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/global/css/ui.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/admin/layout1/css/layout.css" rel="stylesheet">
    <!-- BEGIN PAGE STYLE -->
    <link href="<?= base_url(); ?>assets/global/plugins/step-form-wizard/css/step-form-wizard.min.css" rel="stylesheet">
     <link href="<?= base_url(); ?>assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/global/plugins/input-text/style.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/global/plugins/select2/dist/css/select2.min.css" rel="stylesheet"/>
    <!-- END PAGE STYLE -->
    <script src="<?= base_url(); ?>assets/global/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <!-- BEGIN BODY -->
  <body class="fixed-topbar fixed-sidebar theme-sdtl" style="background:#fff">
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <section>
      <!-- BEGIN SIDEBAR -->
      <!-- END SIDEBAR -->
      <div class="container">
        <!-- BEGIN TOPBAR -->
        <!-- END TOPBAR -->
        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content page-wizard">
    
          <div class="header">
           <div class="text-center"><a href="<?= site_url(''); ?>"><img src="<?= base_url(); ?>assets/global/images/logo/new_logo.jpg" style="margin:auto"></a></div>
            <h2 class="text-center"><strong>LIVING FAITH CHURCH</strong> Vendors Complaint/Help Desk Form</h2>
            
          </div>
          <div class="row">
            <div class="col-lg-12">
             <?php
             if ($this->session->userdata('error') <> '') {
                echo '<div class="alert alert-dismissable alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <p>' . $this->session->userdata("error") . '</p>
                    </div>';
            }
             if ($this->session->userdata('message') <> '') {
                echo '<div class="alert alert-dismissable alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <p>' . $this->session->userdata("message") . '</p>
                    </div>';
            }
        ?>
             
              <div class="tabs tabs-linetriangle">
                <div class="tab-content">
                  <div class="tab-pane active" id="style">
                    
                <div class="wizard-div wizard-arrow current">
                    <form class="wizard wizard-validation form-validation" data-style="arrow" role="form" enctype="multipart/form-data" method="post" action="<?= site_url('registration/help_action') ?>">
                        
                          <div class="row">
                            <div class="col-lg-6">
                             
                              <div class="form-group">
                                <label for="exampleInputEmail1">Email address <span class="text-danger">*</span></label>
                                 <span class="text-danger"><?php echo form_error('comp_email'); ?></span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="comp_email" value="<?php echo set_value('comp_email'); ?>">
                              </div>
                               <div class="form-group">
                                <label for="exampleInputPassword1">Mobile Phone <span class="text-danger">*</span></label>
                                 <span class="text-danger"><?php echo form_error('comp_phone'); ?></span>
                                <input type="text" name="comp_phone" class="form-control" placeholder="Primary Phone" id="p_phone"  value="<?php echo set_value('comp_phone'); ?>">
                              </div>
                              
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Message<span class="text-danger">*</span></label>
                                  <span class="text-danger"><?php echo form_error('summary'); ?></span>
                                  <textarea  class="form-control" placeholder="Supply of 10 HVAC System to Sun Microsystems, Cost: 10 Million Naira" rows="6" name="summary" ><?php echo set_value('summary'); ?></textarea>
                              </div>
    
                            </div>
                            
                        </div>
                        <input class="nocsript-finish-btn sf-center nocsript-sf-btn" type="submit" value="Submit Complaint"/>
                      </form>
                    </div>
                  </div>
            </div>
          </div>
          <div class="footer">
            <div class="copyright">
              <p class="pull-center sm-pull-reset">
                <span>Copyright <span class="copyright">©</span> <?= date('Y'); ?> Living Faith Church. </span>
                <span>All rights reserved. </span>
              </p>
              <p class="pull-right sm-pull-reset">
               
              </p>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT -->
      </div>
      <!-- END MAIN CONTENT -->
     
   

    <!-- END PRELOADER -->
    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a> 
    <!-- BEGIN PAGE SCRIPTS -->
    
     <script src="<?= base_url(); ?>assets/global/plugins/jquery/jquery-3.1.0.min.js"></script>
    <script src="<?= base_url(); ?>assets/global/plugins/jquery/jquery-migrate-3.0.0.min.js"></script>
    <script src="<?= base_url(); ?>assets/global/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?= base_url(); ?>assets/global/plugins/gsap/main-gsap.min.js"></script>
    <script src="<?= base_url(); ?>assets/global/plugins/tether/js/tether.min.js"></script>
    <script src="<?= base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/global/plugins/bootstrap/js/jasny-bootstrap.min.js"></script>
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
    <script src="<?= base_url(); ?>assets/global/plugins/charts-chartjs/Chart.min.js"></script>
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
    <script src="<?= base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> <!-- >Bootstrap Date Picker -->
    <script src="<?= base_url(); ?>assets/global/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script> <!-- >Bootstrap Date Picker in Spanish (can be removed if not use) -->
    
    <script src="<?= base_url(); ?>assets/global/js/builder.js"></script> <!-- Theme Builder -->
    <script src="<?= base_url(); ?>assets/global/js/sidebar_hover.js"></script> <!-- Sidebar on Hover -->
    <script src="<?= base_url(); ?>assets/global/js/application.js"></script> <!-- Main Application Script -->
    <script src="<?= base_url(); ?>assets/global/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
    <script src="<?= base_url(); ?>assets/global/js/widgets/notes.js"></script> <!-- Notes Widget -->
    <script src="<?= base_url(); ?>assets/global/js/quickview.js"></script> <!-- Chat Script -->
    <script src="<?= base_url(); ?>assets/global/js/pages/search.js"></script> <!-- Search Script -->
    <!-- END PAGE SCRIPTS -->
    <script src="<?= base_url(); ?>assets/admin/layout1/js/layout.js"></script>

  </body>

<!-- Mirrored from themes-lab.com/make/admin/layout1/forms-wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 May 2018 16:24:52 GMT -->
</html>
