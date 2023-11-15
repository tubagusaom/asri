
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">

 	<!--banner-->
		    <div class="banner">
		    	<h2>
				 <?php $this->load->view('front/atas');?>
				<span>Library ASRI</span>
				</h2>
		    </div>
		<!--//banner-->
 	<!--grid-->
 	<div class="grid-system">
 		<!---->
 		<div class="horz-grid">
 		<div class="grid-hor">
 		<h3 id="grid-example-basic">Library <b>ASRI</b></h3>

			</div>
			<!---->

        	<?php
								 		 			foreach ($library->result_array() as $b) {
								 		 					$id=$b['id_kat'];
								 		 					$kat=$b['kategori'];
                                                            
                                                            
								 		 					$tglpost=$b['tglpost'];
								 		 			};
								 		 			
								 		 	?>
					

			<div class="row show-grid">
			    <?php
			    $sop="SOP";
			    $tax="TAX";
			    $csr="CSR";
			    $ga="GA";
			    $crm="CRM";
			    $sales="SALES";
			    $hrd="HRD";
			    $finance="FINANCE";
			    $it="IT";
			    $market="MARKETING";
			    ?>
			  <div class="col-md-4 ">
					<a class="boss" href="<?php echo base_url().'backend/library/kategori_library/'.$tax;?>">TAX</a><br><br>
					<a class="bess" href="<?php echo base_url().'backend/library/kategori_library/'.$csr;?>">CSR</a><br><br>
					<a class="bess" href="<?php echo base_url().'backend/library/kategori_library/'.$ga;?>">GA</a><br><br>
					<a class="bess" href="<?php echo base_url().'backend/library/kategori_library/'.$crm;?>">CRM</a><br><br>
					<a class="biss" href="<?php echo base_url().'backend/library/kategori_library/'.$sales;?>">SALES</a><br><br>
				</div>
			  <div class="col-md-3"><img width="300px" height="250px" src="<?php echo base_url().'gambar/WikiASRI.png'?>" /></div>
			  <div class="col-md-5">
					<a  class="coss" href="<?php echo base_url().'backend/library/kategori_library/'.$sop;?>">SOP<a><br><br>
					<a  class="cess" href="<?php echo base_url().'backend/library/kategori_library/'.$hrd;?>">HRD<a><br><br>
					<a  class="ciss" href="<?php echo base_url().'backend/library/kategori_library/'.$finance;?>">FINANCE<a><br><br>
					<a  class="cess" href="<?php echo base_url().'backend/library/kategori_library/'.$it;?>">IT<a><br><br>
					<a  class="coss" href="<?php echo base_url().'backend/library/kategori_library/'.$market;?>">MARKETING<a><br><br>
				</div>
			</div>
			<div class="row show-grid">
			    
				<div class="form-group">
					<label class="col-md-2 control-label"></label>
					<div class="col-md-8">
							<form action="<?php echo base_url().'backend/library/search'?>" method="post">
										<div class="input-group input-group-in">
												<input type="text" name="keyword" class="form-control2 input-search" placeholder="Search...">
												<span class="input-group-btn">
														<button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
												</span>
										</div><!-- Input Group -->
								</form>
					</div>
					
					<div class="col-sm-2">

					</div>
				</div>
				<!--
				<div class="grid-hor">
 		<h3 id="grid-example-basic"></h3>

			</div>
			<div class="grid-har">
			    
			<h3>Sub Bagian di <b>ASRI</b></h3>

				</div>
				<form action="" method="post">
				 <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <div class="input-group input-group-in">
                    <select name="kategori" class="form-control input-search" required>
                      
                    
                      
                        <option value="" selected></option>
                     
                      
                    </select>
                    <span class="input-group-btn">
										<button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
								</span>
                    </div>
                </div>
                	<div class="col-md-4">

					</div>
					
            </div>
            	
             
            </form>
            -->
			</div>
		
		</div>
			<!---->

</div>
