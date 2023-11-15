<?php
class Event extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        $this->load->model('mberita');
        $this->load->library('upload');
	}

	function index(){
		if($this->session->userdata('akses')=='3'){
		     $x['dept']=$this->session->userdata('dept');
	    	$x['data']=$this->mberita->tampil_event();
	        $this->load->view('backend/v_event',$x);
	    }else{
	        echo "Halaman tidak ditemukan";
	    }	
	}

	function add_event(){
	     $x['dept']=$this->session->userdata('dept');
		$this->load->view('backend/v_add_event',$x);
	}
	function get_edit(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->mberita->ambil_event($kode);
		$this->load->view('backend/v_edit_event',$x);
	}

	function simpan_event(){
		$config['upload_path'] = './assets/gambars/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->upload->initialize($config);
	    if(!empty($_FILES['filefoto']['name'])){
	        if ($this->upload->do_upload('filefoto')){
	        	$gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/gambars/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '60%';
	            $config['width']= 750;
	            $config['height']= 375;
	            $config['new_image']= './assets/gambars/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $gambar=$gbr['file_name'];
                $jdl=$this->input->post('judul');
                $tgl=$this->input->post('tgl');
                $hari=$this->input->post('hari');
                $berita=$this->input->post('berita');
                $user=$this->session->userdata('user');

				$this->mberita->Simpanevent($jdl,$tgl,$hari,$berita,$gambar,$user);
				echo $this->session->set_flashdata('msg','success');
				redirect('backendadmin/event');
		}else{
	        echo $this->session->set_flashdata('msg','warning');
	        redirect('backendadmin/event');
	    }
	                 
	    }else{
			redirect('backendadmin/event');
		}
				
	}

	function update_event(){
	    $config['upload_path'] = './assets/gambars/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->upload->initialize($config);
	    if(!empty($_FILES['filefoto']['name'])){
	        if ($this->upload->do_upload('filefoto')){
	            $gbr = $this->upload->data();
	                        //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/gambars/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '60%';
	            $config['width']= 750;
	            $config['height']= 375;
	            $config['new_image']= './assets/gambars/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $gambar=$gbr['file_name'];
	            $kode=$this->input->post('kode');
                $jdl=$this->input->post('judul');
                $berita=$this->input->post('berita');
                $user=$this->session->userdata('user');

				$this->mberita->updateeventimg($kode,$jdl,$berita,$gambar,$user);
				echo $this->session->set_flashdata('msg','info');
				redirect('backendadmin/event');
	                    
	    	}else{
	        	echo $this->session->set_flashdata('msg','warning');
	        	redirect('backendadmin/event');    
	        }       
	    }else{
			$kode=$this->input->post('kode');
        	$jdl=$this->input->post('judul');
        	$berita=$this->input->post('berita');
        	$user=$this->session->userdata('user');
			$this->mberita->updateevent($kode,$jdl,$berita,$user);
			echo $this->session->set_flashdata('msg','info');
			redirect('backendadmin/event');
	    } 

	}

	function hapus_event(){
	    if($this->session->userdata('akses')=='3'){
	        $id=$this->input->post('kode');
	        $this->mberita->hapus_event($id);
	        echo $this->session->set_flashdata('msg','success-hapus');
	        redirect('backendadmin/event');
	    }else{
	        echo "Halaman tidak ditemukan";
	    }
    }

}