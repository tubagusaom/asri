
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">

 	<!--banner-->
		    <div class="banner">
		    	<h2>
				 <?php $this->load->view('front/atas');?>
				<span>Discussion Group</span>
				</h2>
		    </div>
		<!--//banner-->
 	<!--grid-->


 	 	 <div class=" profile">
         	 <div class="inbox-mail">

        	<div class="col-md-4 compose">
        	<form action="<?php echo base_url().'backend/inbox/search'?>" method="post">
        		<div class="input-group input-group-in">
        				<input type="text" name="keyword" class="form-control2 input-search" placeholder="Search...">
        				<span class="input-group-btn">
        						<button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
        				</span>
        		</div><!-- Input Group -->
                    </form>

        			<div class="col-md-12 bojal">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalAddNew"><span class="fa fa-plus"></span> &nbsp; Add New Topics</button>
        			</div>
        </div>
<!-- tab content -->
<div class="col-md-8 tab-content tab-content-in">
<div class="tab-pane active text-style" id="tab1">
  <div class="inbox-right">

            <div class="mailbox-content">
               <div class="mail-toolbar clearfix">
                   <p><?php echo $this->session->flashdata('msg');?></p>
			     <div class="float-left">
                   <h2>All Topics</h2>
			    </div>
			    <div class="float-right">

                            <div class="btn-group">
								<?php echo $page; ?>
                            </div>


			    </div>

               </div>
                <table class="table">
                    <tbody>
											<?php
								 		 			foreach ($pesan->result_array() as $b) {
								 		 					$id=$b['inbox_id'];
								 		 					$nama=$b['inbox_nama'];
                                                            $judul=$b['judul'];

								 		 					$tglpost=$b['tglpost'];
								 		 					$gbr=$b['gambar'];
								 		 					$pesan=$b['pesan'];
								 		 	?>
                        <tr class="table-row">

                            <td class="table-text">
                            	<h6><a href="<?php echo base_url().'backend/inbox/detail_inbox/'.$id;?>" ><?php echo $judul; ?></a></h6> <br><br>
                            	Diposting Oleh &nbsp;:&nbsp;  <?php echo $nama; ?>

                            </td>
                            <td>

                            </td>
                            <td class="march">

                               <?php echo $tglpost; ?>
                            </td>

                           <td class="table-img">
                               <img width="60px" height="60px" src="<?php echo base_url().'web/images/'.$gbr;?>" alt="" />
                            </td>
                        </tr>
												<?php }; ?>



                    </tbody>
                </table>
               </div>
            </div>
</div>



</div>
 	 </div>

   </div>


   <div class="modal" id="ModalAddNew" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                    <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 class="modal-title"><span class="fa fa-plus"></span>&nbsp; Add New Topics</h2>
                            </div>
            <form  method="post" action="<?php echo base_url().'backend/inbox/simpan_pesan'?>" enctype="multipart/form-data">
                    <div class="modal-body">


                        <div class="form-group">

  <label >Judul</label>
                            <input type="text" name="judul"  class="form-control"  required>


                        </div>
                          <div class="form-group">
                            <label>Isi Topics</label>
                               <!-- <textarea id="ckeditor" class="form-control w-100" name="pesan"  cols="30" rows="5"  ></textarea> -->
                               <textarea id="ckeditor" name="pesan" required></textarea>

                          </div>
                            <div class="form-group">
        <label for="exampleInputFile">Upload Gambar</label>
        <input type="file" id="exampleInputFile" name="gambar">
        <p class="help-block"> File gambar ukuran 60x60</p>
      </div>



                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default btn-square" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary btn-square">Save</button>
                  </div>
                   </form>
              </div>
          </div>
      </div>

      <script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
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







      



