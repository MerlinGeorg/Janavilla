<div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Mail sender</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <!-- <a class="btn btn-icon icon-only"><i class="fa fa-rss"></i></a><a class="btn btn-icon icon-only"><i class="fa fa-star text-warning"></i></a> -->
               <!--  <button class="btn btn-secondary" type="button" data-toggle="collapse" href="#qmenu" aria-expanded="false" aria-controls="qmenu">Open menu</button> -->
                <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Send mail</button>
              </div>
            </div>

          </div>
        </div>
        <div class="container-fluid">
          <div class="panel-wrapper">
            <div class="panel" >
              <div class="panel-body table-responsive" style="overflow-x:auto;" id="tablefillextend" >
                
              </div>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT-->
        </div>
      <!-- END VIEW WAPPER-->

    </div>
    <!-- END MAIN WRAPPER-->
<div class="modal fade-scale" id="trackermodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="block-header bg-primary" id="modalcaption"></div>
          <div class="modal-body">
           <form method="POST" id="mailsenderform"  >

                  <div class="row m-b-2">
                    <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      <input type="hidden" id = "prodid" name="prodid"/>
                      <h4 class="demo-sub-title">Subject</h4>
                      <input class="form-control focus " type="text" required="required" name="msubject" id="msubject">
                    </div>  
                    
                    <div class="form-group col-sm-6">
                    <h4 class="demo-sub-title">User Type</h4>
                      
                       <select class="form-control focus" required="required" name="musertype" id="musertype">
                         <option value="">select</option>
                         <option value="Costumer">Costumer</option>
                         <option value="Supplier">Supplier</option>
                         
                       </select>
                    
                     </div>
                     </div>

                    

                      <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">Message</h4>
                      <textarea name="summernote" id="summernote" data-plugin="summernote" class="form-control focus"></textarea>
                    </div>  
                    
                    <div class="form-group col-sm-6">
                    <h4 class="demo-sub-title">Attachment</h4>
                      <input class="form-control focus" type="file" name="menu_image"  id="prodimage">
                    <!-- <input type="hidden" name="image1" id="image1"> -->
                    <!-- <div id="imagefill"></div> -->
                     </div>
                     </div>

                    

                    

                  </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            <button class="btn btn-primary"  type="submit" >Save</button>
            <!-- <button type="submit" class="form-control tn btn-primary btn-lg" name="save" value="save">Save</button> -->
          </div>
           </form>
        </div>
      </div>
    </div>
     <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>

     <script type="text/javascript">
      $( document ).ready(function() {
          getprods();

      });
      var chk = 0;
      function getprods(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_product/display_product');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#tablefillextend').html(data);
                $('#tablefill').DataTable();
                      
              }
             });
      }


      function clearall(){
        $('#modalcaption').text("Add Product");
        $('#prodname').val('');
        $('#prodsubmenu').val('');
        $('#prodbrand').val('');
        $('#prodprice').val('');
        $('#proddesc').val('');
        $('#prodcat').val('');
        
        
        $('#prodimage').val('');
        $('#imagefill').html('');
        $('#image1').val('');
          
        $('#prodid').val('');
        
        
        getprods();
        // $('#userfullname').val('');
        // $('#userfullname').val('');    
      }
      

      $("#mailsenderform").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Bulkmail_sent/mailsend');?>/",
              data: new FormData(this),
              processData:false,
                     contentType:false,
                     cache:false,
              // serializes the form's elements.
               success: function(data){

                alert(data);
               if($.trim(data) == "success"){
                  notifyresult('Data Saved','success');
                  $('#trackermodal').modal('hide');
                  getprods();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
                  getprods();
               }

              // show response from the php script.            
              }
             });
      });

      

      function getsubcat()
      {
        var subid = document.getElementById("prodsubmenu").value; 
        var proid = document.getElementById("prodid").value;
        // alert(subid);

         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_product/getsubcat');?>/",
              data: {subid:subid,proid:proid},
              // serializes the form's elements.
               success: function(data){

              // alert(data);
               
                $('#subcatdiv').html(data);
                  
              }
             });

      }
      



      function editproduct(id){
        $('#modalcaption').text("Edit Brand");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_product/editproduct');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              // alert(data);
              var res = JSON.parse(data);
              // getprods();
              
              
              // console.log(data);
              $("#prodimage").prop('required',false);
              $('#prodid').val(res.product_id);
              $('#prodname').val(res.product_name);
              $('#prodsubmenu').val(res.product_submenu);
              getsubcat();
              $('#prodbrand').val(res.product_brand);
              $('#prodprice').val(res.product_price);
              $('#proddesc').val(res.product_desc);
               
              
              $('#prodimage').val('');
             
              $('#image1').val(res.product_pic); 
              $('#imagefill').html('<img  style="width:250px;height:200px;"src="<?php echo base_url();?>/uploads/'+res.product_pic+'">') 

              
               $('#prodcat').val(res.product_category);
              // $('#file1').val(res.file);
              // $('#otherfill').html(res.file); 
              
               

            }
        });
      }

      
      function deleteproduct(id,img){
        var result = confirm("Are you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_product/delete_prod');?>/",
              data: {id:id,img:img}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Data Deleted','success');
                  getprods();
               }else{
                  notifyresult('Error','danger');
                  getprods();
               }
               

            }
        });
          }
        }





           function statuschange_prod(id,status)
           {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_product/changestatus');?>/",
              data: {id:id,status:status}, // serializes the form's elements.
             success: function(data)
             {
              if(data=="success")
              {
                getprods();
              }
             }
        });
           }
        
     
    </script>
   
   