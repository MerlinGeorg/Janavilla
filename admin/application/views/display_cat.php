        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                      <th>Category name</th>
                      <th>SubMenu</th>
                      <th>Category code</th>
                      <th>Category name Arab</th>
                      <th>Description</th>
                      <th>Description Arab</th>
                      <th>Status</th>
                      <th>Operations</th>
                      

                      
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($res as $row){?>
                  		  <tr>
		                      <td><?php echo $row->category_name?></td>
                          
                          <td><?php echo $row->sub_menu?></td>
                          <td><?php echo $row->category_code?></td>
                          <td><?php echo $row->category_name_arab?></td>
		                      <td><?php echo $row->category_desc?></td>
                          <td><?php echo $row->category_desc_arab?></td>
                          
                           
                          <?php
                             
                             $rqst_status = $row->category_status;

                             if ($rqst_status== 0)
                              {
                            
                           ?>
                          
                          <td><button class="btn btn-danger" onclick="statuschange_cat(<?php echo $row->category_id ?>,<?php echo $row->category_status?>);">blocked</button></td>

                          <?php
                              }
                           else
                            { 
                            
                           ?>

                           <td><button class="btn btn-success" onclick="statuschange_cat(<?php echo $row->category_id?>,<?php echo $row->category_status?>);">showing</button></td>

                           <?php } ?> 

                          
		                      <td>

                          <div class="media-right" class="col-md-2">
                           <div class="col-md-12">
                           <i data-toggle="modal" data-target="#trackermodal" onclick="editcat('<?php echo $row->category_id;?>');" style="margin-left: 10px" class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>

                           <i onclick="deletecat('<?php echo $row->category_id;?>');" style="margin-left: 30px" class="fa fa-times fa-lg" aria-hidden="true"></i>
                           </div>
                          </div>
 
                          </td>
		                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
  