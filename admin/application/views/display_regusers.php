        <table class="table table-hover table-bordered  " id="tablefill">
           <thead>
                    <tr>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Mail id</th>
                      <th>Phone No</th>
                      <th>Register time</th>
                      <th>status</th>
                     
                      

                      
                    </tr>
                  </thead>
                  <tbody>

                  	<?php 
                  	
        foreach($res as $row){?>

            <?php $statval = $row->reg_check_stat;

                if($statval==0)
                    { ?>
                      <tr style="background-color: aqua;">
            <?php  }
                  else
                  {?>
                       
                  		  <tr>
                   <?php } ?>       
		                      <td><?php echo $row->reg_name?></td>
                          <td><?php echo $row->reg_type?></td>
                          <td><?php echo $row->reg_mail?></td>
		                      <td><?php echo $row->reg_phon?></td>
                          
                          <td><?php echo $row->reg_datetime?></td>
                      <?php
                             
                             $chk_status = $row->reg_check_stat;

                             if ($chk_status== 0)
                              {
                            
                           ?>
                          
                          <td><button class="btn btn-danger" onclick="statuschange_reguser(<?php echo $row->reg_id?>,<?php echo $row->reg_check_stat?>);">New</button></td>

                          <?php
                              }
                           else
                            { 
                            
                           ?>

                           <td><button class="btn btn-success" disabled="disabled">Checked</button></td>

                           <?php } ?> 

		                       
                    		</tr>
                  	<?php }?>  
                  </tbody>
                </table>
  