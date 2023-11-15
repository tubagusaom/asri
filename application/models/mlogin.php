<?php
class Mlogin extends CI_Model{
    function cekadmin($u,$p){
        $hasil=$this->db->query("select*from admin where username='$u'and password=md5('$p')");
        return $hasil;
    }
    
    function count_event(){
		$hasil=$this->db->query("select * from admin where level='1'");
		return $hasil;
	}
    function karyawan($offset,$limit)
    {
      $hasil=$this->db->query("select*from admin where level='1' limit $offset,$limit");
      return $hasil;
    }
     function get_karyawan_keyword($keyword){
	$this->db->select('*');
	$this->db->from('admin');
	$this->db->like('username',$keyword);
	return $this->db->get()->result();
  }

}
