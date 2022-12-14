<div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Submenu management</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <!-- <a class="btn btn-icon icon-only"><i class="fa fa-rss"></i></a><a class="btn btn-icon icon-only"><i class="fa fa-star text-warning"></i></a> -->
               <!--  <button class="btn btn-secondary" type="button" data-toggle="collapse" href="#qmenu" aria-expanded="false" aria-controls="qmenu">Open menu</button> -->
                <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add sub menu</button>
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
                    <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      <input type="hidden" id = "submenuid" name="submenuid"/>
                      <h4 class="demo-sub-title"> submenu name</h4>
                      <input class="form-control focus " type="text" required="required" name="submenuname" id="submenuname">
                    </div>  
                    
                    <div class="form-group col-sm-6">
                    <h4 class="demo-sub-title">image</h4>
                      <input class="" type="file" name="menu_image"  id="colimage_file" required="required">
                    <input type="hidden" name="image1" id="image1">
                    <div id="imagefill"></div>
                     </div>
                     </div>
                    <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                    <h4 class="demo-sub-title">Main menu</h4>
                     <select class="form-control" name="submain" id="submain">
                       <option value="">select</option>
                      <?php foreach($getmenus as $row){ ?>
                        <option value="<?php echo $row->menu_id; ?>"><?php echo $row->menu_name; ?></option>
                        <?php } ?>
                     </select>
                    </div>

                    <div class="form-group col-sm-6">
                    <h4 class="demo-sub-title">Description</h4>
                     <textarea class="form-control" name="subdesc" id="subdesc"></textarea> 
                   </div>                                     
                   </div>

                    <div class="col-sm-12">
                     <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title"> submenu name</h4>
                      <input class="form-control focus " type="text" required="required" name="submenunamearab" id="submenunamearab">
                     </div> 
                     <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Description</h4>
                     <textarea class="form-control" name="subdescarab" id="subdescarab"></textarea> 
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
          getsubmenus();

      });
      var chk = 0;
      function getsubmenus(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_submenu/display_submenu');?>/",
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
        $('#modalcaption').text("Add submenu");
        $('#submenuname').val('');
        $('#submenunamearab').val('');
        $('#submain').val('');
        $('#subdesc').val('');
        $('#subdescarab').val('');
        
        
        $('#colimage_file').val('');
        $('#imagefill').html('');
        $('#image1').val('');
          
        $('#submenuid').val('');
        
        
        getsubmenus();
        // $('#userfullname').val('');
        // $('#userfullname').val('');    
      }
      

      $("#menuForm").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_submenu/insertSubmenu');?>/",
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
                  getsubmenus();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
                  getsubmenus();
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
      
      



      function editsubmenu(id){
        $('#modalcaption').text("Edit Submenu");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_submenu/editsubmenu');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              // alert(data);
              var res = JSON.parse(data);
              getsubmenus();
              // console.log(data);
              $("#colimage_file").prop('required',false);
              $('#submenuid').val(res.submenu_id);
              $('#submenuname').val(res.submenu_name);
              $('#submenunamearab').val(res.submenu_name_arab);
              $('#submain').val(res.submenu_main);
              $('#subdesc').val(res.submenu_desc);
              $('#subdescarab').val(res.submenu_desc_arab);
             
              $('#image1').val(res.submenu_pic); 
              $('#imagefill').html('<img  style="width:250px;height:200px;"src="<?php echo base_url();?>/uploads/'+res.submenu_pic+'">') 
              // $('#file1').val(res.file);
              // $('#otherfill').html(res.file); 
              
               

            }
        });
      }
      
      function deletesubmenu(id,img){
        var result = confirm("Are you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_submenu/delete_submenu');?>/",
              data: {id:id,img:img}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Data Deleted','success');
                  getsubmenus();
               }else{
                  notifyresult('Error','danger');
               }
               

            }
        });
          }
        }



          // function priority_set(id,status)
          // {
            
          //  $.ajax({
          //     method: "POST",
          //     url: "<?php echo base_url('index.php/Admin_board/pro_check');?>/",
          //     data: {id:id,status:status}, // serializes the form's elements.
          //    success: function(data){
              
          //     window.location.href="";
          //     getmenus();
          //      }
          //      });
          // }


           function statuschange(id,status)
           {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_submenu/changestatus');?>/",
              data: {id:id,status:status}, // serializes the form's elements.
             success: function(data)
             {
              if(data=="success")
              {
                window.location.reload();
              }
             }
        });
           }
        
     
    </script>
   
   