<div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Our Agencies management</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <!-- <a class="btn btn-icon icon-only"><i class="fa fa-rss"></i></a><a class="btn btn-icon icon-only"><i class="fa fa-star text-warning"></i></a> -->
               <!--  <button class="btn btn-secondary" type="button" data-toggle="collapse" href="#qmenu" aria-expanded="false" aria-controls="qmenu">Open menu</button> -->
                <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add Agencies</button>
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
           <form method="POST" id="brandForm"  >

                  <div class="row m-b-2">
                    <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      <input type="hidden" id ="agencyid" name="agencyid"/>
                      <h4 class="demo-sub-title">Agency name</h4>
                      <input class="form-control focus " type="text" required="required" name="agencyname" id="agencyname">
                    </div>  
                    
                    <div class="form-group col-sm-6">
                    <h4 class="demo-sub-title">Agency file</h4>
                      <input class="form-control focus" type="file" name="menu_image"  id="agencyfile" required="required">
                    <input type="hidden" name="image1" id="image1">
                    <div id="imagefill"></div>
                     </div>
                     </div>
                     
                      <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">Agency name arab</h4>
                      <input class="form-control focus " type="text" required="required" name="agencynamearab" id="agencynamearab">
                    </div>

                    <div class="form-group col-sm-6">
                    <h4 class="demo-sub-title">Agency logo</h4>
                      <input class="form-control focus" type="file" name="menu_image1"  id="agencylogo" required="required">
                    <input type="hidden" name="image2" id="image2">
                    <div id="imagefill2"></div>
                     </div>

                    </div>
                     

                     <div class="col-sm-12">
                      <div class="form-group col-sm-12">
                      
                      <h4 class="demo-sub-title">Agency Desc</h4>
                      <textarea name="agencydesc" id="agencydesc" data-plugin="summernote" class="form-control focus "></textarea>
                    </div>
                    <div class="form-group col-sm-12">
                      
                      <h4 class="demo-sub-title">Agency Desc arabic</h4>
                      <textarea name="agencydescarab" id="agencydescarab" data-plugin="summernote" class="form-control focus "></textarea>
                    </div>
                     </div>

                    <!-- <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                    <h4 class="demo-sub-title">Description</h4>
                     <textarea class="form-control" name="branddesc" id="branddesc"></textarea> 
                   </div>                                     
                   </div> -->

                    

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
          getagency();

      });
      var chk = 0;
      function getagency(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_ouragencies/getagency');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#tablefillextend').html(data);
                $('#tablefill').DataTable();
                      
              }
             });
      }


      function clearall(){
        $('#modalcaption').text("Add Brand");
        $('#agencyname').val('');
         $('#agencynamearab').val('');
        $('#agencydesc').val('');
        $('#agencydescarab').val('');
        
        
        $('#agencyfile').val('');
        $('#imagefill').html('');
        $('#image1').val('');

        $('#agencylogo').val('');
        $('#imagefill2').html('');
        $('#image2').val('');
          
        $('#agencyid').val('');
        
        
        getagency();
        // $('#userfullname').val('');
        // $('#userfullname').val('');    
      }
      

      $("#brandForm").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_ouragencies/insertagency');?>/",
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
                  getagency();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
                  getagency();
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
      
      



      function editagency(id){
        $('#modalcaption').text("Edit Agency");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_ouragencies/editAgency');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              // alert(data);
              var res = JSON.parse(data);
              getagency();
              // console.log(data);
              $("#agencyfile").prop('required',false);
              $("#agencylogo").prop('required',false);
              $('#agencyid').val(res.agencies_id );
              $('#agencyname').val(res.agencies_name);
              $('#agencydesc').val(res.agencies_desc);
              $('#agencynamearab').val(res.agencies_name_arab);
              $('#agencydescarab').val(res.agencies_desc_arab);
              
              $('#agencyfile').val('');
              $('#image1').val(res.agencies_file); 
              $('#imagefill').html('<a href="<?php echo base_url();?>/uploads/'+res.agencies_file+'" title ="click to see"><img  style="width:250px;height:200px;"src="<?php echo base_url();?>/uploads/agencyfile.png"></a>') 

              $('#agencylogo').val('');
              $('#imagefill2').html('<a href="<?php echo base_url();?>/uploads/'+res.agencies_logo+'" title ="click to see"><img  style="width:250px;height:200px;"src="<?php echo base_url();?>/uploads/'+res.agencies_logo+'"></a>');
              $('#image2').val(res.agencies_logo);
              // $('#file1').val(res.file);
              // $('#otherfill').html(res.file); 
              
               

            }
        });
      }
      
      function deleteagency(id,img,logo){
        var result = confirm("Are you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_ouragencies/delete_agency');?>/",
              data: {id:id,img:img,logo:logo}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Data Deleted','success');
                  getagency();
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


           function statuschange_brand(id,status)
           {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_brand/changestatus');?>/",
              data: {id:id,status:status}, // serializes the form's elements.
             success: function(data)
             {
              if(data=="success")
              {
                getagency();
              }
             }
        });
           }
        
     
    </script>
   
   