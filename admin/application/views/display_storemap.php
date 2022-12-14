        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                      
                      <th> Store map url(src only)</th>
                      <th> Store type</th>
                      
                      <th>Operations</th>
                      

                      
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($res as $row){?>
                  		  <tr>
		                      <td><?php echo $row->smap_url?></td>
                          <td><?php echo $row->smap_type?></td>
                          

                           
                          

                          
		                      <td>

                          <div class="media-right" class="col-md-2">
                           <div class="col-md-12">
                           <i data-toggle="modal" data-target="#trackermodal" onclick="editmap('<?php echo $row->smap_id;?>');" style="margin-left: 10px" class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>

                           <!-- <i onclick="deleteproduct('<?php echo $row->product_id;?>','<?php echo $row->product_pic;?>');" style="margin-left: 30px" class="fa fa-times fa-lg" aria-hidden="true"></i> -->
                           </div>
                          </div>
 
                          </td>
		                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
  