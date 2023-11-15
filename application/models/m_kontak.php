<?php
class M_kontak extends CI_Model{

	public function getalluser()
    {
    	$sql = "SELECT * FROM admin WHERE dept='IT' order by idadmin ASC";
    	$bhs= $this->db->query($sql)->result_array();

    	return $bhs;
    }
    
    public function get_tiket(){
	    $hasil=$this->db->query("select * from tiketing order by date_created DESC");
		return $hasil;
    }
    
    public function per_bulan($bulan){        
             
             $hasil=$this->db->query("select * from tiketing where DATE_FORMAT(date_created,'%M %Y')='$bulan'");
		return $hasil;
      }
    
    public function get_bulan_jual(){
		$hsl=$this->db->query("SELECT DISTINCT DATE_FORMAT(date_created,'%M %Y') AS bulan FROM tiketing");
		return $hsl;
	  }
	
	public function getuserdetailwishlist($id)
    {
         $sql= "SELECT * FROM tiketing
                WHERE id='$id'";
         $res = $this->db->query($sql)->row_array();

         return $res;
    }

	public function getusergambardetailwishlist($id)
    {
			$hasil=$this->db->query("SELECT * FROM upload_tiket where idtiketing='$id'");
			return $hasil;
	}
    

	public function getuserwishlist($idad,$dept,$offset,$limit)
    {
        if($dept == "IT"){
            $sql= "SELECT * FROM tiketing
                ORDER BY date_created DESC limit $offset,$limit";
         $res = $this->db->query($sql)->result_array();

         return $res;
        }else{
         $sql= "SELECT * FROM tiketing
                WHERE usernamecrt='$idad'
                ORDER BY date_created DESC";
         $res = $this->db->query($sql)->result_array();

         return $res;
        }
    }

	public function getuserwishlistseacrh($idad,$sortir,$dept,$offset,$limit)
    {
		if(empty($sortir)){
    		if($dept == "IT"){
                $sql= "SELECT * FROM tiketing
                    ORDER BY date_created DESC limit $offset,$limit";
             $res = $this->db->query($sql)->result_array();
    
             return $res;
            }else{
             $sql= "SELECT * FROM tiketing
                    WHERE usernamecrt='$idad'
                    ORDER BY date_created DESC";
             $res = $this->db->query($sql)->result_array();
    
             return $res;
            }

		}
		else{
    		 if($dept == "IT"){
                 $sql= "SELECT * FROM tiketing
                        WHERE status='$sortir'
                        ORDER BY date_created DESC limit $offset,$limit";
                 $res = $this->db->query($sql)->result_array();
        
                 return $res;
    		 }else{
    		     $sql= "SELECT * FROM tiketing
                        WHERE usernamecrt='$idad' AND status='$sortir'
                        ORDER BY date_created DESC limit $offset,$limit";
                     $res = $this->db->query($sql)->result_array();
            
                     return $res;
    		 } 
    		     
    		}
    }
    
    	public function getuserwishlistseacrhexe($idad,$sortir)
    {
		if(empty($sortir)){
			$sql= "SELECT * FROM tiketing
                WHERE usernameexecutor='$idad'
                ORDER BY date_created DESC";
         $res = $this->db->query($sql)->result_array();

         return $res;

		}
		else{
         $sql= "SELECT * FROM tiketing
                WHERE usernameexecutor='$idad' AND status='$sortir'
                ORDER BY date_created DESC";
         $res = $this->db->query($sql)->result_array();

         return $res;
		}
    }

	public function getuserexewishlist($idad)
    {
         $sql= "SELECT * FROM tiketing
                WHERE usernameexecutor='$idad'
                ORDER BY date_created DESC";
         $res = $this->db->query($sql)->result_array();

         return $res;
    }

	function simpanpesan($user,$pesan,$gambar,$judul){
		$hsl=$this->db->query("INSERT INTO tbl_inbox(inbox_nama,judul,pesan,gambar,tglpost) VALUES ('$user','$judul','$pesan','$gambar',NOW())");
		return $hsl;
	}
	function count_event(){
		$hasil=$this->db->query("select * from tbl_inbox");
		return $hasil;
	}
	function count_tiket(){
		$hasil=$this->db->query("select * from tiketing");
		return $hasil;
	}
	
	function getlibrary($kode){
		$hasil=$this->db->query("select * from library where kategori='$kode'");
		return $hasil;
	}
	
	 function get_library_keyword($keyword){
	$this->db->select('*');
	$this->db->from('library');
	$this->db->like('judul',$keyword);
	return $this->db->get()->result();
  }
	
	function simpandetpesan($user,$pesan,$gambar,$kode){
		$hsl=$this->db->query("INSERT INTO det_inbox(nama,pesan,gambar,tglpost,inbox_id) VALUES ('$user','$pesan','$gambar',NOW(),'$kode')");
		return $hsl;
	}

	function get_all_inbox(){
		$hsl=$this->db->query("SELECT tbl_inbox.*,DATE_FORMAT(tglpost,'%d %M %Y') AS tanggal FROM tbl_inbox ORDER BY inbox_id DESC");
		return $hsl;
	}
	function get_all_inboxdepan($offset,$limit){
		$hsl=$this->db->query("SELECT * from tbl_inbox ORDER BY inbox_id DESC limit $offset,$limit");
		return $hsl;
	}
	function get_all_coments($kode){
		$hasil=$this->db->query("select * from det_inbox where inbox_id='$kode'");
		return $hasil;
	}
	function kat_library(){
		$hasil=$this->db->query("select * from kategori_library");
		return $hasil;
	}

	function hapus_kontak($kode){
		$hsl=$this->db->query("DELETE FROM tbl_inbox WHERE inbox_id='$kode'");
		return $hsl;
	}
	function hapus_detinbox($kode){
		$hsl=$this->db->query("DELETE FROM det_inbox WHERE inbox_id='$kode'");
		return $hsl;
	}


}
