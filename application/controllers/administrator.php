<?php
class Administrator extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('mlogin');
    }
    
    function index(){

        // var_dump($this->auth->is_logged_in()); die();

        if (!$this->auth->is_logged_in()) {
            $this->load->view('front/v_login');
        } else {
            redirect(base_url() . 'backend/post');
        }

        
    }

    function auth(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username')));
        $password=strip_tags(str_replace("'", "", $this->input->post('password')));
        $u=$username;
        $p=$password;
        $cadmin=$this->mlogin->cekadmin($u,$p);

        // var_dump(md5('root')); die();

        if($cadmin->num_rows > 0){

        $this->session->set_userdata('masuk',true);
        $this->session->set_userdata('user',$u);
        $xcadmin=$cadmin->row_array();

        $idadmin=$xcadmin['idadmin'];
        $active=$xcadmin['is_active'];
        $user=$xcadmin['username'];
        $photo=$xcadmin['photo'];
        $dept=$xcadmin['dept'];
        $level=$xcadmin['level'];

        // var_dump($xcadmin['level']); die();

        $this->session->set_userdata('is_logged_in',1);
        $this->session->set_userdata('idadmin',$idadmin);
        $this->session->set_userdata('is_active',$active);
        $this->session->set_userdata('username',$user);
        $this->session->set_userdata('photo',$photo);
        $this->session->set_userdata('dept',$dept);
        $this->session->set_userdata('akses',$level);

         // if($xcadmin['level']=='1'){

         //    $this->session->set_userdata('is_logged_in',1);
         //    $this->session->set_userdata('idadmin',$idadmin);
         //    $this->session->set_userdata('is_active',$active);
         //    $this->session->set_userdata('username',$user);
         //    $this->session->set_userdata('photo',$photo);
         //    $this->session->set_userdata('dept',$dept);
         //    $this->session->set_userdata('akses',$xcadmin['level']);

         // }elseif($xcadmin['level']=='3' | $xcadmin['level']=='0'){

         //    $this->session->set_userdata('is_logged_in',1);
         //    $this->session->set_userdata('idadmin',$idadmin);
         //    $this->session->set_userdata('is_active',$active);
         //    $this->session->set_userdata('username',$user);
         //    $this->session->set_userdata('photo',$photo);
         //    $this->session->set_userdata('dept',$dept);
         //    $this->session->set_userdata('akses',$xcadmin['level']);

         // }


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

        // $sessiondata['is_logged_in'] = $this->session->userdata('is_logged_in');
        // $sessiondata['idadmin'] = $this->session->userdata('idadmin');
        // $sessiondata['is_active'] = $this->session->userdata('is_active');
        // $sessiondata['username'] = $this->session->userdata('username');
        // $sessiondata['photo'] = $this->session->userdata('photo');
        // $sessiondata['dept'] = $this->session->userdata('dept');
        // $sessiondata['akses'] = $this->session->userdata('akses');

        // var_dump($sessiondata); die();

        if($this->session->userdata('masuk')==true){
            // redirect('administrator/berhasillogin');
            $this->berhasillogin();
        }else{
            // redirect('administrator/gagallogin');
            $this->gagallogin();
        }
    }
        function berhasillogin(){

            redirect('backend/post/');
        }

        function gagallogin(){
            $url=base_url('administrator');
            echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
            redirect($url);
        }
        function logout(){

            $data_session['is_logged_in'] = $this->session->userdata('is_logged_in');
            $data_session['idadmin'] = $this->session->userdata('idadmin');
            $data_session['is_active'] = $this->session->userdata('is_active');
            $data_session['username'] = $this->session->userdata('username');
            $data_session['photo'] = $this->session->userdata('photo');
            $data_session['dept'] = $this->session->userdata('dept');

            // var_dump($data_session); die();

            $this->session->unset_userdata($data_session);
            $this->session->sess_destroy();

            // $url=base_url('administrator');
            redirect(base_url());
        }

}
