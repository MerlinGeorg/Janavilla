        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                      <th>News title</th>
                      <th>Description</th>
                       <th>News title Arabic</th>
                      <th>Description Arabic</th>
                      <th>Image</th>
                      
                      <th>Operations</th>
                      

                      
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($res as $row){?>
                  		  <tr>
		                      <td><?php echo $row->news_title?></td>
                          <td><?php echo $row->news_desc?></td>
                          <td><?php echo $row->news_title_arab?></td>
                          <td><?php echo $row->news_desc_arab?></td>
		                      

                          <td>
                            <img height="60" width="60" src="<?php echo base_url(); ?>uploads/<?php echo $row->news_pic ?>">
                          </td>
                           
                          

                          
		                      <td>

                          <div class="media-right" class="col-md-2">
                           <div class="col-md-12">
                           <i data-toggle="modal" data-target="#trackermodal" onclick="editnews('<?php echo $row->news_id;?>');" style="margin-left: 10px" class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>

                           <i onclick="deletenews('<?php echo $row->news_id;?>','<?php echo $row->news_pic;?>');" style="margin-left: 30px" class="fa fa-times fa-lg" aria-hidden="true"></i>
                           </div>
                          </div>
 
                          </td>
		                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
  