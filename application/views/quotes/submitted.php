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
                  <h3><i class="fa fa-table"></i> <strong>Submitted Quotations</strong></h3>
                </div>
                <div class="panel-content">
                  <div class="filter-left">
                    <table class="table table-dynamic table-tools" data-table-name="Total users">
                      <thead>
                        <tr>
                          <th class="hidden">S/N</th>
                            <th>RFQ No.</th>
                            <th>Submission Date</th>
                            <th>Uploaded Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                        // var_dump($list);
                          $num=0;
                        foreach($message as $vendor){
                            ?>
                        <tr>
                        <td class="hidden"><?= $num; ?></td>
                            <td>RFQ0000<?= $vendor->rfq_ID; ?></td>
                            <td><?= $vendor->deadline; ?></td>
                            <td><?= $vendor->submission_date; ?></td>
                           
                           <td>
                             <a href="<?=base_url();?>quotes/View_Sent/<?=$vendor->rfq_ID;?>" class="btn btn-primary btn-sm"><span class="fa fa-upload"></span>View Quote sent</a>
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