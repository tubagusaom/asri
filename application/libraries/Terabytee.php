<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


 
class Terabytee {
	
	function test() {
		$data = "Test terabytee";

		return $data;
	}

    function limit_words($string, $word_limit){

        // $data = '';
        foreach($string as $key => $berita) {
            $vdata = (explode(' ', $berita['isi']));
            $data[$berita['idberita']] = implode(' ', array_splice($vdata,0,$word_limit)).' ...';
        }
        
        return $data;
        // var_dump(($data)); die();

	}

    function limit_event($string, $event_limit){

        // $data = '';
        foreach($string as $key => $event) {
            $vdata = (explode(' ', $event['isi']));
            $data[$event['idevent']] = implode(' ', array_splice($vdata,0,$event_limit)).' ...';
        }
        
        return $data;
        // var_dump(($data)); die();
        
	}

    function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
	
}

?>