<?php
class Mpengguna extends CI_Model{

	function simpan_pass($id,$user,$pass){
        $query=$this->db->query("update admin set username='$user',password=md5('$pass') where idadmin='$id'");
        return $query;
    }
    function ganti_pass($u){
        $query=$this->db->query("select * from admin where username='$u'");
        return $query;
    }
    	function get_all_files(){
		$hsl=$this->db->query("SELECT id,judul,DATE_FORMAT(tglpost,'%d/%m/%Y') AS tanggal,kategori,file_data FROM library ORDER BY id DESC");
		return $hsl;
	}
	
		function get_file_byid($id){
		$hsl=$this->db->query("SELECT id,judul,kategori,DATE_FORMAT(tglpost,'%d/%m/%Y') AS tanggal,file_data FROM library WHERE id='$id'");
		return $hsl;
	}
	
		function update_file($kode,$judul,$deskripsi,$file){
		$hsl=$this->db->query("UPDATE library SET judul='$judul',kategori='$deskripsi',file_data='$file' WHERE id='$kode'");
		return $hsl;
	}
	function update_file_tanpa_file($kode,$judul,$deskripsi){
		$hsl=$this->db->query("UPDATE library SET judul='$judul',kategori='$deskripsi' WHERE id='$kode'");
		return $hsl;
	}
	
	function hapus_file($kode){
		$hsl=$this->db->query("DELETE FROM library WHERE id='$kode'");
		return $hsl;
	}

	
	function get_kategori(){
		$hsl=$this->db->query("SELECT kategori FROM kategori_library");
		return $hsl;
	}
	
	function simpan_file($judul,$kategori,$file){
		$hsl=$this->db->query("INSERT INTO library(judul,kategori,file_data) VALUES ('$judul','$kategori','$file')");
		return $hsl;
	}
	 

    function getusername($id){
        $query=$this->db->query("select * from admin where idadmin='$id'");
        return $query;
    }

    function resetpass($id,$pass){
        $query=$this->db->query("update admin set password=md5('$pass') where idadmin='$id'");
        return $query;
    }
    function hapus_user($id){
        $query=$this->db->query("delete from admin where idadmin='$id'");
        return $query;
    }

    function edit_user($id,$dept,$jab,$hp,$password,$level){
        $query=$this->db->query("update admin set dept='$dept',jabatan='$jab',hp='$hp',password=md5('$password'),level='$level' where idadmin='$id'");
        return $query;
    }

    function update_user_with_img($kode,$dept,$jab,$hp,$password,$level,$gambar){
        $query=$this->db->query("update admin set dept='$dept',jabatan='$jab',hp='$hp',password=md5('$password'),level='$level',photo='$gambar' where idadmin='$kode'");
        return $query;
    }

    function simpan_user($email,$dept,$jab,$hp,$username,$password,$level,$gambar){
        $query=$this->db->query("insert into admin(email,username,dept,jabatan,is_active,hp,password,level,photo)values('$email','$username','$dept','$jab','1','$hp',md5('$password'),'$level','$gambar')");
        return $query;
    }
		function pengguna(){
        $query=$this->db->query("SELECT idadmin,email,username,dept,jabatan,hp,password,IF(level='3','Admin','User') AS level,photo FROM admin");
        return $query;
    }

}
