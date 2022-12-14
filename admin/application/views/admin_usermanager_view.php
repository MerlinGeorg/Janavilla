

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
 <style type="text/css">
    .ui-autocomplete {
    z-index: 5000;
}
  </style>

<script>
$(function() {
    $("#uemail").autocomplete({
        source: "<?php echo base_url('index.php/Admin_usermanager/search_uname');?>/"
    });
});
</script>





<div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">User Management</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
                <!-- <a class="btn btn-icon icon-only"><i class="fa fa-rss"></i></a><a class="btn btn-icon icon-only"><i class="fa fa-star text-warning"></i></a> -->
               <!--  <button class="btn btn-secondary" type="button" data-toggle="collapse" href="#qmenu" aria-expanded="false" aria-controls="qmenu">Open menu</button> -->
                <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add Certification</button>
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
           <form method="POST" id="userregform">




              <div class="row m-b-2">
                
                   <input type="hidden" id = 'usid' name="usid"/> 

                    <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">Mail id</h4>
                      <input class="form-control focus"  type="text" name="uemail"  id="uemail" onchange="getudtls()" placeholder="Search user mail id..">
                      <span style="color: red" id="umailspan"></span>

                    </div> 

                    <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">Name</h4>
                      <input class="form-control focus" type="text" required="required" 
                       name="uname" readonly="readonly" id="uname" >

                    </div>
                    
                    <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">type</h4>
                      <input class="form-control focus"  type="text" name="utype" readonly="readonly" id="utype" required="required">

                    </div>

                    <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">Phone number</h4>
                      <input class="form-control focus"  type="text" name="uphon" readonly="readonly" id="uphon" required="required">

                    </div>
                   
                    <div class="form-group col-sm-6">

                      <h4 class="demo-sub-title">Username</h4>
                      <input class="form-control focus" type="text" name="username"  id="username" required="required">
                      <span style="color: red" id="usnamespan"></span>
                      
                    </div>


                    <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">Password</h4>
                      
                        <input class="form-control focus" type="text"   name="upassword"  id="upassword" required="required">

                    </div>
                    

                  </div>
                  
                   


                    
                  </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
           <!--  <a href="../../test.php?" class="btn btn-primary">view certificate</a> -->
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
          getuser();

      });
      var chk = 0;
      function getuser(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_usermanager/get_users');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#tablefillextend').html(data);
                $('#tablefill').DataTable();
                // if(chk == 0){
                  
               
              }
             });
      }

      
      function getudtls()
      {
          var uemail = document.getElementById("uemail").value;
          
          // alert(s_rg);

          $.ajax({
                  method: "POST",
                  url: "<?php echo base_url('index.php/Admin_usermanager/get_udetls');?>/",
                  data: {uemail:uemail}, // serializes the form's elements.
                 success: function(data){
                  
                  var res = JSON.parse(data);
                
                // alert(data);

              $('#uname').val(res.reg_name);
              $('#utype').val(res.reg_type);
               $('#uphon').val(res.reg_phon);
              // $('#qcourse').attr('disabled',true);
                 
                }
               });

      } 



      
      


      function clearall()
      {
        $('#modalcaption').text("Add certification");
        $('#usid').val('');
        $('#uemail').val('');
        $('#uname').val(''); 
        $('#utype').val('');
        $('#uphon').val('');
        $('#username').val('');
        $('#upassword').val('');


      

        getuser();
           
      }
      

      $("#userregform").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_usermanager/reguser');?>/",
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
                  getuser();
               }
               else if($.trim(data)=='usnameexist')
               {
                $('#usnamespan').text('username already exist');
               }
               else if($.trim(data)=='mailexist')
               {
                $('#umailspan').text('Mial id already exist');
               }
               else{
                  notifyresult('Error Occured','danger');
                  $('#trackermodal').modal('hide');
                  getuser();
               }


                         
              }
             });
      });


      

      
      



      function edituser(id)
      {
        // alert(id);
        $('#modalcaption').text("Edit User");
        $.ajax({

              method: "POST",
              url: "<?php echo base_url('index.php/Admin_usermanager/edituser');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data)
             {
               
               

              var res = JSON.parse(data);

              

              

              getuser();
              // console.log(data);
              $('#usid').val(res.id);
              $('#uemail').val(res.mailid);
              $('#uname').val(res.name);
              $('#utype').val(res.type);
              $('#uphon').val(res.phone);
              $('#username').val(res.username);  
              $('#upassword').val(res.password);
              
              

               
              

             
              
              
               

                    }
                });
        }
      
      function deleteuser(id){
        var result = confirm("Are you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_usermanager/delete_user');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              // alert(data);
              if(data == "success"){
                  notifyresult('Data Deleted','success');
                  getuser();
               }else{
                  notifyresult('Error','danger');
                  getuser();
               }
               

            }
        });
          }
        
      }


      


      function statuschange(id,status)
           {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_usermanager/changestatus');?>/",
              data: {id:id,status:status}, // serializes the form's elements.
             success: function(data)
             {
              if(data=="success")
              {
                getuser();
              }
             }
        });
           }
        


         
    </script>
   
   