<?php
class Ticketing extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kontak');
	}

	function index(){
	if($this->session->userdata('akses')=='1' | $this->session->userdata('akses')=='3'){
				$data['divisi']=$this->m_kontak->getalluser();
				$idad		   =$this->session->userdata('username');
					$dept=$this->session->userdata('dept');
				  $jum=$this->m_kontak->count_tiket();
                    $page=$this->uri->segment(4);
                    if(!$page):
                    $offset = 0;
                     else:
                    $offset = $page;
                    endif;
                    $limit=10;
                    $config['base_url'] = base_url() . 'backend/ticketing/index/';
                    $config['total_rows'] = $jum->num_rows();
                    $config['per_page'] = $limit;
                    $config['uri_segment'] = 4;
                    $config['first_link'] = 'Awal';
                    $config['last_link'] = 'Akhir';
        						$config['next_link']        = 'Next';
                    $config['prev_link']        = 'Prev';
                    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
                    $config['full_tag_close']   = '</ul></nav></div>';
                    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                    $config['num_tag_close']    = '</span></li>';
                    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
                    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
                    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
                    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                    $config['prev_tagl_close']  = '</span>Next</li>';
                    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                    $config['first_tagl_close'] = '</span></li>';
                    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                    $config['last_tagl_close']  = '</span></li>';
                        $this->pagination->initialize($config);
                $data['page'] =$this->pagination->create_links();
				$get=$this->m_kontak->getuserwishlist($idad,$dept,$offset,$limit);
					$data['dept']=$this->session->userdata('dept');
				$data['all']=$get;

				$id_admin=$this->session->userdata('idadmin');
				$q=$this->db->query("SELECT * FROM admin WHERE idadmin='$id_admin'");
				$data['admin_detail']=$q->row_array();
						
				$this->load->view('template/header');
				$this->load->view('template/menu',$data);
				$this->load->view('front/v_tiket',$data);
		        // $this->load->view('template/footer');
		        $this->load->view('front/footer');


		}else{
			redirect('administrator');
		}
	}

	function sortir(){
		if($this->session->userdata('akses')=='1'){
				$data['divisi']=$this->m_kontak->getalluser();
				$idad		   =$this->session->userdata('username');
				$sortir		   = $this->input->post('sortir');
					$dept=$this->session->userdata('dept');
				  $jum=$this->m_kontak->count_tiket();
                    $page=$this->uri->segment(4);
                    if(!$page):
                    $offset = 0;
                     else:
                    $offset = $page;
                    endif;
                    $limit=10;
                    $config['base_url'] = base_url() . 'backend/ticketing/index/';
                    $config['total_rows'] = $jum->num_rows();
                    $config['per_page'] = $limit;
                    $config['uri_segment'] = 4;
                    $config['first_link'] = 'Awal';
                    $config['last_link'] = 'Akhir';
        						$config['next_link']        = 'Next';
                    $config['prev_link']        = 'Prev';
                    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
                    $config['full_tag_close']   = '</ul></nav></div>';
                    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                    $config['num_tag_close']    = '</span></li>';
                    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
                    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
                    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
                    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                    $config['prev_tagl_close']  = '</span>Next</li>';
                    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                    $config['first_tagl_close'] = '</span></li>';
                    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                    $config['last_tagl_close']  = '</span></li>';
                        $this->pagination->initialize($config);
                $data['page'] =$this->pagination->create_links();
				$get=$this->m_kontak->getuserwishlistseacrh($idad,$sortir,$dept,$offset,$limit);
				$data['dept']=$this->session->userdata('dept');
				$data['all']=$get;
		
				$this->load->view('front/v_tiket',$data);
		}else{
			redirect('administrator');
		}
	}
	
	function sortirexe(){
		if($this->session->userdata('akses')=='1'){
				$idad		   =$this->session->userdata('username');
				$sortir		   = $this->input->post('sortir');
				$get=$this->m_kontak->getuserwishlistseacrhexe($idad,$sortir);
				
				$data['all']=$get;
				
		
				$this->load->view('front/v_tiketforyou',$data);
		}else{
			redirect('administrator');
		}
	}
	
	function tiketforyou(){
		if($this->session->userdata('akses')=='1'){
				$idad		   =$this->session->userdata('username');
				
				$get=$this->m_kontak->getuserexewishlist($idad);
				
				$data['all']=$get;
				
		
				$this->load->view('front/v_tiketforyou',$data);
		}else{
			redirect('administrator');
		}
	}

	function details($id){
		if($this->session->userdata('akses')=='1' | $this->session->userdata('akses')=='3'){
			    
				$get=$this->m_kontak->getuserdetailwishlist($id);
				$getgambar=$this->m_kontak->getusergambardetailwishlist($id);
				$data['all']=$get;
				$data['gambar']=$getgambar;
				$data['dept']=$this->session->userdata('dept');
				$data['divisi']=$this->m_kontak->getalluser();
				$this->load->view('front/v_detail_tiket',$data);
		}else{
			redirect('administrator');
		}
	}



	function add_ticket()
	{
		$id			=$this->session->userdata('username');
// 		$executor	= $this->input->post('executor');
		$title      = $this->input->post('title');
		$subject	= $this->input->post('subject');
// 		$priority	= $this->input->post('priority');

		$cust = array(
			'usernamecrt' => $id,
			'usernameexecutor' => "" ,
			'title' => $title,
			'subject' => $subject,
			'priority' => "",
			'status' => 1,
			'handover'=>"-",
			
			);
		$this->db->insert('tiketing',$cust);
		$idticket = $this->db->insert_id();

		$config['upload_path']          = './web/images/upload_tiket/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg|bmp|doc|docx|pdf|xls|xlsx';

		$config['encrypt_name'] 		= true;
		$this->load->library('upload',$config);
		$jumlah_berkas = count($_FILES['userfiles']['name']);
		for($i = 0; $i < $jumlah_berkas; $i++)
		{
           

				$_FILES['file']['name'] = $_FILES['userfiles']['name'][$i];
				$_FILES['file']['type'] = $_FILES['userfiles']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['userfiles']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['userfiles']['error'][$i];


				if($this->upload->do_upload('file')){

					$uploadData = $this->upload->data();
					$data['gambar'] = $uploadData['file_name'];
					$data['idtiketing'] = $idticket;
        
					$this->db->insert('upload_tiket',$data);
					
				 }
		
		}
				echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button>Terima kasih Data Anda Telah Berhasil Di Simpan:</div>');
				redirect('backend/ticketing');
	}

	function updateutama(){
		            $status	= $this->input->post('status');
		            $executor	= $this->input->post('executor');
		            $priority	= $this->input->post('priority');
					$id	= $this->input->post('id');
					$this->db->where('id', $id);
					$this->db->update('tiketing', array('status' => $status , 'usernameexecutor' => $executor , 'priority' => $priority));
					redirect('backend/ticketing');
					
	}
	
		function update_status(){
		            $status	= $this->input->post('status');
		            
					$id	= $this->input->post('id');
					$this->db->where('id', $id);
					$this->db->update('tiketing', array('status' => $status));
					redirect('backend/ticketing/tiketforyou');
					
	}





}
