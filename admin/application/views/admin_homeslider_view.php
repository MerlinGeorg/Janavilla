<div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">HomeSlider</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
               
               <!--  <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add Menu</button> -->
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
           <form method="POST" id="homsliderForm"  >

                  <div class="row m-b-2">
                    <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      <input type="hidden" id = 'sliderid' name="sliderid"/>
                      <h4 class="demo-sub-title">Title</h4>
                      <input class="form-control focus " type="text" required="required" name="slidertitle" id="slidertitle">
                      
                    </div>

                    
                    <div class="form-group col-sm-6" >
                      <h4 class="demo-sub-title">Sub Title</h4>
                      <input class="form-control" type="text"   name="slidersubtitle"  id="slidersubtitle" >
                    </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Image<span style="font-size: 12px">(withd:1400px,hieght:900px)</span></h4>
                      <input class="" type="file" name="menu_image"  id="sliderimage" required="required">
                    
                    <input type="hidden" name="image1" id="image1">
                    <div id="imagefill"></div>
                    <!-- <div id="otherfill"></div> -->
                    </div>

                    <div class="form-group col-sm-6" >
                      <h4 class="demo-sub-title">Priority</h4>
                     <!--  <input class="form-control" type="text"   name="mprio"  id="mprio" > -->
                     <select class="form-control" name="sliderprio" id="sliderprio"> 

                       <option value="">Select</option>
                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                       <option value="6">6</option>
                       <option value="7">7</option>
                       <option value="8">8</option>
                       <option value="9">9</option>
                       <option value="10">10</option>
                       

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
          gethomeslider();

      });
      var chk = 0;
      function gethomeslider(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_homslider/display_sliders');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#tablefillextend').html(data);
                $('#tablefill').DataTable();
                           
              }
             });
      }
      

      $("#homsliderForm").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_homslider/updateSlider');?>/",
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
                  gethomeslider();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
                  gethomeslider();
               }

              // show response from the php script.            
              }
             });
      });

     
      



      function editmenu(id){
        $('#modalcaption').text("Edit Menu");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_homslider/editslider');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              var res = JSON.parse(data);
              gethomeslider();
              // console.log(data);
              $("#sliderimage").prop('required',false);
              $('#sliderid').val(res.homeslider_id);
              $('#slidertitle').val(res.homeslider_title);
              $('#slidersubtitle').val(res.homeslider_subtitle);
              $('#sliderprio').val(res.homeslider_priority);
             
              $('#image1').val(res.homeslider_pic); 
              $('#imagefill').html('<img  style="width:250px;height:200px;"src="<?php echo base_url();?>/uploads/'+res.homeslider_pic+'">') 
              // $('#file1').val(res.file);
              // $('#otherfill').html(res.file); 
              
               

            }
        });
      }
      
      function deletecollege(id){
        var result = confirm("Are you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_board/deletecol');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Data Deleted','success');
                  getmenus();
               }else{
                  notifyresult('Error','danger');
               }
               

            }
        });
          }
        }

          function priority_set(id,status)
          {
            // alert("hai");
           $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_board/pro_check');?>/",
              data: {id:id,status:status}, // serializes the form's elements.
             success: function(data){
              // if(data == "high"){
              //     notifyresult('Data Deleted','success');
              //     getusers();
              //  }else{
              //     notifyresult('Error','danger');

              window.location.href="";
              getmenus();
               }
               });
          }
        
     
    </script>
   
   