<?php
class Hris extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };

		// $this->load->library('Auth_AD');
        
	}

	function index(){

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			// $data['auth_ad'] = $this->auth_ad();

			$domain_ad = $this->input->post('domain');
			$server_ad = $this->input->post('server');
			$user_ad = $this->input->post('user');
			$password_ad = $this->input->post('password');

			$data['domain_ad'] = $this->session->set_userdata('domain_ad',$domain_ad);
			$data['server_ad'] = $this->session->set_userdata('server_ad',$server_ad);
			$data['user_ad'] = $this->session->set_userdata('user_ad',$user_ad);
			$data['password_ad'] = $this->session->set_userdata('password_ad',$password_ad);

			$datax['domain'] = $_GET['domain'];
			$datax['server'] = $_GET['server'];
			$datax['user'] = $_GET['user'];
			$datax['password'] = $_GET['password'];

		} else {
			if($this->session->userdata('akses')=='1' | $this->session->userdata('akses')=='3'){

				$id_admin=$this->session->userdata('idadmin');
				$q=$this->db->query("SELECT * FROM admin WHERE idadmin='$id_admin'");
				$data['admin_detail']=$q->row_array();

				// $datax['domain'] = $_GET['domain'];
				// $datax['server'] = $_GET['server'];
				// $datax['user'] = $_GET['user'];
				// $datax['password'] = $_GET['password'];

				// $ldapConfig['host'] = 'localhost'; // ldap rdn or dn
				// $ldapConfig['adminDn'] = 'root'; // associated password
				// $ldapConfig['passwd'] = '';

				// $ldaprdn  = 'deelabs';     // ldap rdn or dn
				// $ldappass = 'Dimasganteng#123';  // associated password
				// $ldapconn = ldap_connect("https://srv167@niagahoster.com") or die("Could not connect to LDAP server.");
				
				
				// $is_logged_in = $this->session->userdata('is_logged_in');
				// $domain = $this->session->userdata('domain');

				// return $ad;
				// var_dump($is_logged_in); die();
				
						
				

			}else{
				redirect('administrator');
			}
		}

		// var_dump($datax); die();

		$this->load->view('template/header');
		$this->load->view('template/menu',$data);
		$this->load->view('front/v_hris');
		$this->load->view('template/footer');

	}

	function auth_ad(){

		$domain_ad = $this->input->post('domain');
		$server_ad = $this->input->post('server');
		$user_ad = $this->input->post('user');
		$password_ad = $this->input->post('password');

		$this->session->set_userdata('domain_ad',$domain_ad);
		$this->session->set_userdata('server_ad',$server_ad);
		$this->session->set_userdata('user_ad',$user_ad);
		$this->session->set_userdata('password_ad',$password_ad);
	}


}
