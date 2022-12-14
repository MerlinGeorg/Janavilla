        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Mail id</th>
                      <th>Phone No</th>
                      <th>Status</th>
                      <th>Operations</th>
                     
                      

                      
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
        foreach($res as $row){?>

            
                       
                  		  <tr>
                       
		                      <td><?php echo $row->name?></td>
                          <td><?php echo $row->type?></td>
                          <td><?php echo $row->username?></td>
		                      <td><?php echo $row->password?></td>
                          <td><?php echo $row->mailid?></td>
                          <td><?php echo $row->phone?></td>
                      <?php
                             
                             $chk_status = $row->ustatus;

                             if ($chk_status== 1)
                              {
                            
                           ?>
                          
                          <td><button class="btn btn-success" onclick="statuschange(<?php echo $row->id?>,<?php echo $row->ustatus?>);">Active</button></td>

                          <?php
                              }
                           else
                            { 
                            
                           ?>

                           <td><button class="btn btn-danger" onclick="statuschange(<?php echo $row->id?>,<?php echo $row->ustatus?>);">Blocked</button></td>

                           <?php } ?> 


                           <td>

                          <div class="media-right" class="col-md-2">
                           <div class="col-md-12">
                           <i data-toggle="modal" data-target="#trackermodal" onclick="edituser('<?php echo $row->id;?>');" style="margin-left: 10px" class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>

                           <i onclick="deleteuser('<?php echo $row->id;?>');" style="margin-left: 30px" class="fa fa-times fa-lg" aria-hidden="true"></i>
                           </div>
                          </div>
 
                          </td>

		                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
  