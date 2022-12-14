<div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">About page</div>
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
                      <input type="hidden" id = "aboutid" name="aboutid"/>
                      <h4 class="demo-sub-title">Title</h4>
                      <input class="form-control focus " type="text" required="required" name="abouttitle" id="abouttitle">
                    </div>  
                    
                      <div class="form-group col-sm-6">
                       <h4 class="demo-sub-title">profile file</h4>
                      <input class="form-control focus" type="file" name="menu_image"  id="aboutimage" required="required">
                    <input type="hidden" name="image1" id="image1">
                    <div id="imagefill"></div>
                                    
                     </div>
                     </div>

                    <div class="col-sm-12">
                    <div class="form-group col-sm-12">
                      
                      <h4 class="demo-sub-title">Long desc</h4>
                      <textarea name="aboutlongshort" id="summernote" data-plugin="summernote" class="form-control focus"></textarea>
                    </div>  
                    
                    <div class="form-group col-sm-12">

                      <h4 class="demo-sub-title">Short Desc</h4>
                    <textarea class="form-control focus" name="aboutdescshort" data-plugin="summernote" id="aboutdescshort"></textarea>

                    
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
          getabout();

      });
      var chk = 0;
      function getabout(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_about/display_about');?>/",
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
                url: "<?php echo base_url('index.php/Admin_about/updateabout');?>/",
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
                  getabout();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
                  getabout();
               }

              // show response from the php script.            
              }
             });
      });

      



      function editabout(id){
        $('#modalcaption').text("Edit About");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_about/editabout');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              // alert(data);
              var res = JSON.parse(data);
              getabout();
              // console.log(data);
              $("#aboutimage").prop('required',false);
              $('#aboutid').val(res.about_id);
              $('#abouttitle').val(res.about_title);
              $('#summernote').val(res.about_longdesc);
              $('#aboutdescshort').val(res.about_shortdesc);
              
              
             
              $('#image1').val(res.about_pic); 
              $('#imagefill').html('<a href="<?php echo base_url();?>/uploads/'+res.about_pic+'"><img style="width:250px;height:200px;"src="<?php echo base_url();?>/uploads/agencyfile.png"></a>') 
              // $('#file1').val(res.file);
              // $('#otherfill').html(res.file); 
              
               

            }
        });
      }
      
    




           
     
    </script>
   
   