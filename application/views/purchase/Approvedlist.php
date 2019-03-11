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
                          
                          <th>Product Name</th>
                           <th>Product Specification</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
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
                              <?=$vendor->product_name;?>
                            <td>
                                <?=$vendor->product_specification;?>
                            </td>
                            
                           <td>
                              <?=$vendor->quantity;?>
                           </td>
                           <td>
                            <?php $number=$vendor->negotiated_price;?>
                            <?php echo "N ".number_format($number, 2);?>
                           </td>   
                           <td>
                             <?php $x=$vendor->negotiated_price*$vendor->quantity;?>
                             <?php echo "N ".number_format($x, 2);?>

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