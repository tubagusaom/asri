<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class CI_auth {
	
	// Global variabel untuk loading config dan ci instance
	protected $ci;
	protected $config;
	
	public function __construct()
	{
		$this->ci =& get_instance();
		$this->config =& get_config();
		$this->ci->load->library('session');
	}

	// Periksa apakah user sedang login
	public function is_logged_in()
	{
		return $this->ci->session->userdata('is_logged_in');
	}

	// Periksa id dari user yang sedang login
	public function get_user_id()
	{
		return $this->ci->session->userdata('id');
	}
	
	// Periksa username dari user yang sedang login
	public function get_username()
	{
		return $this->ci->session->userdata('username');
	}
	
}