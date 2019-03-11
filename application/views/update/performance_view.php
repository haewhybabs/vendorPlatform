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
                  <h3><i class="fa fa-table"></i> <strong>Capability Rating </strong></h3>
                </div>
                <div class="panel-content">
                  <div class="filter-left">
                    <form action="<?=base_url();?>Update/performance_update" method="POST">
                    <table class="table table-dynamic table-tools" data-table-name="Total users">
                      <thead>
                        <tr>
                          <th>S/N</th>
                        
                          <th>Category</th>
                        
                            <th>Capability Rating<span style="color: red;">(* Sum Must Be 100)%</span></th>
                           
                        </tr>
                      </thead>
                      <tbody>
                         <?php 
                          $num=1;
                        foreach($category as $cat){
                            ?>
                        <tr>
                        <td><?= $num; ?></td>
                           <td>
                                <?=$cat->category;?>  
                            </td>                          
                           <td>
                                <input type="number" name="rating[]" value="<?=$cat->capability_rating;?>" min="1" max="100" >
                                <input type="hidden" name="category_id[]" value="<?=$cat->cat_id;?>">
                           
                            
                           </td>
                    
                        </tr>
                        <?php $num++;} ?>
                      </tbody>
                     
                    </table>
                    <input type="submit" class="btn btn-primary" value="Save">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

            <!--  <script type="text/javascript">
                                  (function(){
                                    $("#y").on("change", function(e){
                                      var x = $("#x").val()
                                      if($(this).val() > (100)-x){
                                        $(this).val((100-x));
                                        alert("sum of the field cannot be greater than 100")
                                      }
                                    })
                                    }())
              </script> -->



      








                             