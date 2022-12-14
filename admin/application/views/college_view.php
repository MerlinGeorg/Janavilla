<div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">Student Admission</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <!-- <a class="btn btn-icon icon-only"><i class="fa fa-rss"></i></a><a class="btn btn-icon icon-only"><i class="fa fa-star text-warning"></i></a> -->
               <!--  <button class="btn btn-secondary" type="button" data-toggle="collapse" href="#qmenu" aria-expanded="false" aria-controls="qmenu">Open menu</button> -->
                <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add Student</button>
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
           <form method="POST" id="colgform">

              <div class="row m-b-2">
                    
                    <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">Register no</h4>
                      <input class="form-control focus" type="text" readonly="readonly" required="required" name="regno" id="regno">
                    </div>

                    <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">Civil Id</h4>
                      <input class="form-control focus" type="text" required="required" minlength="12" maxlength="12" name="civilid" id="civilid">
                    </div>

                    <div class="form-group col-sm-6">
                      <input type="hidden" id = 'colgid' name="colgid"/>
                      <input type="hidden" id = 'typeid' name="typeid"/>
                      <h4 class="demo-sub-title">First name</h4>
                      <input class="form-control focus" type="text" required="required" name="fname" id="fname">
                    </div>
                    
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Last name</h4>
                       <input class="form-control focus " type="text" required="required" name="lname" id="lname">
                    </div>

                    <div class="form-group col-sm-6" style="height: 57.88px">
                      <h4 class="demo-sub-title">Gender</h4>
                      <select class="form-control focus" required="required" name="gender" id="gender">
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                    </div>


                    <div class="form-group col-sm-6" style="height: 55.88px">
                      <h4 class="demo-sub-title">Date of birth (mm/dd/yyyy)</h4>
                       <input style="height: 34.88px" class="form-control focus " type="date" required="required" name="dob" id="dob">
                    </div>

                    <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">Mail id</h4>
                      <input class="form-control focus" type="mail" required="required" name="mail" id="mail">
                    </div>

                    <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">Phone no</h4>
                      <input class="form-control focus" type="text" required="required" name="phno" id="phno">
                    </div>

                    <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">Password</h4>
                      <input class="form-control focus" type="text" required="required" name="spassword" id="spassword">
                    </div>
                    
                     <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">Qualification</h4>
                      <input class="form-control focus" type="text" required="required" name="qualification" id="qualification">
                    </div>


                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Prefered Course</h4>
                      <select class="form-control focus"  name="pcourse" id="pcourse">
                        <option value="">Select</option>
                        <?php
                        foreach($categories as $row){?>
                          <option value="<?php echo $row->id;?>"><?php echo $row->course;?></option>
                    <?php } 
                        ?>
                      </select>
                    </div>

                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">Student photo</h4>
                      <input class="form-control focus" type="file"   name="image_file"  id="colgimage_file" >
                      <input type="hidden" name="image1" id="image1">
                       <div id="imagefill"></div>
                    </div>


                    <!-- <input type="hidden" name="colgimage1" id="colgimage1"> -->

                     


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
          gtsrtudets();


          

      });
      var chk = 0;
      function gtsrtudets(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_college/display_studets_list');?>/",
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

      function clearall()
      {
        $('#modalcaption').text("Add Admission");
        $('#civilid').val('');
        $('#fname').val('');
        $('#lname').val('');
        $('#gender').val('');
        $('#dob').val('');
        $('#mail').val('');  
        $('#phno').val('');
        $('#qualification').val('');
        $('#pcourse').val('');
        $('#colgimage_file').val(''); 
        $('#spassword').val('');

        $('#image1').val('');
        
        
        regno_pas();
        gtsrtudets();
        // $('#userfullname').val('');
        // $('#userfullname').val('');    
      }
      

      $("#colgform").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_college/add_collg');?>/",
              data: new FormData(this),
              processData:false,
                     contentType:false,
                     cache:false,
              // serializes the form's elements.
               success: function(data){

                console.log(data);
               if(data == "true"){
                  notifyresult('Data Saved','success');
                  $('#trackermodal').modal('hide');
                  gtsrtudets();
               }
               else if(data=="civi id exist")
               {
                  notifyresult('Civil Id is already exist','danger');
                  $('#trackermodal').modal('hide');
               }
               else
               {
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
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
      
      



      function editcollege1(id){
        // alert(id);
        $('#modalcaption').text("Edit Admission");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_college/editcolg');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data)
             {
               
               

              var res = JSON.parse(data);

              

              // var new_course = res.course_name;

              // alert(res.student_id);

              gtsrtudets();
              // console.log(data);
              $('#colgid').val(res.student_id);
              $('#civilid').val(res.student_civil_id);
              $('#regno').val(res.student_reg);
              $('#fname').val(res.first_name);
              $('#lname').val(res.last_name);
              $('#spassword').val(res.student_pwd);
              $('#gender').val(res.gender);
              $('#dob').val(res.dob);
              $('#mail').val(res.email);  
              $('#phno').val(res.phno);
              $('#qualification').val(res.qualification);
              $('#pcourse').val(res.p_course);
             

               
              

              $('#image1').val(res.picture); 
              $('#imagefill').html('<img  style="width:250px;height:200px;"src="<?php echo base_url();?>/uploads/'+res.picture+'">') 
              
              
               

                    }
                });
              }
      
      function deletecollege1(id,img){
        var result = confirm("Are you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_college/delete_student');?>/",
              data: {id:id,img:img}, // serializes the form's elements.
             success: function(data){
              if(data == "success"){
                  notifyresult('Data Deleted','success');
                  gtsrtudets();
               }else{
                  notifyresult('Error','danger');
               }
               

            }
        });
          }
        
      }

      function priority_set1(id,status)
          {
            // alert("hai");
           $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_college/pro_check_colg');?>/",
              data: {id:id,status:status}, // serializes the form's elements.
             success: function(data){
              // if(data == "high"){
              //     notifyresult('Data Deleted','success');
              //     getusers();
              //  }else{
              //     notifyresult('Error','danger');

              window.location.href="";
              getcollege();
               }
               });
          }


          function regno_pas()
                {
                  $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_college/auto_regno');?>/",
               // data: form.serialize(), // serializes the form's elements.
                data:{}, 
               success: function(data){

                alert(data);

                $('#trackermodal').modal('show');
              
                 $("#regno").val(data);
                        
              }
             });
            }  




        
    </script>
   
   