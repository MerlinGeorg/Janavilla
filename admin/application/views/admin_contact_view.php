<div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Contact Page</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
               
               <!--  <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add product</button> -->
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
                      <input type="hidden" id = "contactid" name="contactid"/>
                      <h4 class="demo-sub-title">Title</h4>
                      <input class="form-control focus " type="text" required="required" name="conatcttitle" id="conatcttitle">
                    </div>  
                    
                      <div class="form-group col-sm-6">
                       <h4 class="demo-sub-title">image</h4>
                      <input class="form-control focus" type="file" name="menu_image"  id="conatctimage" required="required">
                    <input type="hidden" name="image1" id="image1">
                    <div id="imagefill"></div>
                                    
                     </div>
                     </div>

                    <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">Mail id 1</h4>
                      <input type="mail" class="form-control" name="mailid1" required="required" id="mailid1">
                    </div>  
                    
                     <div class="form-group col-sm-6">

                     <h4 class="demo-sub-title">Mail id 2</h4>
                      <input type="mail" class="form-control" placeholder="optional" name="mailid2" id="mailid2">

                    
                     </div>
                     </div>

                    <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">Phone 1</h4>
                      <input type="number" class="form-control" name="phone1" required="required" id="phone1">
                    </div>  
                    
                     <div class="form-group col-sm-6">

                     <h4 class="demo-sub-title">Phone 2</h4>
                      <input type="number" class="form-control" placeholder="optional" name="phone2" id="phone2">

                    
                     </div>
                     </div>

                    <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">Address 1</h4>
                      <textarea class="form-control" required="required" name="address1" id="address1"></textarea>
                    </div>  
                    
                     <div class="form-group col-sm-6">

                     <h4 class="demo-sub-title">Address 2</h4>
                      <textarea class="form-control" placeholder="Optional" name="address2" id="address2"></textarea>

                    
                     </div>
                     </div>

                     <div class="col-sm-12">
                      <div class="form-group col-sm-6">

                     <h4 class="demo-sub-title">Address arabic</h4>
                      <textarea class="form-control" placeholder="Optional" name="addressarab" id="addressarab"></textarea>

                    
                     </div>
                    <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">Map empeded code (src only)</h4>
                      <textarea class="form-control" required="required" name="map" id="map"></textarea>
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
          getcontact();

      });
      var chk = 0;
      function getcontact(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_contact/display_contact');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#tablefillextend').html(data);
                $('#tablefill').DataTable();
                      
              }
             });
      }


      

      $("#prodForm").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_contact/updatecontact');?>/",
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
                  getcontact();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
                  getcontact();
               }

              // show response from the php script.            
              }
             });
      });

      



      function editcontact(id){
        $('#modalcaption').text("Edit Contact");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_contact/editcontact');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              // alert(data);
              var res = JSON.parse(data);
              getcontact();
              // console.log(data);
              $("#conatctimage").prop('required',false);
              $('#contactid').val(res.contact_id);
              $('#conatcttitle').val(res.contact_title);
              $('#mailid1').val(res.contact_mail1);
              $('#mailid2').val(res.contact_mail2);
              $('#phone1').val(res.contact_ph1);
              $('#phone2').val(res.contact_ph2);
              $('#address1').val(res.contact_adrs1);
              $('#address2').val(res.contact_adrs2); 
              $('#addressarab').val(res.contact_adrs_arab); 
              $('#map').val(res.map);
              
             
              $('#image1').val(res.contact_pic); 
              $('#imagefill').html('<img  style="width:250px;height:200px;"src="<?php echo base_url();?>/uploads/'+res.contact_pic+'">') 
              // $('#file1').val(res.file);
              // $('#otherfill').html(res.file); 
              
               

            }
        });
      }
      
    




           
     
    </script>
   
   