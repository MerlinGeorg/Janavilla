<div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Main menu management</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <!-- <a class="btn btn-icon icon-only"><i class="fa fa-rss"></i></a><a class="btn btn-icon icon-only"><i class="fa fa-star text-warning"></i></a> -->
               <!--  <button class="btn btn-secondary" type="button" data-toggle="collapse" href="#qmenu" aria-expanded="false" aria-controls="qmenu">Open menu</button> -->
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
           <form method="POST" id="menuForm"  >

                  <div class="row m-b-2">
                    <div class="form-group col-sm-6">
                      <input type="hidden" id = 'menuid' name="menuid"/>
                      <h4 class="demo-sub-title"> Menu name arabic</h4>
                      <input class="form-control focus " type="text" required="required" name="menunamearab" id="menunamearab">
                      
                    </div>
                    
                     <div class="form-group col-sm-6">
                     
                      <h4 class="demo-sub-title"> Menu name</h4>
                      <input class="form-control focus " type="text" required="required" name="menuname" id="menuname">
                      
                    </div>

                    
                    <div class="form-group col-sm-6" >
                      <h4 class="demo-sub-title">Inedex title</h4>
                      <input class="form-control" type="text"   name="indextitle"  id="indextitle" >
                    </div>

                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">image</h4>
                      <input class="" type="file" name="menu_image"  id="colimage_file" required="required">
                    
                    <input type="hidden" name="image1" id="image1">
                    <div id="imagefill"></div>
                    <!-- <div id="otherfill"></div> -->
                    </div>

                    <div class="form-group col-sm-6" >
                      <h4 class="demo-sub-title">Priority</h4>
                     <!--  <input class="form-control" type="text"   name="mprio"  id="mprio" > -->
                     <select class="form-control" name="mprio" id="mprio"> 

                       <option>Select</option>
                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                       <option value="6">6</option>
                       <option value="7">7</option>
                       <option value="8">8</option>
                       <option value="9">9</option>

                     </select>

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
          getmenus();

      });
      var chk = 0;
      function getmenus(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_menus/display_menu');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#tablefillextend').html(data);
                $('#tablefill').DataTable();
                // if(chk == 0){
                  
                // var table = $('#tablefill');
                //   table.DataTable({
                //   paging: true,
                //   searching: true,
                //   ordering: true,
                //   autoWidth: false,
                //   info: false,
                //   stateSave: false,
                //   responsive: true
                //   });
                
                // }
                
                // var table = $('#tablefill').DataTable();
                
              // show response from the php script.            
              }
             });
      }
      function clearall(){
        $('#modalcaption').text("Add Menu");
        $('#menuname').val('');
        $('#menunamearab').val('');
        $('#indextitle').val('');
        $('#mprio').val('');
        
        $('#colimage_file').val('');
        $('#imagefill').html('');
        $('#image1').val('');
          
        $('#menuid').val('');
        
        
        getusers();
        // $('#userfullname').val('');
        // $('#userfullname').val('');    
      }
      

      $("#menuForm").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_menus/updateMenus');?>/",
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
                  getmenus();
                  // clearall();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
                  getmenus();
                  // clearall();
               }

              // show response from the php script.            
              }
             });
      });

      // $('#submit').on('click',function(){
      //   var inputFile=$('input[name=file]');
      //   var fileToUpload=inputFile[0].files[0];
      //   var other_data = $('#frm_imageuupload').serializeArray();
      //   var formdata=new FormData();
      //   formdata.append(fileToUpload);
      //   formdata.append(other_data);
      //       $.ajax({
      //         url:"<?php echo base_url('index.php/Categoriesadmin/do_upload');?>",
      //         method:'POST',
      //         data: formdata,
      //         contentType:false,
              
      //         processData:false,
      //         success:function(data)
      //         {
      //           if (data== 'true'){   
      //          window.location.reload();
      //       }
      //       else{
      //          alert("Pls Try Again");
      //         }
      //       }
      //       });
      //     }
      //   );


      // $(document).ready(function(){
 
      //   $('#submit').submit(function(e){
      //       e.preventDefault(); 
      //            $.ajax({
      //                url:'<?php echo base_url();?>index.php/Admin_board/do_upload',
      //                type:"post",
      //                data:new FormData(this),
      //                processData:false,
      //                contentType:false,
      //                cache:false,
      //                async:false,
      //                 success: function(data){
      //                     alert("Upload Image Successful.");
      //              }
      //            });
      //       });
      
      



      function editmenu(id){
        $('#modalcaption').text("Edit Menu");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_menus/editmenu');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){

              var res = JSON.parse(data);
              getmenus();
              // console.log(data);
              $("#colimage_file").prop('required',false);
              $('#menuid').val(res.menu_id);
              $('#menuname').val(res.menu_name);
              $('#menunamearab').val(res.menu_name_arab);
              $('#indextitle').val(res.menu_indextitle);
              $('#mprio').val(res.menu_priority);
             
              $('#colimage_file').val('');
              $('#image1').val(res.menu_pic); 
              $('#imagefill').html('<img  style="width:250px;height:200px;"src="<?php echo base_url();?>/uploads/'+res.menu_pic+'">') 
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
   
   