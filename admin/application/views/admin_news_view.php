<div class="page-header">

          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <div class="display-6">News page</div>
                  <!-- <p class="small text-muted">
                     Info Table Design</p> -->
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="pull-xs-right" role="toolbar">
               
                <button class="btn btn-success" data-toggle="modal" data-target="#trackermodal"  onclick="clearall();">Add news</button>
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
                      <input type="hidden" id = "newsid" name="newsid"/>
                      <h4 class="demo-sub-title">News title</h4>
                      <input class="form-control focus " type="text" required="required" name="newstitle" id="newstitle">
                    </div>
                    <div class="form-group col-sm-6">
                      <h4 class="demo-sub-title">image</h4>
                      <input class="form-control focus" type="file" name="menu_image"  id="newsimage" required="required">
                    <input type="hidden" name="image1" id="image1">
                    <div id="imagefill"></div>
                    </div>  
                       </div>

                    <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                      
                      <h4 class="demo-sub-title">News title arab</h4>
                      <input class="form-control focus " type="text" required="required" name="newstitlearab" id="newstitlearab">
                    </div>
                    </div>


                    <div class="col-sm-12">
                    <div class="form-group col-sm-12">
                      
                      <h4 class="demo-sub-title">news Description</h4>
                      <textarea name="newsdesc" id="newsdesc" data-plugin="summernote" class="form-control focus"></textarea>
                    </div> 

                    <div class="form-group col-sm-12">
                      
                      <h4 class="demo-sub-title">news Description arab</h4>
                      <textarea name="newsdescarab" id="newsdescarab" data-plugin="summernote" class="form-control focus"></textarea>
                    </div> 
                    
                     
                     </div>

                  

                    

                  </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" onclick="clearall();" data-dismiss="modal">Close</button>
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
          getnews();

      });
      var chk = 0;
      function getnews(){
           $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_news/display_news');?>/",
                data: '', // serializes the form's elements.
               success: function(data){
                // console.log(data);
                $('#tablefillextend').html(data);
                $('#tablefill').DataTable();
                      
              }
             });
      }




      function clearall(){
        $('#modalcaption').text("Add Store");
        $('#newstitle').val('');
        $('#newstitlearab').val('');
        // $('#branddesc').val('');
        
        
        $('#newsdesc').val('');
        $('#newsdescarab').val('');
        
        $('#newsimage').val('');
        $('#image1').val('');
         $('#imagefill').val('');
          
        $('#newsid').val('');
        
        getnews();
        
        // $('#userfullname').val('');
        // $('#userfullname').val('');    
      }


      

      $("#prodForm").submit(function(e) {

        // alert("hi");
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
         $.ajax({
                method: "POST",
                url: "<?php echo base_url('index.php/Admin_news/insertNews');?>/",
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
                  getnews();
               }else{
                  notifyresult('Error','danger');
                  $('#trackermodal').modal('hide');
                  getnews();
               }

              // show response from the php script.            
              }
             });
      });

      



      function editnews(id){
        $('#modalcaption').text("Edit news");
        $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_news/editnews');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){
              // alert(data);
              var res = JSON.parse(data);
              getnews();
              // console.log(data);
              $("#newsimage").prop('required',false);
              $('#newsid').val(res.news_id );
              $('#newstitle').val(res.news_title);
              $('#newstitlearab').val(res.news_title_arab);
              $('#newsdesc').val(res.news_desc);
              $('#newsdescarab').val(res.news_desc_arab);
             
              $("#newsimage").val();
              $('#image1').val(res.news_pic); 
              $('#imagefill').html('<a href="<?php echo base_url();?>/uploads/'+res.news_pic+'"><img style="width:250px;height:200px;"src="<?php echo base_url();?>/uploads/'+res.news_pic+'"></a>') 
              
             
              
               

            }
        });
      }
      
    

       function deletenews(id){
        var result = confirm("Are you want to delete?");
          if (result) {
              $.ajax({
              method: "POST",
              url: "<?php echo base_url('index.php/Admin_news/delete_news');?>/",
              data: {id:id}, // serializes the form's elements.
             success: function(data){

              // alert(data);
              if(data == "success"){

                  notifyresult('Data Deleted','success');
                  getnews();
               }else{
                  notifyresult('Error','danger');
                  getnews();
               }
               

            }
        });
          }
        }


           
     
    </script>
   
   