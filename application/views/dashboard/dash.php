    <style>
       .modal-backdrop {
        display:static;
       }
       .general_text{
          margin-top: 50%;
       }
       .ptext{
        line-height: 28px;
       }
       .p_color{
          color: red;
          margin-right:7px;
          font-size: 15px;
       }
    </style>         
            <div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header">
                  <h3> <strong>STATUS: <?php if( $supplier_data->status_verification==1){ echo '<span class="text-warning">Pending</span>';} ?>
                  <?php if( $supplier_data->status_verification==2){ echo '<span class="text-success">Approved</span>';} ?>
                  <?php if( $supplier_data->status_verification==3){ echo '<span class="text-primary">Scheduled For Interview </span>';  echo '<small class="text-danger">( DATE:'.$int_data->date_interview.',  TIME:'; echo $int_data->time_interview.')</small>';} ?>
                  <?php if( $supplier_data->status_verification==4){ echo '<span class="text-danger">Rejected</span>';} ?>
                  
                  </strong></h3>
                </div>
                <div class="panel-content">
                  <div class="row">
                      <div class="col-sm-12">
                       <h3 style="color:#111">Update Profile (Complete registration by Updating all required fields)</h3>
                      </div>
                       <!--<div class="col-sm-5">
                          <div class="col-sm-6">Status:</div>
                           <div class="col-sm-6"><?= $supplier_data->company_name; ?></div>
                      </div>
                      <div class="col-sm-5">
                          <div class="col-sm-6">Company name:</div>
                           <div class="col-sm-6"><?= $supplier_data->company_name; ?></div>
                      </div>
                      <div class="col-sm-5">
                          <div class="col-sm-6">Reference Number:</div>
                           <div class="col-sm-6"><?= $supplier_data->reference_num; ?></div>
                      </div>
                        <div class="col-sm-5">
                          <div class="col-sm-6">Registration number:</div>
                           <div class="col-sm-6"><?= $supplier_data->company_name; ?></div>
                      </div>
                        <div class="col-sm-5">
                          <div class="col-sm-6">Company name:</div>
                           <div class="col-sm-6"><?= $supplier_data->company_name; ?></div>
                      </div>
                      
                        <div class="col-sm-5">
                          <div class="col-sm-6">Email:</div>
                           <div class="col-sm-6"><?= $supplier_data->company_name; ?></div>
                      </div>
                        <div class="col-sm-5">
                          <div class="col-sm-6">Phone:</div>
                           <div class="col-sm-6"><?= $supplier_data->company_name; ?></div>
                      </div>
                        <div class="col-sm-5">
                          <div class="col-sm-6">Specialty:</div>
                           <div class="col-sm-6"><?= $supplier_data->company_name; ?></div>
                      </div>
                  </div-->
                </div>
              </div>
            </div>
          </div>
          
            
         
                <div class="col-xlg-12 col-lg-3 col-sm-3">
                 <a href="<?= site_url('update/director'); ?>">
                  <div class="panel">
                    <div class="panel-content widget-small bg-gray">
                      <div class="title">
                          <h3>Add Director Details</h3> 
                      </div>
                      <div class="content">
                        
                      </div>
                    </div>
                  </div>
                  </a>
                </div>
                 <div class="col-xlg-12 col-lg-3 col-sm-3">
                  <a href="<?= site_url('update/contact'); ?>">
                  <div class="panel">
                    <div class="panel-content widget-small bg-gray">
                      <div class="title">
                         <h3>Add Contact Person</h3>
                      </div>
                      <div class="content">
                        
                      </div>
                    </div>
                  </div>
                     </a>
                </div>
                <div class="col-xlg-12 col-lg-3 col-sm-3">
                  <a href="<?= site_url('update/document'); ?>">
                  <div class="panel">
                    <div class="panel-content widget-small bg-gray">
                      <div class="title">
                         <h3>Upload Support documents</h3>
                      </div>
                      <div class="content">
                        <div></div>
                      </div>
                    </div>
                  </div>
                    </a>
                </div>
                <div class="col-xlg-12 col-lg-3 col-sm-3">
                  <a href="<?= site_url('update/equipment'); ?>">
                  <div class="panel">
                    <div class="panel-content widget-small bg-gray">
                      <div class="title">
                         <h3>Upload Equipments.</h3>
                      </div>
                      <div class="content">
                        <div></div>
                      </div>
                    </div>
                  </div>
                    </a>
                </div>
              
            <!--div class="col-xlg-6">
             <div class="panel">
                <div class="panel-header panel-controls">
                  <h3><i class="icon-list"></i> <strong>Todo</strong> List</h3>
                </div>
                <div class="panel-content">
                  <ul class="todo-list ui-sortable">
                    <li class="high">
                      <span class="span-check">
                      <input id="task-1" type="checkbox" data-checkbox="icheckbox_square-blue" />
                      <label for="task-1"></label>
                      </span>
                      <span class="todo-task">Send email to Bob Linch</span>
                      <div class="todo-date clearfix">
                        <div class="completed-date"></div>
                        <div class="due-date">Due on <span class="due-date-span">15 December 2014</span></div>
                      </div>
                      <span class="todo-options pull-right">
                      <a href="javascript:;" class="todo-delete"><i class="icons-office-52"></i></a>
                      </span>
                      <div class="todo-tags pull-right">
                        <div class="label label-success">Work</div>
                      </div>
                    </li>
                    <li>
                      <span class="span-check">
                      <input id="task-2" type="checkbox" data-checkbox="icheckbox_square-blue"/>
                      <label for="task-2"></label>
                      </span>
                      <span class="todo-task">Call datacenter for servers</span>
                      <div class="todo-date clearfix">
                        <div class="completed-date"></div>
                        <div class="due-date">Due on <span class="due-date-span">7 January</span></div>
                      </div>
                      <span class="todo-options pull-right">
                      <a href="javascript:;" class="todo-delete"><i class="icons-office-52"></i></a>
                      </span>
                    </li>
                    <li class="low">
                      <span class="span-check">
                      <input id="task-3" type="checkbox" data-checkbox="icheckbox_square-blue"/>
                      <label for="task-3"></label>
                      </span>
                      <span class="todo-task">Remove all unused icons</span>
                      <div class="todo-date clearfix">
                        <div class="completed-date"></div>
                        <div class="due-date">Due on <span class="due-date-span">5 January</span></div>
                      </div>
                      <span class="todo-options pull-right">
                      <a href="javascript:;" class="todo-delete"><i class="icons-office-52"></i></a>
                      </span>
                    </li>
                    <li class="medium">
                      <span class="span-check">
                      <input id="task-4" type="checkbox" data-checkbox="icheckbox_square-blue"/>
                      <label for="task-4"></label>
                      </span>
                      <span class="todo-task">Read my todo list</span>
                      <div class="todo-date clearfix">
                        <div class="completed-date"></div>
                        <div class="due-date">Due on <span class="due-date-span">4 January</span></div>
                      </div>
                      <span class="todo-options pull-right">
                      <a href="javascript:;" class="todo-delete"><i class="icons-office-52"></i></a>
                      </span>
                      <div class="todo-tags pull-right">
                        <div class="label label-info">Tuesday</div>
                      </div>
                    </li>
                    <li>
                      <span class="span-check">
                      <input id="task-6" type="checkbox" data-checkbox="icheckbox_square-blue"/>
                      <label for="task-6"></label>
                      </span>
                      <span class="todo-task">Have a breakfeast before 12</span>
                      <div class="todo-date clearfix">
                        <div class="completed-date"></div>
                        <div class="due-date">Due on <span class="due-date-span">1 January</span></div>
                      </div>
                      <span class="todo-options pull-right">
                      <a href="javascript:;" class="todo-delete"><i class="icons-office-52"></i></a>
                      </span>
                    </li>
                  </ul>
                  <div class="clearfix m-t-10">
                    <div class="pull-left">
                      <button type="button" class="btn btn-sm btn-default check-all-tasks">Check All Done</button>
                    </div>
                    <div class="pull-right">
                      <button type="button" class="btn btn-sm btn-dark add-task">Add Task</button>
                    </div>
                  </div>
                </div>
              </div>
            </div-->
          </div>
    <?php if($rating<100):?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

               <div class="container">
          <!-- Trigger the modal with a button -->

          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                 <!--  <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                  <h4 class="modal-title" style="text-align: center;"><strong><span style="color: red;">Capability Rating Update</span></strong></h4>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <img src="<?=base_url();?>assets/rating1.png">
                      
                    </div>

                    <div class="col-sm-6">
                      <div class="general_text">

                        <p class="ptext">It is required for all <span style="color: red;">Vendors</span> to update their Capability Rating.  </p>
                        <p class="ptext"><span class="p_color">*</span>Kindly check your profile and update it as soon as possible. Thank You</p>
                        
                      </div>


                      <a href="<?=base_url();?>update/Performance" class="btn btn-danger btn-large">Click Here</a>
                      
                      
                    </div>


                    
                  </div>
                </div>
                <div class="modal-footer">
                 <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
              </div>
              
            </div>
          </div>
          
        </div>
    <?php else:?>
    <?php endif;?>




<script type="text/javascript">
  $(window).load(function()
{    

  $('#myModal').modal({
    backdrop: 'static',
    keyboard: false
})

});
</script>
        