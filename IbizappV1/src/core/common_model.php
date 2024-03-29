<?php

class common_model extends CI_Model
{
    public function getLastTotalRows()
    {
	$query=$this->db->query("SELECT FOUND_ROWS() AS count");
	if($query->num_rows())
        {
            $row=$query->row();
            return $row->count;
        }
        else
        {
            return false;
        }
    }
    
    public function insertValues($table, $values)
    {
        $this->db->trans_start();
        $this->db->insert($table, $values);
        $insert_id=$this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

}

