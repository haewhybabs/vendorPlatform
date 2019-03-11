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
                  <h3><i class="fa fa-table"></i> <strong>Requested Quotations</strong></h3>
                </div>
                <div class="panel-content">
                  <div class="filter-left">
                    <table class="table table-dynamic table-tools" data-table-name="Total users">
                      <thead>
                        <tr>
                          <th class="hidden">S/N</th>
                           <th>Equipment Category</th>
                            <th>RFQ No.</th>
                            <th>Submission Date</th>
                            <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php 
                          $num=0;
                        foreach($list as $vendor){
                            ?>
                        <tr>
                        <td class="hidden"><?= $num; ?></td>
                          <td><?= $vendor->category; ?></td>
                            <td>RFQ000<?= $vendor->rfq_ID; ?></td>
                            <td><?= $vendor->deadline; ?></td>
                            <td>
                                <?php if( $vendor->quote_sent == 0){?>
                                 <span class="text-warning">Yet to send Quote</span>
                                 <?php }else{?>
                               <span class="text-success">Quote sent</span>
                           <?php } ?>
                            </td>
                           <td>
                            <a href="<?= base_url();?>quotes/download/<?=$vendor->req_ID;?>" class="btn btn-primary btn-sm"><span class="fa fa-download"></span> Download RFQ</a>
                             <?php if( $vendor->quote_sent == 0){?>
                                <a href="<?=base_url();?>quotes/upload/<?=$vendor->rfq_ID;?>" class="btn btn-primary btn-sm"><span class="fa fa-upload"></span>Send Quote</a>
                           <?php }else{?>
                               <a href="<?=base_url();?>quotes/View_Sent/<?=$vendor->rfq_ID;?>" class="btn btn-primary btn-sm"><span class="fa fa-upload"></span>View Quote sent</a>
                            
                              
                            </div>
                        <?php } ?>

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