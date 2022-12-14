        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                      <th>Store name</th>
                      <th>Address</th>
                      <th>Store name arab</th>
                      <th>Address arab</th>
                      <th>Type</th>
                      <th>Operations</th>
                      

                      
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
                  	foreach($res as $row){?>
                  		  <tr>
		                      <td><?php echo $row->store_name?></td>
                          <td><?php echo $row->store_adress?></td>
                           <td><?php echo $row->store_name_arab?></td>
                          <td><?php echo $row->store_adress_arab?></td>
                          <td><?php echo $row->store_type?></td>
                          
		                      

                          
                         
                          
		                      <td>

                          <div class="media-right" class="col-md-2">
                           <div class="col-md-12">
                           <i data-toggle="modal" data-target="#trackermodal" onclick="editstore('<?php echo $row->store_id ;?>');" style="margin-left: 10px" class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>

                           <i onclick="deletestore('<?php echo $row->store_id ;?>');" style="margin-left: 30px" class="fa fa-times fa-lg" aria-hidden="true"></i>
                           </div>
                          </div>
 
                          </td>
		                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
  