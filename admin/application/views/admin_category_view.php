<div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Category management</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <!-- <a class="btn btn-icon icon-only"><i class="fa fa-rss"></i></a><a class="btn btn-icon icon-only"><i class="fa fa-star text-warning"></i></a> -->
               <!--  <button class="btn btn-secondary" type="button" data-toggle="collapse" href="#qmenu" aria-expanded="false" aria-controls="qmenu">Open menu</button> -->
                <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add Category</button>
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
                      <input type="hidden" id = "catid" name="catid"/>
                      <h4 class="demo-sub-title"> Category name</h4>
                      <input class="form-control focus " type="text" required="required" name="catname" id="catname">
                    </div>  
                    
                    <div class="form-group col-sm-6">
                    <h4 class="demo-sub-title">Sub menu</h4>
                     <select class="form-control focus" name="catsub" id="catsub">
                       <option value="">select</option>
                      <?php foreach($getsubmenus as $row){ ?>
                        <option value="<?php echo $row->submenu_id; ?>"><?php echo $row->submenu_name; ?></option>
                        <?php } ?>
                     </select>
                    </div>
                     </div>

                    <div class="col-sm-12">
                      <div class="form-group col-sm-6">
                        <h4 class="demo-sub-title"> Category name Arab</h4>
                        <input class="form-control focus " type="text" required="required" name="catnamearab" id="catnamearab">
                      </div>
                      <div class="form-group col-sm-6">
                        <h4 class="demo-sub-title"> Category Code</h4>
                        <input class="form-control focus " type="text" required="required" name="catcod" id="catcod">
                      </div>
                    </div>  


                    <div class="col-sm-12">                    
                   <div class="form-group col-sm-6">
                    <h4 class="demo-sub-title">Description</h4>
                     <textarea class="form-control focus" name="catdesc" id="catdesc"></textarea> 
                   </div>  
                   <div class="form-group col-sm-6">
                    <h4 class="demo-sub-title">Description Arabic</h4>
                     <textarea class="form-control focus" name="catdescarab" id="catdescarab"></textarea> 
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
          getcat();

      });
      var chk = 0;
      function getcat(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_category/display_cat');?>/",
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
        $('#modalcaption').text("Add Category");
        $('#catname').val('');
        $('#catnamearab').val();
        $('#catdescarab').val();
        $('#catdesc').val('');
        $('#catsub').val('');
        $('#catcod').val('');
        
        
        // $('#catimage').val('');
        // $('#imagefill').html('');
        // $('#image1').val('');
          
        $('#catid').val('');
        
        
        getcat();
        // $('#userfullname').val('');
        // $('#userfullname').val('');    
      }
      

      $("#menuForm").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_category/insertcat');?>/",
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
                  getcat();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
                  getcat();
               }

              // show response from the php script.            
              }
             });
      });

      



      function editcat(id){
        $('#modalcaption').text("Edit Submenu");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_category/editcat');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              // alert(data);
              var res = JSON.parse(data);
              getcat();
              // console.log(data);
              
              $('#catid').val(res.category_id );
              $('#catname').val(res.category_name);
              $('#catnamearab').val(res.category_name_arab);
              $('#catdescarab').val(res.category_desc_arab);
              $('#catdesc').val(res.category_desc);
              $('#catsub').val(res.category_submenu);
              $('#catcod').val(res.category_code);
             
              
            }
        });
      }
      
      function deletecat(id){
        var result = confirm("Are you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_category/delete_cat');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Data Deleted','success');
                  getcat();
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


           function statuschange_cat(id,status)
           {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_category/changestatus');?>/",
              data: {id:id,status:status}, // serializes the form's elements.
             success: function(data)
             {
              if(data=="success")
              {
                getcat();
              }
             }
               });
           }
        
     
    </script>
   
   