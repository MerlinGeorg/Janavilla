<div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Store page</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
               
                <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add Store</button>
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
           <form method="POST" id="prodForm"  >

                  <div class="row m-b-2">
                    <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      <input type="hidden" id = "storeid" name="storeid"/>
                      <h4 class="demo-sub-title"> Store Name</h4>
                      <input class="form-control focus " type="text" required="required" name="storename" id="storename">
                    </div>  
                     <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title"> Store Type</h4>
                      <select name="storetype" required="required" id="storetype" class="form-control focus ">
                        <option value="">Select</option>
                        <option value="Domestic">Domestic</option>
                        <option value="International">International</option>
                      </select>
                     </div> 
                      
                     </div>

                    <div class="col-sm-12">
                        <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title"> Store Name arabic</h4>
                      <input class="form-control focus " type="text" required="required" name="storenamearab" id="storenamearab">
                    </div>
                    <div class="form-group col-sm-12">
                      
                      <h4 class="demo-sub-title">Address</h4>
                      <textarea name="storeadress" id="storeadress" class="form-control focus"></textarea>
                    </div>  
                    <div class="form-group col-sm-12">
                      
                      <h4 class="demo-sub-title">Address arabic</h4>
                      <textarea name="storeadressarab" id="storeadressarab" class="form-control focus"></textarea>
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
          getstore();

      });
      var chk = 0;
      function getstore(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_store/display_store');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#tablefillextend').html(data);
                $('#tablefill').DataTable();
                      
              }
             });
      }




      function clearall(){
        $('#modalcaption').text("Add Store");
        $('#storename').val('');
         $('#storenamearab').val('');
        // $('#branddesc').val('');
        
        
        $('#storetype').val('');
       
        $('#storeadress').val('');
        $('#storeadressarab').val('');
          
        $('#storeid').val('');
        
        getstore();
        
        // $('#userfullname').val('');
        // $('#userfullname').val('');    
      }


      

      $("#prodForm").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_store/insertStore');?>/",
              data: new FormData(this),
              processData:false,
                     contentType:false,
                     cache:false,
              // serializes the form's elements.
               success: function(data){

                // alert(data);
               if($.trim(data) == "success"){
                  notifyresult('Data Saved','success');
                  $('#trackermodal').modal('hide');
                  getstore();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
                  getstore();
               }

              // show response from the php script.            
              }
             });
      });

      



      function editstore(id){
        $('#modalcaption').text("Edit Store");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_store/editstore');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              // alert(data);
              var res = JSON.parse(data);
              getstore();
              // console.log(data);
             
              $('#storeid').val(res.store_id );
              $('#storename').val(res.store_name);
              $('#storenamearab').val(res.store_name_arab);
              $('#storetype').val(res.store_type);
              $('#storeadress').val(res.store_adress);
              $('#storeadressarab').val(res.store_adress_arab);
              
              
             
              
               

            }
        });
      }
      
    

       function deletestore(id){
        var result = confirm("Are you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_store/delete_store');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){

              // alert(data);
              if(data == "success"){

                  notifyresult('Data Deleted','success');
                  getstore();
               }else{
                  notifyresult('Error','danger');
               }
               

            }
        });
          }
        }


           
     
    </script>
   
   