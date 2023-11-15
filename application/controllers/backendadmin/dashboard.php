<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('admin');
            redirect($url);
        };
		
		$this->load->model('mpengguna');
		$this->load->library('upload');
		$this->load->helper('download');
	}


	function index(){
		 $x['dept']=$this->session->userdata('dept');
		$x['data']=$this->mpengguna->get_all_files();
		$x['kat']=$this->mpengguna->get_kategori();
		$this->load->view('backend/v_library',$x);
	}

	function download(){
		$id=$this->uri->segment(4);
		$get_db=$this->mpengguna->get_file_byid($id);
		$q=$get_db->row_array();
		$file=$q['file_data'];
		$path='./assets/files/'.$file;
		$data =  file_get_contents($path);
		$name = $file;

		force_download($name, $data); 
		redirect('backendadmin/dashboard');
	}
	
	function simpan_file(){
				$config['upload_path'] = './assets/files/'; //path folder
	            $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        $file=$gbr['file_name'];
							$judul=strip_tags($this->input->post('xjudul'));
							$kategori=$this->input->post('kategori');
							
	
							$this->mpengguna->simpan_file($judul,$kategori,$file);
							echo $this->session->set_flashdata('msg','success');
							redirect('backendadmin/dashboard');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('backendadmin/dashboard');
	                }
	                 
	            }else{
					redirect('backendadmin/dashboard');
				}
				
	}
	
	function update_file(){
				
	            $config['upload_path'] = './assets/files/'; //path folder
	            $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        $file=$gbr['file_name'];
	                        $kode=$this->input->post('kode');
	                        $judul=strip_tags($this->input->post('xjudul'));
							$deskripsi=$this->input->post('xdeskripsi');
						
							$data=$this->input->post('file');
							$path='./assets/files/'.$data;
							unlink($path);
							$this->mpengguna->update_file($kode,$judul,$deskripsi,$file);
							echo $this->session->set_flashdata('msg','info');
							redirect('backendadmin/dashboard');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('backendadmin/dashboard');
	                }
	                
	            }else{
						$kode=$this->input->post('kode');
	                    $judul=strip_tags($this->input->post('xjudul'));
						$deskripsi=$this->input->post('xdeskripsi');
						
						$this->mpengguna->update_file_tanpa_file($kode,$judul,$deskripsi,$oleh);
						echo $this->session->set_flashdata('msg','info');
						redirect('backendadmin/dashboard');
	            } 

	}

	function hapus_file(){
		$kode=$this->input->post('kode');
		$data=$this->input->post('file');
		$path='./assets/files/'.$data;
		unlink($path);
		$this->mpengguna->hapus_file($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('backendadmin/dashboard');
	}

}