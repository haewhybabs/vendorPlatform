<link href="<?= base_url(); ?>assets/global/plugins/datatables/dataTables.min.css" rel="stylesheet">
    <div class="row">
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
                <style>
                   .modal-backdrop {
                    display:none;
                   }
                </style>

              <div class="col-lg-5 portlets">

                        <div class="panel">
                              <div class="panel-header">
                                <h3><i class="fa fa-table"></i> <strong>Your Company Category</strong></h3>
                              </div>
                              <div class="panel-content">
                                <div class="filter-left">
                                      <table class="table table-dynamic table-tools" data-table-name="Total users">
                                            <thead>
                                              <tr>
                                                <th>S/N</th>
                                                
                                                <th>Category</th>
                                                 
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php $x=1;?>
                                              <?php foreach ($my_category as $key):?>         
                                                <tr>
                                                  <td><?=$x;?></td>
                                                  <td><?=$key->category;?></td>
                                                  
                                                </tr>
                                                <?php $x++;?>
                                              <?php endforeach;?>
                                                
                                              
                                            </tbody>
                                       
                                      </table>
                                </div>
                              </div>

                        </div>
              
              </div>

              <div class="col-lg-7 portlets">

                    <div class="panel">
                              <div class="panel-header">
                                <h3><i class="fa fa-table"></i> <strong>All Categories</strong></h3>
                              </div>
                              <div class="panel-content">
                                <div class="filter-left">
                                  <form action="<?=base_url();?>Profile/category_update" method="POST">
                                    
                                  
                                      <table class="table table-dynamic " data-table-name="Total users" data-page-length='100'>
                                            <thead>
                                              <tr>
                                                <th>S/N</th>
                                                
                                                <th>Category</th>
                                                <th>action</th>
                                                 
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <?php $x=1;?>
                                              <?php foreach ($all_category as $cat):?>         
                                                <tr>
                                                  <td><?=$x;?></td>
                                                  <td><?=$cat->category;?></td>
                                                  <td><input type="checkbox" data-checkbox="icheckbox_square-blue" name="specialty[]" value="<?= $cat->id; ?>" ></td>


                                                  
                                                </tr>
                                                <?php $x++;?>
                                              <?php endforeach;?>

                                                
                                              
                                            </tbody>
                                       
                                      </table>
                                      <?php foreach ($my_category as $catt):?>
                                                   
                                          <input type="hidden" name="id[]" value="<?=$catt->cven_id;?>">
                                      <?php endforeach;?>
                                  <input type="submit" class="btn btn-primary" value="Update">
                                  </form>
                                </div>
                              </div>

                        </div>

              </div>
    </div>