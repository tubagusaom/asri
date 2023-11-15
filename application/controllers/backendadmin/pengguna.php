<?php
class Pengguna extends CI_Controller{
	function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        $this->load->model('mpengguna');
        $this->load->library('upload');
        $this->load->library('form_validation');
    }
    function index(){
        $dept=$this->session->userdata('dept');
        if($this->session->userdata('akses')=='3'){
            if ($dept=="MARKOM"){
                redirect('backendadmin/event');
            }elseif ($dept=="ISO"){
                 redirect('backendadmin/dashboard');
            }elseif ($dept=="HRD"){
            $x['dept']=$this->session->userdata('dept');
        	$x['data']=$this->mpengguna->pengguna();
            $this->load->view('backend/v_pengguna',$x);
            }
        }else{
            redirect('admin');
        }
    }

    function simpan_pengguna(){
          $this->form_validation->set_rules('username' , 'User name' , 'required|trim|is_unique[admin.username]'); 
        $this->form_validation->set_rules('email','EMAIL','required|trim|valid_email|is_unique[admin.email]');
             
        $config['upload_path'] = './gambar/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./gambar/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                $config['width']= 60;
                $config['height']= 60;
                $config['new_image']= './gambar/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
               
                
                $email=$this->input->post('email');
                 $dept=$this->input->post('dept');
                  $jab=$this->input->post('jab');
                   $hp=$this->input->post('hp');
                $username=$this->input->post('username');
                $password=$this->input->post('pass');
                $password2=$this->input->post('pass2');
                $level=$this->input->post('level');

                if($password <> $password2){
                    echo $this->session->set_flashdata('msg','error');
                    redirect('backendadmin/pengguna');
                }else 
                if($this->form_validation->run() == false){
                    echo $this->session->set_flashdata('msg','salah');
                    redirect('backendadmin/pengguna');
                }else{
                    $this->mpengguna->simpan_user($email,$dept,$jab,$hp,$username,$password,$level,$gambar);
                    echo $this->session->set_flashdata('msg','success');
                    redirect('backendadmin/pengguna'); 
                }
                
        }else{
            echo $this->session->set_flashdata('msg','warning');
            redirect('backendadmin/pengguna');
        }
                     
        }else{
            redirect('backendadmin/pengguna');
        }
    }

    function update_pengguna(){
        $config['upload_path'] = './gambar/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./gambar/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                $config['width']= 60;
                $config['height']= 60;
                $config['new_image']= './gambar/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $kode=$this->input->post('kode');
                 $dept=$this->input->post('dept');
                  $jab=$this->input->post('jab');
                   $hp=$this->input->post('hp');
                $password=$this->input->post('pass');
                $password2=$this->input->post('pass2');
                $level=$this->input->post('level');

                if($password <> $password2){
                    echo $this->session->set_flashdata('msg','error');
                    redirect('backendadmin/pengguna');
                }else{
                    $this->mpengguna->update_user_with_img($kode,$dept,$jab,$hp,$password,$level,$gambar);
                    echo $this->session->set_flashdata('msg','info');
                    redirect('backendadmin/pengguna'); 
                }
                
        }else{
            echo $this->session->set_flashdata('msg','warning');
            redirect('backendadmin/pengguna');
        }
                     
        }else{
            $id=$this->input->post('kode');
            $dept=$this->input->post('dept');
                  $jab=$this->input->post('jab');
                   $hp=$this->input->post('hp');
            $password=$this->input->post('pass');
            $password2=$this->input->post('pass2');
            $level=$this->input->post('level');

            if($password <> $password2){
                echo $this->session->set_flashdata('msg','error');
                redirect('backendadmin/pengguna');
            }else{
                $this->mpengguna->edit_user($id,$dept,$jab,$hp,$password,$level);
                echo $this->session->set_flashdata('msg','info');
                redirect('backendadmin/pengguna'); 
            }
        }
    }
    
    function hapus_user(){
        if($this->session->userdata('akses')=='3'){
            $id=$this->input->post('kode');
            $this->mpengguna->hapus_user($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backendadmin/pengguna'); 
        }else{
            echo "Halaman tidak ditemukan";
        }
    }

    

    
	
}