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
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header">
                  <h3><i class="fa fa-table"></i> <strong>Purchase Order</strong></h3>
                </div>
                <div class="panel-content">
                  <div class="filter-left">
                    <table class="table table-dynamic table-tools" data-table-name="Total users">
                      <thead>
                        <tr>
                          <th>S/N</th>
                        
                          <th>PO</th>
                        
                            <th>RFQ</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php 
                          $num=1;
                        foreach($purchase as $vendor){
                            ?>
                        <tr>
                        <td><?= $num; ?></td>
                           <td>
                            


                               <form enctype="multipart/form-data" method="post" action="<?= site_url('purchase_order/View_Purchase');?>"> 
                                   <input type="hidden" value="<?= $vendor->rfq_ID; ?>" name="rfq">
                                  <input type="submit" class="btn btn-success btn-sm" value="View Purchase Order">
                              </form>

                            
                            
                           <td>
                              RFQ0000<?=$vendor->rfq_ID;?>
                           </td>
                    
                        </tr>
                        <?php $num++;} ?>
                      </tbody>
                     
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>