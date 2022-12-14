        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                      <th>Agency name</th>
                      <th>arab name</th>
                      <th>Description</th>
                      <th>Arab Description</th>
                      <th>File</th>
                      <th>Logo</th>
                      <!-- <th>Status</th> -->
                      <th>Operations</th>
                      

                      
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($res as $row){?>
                  		  <tr>
		                      <td><?php echo $row->agencies_name?></td>
		                       <td><?php echo $row->agencies_name_arab?></td>
                          <td><?php echo $row->agencies_desc?></td>
                          <td><?php echo $row->agencies_desc_arab?></td>
                          
		                      

                          <td>
                            <a href="<?php echo base_url(); ?>uploads/<?php echo $row->agencies_file ?>" title="click to see"><img height="60" width="60" src="<?php echo base_url(); ?>uploads/agencyfile.png"></a>
                          </td>

                          <td>
                            <a href="<?php echo base_url(); ?>uploads/<?php echo $row->agencies_logo ?>" title="click to see"><img height="60" width="60" src="<?php echo base_url(); ?>uploads/<?php echo $row->agencies_logo ?>"></a>
                          </td>
                          
		                      <td>

                          <div class="media-right" class="col-md-2">
                           <div class="col-md-12">
                           <i data-toggle="modal" data-target="#trackermodal" onclick="editagency('<?php echo $row->agencies_id ;?>');" style="margin-left: 10px" class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>

                           <i onclick="deleteagency('<?php echo $row->agencies_id ;?>','<?php echo $row->agencies_file;?>','<?php echo $row->agencies_logo;?>');" style="margin-left: 30px" class="fa fa-times fa-lg" aria-hidden="true"></i>
                           </div>
                          </div>
 
                          </td>
		                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
  