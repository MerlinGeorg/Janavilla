<div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Store map page</div>
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
                      <input type="hidden" id = "mapid" name="mapid"/>
                      <h4 class="demo-sub-title">Map URL(src only)</h4>
                      <textarea name="maplink" id="maplink" class="form-control focus"></textarea>
                    </div> 
                    <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">map type</h4>
                      <select class="form-control focus" id="maptype" name="maptype" required="required">
                        <option value="">Select</option>
                        <option value="Domestic">Domestic</option>
                        <option value="International">International</option>
                      </select>
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
          getmap();

      });
      var chk = 0;
      function getmap(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_storemap/display_map');?>/",
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
                url: "<?php echo base_url('index.php/Admin_storemap/updatemap');?>/",
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
                  getmap();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
                  getmap();
               }

              // show response from the php script.            
              }
             });
      });

      



      function editmap(id){
        $('#modalcaption').text("Edit store map");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_storemap/editmap');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              // alert(data);
              var res = JSON.parse(data);
              getmap();
              // console.log(data);
              
              $('#mapid').val(res.smap_id);
              $('#maplink').val(res.smap_url);
              $('#maptype').val(res.smap_type);
              // $('#aboutdescshort').val(res.about_shortdesc);
              
              
             
              // $('#image1').val(res.about_pic); 
              // $('#imagefill').html('<a href="<?php echo base_url();?>/uploads/'+res.about_pic+'"><img style="width:250px;height:200px;"src="<?php echo base_url();?>/uploads/agencyfile.png"></a>') 
              // // $('#file1').val(res.file);
              // $('#otherfill').html(res.file); 
              
               

            }
        });
      }
      
    




           
     
    </script>
   
   