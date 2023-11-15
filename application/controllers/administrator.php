<?php
class Administrator extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('mlogin');
    }
    
    function index(){
        $this->load->view('front/v_login');
    }

    function auth(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username')));
        $password=strip_tags(str_replace("'", "", $this->input->post('password')));
        $u=$username;
        $p=$password;
        $cadmin=$this->mlogin->cekadmin($u,$p);

        // var_dump(md5($password)); die();

        if($cadmin->num_rows > 0){

         $this->session->set_userdata('masuk',true);
         $this->session->set_userdata('user',$u);
         $xcadmin=$cadmin->row_array();

         // var_dump($xcadmin['level']); die();

         if($xcadmin['level']=='1')
            $this->session->set_userdata('akses','1');
            $idadmin=$xcadmin['idadmin'];
            $active=$xcadmin['is_active'];
            $user=$xcadmin['username'];
            $photo=$xcadmin['photo'];
            $dept=$xcadmin['dept'];
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('is_active',$active);
            $this->session->set_userdata('username',$user);
            $this->session->set_userdata('photo',$photo);
            $this->session->set_userdata('dept',$dept);


         if($xcadmin['level']=='3')
            $this->session->set_userdata('akses','3');
            $idadmin=$xcadmin['idadmin'];
            $active=$xcadmin['is_active'];
            $user=$xcadmin['username'];
            $photo=$xcadmin['photo'];
            $dept=$xcadmin['dept'];
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('is_active',$active);
            $this->session->set_userdata('username',$user);
            $this->session->set_userdata('photo',$photo);
            $this->session->set_userdata('dept',$dept);


         // if($xcadmin['level']=='2'){
         //     $this->session->set_userdata('akses','2');
         //     $idadmin=$xcadmin['idadmin'];
         //
         //
         //     $active=$xcadmin['is_active'];
         //     $this->session->set_userdata('idadmin',$idadmin);
         //     $this->session->set_userdata('is_active',$active);
         //     $this->session->set_userdata('idadmin',$idadmin);
         //
         // } //Front Office
        }

        if($this->session->userdata('masuk')==true){
            redirect('administrator/berhasillogin');
        }else{
            redirect('administrator/gagallogin');
        }
    }
        function berhasillogin(){
            redirect('backend/post');
        }
        function gagallogin(){
            $url=base_url('administrator');
            echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
            redirect($url);
        }
        function logout(){
            $this->session->sess_destroy();
            $url=base_url('administrator');
            redirect($url);
        }

}
