
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">

 	<!--banner-->
		    <div class="banner">
		    	<h2>
			 <?php $this->load->view('front/atas');?>
				<span>Ticketing You</span>
				</h2>
		    </div>
		<!--//banner-->
 	 <!--gallery-->
    <div class=" profile">
 	 <div class="row ">
        
    <div class="col-md-12">
        <div class="col-md-7" style="margin-top: 25px; margin-left: 20px;">
        
        <button type="button" data-toggle="modal" data-target="#Modaladd" class="btn btn-success btn-edit">New Ticketing</button>
        <?php if($dept == "IT"){
        echo '<a class="btn btn-danger" href="ticketing/tiketforyou">Ticketing For You</a>';
        }else{
            echo "";
        }
        ?>
        </div>

        <div class="col-md-3" style="margin-top: 5px;">

        <form action="<?php echo base_url().'backend/ticketing/sortir'?>" method="post">
            <!-- <label>Tampilkan Data</label> -->

            <!-- <select class="select2 form-control" name="sortir" >
             <option value="">All Ticketing</option>  
             <option value="1">Waiting ACC</option> 
             <option value="2">On Progress</option>
              <option value="3">Finish</option>
             <option value="4">Hold</option>
             <option value="5">Cancel</option>
            </select> -->
        </div>
        <div class="col-md-1" style="margin-top: 27px;">
                <!-- <button class="btn btn-primary btn-flat">Sortir</button> -->
        </div>
        
            </form>
        </div>
        

        

    </div>
    <div class="col-md-12">
    <p><?php echo $this->session->flashdata('msg');?></p>
    </div>

    <div class="col-md-12">
    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                            <tr class="headings">
                              <th>
                                <input type="checkbox" id="check-all" class="flat">
                              </th>
                                
                            
                              <th class="column-title">Request Name</th>
                              <th class="column-title">Assigned to</th>
                              <th class="column-title">Title</th>
                              <th class="column-title">Priorty</th>
                              <th class="column-title">Status</th>
                              <th class="column-title">Create Date</th>
                              <th class="column-title">Action</th>
                            </tr>
                          </thead>
                         <tbody>    
                          <?php if($all)
                    {
                        $no = 1;
                        $co = count($all);
                        foreach($all as $disc)
                        {
                          $id=$disc['id'];
                          ?>  <tr>
                            <td><?php echo $co;?></td>
                            <td><?php echo $disc['usernamecrt'];?></td>
                            <td><?= !empty($disc['usernameexecutor']) ? $disc['usernameexecutor'] : '-'; ?></td>
                            <td><?php echo $disc['title'];?></td>
                            <td>
                            <?php if (empty($disc['priority'])){
                                echo "-";
                            }elseif($disc['priority'] == "URGENT")
                            {
                              echo "<h2 class='label label-danger'>URGENT</h2>";
                            }elseif ($disc['priority'] == "MEDIUM"){
                              echo "<h2 class='label label-warning'>MEDIUM</h2>";
                            }elseif ($disc['priority'] == "EASY"){
                              echo "<h2 class='label label-success'>EASY</h2>";
                            }
                            
                            
                            ?></td>
                            <td><?php 
                            if ($disc['status'] == 1){ 
                              echo "<h2 class='label label-primary'>Waiting ACC</h2>";
                            }else if ($disc['status'] == 2){
                              echo "<h2 class='label label-success'>On Progress</h2>";
                            }else if ($disc['status'] == 3){
                              echo "<h1 class='label label-default'>FINISH</h1>";
                            }else if ($disc['status'] == 4){
                              echo "<h2 class='label label-warning'>Hold</h2>";
                            }else if ($disc['status'] == 5){
                              echo "<h2 class='label label-danger'>Cancel</h2>";
                            }
                              ?></td>
                            <td><?php echo $disc['date_created']; ?></td>
                            <td class="last"> 
                            <a  target="_blank" href="<?php echo base_url().'backend/ticketing/details/'.$id;?>" ><button type="button" class="btn btn-success btn-edit"> Detail</button> </a>
                             
                                       
                                    </td>

                                
                            </tr>
                       <?php $co--; }
                    }
                     ?>
                                  
                                 </tbody>
                              </table>
                            </div>
    </div>
     <div class="float-right">

                            <div class="btn-group">
								<?php echo $page; ?>
                            </div>


			    </div>
    </div>

      <div class="clearfix"></div>



   <!-- ============ MODAL ADD ticketing =============== -->
   <div class="modal fade" id="Modaladd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
              <h3 class="modal-title" id="myModalLabel">Add New Ticketing</h3>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/ticketing/add_ticket'?>" enctype="multipart/form-data">
              <div class="modal-body">

                  <div class="form-group">
                      <label class="control-label col-xs-3" >Date</label>
                      <div class="col-xs-8">
                          <input  class="form-control" type="text" value="<?php date_default_timezone_set('Asia/Jakarta'); 
echo date('Y-m-d H:i:s'); ?>" readonly required>
                      </div>
                  </div>
                 

                  <div class="form-group">
                      <label class="control-label col-xs-3" >Title</label>
                      <div class="col-xs-8">
                          <input name="title"  class="form-control" type="text"  required>
                      </div>
                  </div>

                <div class="form-group">
                      <label class="control-label col-xs-3" >Subject</label>
                      <div class="col-xs-8">
                      <textarea id="ckeditor" name="subject" required></textarea>
                    
                      </div>
                  </div>

                  <div class="form-group file-row" id="file-row-1">
                  <label class="control-label col-xs-3">Files</label>
                  <div class="col-xs-7">
                    <input type="file" name="userfiles[]">
                  </div>
                  <div class="col-xs-2">
                    <button type="button" class="btn btn-primary btn-add-file" data-id="1">+</button>
                  </div>
                </div>
                  
                <div id="add-row">
                


              </div>

              <div class="modal-footer">
                
                  <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Tutup</button>
                  <button class="btn btn-primary btn-flat">Save</button>
              </div>
          </form>
          </div>
          </div>
      </div>
      </div>

<!---->
<script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url().'assets/plugins/select2/select2.full.min.js'?>"></script>
<script type="text/javascript">
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
	
    CKEDITOR.replace('ckeditor');
   //Initialize Select2 Elements
  $(".select2").select2();
	
  });
</script>


<script type="text/javascript">


$('body').delegate('.btn-add-file', 'click', function(){
			var id = $(this).data('id');
			var length = $('.file-row').length;

			html = 	'<div class="form-group file-row" id="file-row-'+(length+1)+'">' +
						'<label class="col-xs-3">&nbsp;</label>'+
						'<div class="col-xs-7">' +
							'<input type="file" name="userfiles[]">' +
						'</div>' +
						'<div class="col-xs-2">' +
							'<button type="button" class="btn btn-primary btn-add-file" data-id="'+(length+1)+'">+</button>' +
							'&nbsp;&nbsp;<button type="button" class="btn btn-danger btn-remove-file" data-id="'+(length+1)+'">-</button>' +
						'</div>' +
					'</div>';

			$('#add-row').append(html);	
		});

		$('body').delegate('.btn-remove-file', 'click', function(){
			var id = $(this).data('id');

			var length = $('.file-row').length;

			if(length > 1)
			{
				$('#file-row-'+id).remove();
			}
		});
    </script>

<!--//scrolling js-->

