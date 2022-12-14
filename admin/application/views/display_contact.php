        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                      <th>Contact Title</th>
                      <th>phone 1</th>
                      <th>phone 2</th>
                      <th>Mail 1</th>
                      <th>Mail 2</th>
                      <th>Adress 1</th>
                      <th>Adress 2</th>
                       <th>Adress arabic</th>
                      <th>Map url</th>
                      <th>Image</th>
                      
                      <th>Operations</th>
                      

                      
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($res as $row){?>
                  		  <tr>
		                      <td><?php echo $row->contact_title?></td>
                          <td><?php echo $row->contact_ph1?></td>
		                      <td><?php echo $row->contact_ph2?></td>
                          <td><?php echo $row->contact_mail1?></td>
                          <td><?php echo $row->contact_mail2?></td>
                          <td><?php echo $row->contact_adrs1?></td>
                          <td><?php echo $row->contact_adrs2?></td>
                          <td><?php echo $row->contact_adrs_arab?></td>
                          <td><?php echo $row->map?></td>
                          
		                      

                          <td>
                            <img height="60" width="60" src="<?php echo base_url(); ?>uploads/<?php echo $row->contact_pic ?>">
                          </td>
                           
                          

                          
		                      <td>

                          <div class="media-right" class="col-md-2">
                           <div class="col-md-12">
                           <i data-toggle="modal" data-target="#trackermodal" onclick="editcontact('<?php echo $row->contact_id;?>');" style="margin-left: 10px" class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>

                           <!-- <i onclick="deleteproduct('<?php echo $row->product_id;?>','<?php echo $row->product_pic;?>');" style="margin-left: 30px" class="fa fa-times fa-lg" aria-hidden="true"></i> -->
                           </div>
                          </div>
 
                          </td>
		                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
  