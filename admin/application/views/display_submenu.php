        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                      <th>Sub name</th>
                      <th>Sub name arabic</th>
                      <th>Main Menu</th>
                      <th>Description</th>
                      <th>Description arabic</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Operations</th>
                      

                      
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($res as $row){?>
                  		  <tr>
		                      <td><?php echo $row->submenu_name?></td>
		                      <td><?php echo $row->submenu_name_arab?></td>
                          <td><?php echo $row->main_menu?></td>
		                      <td><?php echo $row->submenu_desc?></td>
		                       <td><?php echo $row->submenu_desc_arab?></td>
		                      

                          <td>
                            <img height="60" width="60" src="<?php echo base_url(); ?>uploads/<?php echo $row->submenu_pic ?>">
                          </td>
                           
                          <?php
                             
                             $rqst_status = $row->submenu_status;

                             if ($rqst_status== 0)
                              {
                            
                           ?>
                          
                          <td><button class="btn btn-danger" onclick="statuschange(<?php echo $row->submenu_id?>,<?php echo $row->submenu_status?>);">blocked</button></td>

                          <?php
                              }
                           else
                            { 
                            
                           ?>

                           <td><button class="btn btn-success" onclick="statuschange(<?php echo $row->submenu_id?>,<?php echo $row->submenu_status?>);">showing</button></td>

                           <?php } ?> 

                          
		                      <td>

                          <div class="media-right" class="col-md-2">
                           <div class="col-md-12">
                           <i data-toggle="modal" data-target="#trackermodal" onclick="editsubmenu('<?php echo $row->submenu_id;?>');" style="margin-left: 10px" class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>

                           <i onclick="deletesubmenu('<?php echo $row->submenu_id;?>','<?php echo $row->submenu_pic;?>');" style="margin-left: 30px" class="fa fa-times fa-lg" aria-hidden="true"></i>
                           </div>
                          </div>
 
                          </td>
		                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
  