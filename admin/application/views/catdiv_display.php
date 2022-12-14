


<select class="form-control focus" name="prodcat" id="prodcat" >                      
	               <?php
	               // print_r($prod_cat);
	               // echo $subid;
	                $prodcat =$prod_cat->category_id;
                      
                      if($prodcat!='')
                      {
                      	if($subid==$prod_cat->category_submenu)
                      	{
	                ?>
                      <option value="<?php echo $prodcat ?>"><?php echo $prod_cat->category_name ?></option>
                      <?php
                        }
                      }
                      else
                      {
                      	?>
                      <option value="">Select</option>
                      <?php 
                      }
                      
                       foreach ($res as $row ) {                      	
                       ?> 
                       <option value="<?php echo $row->category_id ?>"><?php echo $row->category_name ?></option>
                   <?php } ?>

</select>