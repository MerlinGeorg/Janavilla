        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                      <th>Product name</th>
                      <th>SubMenu</th>
                      <th>category</th>
                      <th>Brand</th>
                      <th>price</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Operations</th>
                      

                      
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($res as $row){?>
                  		  <tr>
		                      <td><?php echo $row->product_name?></td>
                          <td><?php echo $row->productsubmenu?></td>
                          <td><?php echo $row->productcategory?></td>
		                      <td><?php echo $row->productbrand?></td>
                          <td><?php echo $row->product_price?></td>
                          <td><?php echo $row->product_desc?></td>
		                      

                          <td>
                            <img height="60" width="60" src="<?php echo base_url(); ?>uploads/<?php echo $row->product_pic ?>">
                          </td>
                           
                          <?php
                             
                             $rqst_status = $row->product_status;

                             if ($rqst_status== 0)
                              {
                            
                           ?>
                          
                          <td><button class="btn btn-danger" onclick="statuschange_prod(<?php echo $row->product_id?>,<?php echo $row->product_status?>);">blocked</button></td>

                          <?php
                              }
                           else
                            { 
                            
                           ?>

                           <td><button class="btn btn-success" onclick="statuschange_prod(<?php echo $row->product_id?>,<?php echo $row->product_status?>);">showing</button></td>

                           <?php } ?> 

                          
		                      <td>

                          <div class="media-right" class="col-md-2">
                           <div class="col-md-12">
                           <i data-toggle="modal" data-target="#trackermodal" onclick="editproduct('<?php echo $row->product_id;?>');" style="margin-left: 10px" class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>

                           <i onclick="deleteproduct('<?php echo $row->product_id;?>','<?php echo $row->product_pic;?>');" style="margin-left: 30px" class="fa fa-times fa-lg" aria-hidden="true"></i>
                           </div>
                          </div>
 
                          </td>
		                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
  