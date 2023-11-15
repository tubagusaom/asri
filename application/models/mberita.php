<?php
class Mberita extends CI_Model{
	function kirim_pesan($nama,$bagian,$kelompok,$goal,$waktu,$nilai,$target,$durasi,$w1,$w2,$w3,$w4,$w5,$w6,$w7,$w8,$w9,$w10,$w11,$w12)  {
		$hsl=$this->db->query("INSERT INTO tbl_inbox(inbox_nama,inbox_email,inbox_kontak,inbox_pesan) VALUES ('$nama','$email','$kontak','$pesan')");
		return $hsl;
	}
	
		function simpandetpesan($user,$pesan,$gambar,$kode){
		$hsl=$this->db->query("INSERT INTO det_news(nama,pesan,gambar,tglpost,idberita) VALUES ('$user','$pesan','$gambar',NOW(),'$kode')");
		return $hsl;
	}
	
	function get_all_coments($kode){
		$hasil=$this->db->query("select * from det_news where idberita='$kode'");
		return $hasil;
	}

	function ambil_berita($kode){
		$hasil=$this->db->query("select * from berita where idberita='$kode'");
		return $hasil;
	}

	function ambil_event($kode){
		$hasil=$this->db->query("select * from event where idevent='$kode'");
		return $hasil;
	}

	function get_berita_keyword($keyword){
	$this->db->select('*');
	$this->db->from('berita');
	$this->db->like('judul',$keyword);
	return $this->db->get()->result();
  }

   function get_event_keyword($keyword){
	$this->db->select('*');
	$this->db->from('event');
	$this->db->like('judul',$keyword);
	return $this->db->get()->result();
  }

	function get_inbox_keyword($keyword){
 $this->db->select('*');
 $this->db->from('tbl_inbox');
 $this->db->like('judul',$keyword);
 return $this->db->get()->result();
 }

	function count_berita(){
		$hasil=$this->db->query("select * from berita");
		return $hasil;
	}

	function count_event(){
		$hasil=$this->db->query("select * from event");
		return $hasil;
	}
	function get_event($offset,$limit){
		$hasil=$this->db->query("SELECT event.*,DATE_FORMAT(tglpelaksanaan,'%d %M %Y') AS tanggal FROM event order by tglpost DESC limit $offset,$limit");
		return $hasil;
	}
	function get_news($offset,$limit){
		$hasil=$this->db->query("SELECT * FROM berita order by tglpost DESC limit $offset,$limit");
		return $hasil;
	}

	function get_photo(){
		$hasil=$this->db->query("select * from galeri");
		return $hasil;
	}
	function get_wisata(){
		$hasil=$this->db->query("select * from wisata where idwisata='3'");
		return $hasil;
	}
	function get_wisatadua(){
		$hasil=$this->db->query("select * from wisata where idwisata='4'");
		return $hasil;
	}
	function get_wisatatiga(){
		$hasil=$this->db->query("select * from wisata where idwisata='5'");
		return $hasil;
	}
	function get_berita($offset,$limit){
		$hasil=$this->db->query("select * from berita order by tglpost DESC limit $offset,$limit");
		return $hasil;
	}
	function SimpanBerita($jdl,$kat,$berita,$gambar,$user){
		$hasil=$this->db->query("INSERT INTO berita(judul,kategori,isi,tglpost,gambar,user) VALUES ('$jdl','$kat','$berita',NOW(),'$gambar','$user')");
		return $hasil;
	}
	function Simpanevent($jdl,$tgl,$hari,$berita,$gambar,$user){
		$hasil=$this->db->query("INSERT INTO event(judul,tglpelaksanaan,hari,isi,tglpost,gambar,user) VALUES ('$jdl','$tgl','$hari','$berita',NOW(),'$gambar','$user')");
		return $hasil;
	}
	function tampil_berita(){
		$hasil=$this->db->query("select * from berita order by tglpost DESC");
		return $hasil;
	}

	function tampil_event(){
		$hasil=$this->db->query("SELECT event.*,DATE_FORMAT(tglpelaksanaan,'%d %M %Y') AS tanggal FROM event order by tglpost DESC");
		return $hasil;
	}

	function berita(){
		$hasil=$this->db->query("select * from berita order by tglpost DESC limit 4");
		return $hasil;
	}
	function berita_footer(){
		$hasil=$this->db->query("select * from berita order by tglpost DESC limit 4");
		return $hasil;
	}
	function event_footer(){
		$hasil=$this->db->query("select * from event order by tglpost DESC limit 4");
		return $hasil;
	}
	function paket_footer(){
		$hasil=$this->db->query("select * from paket order by idpaket asc limit 3");
		return $hasil;
	}
	function getberita($kode){
		$hasil=$this->db->query("select * from berita where idberita='$kode'");
		return $hasil;
	}
	function filter_infor($limit){
		$hasil=$this->db->query("select * from berita where kategori='information' order by tglpost DESC limit $limit");
		return $hasil;
	}
	function filter_pengu($limit){
		$hasil=$this->db->query("select * from berita where kategori='pengumuman' order by tglpost DESC limit $limit");
		return $hasil;
	}
	function getevent($kode){
		$hasil=$this->db->query("select * from event where idevent='$kode'");
		return $hasil;
	}
	function getinbox($kode){
		$hasil=$this->db->query("select * from tbl_inbox where inbox_id='$kode'");
		return $hasil;
	}
	function updateberitaimg($kode,$jdl,$berita,$gambar,$user){
		$hasil=$this->db->query("UPDATE berita SET judul='$jdl',isi='$berita',tgl_last_update=NOW(),gambar='$gambar',user='$user' WHERE idberita='$kode'");
		return $hasil;
	}
	function updateberita($kode,$jdl,$kat,$berita,$user){
		$hasil=$this->db->query("UPDATE berita SET judul='$jdl',kategori='$kat',isi='$berita',tgl_last_update=NOW(),user='$user' WHERE idberita='$kode'");
		return $hasil;
	}
	function updateeventimg($kode,$jdl,$berita,$gambar,$user){
		$hasil=$this->db->query("UPDATE event SET judul='$jdl',isi='$berita',tgl_last_update=NOW(),gambar='$gambar',user='$user' WHERE idevent='$kode'");
		return $hasil;
	}
	function updateevent($kode,$jdl,$berita,$user){
		$hasil=$this->db->query("UPDATE event SET judul='$jdl',isi='$berita',tgl_last_update=NOW(),user='$user' WHERE idevent='$kode'");
		return $hasil;
	}
	function hapus_berita($id){
		$hasil=$this->db->query("delete from berita where idberita='$id'");
		return $hasil;
	}

	function hapus_event($id){
		$hasil=$this->db->query("delete from event where idevent='$id'");
		return $hasil;
	}

	function get_jual(){
	 $hsl=$this->db->query("SELECT DISTINCT DATE_FORMAT(tglpost,'%D') AS hari FROM event");
	 return $hsl;
 }

}
