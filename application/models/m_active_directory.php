<?php
    class M_active_directory extends CI_Model{

        function count_ad(){
            $hasil=$this->db->query("select * from event");
            return $hasil;
        }
        
    }
?>