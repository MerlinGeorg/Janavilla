        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                      <th>About Title</th>
                      <th>Long Desc</th>
                      <th>Short Desc</th>
                      <th>profile file</th>
                      
                      <th>Operations</th>
                      

                      
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($res as $row){?>
                  		  <tr>
		                      <td><?php echo $row->about_title?></td>
                          <td><?php echo $row->about_longdesc?></td>
		                      <td><?php echo $row->about_shortdesc?></td>
                          
		                      

                          <td>
                            <a target="blank" href="<?php echo base_url();?>/uploads/<?php echo $row->about_pic ?>"><img height="60" width="60" src="<?php echo base_url(); ?>uploads/agencyfile.png"></a>
                          </td>
                           
                          

                          
		                      <td>

                          <div class="media-right" class="col-md-2">
                           <div class="col-md-12">
                           <i data-toggle="modal" data-target="#trackermodal" onclick="editabout('<?php echo $row->about_id;?>');" style="margin-left: 10px" class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>

                           <!-- <i onclick="deleteproduct('<?php echo $row->product_id;?>','<?php echo $row->product_pic;?>');" style="margin-left: 30px" class="fa fa-times fa-lg" aria-hidden="true"></i> -->
                           </div>
                          </div>
 
                          </td>
		                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
  