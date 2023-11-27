<?php
class Tiket extends CI_Controller{
	function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        $this->load->model('m_kontak');
        $this->load->library('upload');
        $this->load->library('form_validation');
    }

	function index(){
		if($this->session->userdata('akses')=='0' | $this->session->userdata('akses')=='3'){
			
			$x['tiket']=$this->m_kontak->get_tiket();
		    $x['dept']=$this->session->userdata('dept');
			$x['jual_bln']=$this->m_kontak->get_bulan_jual();
	        $this->load->view('backend/v_tiket',$x);
	    }else{
	        echo "Halaman tidak ditemukan";
	    }
	}	

		function perbulan(){
			if($this->session->userdata('akses')=='0' | $this->session->userdata('akses')=='3'){
			
			$bulan=$this->input->post('bln');
			 
			if(empty($bulan)){
			    $x['tiket']=$this->m_kontak->get_tiket();
			      $x['dept']=$this->session->userdata('dept');
			    $x['jual_bln']=$this->m_kontak->get_bulan_jual();
			    	$this->load->view('backend/v_tiket',$x);
			}else{
		
		  
			$x['tiket']=$this->m_kontak->per_bulan($bulan);
			  $x['dept']=$this->session->userdata('dept');
			$x['jual_bln']=$this->m_kontak->get_bulan_jual();
			$this->load->view('backend/v_tiket',$x);
			}
		}else{
			echo "Halaman tidak ditemukan";
		}
		}
		
		function excel(){
		   	if($this->session->userdata('akses')=='0' | $this->session->userdata('akses')=='3'){
			
			$bulan=$this->input->post('bln'); 
			     	if($bulan == "ALL"){
        			    $x['tiket']=$this->m_kontak->get_tiket();
        			    $x['bulan']=$bulan;
        			    	$this->load->view('backend/v_excel',$x);
        			}else{
            			$x['tiket']=$this->m_kontak->per_bulan($bulan);
            			  $x['bulan']=$bulan;
            			$this->load->view('backend/v_excel',$x);
			        }
    		}else{
    			echo "Halaman tidak ditemukan";
    		}
		}
}